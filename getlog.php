<?php
$ad="";
    function startsWith( $haystack, $needle ) {
        $length = strlen( $needle );
        return substr( $haystack, 0, $length ) === $needle;
    }
    function endsWith( $haystack, $needle ) {
        $length = strlen( $needle );
        if( !$length ) {
            return true;
        }
        return substr( $haystack, -$length ) === $needle;
    }
    if(isset($_GET["Auth"])==false){
        $ad="No Token provided";
    }else{
        if($_GET["Auth"]==json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Auth"]){
            $file = new SplFileObject(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Path"]."/logs/latest.log");
            $file->seek(PHP_INT_MAX);
            $total_lines = $file->key();
            $ff=0;
            $reader1 = new LimitIterator($file, $total_lines - 40-$ff);
            foreach ($reader1 as $line) {
                if(startsWith(substr($line,12),"RCON")){
                    $ff+=1;
                }
            }    
            $reader = new LimitIterator($file, $total_lines - 40-$ff);
            foreach ($reader as $line) {
                if(startsWith(substr($line,12),"RCON")){
                }else{      
                $ad.="§".json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["DefaultColor"].substr($line,11);
                }
            }
        }else{
            $ad="§4§l§nAccess Denied";
        }  
    }     
    print($ad);
?>