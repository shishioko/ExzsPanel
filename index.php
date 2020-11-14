<?php
if(isset($_GET["Auth"])){
    if(isset($_GET["Mode"])){
        if($_GET["Auth"]==json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Auth"]){
            if($_GET["Mode"]=="fs"){include("filesystem.php");}
            if($_GET["Mode"]=="panel"){include("panel.php");}
        }else{include("login.php");}
    }else{$_GET["Mode"]="panel";print("<script>window.location.href=\"?Auth=".$_GET["Auth"]."&Mode=panel\"</script>");}
}else{include("login.php");}
?>
                                                                                                                                     