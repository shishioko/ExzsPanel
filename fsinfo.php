<?php
$ad="Success";
if(isset($_GET["Auth"])==false){
    $ad="No Token provided";
}else{
    if(isset($_GET["file"])==false){
        $ad="No file provided";
    }else{
        if(file_exists(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"].urldecode($_GET['file']))==false){$ad="File not found";}else{
if($_GET["Auth"]==json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Auth"]){
    $path1=json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"];
    $path=json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"]."/".urldecode($_GET["file"]);
    $path=str_replace("\\","/",realpath($path));
    if(substr($path,0,strlen($path1))==$path1){
        function rs($s){
            if($s<1024){return($s." Bytes");}else{
                if($s<(1024*1000)){return($s/1000 ." KiloBytes");}else{
                    if($s<(1024*1000*1000)){return($s/1000/1000 ." MegaBytes");}else{
                        if($s<(1024*1000*1000*1000)){return($s/1000/1000/1000 ." GigaBytes");}else{
                            if($s<(1024*1000*1000*1000*1000)){return($s/1000/1000/1000/1000 ." TerraBytes");}else{
                                if($s<(1024*1000*1000*1000*1000*1000)){return($s/1000/1000/1000/1000/1000 ." PetaBytes");}else{
                                    if($s<(1024*1000*1000*1000*1000*1000*1000)){return($s/1000/1000/1000/1000/1000/1000 ." ExaBytes");}else{
                                        if($s<(1024*1000*1000*1000*1000*1000*1000*1000)){return($s/1000/1000/1000/1000/1000/1000/1000 ." ZettaBytes");}else{
                                            if($s<(1024*1000*1000*1000*1000*1000*1000*1000*1000)){return($s/1000/1000/1000/1000/1000/1000/1000/1000 ." YottaBytes");}
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    $ad="Size: ".rs(filesize($path));
    }else
    {$ad="Illegal path + $path";}
}else{
    $ad="Access denied";
}}}}
print($ad);
?>