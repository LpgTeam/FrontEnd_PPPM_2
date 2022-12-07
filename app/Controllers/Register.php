<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use CodeIgniter\Events\Events;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Exceptions\ValidationException;
use CodeIgniter\Shield\Models\UserModel;
use App\Models\DosenModel;
use App\Models\TandaTanganDosenModel;
use App\Models\TimPenelitiModel;

use CodeIgniter\Shield\Controllers\RegisterController as ShieldRegisterController;

/**
 * Class RegisterController
 *
 * Handles displaying registration form,
 * and handling actual registration flow.
 */
class Register extends ShieldRegisterController
{
    use ResponseTrait;
    protected $dosenModel;
    protected $ttdDosen;

    public function __construct()
    {
        $this->dosenModel = new DosenModel();
        $this->ttdDosen = new TandaTanganDosenModel();
    }

    protected $helpers = ['setting'];

    /**
     * Displays the registration form.
     *
     * @return RedirectResponse|string
     */
    public function registerView()
    {
        // if (auth()->loggedIn()) {
        //     return redirect()->to(config('Auth')->registerRedirect());
        // }

        // Check if registration is allowed
        if (!setting('Auth.allowRegistration')) {
            return redirect()->back()->withInput()
                ->with('error', lang('Auth.registerDisabled'));
        }

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // If an action has been defined, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show');
        }

        return view('register');
    }

    /**
     * Attempts to register the user.
     */
    public function registerAction(): RedirectResponse
    {
        // if (auth()->loggedIn()) {
        //     return redirect()->to(config('Auth')->registerRedirect());
        // }

        // Check if registration is allowed
        if (!setting('Auth.allowRegistration')) {
            return redirect()->back()->withInput()
                ->with('error', lang('Auth.registerDisabled'));
        }

        $users = $this->getUserProvider();

        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = $this->getValidationRules();

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_merge(
            setting('Auth.validFields'),
            setting('Auth.personalFields'),
            ['password']
        );
        $user = $this->getUserEntity();
        $user->fill($this->request->getPost($allowedPostFields));
        // Workaround for email only registration/login
        if ($user->username === null) {
            $user->username = null;
        }

        try {
            $users->save($user);
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // To get the complete user object with ID, we need to get from the database
        // $user = $users->findById($users->getInsertID());

        // // Add to default group
        // $users->addToDefaultGroup($user);

        Events::trigger('register', $user);

        // /** @var Session $authenticator */
        // $authenticator = auth('session')->getAuthenticator();

        // $authenticator->startLogin($user);

        // // If an action has been defined for register, start it up.
        // $hasAction = $authenticator->startUpAction('register', $user);
        // if ($hasAction) {
        //     return redirect()->to('auth/a/show');
        // }

        // // Set the user active
        // $authenticator->activateUser($user);

        // $authenticator->completeLogin($user);

        //---tambah manual user di tabel database dosen
        // $user = auth()->user();
        // $user = $users->findById($users); 
        // dd($user->nip);
        // dd($this->request->getVar('nama'));
        $dosenModel = new DosenModel();
        // dd($this->request->getVar('nip'));
        $this->dosenModel->insert([
            'NIP_dosen'     => $this->request->getVar('nip'),
            // 'username'      => $this->request->getVar('username'),
            'username'      => $this->request->getVar('username'),
            'email_dosen'   => $this->request->getVar('email'),
            'jabatan_dosen' => $this->request->getVar('jabatan'),
            // 'jabatan_dosen' => 'jabatan dosen 1',
            'nama_dosen'    => $this->request->getVar('nama'),
            // 'nama_dosen'    => 'nama dosen 1',
            'program_studi' => "-",
            'no_hp' => "-",
            'NIDN_dosen' => "-",
            'foto_dosen'  => "user.png",
            'minat_penelitian'  => "-",
            'google_scholar' => "-",
            'link_sinta'     => "-",
            'link_orcid'     => "-",
            'link_wos'     => "-",
            'link_scopus' => "-",
        ]);        //---
        $this->ttdDosen->insert([
            'nip_dosen'     => $this->request->getVar('nip'),
            
        ]);        //---
        // dd($user);
        $_SESSION['group'] = "dosen";

        // dd($user->nip);
        // Success!
        return redirect()->to('/userSetting')
            ->with('message', lang('Auth.registerSuccess'));
    }

    /**
     * Returns the User provider
     */
    protected function getUserProvider(): UserModel
    {
        $provider = model(setting('Auth.userProvider'));

        assert($provider instanceof UserModel, 'Config Auth.userProvider is not a valid UserProvider.');

        return $provider;
    }

    /**
     * Returns the Entity class that should be used
     */
    protected function getUserEntity(): User
    {
        return new User();
    }

    /**
     * Returns the rules that should be used for validation.
     *
     * @return string[]
     */
    protected function getValidationRules(): array
    {
        $registrationNamaRules = array_merge(
            config('AuthSession')->namaValidationRules,
            // ['is_unique[users.nama]']
        );
        $registrationUsernameRules = array_merge(
            config('AuthSession')->usernameValidationRules,
            ['is_unique[users.username]']
        );
        $registrationEmailRules = array_merge(
            config('AuthSession')->emailValidationRules,
            ['is_unique[auth_identities.secret]']
        );
        $registrationNipRules = array_merge(
            config('AuthSession')->nipValidationRules,
            ['is_unique[auth_identities.secret]']
        );

        return setting('Validation.registration') ?? [
            'nama' => [
                'label' => 'Auth.nama',
                'rules' => $registrationNamaRules,
            ],
            'jabatan' => [
                // 'label' => 'Auth.jabatan',
            ],
            'nip' => [
                'label' => 'Auth.nip',
                'rules' => $registrationNipRules,
            ],
            'username' => [
                'label' => 'Auth.username',
                'rules' => $registrationUsernameRules,
            ],
            'email' => [
                'label' => 'Auth.email',
                'rules' => $registrationEmailRules,
            ],
            'password' => [
                'label' => 'Auth.password',
                'rules' => 'required|strong_password',
            ],
            'password_confirm' => [
                'label' => 'Auth.passwordConfirm',
                'rules' => 'required|matches[password]',
            ],
        ];
    }
}
