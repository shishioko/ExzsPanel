<?php
$ad="Success";
if(isset($_GET["Auth"])==false){
    $ad="No Token provided";
}else{
    if(isset($_GET["file"])==false){
        $ad="No file provided";
    }else{
        if(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"].urldecode($_GET['file'])==json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"]."/".json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Startfile"]){
            $ad="You should not delete Important files";
        }else{  
if($_GET["Auth"]==json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Auth"]){
    $path1=json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"];
    $path=json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"].urldecode($_GET['file']);
    if(substr($path,0,strlen($path1))==$path1){
        if(file_exists($path)){
            unlink($path);
        }else{
            $ad="File does not exists";
        }
    }else
    {$ad="Illegal path$path<br>$path1<br>".$path;}
}else{
    $ad="Access denied";
}}}}
print($ad)
?>