<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace FileDocument;

/**
 * Description of GetTxtPdf
 *
 * @author AndersonStivenBarbos
 */
class GetTxtPdf {
    /**
     * 
     * @param array $sDocumento
     * @param string $sTxtBuscar
     * @return boolean
     */
    public function getTxtFile($sDocumento, $sTxtBuscar){
        $oFile = fopen($sDocumento, "r");
        
        while(!feof($oFile)){
            $sTexto = fgets($oFile);
            
            $txtBuscar = strpos($sTexto, $sTxtBuscar);
            
            if($txtBuscar !== false){
                fclose($oFile);
                return true;
            }
        }
        fclose($oFile);
        
        return false;
    }
}
