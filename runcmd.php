<?php
    use Thedudeguy\Rcon;
    require_once('rcon.php');
    $ad="";
    if(isset($_GET["Auth"])==false){
        $ad="No Token provided";
    }else{
        if($_GET["Auth"]==json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Auth"]){
            if(isset($_GET["cmd"])){
                $host = json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["RCONIP"];
                $port = json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["RCONPORT"];
                $password = json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["RCONPASSWORD"];
                $timeout = json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["RCONTIMEOUT"];
                $rcon = new Rcon($host, $port, $password, $timeout);
                if($rcon->connect())
                {
                    $rcon->sendCommand($_GET["cmd"]);
                    $adx=$rcon->getResponse();
                    $rcon->disconnect();
                }
            }else{
                $adx="No Command set";
            }
            $ad=substr($adx,0,strlen($adx)-2);
        }else{
            $ad="§4§l§nAccess Denied";
        }
    }
    print($ad);
?>