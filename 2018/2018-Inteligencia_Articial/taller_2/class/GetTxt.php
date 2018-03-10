<?php

namespace FileDocument;

class GetTxt {
    
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
