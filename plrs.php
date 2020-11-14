<?php
    $config = json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"];
    require_once('query.php');
    $server = new Query($config["IP"],$config["PORT"],$config["TIMEOUT"]);
    $plrs="";
    if ($server->connect()){
        $info = $server->get_info();
        foreach($info["players"] as $plr){
            $plrs.=$plr."\n";
        }
        print($info["numplayers"]."/".$info["maxplayers"]." Players Online\n");
    }else{
        print("0/0 (Offline)\n");
    }
    print($plrs)
?> 