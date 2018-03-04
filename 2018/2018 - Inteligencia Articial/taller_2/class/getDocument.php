<?php

/*
 * Buscar Documentos
 */

// Variables
$aAdmitidos = array("pdf", "docx", "txt");
$sDirectorio = '../documents/';
$aFicheros  = scandir($sDirectorio);

$aDocumentos = array();
foreach($aFicheros as $sNombre){
    // Buscamos Tipo Archivo
    $aExt = explode('.', $sNombre);
    $sExt = end($aExt);
    
    if(in_array($sExt, $aAdmitidos)){
        $aDocumentos[$sExt][] = $sNombre;
    }
}

// Convertimos Formato SELECT2
$aSelect2 = array();
foreach($aDocumentos as $sTipo => $aData){
    
    $aDataSelect = array("text" => $sTipo, "children" => array());
    foreach($aData as $sNombre){
        $aDataSelect["children"][] = array(
            "id" => $sNombre,
            "text" => $sNombre,
            "icon" => $sTipo
        );
    }
    
    // Concatenamos Resultado
    array_push($aSelect2, $aDataSelect);
}

echo json_encode($aSelect2);