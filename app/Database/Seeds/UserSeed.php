<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Constants;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Authorization\Traits;

class UserSeed extends Seeder
{

    public function run()
    {
        // default account direktur
        $users = model('UserModel');
        $user = new User([
            'username' => 'admin',
            'email'    => 'admin@stis.ac.id',
            'password' => 'admin123',
            'nip'      => nipAdmin,
        ]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen', 'admin');

        // default account dosen
        $users = model('UserModel');
        $user = new User([
            'username' => 'dosen',
            'email'    => 'dosen@stis.ac.id',
            'password' => 'dosen123',
            'nip'      => nipDosen,
        ]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        // $users->addToDefaultGroup($user);
        $user->addGroup('dosen');

        // default account direktur
        $user = new User([
            'username' => 'direktur',
            'email'    => 'direktur@stis.ac.id',
            'password' => 'direktur123',
            'nip'      => nipDirektur,
        ]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen', 'direktur');

        // default account Kepala PPPM
        $user = new User([
            'username' => 'kepalapppm',
            'email'    => 'kepalapppm@stis.ac.id',
            'password' => 'kepalapppm123',
            'nip'      => nipKepalaPPPM,
        ]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen', 'kepalapppm');

        // default account BAU
        $user = new User([
            'username' => 'bau',
            'email'    => 'bau@stis.ac.id',
            'password' => 'bau123',
            'nip'      => nipBAU,
        ]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen', 'bau');

        // default account Reviewer
        $user = new User([
            'username' => 'reviewer',
            'email'    => 'reviewer@stis.ac.id',
            'password' => 'reviewer123',
            'nip'      => nipReviewer,
        ]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen', 'reviewer');


        // default account LPG TEAM as dosen

        $user = new User([
            'username' => 'afnan',
            'email'    => '222011494@stis.ac.id',
            'password' => 'afnan123',
            'nip'      => nipAfnan,
        ]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');

        $user = new User([
            'username' => 'okta',
            'email'    => '222011596@stis.ac.id',
            'password' => 'okta123',
            'nip'      => nipOkta,
        ]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');

        $user = new User([
            'username' => 'taufiq',
            'email'    => '222011361@stis.ac.id',
            'password' => 'taufiq123',
            'nip'      => nipTaufiq,
        ]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');

        $user = new User([
            'username' => 'intan',
            'email'    => '222011537@stis.ac.id',
            'password' => 'intan123',
            'nip'      => nipIntan,
        ]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');

        $user = new User([
            'username' => 'fatya',
            'email'    => '222011295@stis.ac.id',
            'password' => 'fatya123',
            'nip'      => nipFatya,
        ]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');

        $user = new User([
            'username' => 'atikah',
            'email'    => '222011453@stis.ac.id',
            'password' => 'atikah123',
            'nip'      => nipAtikah,
        ]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
    }
}
