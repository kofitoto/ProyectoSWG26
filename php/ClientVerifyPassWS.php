<?php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

    $ticket = "1010";
    
    $soapclient = new nusoap_client('https://www.ehusw.es/jav/ServiciosWeb/comprobarcontrasena.php?wsdl',true);

    if($soapclient->getError()){
        echo 'Error al crear el cliente: '.$soapclient->getError();    
    }
    
    $pass = array('x' => $_REQUEST['pass1'], 'y' => $ticket);
    echo $soapclient->call('comprobar',$pass);
?>