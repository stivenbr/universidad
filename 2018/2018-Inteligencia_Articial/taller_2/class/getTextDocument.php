<?php

require_once './GetTxt.php';
require_once './GetTxtPdf.php';
require_once './GetTxtWord.php';

use FileDocument\GetTxt as GetTxt;
use FileDocument\GetTxtPdf as GetTxtPdf;
use FileDocument\GetTxtWord as GetTxtWord;

// RUTAS
$sDirectorio = '../documents/';

// Variables
$aDocumentoBuscar = $_POST["nomFiles"];
$sTxtBuscar = $_POST["txtBuscar"];

// ENCONTRADO
$aEncontrado = array();
foreach($aDocumentoBuscar as $sDocument){
    $sRuta = $sDirectorio . $sDocument;
    
    // Buscamos Tipo Archivo
    $aExt = explode('.', $sDocument);
    $sExt = end($aExt);
    
    
    
    switch ($sExt){
        case "txt":
            $cTxt = new GetTxt();
            $bSearch = $cTxt->getTxtFile($sRuta, $sTxtBuscar);
            
            if($bSearch){
                $aEncontrado[] = $sDocument;
            }
            break;
        case "pdf":
            $cPdf = new GetTxtPdf();
            $bSearch = $cPdf->getTxtFile($sRuta, $sTxtBuscar);
            
            if($bSearch){
                $aEncontrado[] = $sDocument;
            }
            break;
        case "docx":
            $cWord = new GetTxtWord();
            $bSearch = $cWord->getTxtFile($sRuta, $sTxtBuscar);
            
            if($bSearch){
                $aEncontrado[] = $sDocument;
            }
            break;
        default:
            break;
    }
    
}

echo json_encode( array("documents" => $aEncontrado) );