<?php
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options->set('isRemoteEnabled',false);
$options->set('isPhpEnabled',true);
$dompdf = new Dompdf($options);

ob_start();
include 'plantilla.html';
$html = ob_get_clean();
//cargar El html
$dompdf->loadHtml($html);

$dompdf->setPaper('A4','portrait');

//renderizar el pdf
$dompdf->render();

//enviar al navegador:
$dompdf->stream("factura_demo.pdf",["Attachment" => false]);
