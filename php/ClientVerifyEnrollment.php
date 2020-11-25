<?php 
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');
    
    $soapclient = new nusoap_client('https://ehusw.es/jav/ServiciosWeb/comprobarmatricula.php?wsdl', true);
    
    if($soapclient->getError()){
        echo 'Error al crear el cliente: '.$soapclient->getError();    
    }
    
    $user = array('x' => $_REQUEST['dirCorreo']);

    echo $soapclient->call('comprobar',$user);
?>