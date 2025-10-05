<?php
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;



$nombre = "José Edgardo";
$producto = "Laptop";
$total = 600;
//leer la plantilla

$plantilla = file_get_contents('plantilla.html');

//reemplazar los marcadores:
$html = str_replace('{nombre}', $nombre,$plantilla);
$html = str_replace('{producto}', $producto,$html);
$html = str_replace('{total}', $total,$html);

$options = new Options();
$options->set('isRemoteEnabled', false);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

//renderizar el pdf
$dompdf->render();

//enviar al navegador:
$dompdf->stream("factura_demo.pdf", ["Attachment" => false]);
