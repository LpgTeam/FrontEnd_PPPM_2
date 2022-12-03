<?php

namespace App\Libraries;

use App\Controllers\BaseController;

class SendEmail extends BaseController
{
    public function send_email_persetujuan($AccOrRjcBy)
    {
        // $LpgTeam = ['222011295@stis.ac.id', '222011361@stis.ac.id', '222011453@stis.ac.id', '222011494@stis.ac.id', '222011537@stis.ac.id', '222011596@stis.ac.id'];
        $LpgTeam = ['222011494@stis.ac.id','222011596@stis.ac.id'];
        $email = \Config\Services::email();
        for ($i = 0; $i < max($LpgTeam); $i++) {
            $email->setFrom('lpgteam6@gmail.com');
            // $email->setTo('lpgteam6@gmail.com');
            $email->setTo($LpgTeam[$i]);
            $email->setSubject('Persetujuan penelitian oleh ' . $AccOrRjcBy);
            $email->setMessage('<>Penelitian telah disetujui oleh ' . $AccOrRjcBy. '</p>');
            // $email->send();
            if ($email->send()) {
                echo 'Email successfully sent';
            } else {
                $data = $email->printDebugger(['headers']);
                print_r($data);
            }
        }
    }
}
