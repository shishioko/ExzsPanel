<?php
$ad="Success";
if(isset($_GET["Auth"])==false){
    $ad="No Token provided";
}else{
    if(isset($_GET["file"])==false){
        $ad="No file provided";
    }else{
        if(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"].urldecode($_GET['file'])==json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"]."/".json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Startfile"]){
            $ad="You should not overwrite Important files";
        }else{  
    if($_GET["Auth"]==json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Auth"]){
    $path1=json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"];
    $path=json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"]."/".urldecode($_GET["file"]);
    if(substr($path,0,strlen($path1))==$path1){
        if($_FILES['file']['error']=="0"){
            if($_FILES['file']['size']>(1024*1024*1024*2)){
                $ad="File is too large";
                unlink($_FILES['file']['tmp_name']);
            }else{
                move_uploaded_file($_FILES['file']['tmp_name'],json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"]."/".$_GET["file"]."/".$_FILES["file"]["name"]);
            }
        }else{
            $ad=$_FILES['file']['error'];
        }
    }else
    {$ad="Illegal path";}
}else{
    $ad="Access denied";
}}}}
print($ad);
?>