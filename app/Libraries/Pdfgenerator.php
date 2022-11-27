<?php

namespace App\Libraries;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Controllers\BaseController;

class Pdfgenerator extends BaseController
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

    public function save_to_local($html, $filename = '', $paper = '', $orientation = '', $stream = true)
    {
        // $filename = 'cache/pdffile.pdf';

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options, [
            'enable_remote' => true,
            'chroot' => '/public/assets/img',
        ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        file_put_contents('cache/' . $filename . '.pdf', $dompdf->output());
    }
}
