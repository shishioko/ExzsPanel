<?php
$ad="Success";
if(isset($_GET["Auth"])==false){
    $ad="No Token provided";
}else{
    if(isset($_GET["file"])==false){
        $ad="No file provided";
    }else{
        if(isset($_GET["to"])==false){
            $ad="No 2th file provided";
        }else{
            if(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"].$_GET['file']==json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"]."/".json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Startfile"]){
                $ad="You should not move Important files";
            }else{  
                if(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"].$_GET['to']==json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"]."/".json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Startfile"]){
                    $ad="You should not overwrite Important files";
                }else{  
                    if($_GET["Auth"]==json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Auth"]){
                        $path1=json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"];
                        $path=json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"].$_GET['file'];
                        $exr=true;
                        if(substr($path,0,strlen($path1))==$path1){}else{$exr=false;}
                        if(substr(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"].$_GET["to"],0,strlen($path1))==$path1){}else{$exr=false;}
                        if($exr){
                            if(file_exists($path)){
                                $path2=json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"].$_GET['to'];
                                if(file_exists($path2)){
                                    $ad="File already exists";
                                }else{
                                    copy($path,json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"].$_GET["to"]);
                                }
                            }else{
                                $ad="File does not exists";
                            }
                        }else{
                            $ad="Illegal path$path<br>$path1<br>".$path;
                        }
                    }else{
                        $ad="Access denied";
                    }
                }
            }
        }
    }
}
print($ad)
?>