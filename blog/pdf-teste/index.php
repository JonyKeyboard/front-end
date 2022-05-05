<?php
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// permitindo o acesso ao arquivo.html no diretorio correto
$options = new Options();
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true); //habilitando o uso de imagens externas


$dompdf = new Dompdf($options);

//CARREGA O HTML PARA DENTRO DA CLASSE
//$dompdf->loadHtml('<b>Olá mundo</b>');
$dompdf->loadHtmlFile(__DIR__.'/arquivo.html');

//PÁGINA seta o tamanho da página
//$dompdf->setPaper('A4','portrait'); //landscape é o modo paisagem
                                     //portrait é o modo retrato
//RENDERIZAR O ARQUIVO PDF
$dompdf->render();

//IMPRIME O CONTEÚDO DO ARQUIVO PDF NA TELA
header('Content-type: application/pdf');
echo $dompdf->output();

//DOWNLOAD baixar automaticamente
//$dompdf->stream('documento.pdf');

//SALVAR AQRQUIVO NA PASTA LOCAL
//file_put_contents(__DIR__.'/arquivo.pdf', $dompdf->output());
//echo 'Arquivo salvo no disco';

?>