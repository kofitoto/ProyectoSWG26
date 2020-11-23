<?php
    require_once('../lib/nusoap.php');
    require_once('../lib/class.wsdlcache.php');
    
    $ns = "http://".$_SERVER['HTTP_HOST']."/ProyectoSWG26/php";
    $server = new soap_server;
    $server->configureWSDL('verificar',$ns);
    $server->wsdl->schemaTargetNamespace = $ns;

    $server->register('verificar',
                     array('x'=>'xsd:string','ticket'=>'xsd:string'),
                     array('y'=>'xsd:string'),
                     $ns);

    function verificar($x,$ticket){
       if($ticket==="1010")
       {
            $incorrecta = false;
            $fichero = fopen("../txt/toppasswords.txt", "r");
            while (!feof($fichero))
            {
                $linea = fgets($fichero);
                $linea = trim($linea);
                if($linea===$x)
                {
                    $incorrecta = true;
                }
            }
            fclose($fichero);
            if($incorrecta===false)
            {
                return "VALIDA";
            }
            else
            {
                return "INVALIDA";
            }
       }
       else
       {
           return "INVALIDA";
       }
    }
    if(!isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA  = file_get_contents('php://input');
    $server->service($HTTP_RAW_POST_DATA);
?>