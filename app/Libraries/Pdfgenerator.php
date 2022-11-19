<?php

namespace App\Libraries;

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator
{
    public function generate($html, $filename = '', $paper = '', $orientation = '', $stream = true)
    {
        $options = new Options();
        // $options->setChroot(FCPATH);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options, [
            'enable_remote' => true,
            'chroot' => '/public/assets/img',
        ]);
        // $dompdf->set_option('chroot', '/public/assets/img');
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        // $dompdf->set_option('isRemotedEnabled', true);
        $dompdf->render();
        if ($stream) {
            $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
        } else {
            return $dompdf->output();
        }
    }
}
