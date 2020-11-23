<?php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');

    $ticket = "1010";
    
    $soapclient = new nusoap_client('https://'.$_SERVER['HTTP_HOST'].'/ProyectoSWG26/php/verifyPassWS.php?wsdl',true);

    if($soapclient->getError()){
        echo 'Error al crear el cliente: '.$soapclient->getError();    
    }
    
    $pass = array('x' => $_REQUEST['pass1'], 'ticket' => $ticket);

    echo $soapclient->call('verificar',$pass);
?>