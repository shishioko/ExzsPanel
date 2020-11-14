<?php
$ad="Success";
if(isset($_GET["Auth"])==false){
    $ad="No Token provided";
}else{
    if(isset($_GET["file"])==false){
        $ad="No file provided";
    }else{
        if(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"].urldecode($_GET['file'])==json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"]."/".urldecode(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Startfile"])){
            $ad="You should not edit Important files";
        }else{ 
            if(file_exists(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"].urldecode($_GET['file']))==false){$ad="File not found";}else{
if($_GET["Auth"]==json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Auth"]){
    $path1=json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"];
    $path=json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"]."/".urldecode($_GET["file"]);
    $path=str_replace("\\","/",realpath($path));
    if(substr($path,0,strlen($path1))==$path1){
    $ad=file_get_contents($path);
    }else
    {$ad="Illegal path";}
}else{
    $ad="Access denied";
}}}}}
print($ad);
?>