<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Shield\Controllers\LoginController as ShieldLoginController;

class Login extends ShieldLoginController
{
    // public function index()
    // {
    //     $data = ['title' => 'PPPM Politeknik Statistika STIS'];
    //     return view('login/tampilan/login', $data);
    // }

    public function loginView()
    {
        if (auth()->loggedIn()) {
            return redirect()->to(config('Auth')->loginRedirect());
        }

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // If an action has been defined, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show');
        }

        $data = ['title' => 'PPPM Politeknik Statistika STIS'];
        return view('login/tampilan/login', $data);
    }

    public function loginAction(): RedirectResponse
    {
        $rules = $this->getValidationRules();

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $credentials             = $this->request->getPost(setting('Auth.validFields'));
        $credentials             = array_filter($credentials);
        $credentials['password'] = $this->request->getPost('password');
        $remember                = (bool) $this->request->getPost('remember');

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // Attempt to login
        $result = $authenticator->remember($remember)->attempt($credentials);
        if (!$result->isOK()) {
            return redirect()->route('login')->withInput()->with('error', $result->reason());
        }

        // If an action has been defined for login, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show')->withCookies();
        }
        $_SESSION['group'] = "dosen";
        return redirect()->to(base_url() . '/indexDosen')->withCookies();
    }

    public function loginActionAdmin(): RedirectResponse
    {
        $rules = $this->getValidationRules();

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $credentials             = $this->request->getPost(setting('Auth.validFields'));
        $credentials             = array_filter($credentials);
        $credentials['password'] = $this->request->getPost('password');
        $remember                = (bool) $this->request->getPost('remember');

        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        // Attempt to login
        $result = $authenticator->remember($remember)->attempt($credentials);
        if (!$result->isOK()) {
            return redirect()->route('login')->withInput()->with('error', $result->reason());
        }

        // If an action has been defined for login, start it up.
        if ($authenticator->hasAction()) {
            return redirect()->route('auth-action-show')->withCookies();
        }

        if (!(auth()->user()->inGroup('admin') || auth()->user()->inGroup('direktur') || auth()->user()->inGroup('kepalaPPPM') || auth()->user()->inGroup('reviewer'))) {
            session()->setFlashdata('pesan', 'Login gagal. Anda bukan administrator. Pilih menu login yang sesuai');
            auth()->logout();
            return redirect()->to(base_url() . '/login');
        } elseif (auth()->user()->inGroup('direktur')) {
            $_SESSION['group'] = "direktur";
            return redirect()->to(base_url() . '/indexDirektur')->withCookies();
        } elseif (auth()->user()->inGroup('admin')) {
            $_SESSION['group'] = "admin";
            return redirect()->to(base_url() . '/indexAdmin')->withCookies();
        } elseif (auth()->user()->inGroup('kepalapppm')) {
            $_SESSION['group'] = "kepalapppm";
            return redirect()->to(base_url() . '/indexKepala')->withCookies();
        } elseif (auth()->user()->inGroup('reviewer')) {
            $_SESSION['group'] = "reviewer";
            return redirect()->to(base_url() . '/indexReviewer')->withCookies();
        } elseif (auth()->user()->inGroup('bau')) {
            $_SESSION['group'] = "bau";
            return redirect()->to(base_url() . '/indexBAU')->withCookies();
        } else {
            session()->setFlashdata('pesan', 'Login gagal. Anda bukan administrator. Pilih menu login yang sesuai');
            auth()->logout();
            return redirect()->to(base_url() . '/login');
        }
    }

    public function logoutAction(): RedirectResponse
    {
        auth()->logout();
        // return redirect()->to(config('Auth')->logoutRedirect())->with('message', lang('Auth.successLogout'));
        return redirect()->to(base_url())->with('message', lang('Auth.successLogout'));
    }
}
