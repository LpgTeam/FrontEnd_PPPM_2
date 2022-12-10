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

        $user = new User(['username' => '197211171995121001', 'email'    => 'praze@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197211171995121001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197305281995121001', 'email'    => 'agung@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197305281995121001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '196008221985011001', 'email'    => 'opan_97@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '196008221985011001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198506012007012003', 'email'    => 'aisyah.fy@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198506012007012003',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198302182004122001', 'email'    => 'efridiah@bps.go.id', 'password' => 'dosen123', 'nip'      =>  '198302182004122001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197605052000032003', 'email'    => 'lia@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197605052000032003',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197412101996121001', 'email'    => 'nasrudin@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197412101996121001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197001251998032001', 'email'    => 'retna@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197001251998032001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197604141999122001', 'email'    => 'sarni@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197604141999122001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197002191992112001', 'email'    => 'sitim@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197002191992112001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197204241994031003', 'email'    => 'sukim@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197204241994031003',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198109262004122001', 'email'    => 'winih@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198109262004122001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '196607191991011001', 'email'    => 'setiadi@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '196607191991011001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198007282003121004', 'email'    => 'madsyair@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198007282003121004',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198512222009021002', 'email'    => 'ariewahyu@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198512222009021002',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198001182011011001', 'email'    => 'bonyp@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198001182011011001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198006242003121004', 'email'    => 'byuniarto@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198006242003121004',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198409182007012004', 'email'    => 'erna.nurmawati@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198409182007012004',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198512122008011004', 'email'    => 'faridr@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198512122008011004',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197205261991121001', 'email'    => 'firdaus@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197205261991121001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198601202008011002', 'email'    => 'ibnu@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198601202008011002',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '199004052012112001', 'email'    => 'lutfirm@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '199004052012112001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198902072010122001', 'email'    => 'lya@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198902072010122001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '199001102012112001', 'email'    => 'wilantika@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '199001102012112001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198306072007012009', 'email'    => 'raninoor@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198306072007012009',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198204212003121004', 'email'    => 'yordani@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198204212003121004',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198002102002121001', 'email'    => 'rindang@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198002102002121001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198106042003121001', 'email'    => 'robertk@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198106042003121001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197707222000031002', 'email'    => 'setia.pramana@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197707222000031002',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198810242010122001', 'email'    => 'sitimariyah@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198810242010122001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '196302081985011001', 'email'    => 'waris@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '196302081985011001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197006161988121001', 'email'    => 'anang@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197006161988121001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197502041996122001', 'email'    => 'ak.monika@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197502041996122001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197808022000122001', 'email'    => 'atik@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197808022000122001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198202072004121001', 'email'    => 'azka@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198202072004121001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '196102191983122001', 'email'    => 'budiasih@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '196102191983122001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198007242002121002', 'email'    => 'budy@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198007242002121002',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197907312000122001', 'email'    => 'cucu@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197907312000122001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '196207221985012001', 'email'    => 'e_ria_s@yahoo.co.id', 'password' => 'dosen123', 'nip'      =>  '196207221985012001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197310231995122001', 'email'    => 'erna@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197310231995122001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '196710221990032002', 'email'    => 'erni@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '196710221990032002',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198202022003121004', 'email'    => 'febri@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198202022003121004',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198004012003122003', 'email'    => 'fkartiasih@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198004012003122003',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '196704251989011002', 'email'    => 'hardius@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '196704251989011002',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '196805031991011001', 'email'    => 'arcana@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '196805031991011001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '196503141988021001', 'email'    => 'jeffry@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '196503141988021001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198110142004122001', 'email'    => 'krismanti@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198110142004122001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197701042009022003', 'email'    => 'lizakurnia@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197701042009022003',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '196706121991011001', 'email'    => 'dokhi@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '196706121991011001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197608092000032001', 'email'    => 'neli@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197608092000032001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198811292012112001', 'email'    => 'nofita@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198811292012112001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198106122003122002', 'email'    => 'nucke@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198106122003122002',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198804192013112001', 'email'    => 'rinirahani@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198804192013112001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197007251998032003', 'email'    => 'rita@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197007251998032003',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198410152007012001', 'email'    => 'siskarossa@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198410152007012001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197807222000121003', 'email'    => 'soegie@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197807222000121003',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '195806081986031005', 'email'    => 'suryanto@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '195806081986031005',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197312272000031002', 'email'    => 'timbang@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197312272000031002',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197001121991122001', 'email'    => 'theo@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197001121991122001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '196703171989012001', 'email'    => 'titik@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '196703171989012001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '197307141996121001', 'email'    => 'wahyudin@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '197307141996121001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198804052010122001', 'email'    => 'anasofa@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198804052010122001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
        $user = new User(['username' => '198707112009121001', 'email'    => 'yuliagnis@stis.ac.id', 'password' => 'dosen123', 'nip'      =>  '198707112009121001',]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('dosen');
    }
}
