<html onmousedown="onb(event,false)">
<head>
    <meta charset="utf8">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Text:wght@900&display=swap" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script>
        $(document).bind("contextmenu", function(e) {
            return false;
            reminfo()
            infomenu() });
        function reminfo(){
            if(document.getElementById("infomenu")==null){}else{
                if(ezh==false){
                    document.getElementById("sandbox").removeChild(document.getElementById("infomenu"))
                }   
            }
             
        }
        function upf(){
            $("#Sendx").trigger('click');
        }
            function infomenu(){
            men=document.createElement("span");
            men.id="infomenu"
            x = event.clientX;
            y = event.clientY;
            men.style.position = "fixed";
            men.style.left = x + "px";
            men.style.top = y + "px";
            men.setAttribute("onmouseout","ezh=false")
            men.setAttribute("onmouseover","ezh=true")
            document.getElementById("sandbox").appendChild(men)
            eZsl4=document.createElement("input");
            eZsl4.setAttribute("value","Create File")
            eZsl4.setAttribute("type","button")
            eZsl4.setAttribute("onclick","newfile()")
            document.getElementById("infomenu").appendChild(eZsl4);
            eZslXx=document.createElement("br");
            document.getElementById("infomenu").appendChild(eZslXx);
            eZsl4x=document.createElement("input");
            eZsl4x.setAttribute("value","Create Folder")
            eZsl4x.setAttribute("type","button")
            eZsl4x.setAttribute("onclick","newdir()")
            document.getElementById("infomenu").appendChild(eZsl4x);
            eZslX=document.createElement("br");
            document.getElementById("infomenu").appendChild(eZslX);
            eZslx=document.createElement("input");
            eZslx.setAttribute("value","Upload file")
            eZslx.setAttribute("type","button")
            eZslx.setAttribute("onclick","vex()")
            document.getElementById("infomenu").appendChild(eZslx);
            eZslXb=document.createElement("br");
            document.getElementById("infomenu").appendChild(eZslXb);
            eZslxb=document.createElement("input");
            eZslxb.setAttribute("value","Refresh")
            eZslxb.setAttribute("type","button")
            eZslxb.setAttribute("onclick","refreshdirs()")
            document.getElementById("infomenu").appendChild(eZslxb);
        }
        function del(ip){
            fetch("fsdel.php?Auth=<?php Print($_GET["Auth"]); ?>&file="+ip)
                .then(respon => respon.text())
                .then((respon) => {
                    alert(respon)})
                    refreshdirs()
                .catch(err => {
                    alert(err)
                })
        }
        function uinfomenu(id,isDir,ip){
            if(isDir){ad="Folder"}else{ad="File"}
            men=document.createElement("span");
            men.id="infomenu"
            x = event.clientX;
            y = event.clientY;
            men.style.position = "fixed";
            men.style.left = x + "px";
            men.style.top = y + "px";
            men.setAttribute("onmouseout","ezh=false")
            men.setAttribute("onmouseover","ezh=true")
            document.getElementById("sandbox").appendChild(men)
            eZsl4=document.createElement("input");
            eZsl4.setAttribute("value","Open "+ad)
            eZsl4.setAttribute("type","button")
            eZsl4.setAttribute("onclick","$(\"#"+id+"\").trigger('click');")
            document.getElementById("infomenu").appendChild(eZsl4);
            eZslXc=document.createElement("br");
            document.getElementById("infomenu").appendChild(eZslXc);
            if(ip==null){}else{
                eZsl44=document.createElement("input");
                eZsl44.setAttribute("value","Delete "+ad)
                eZsl44.setAttribute("type","button")
                eZsl44.setAttribute("onclick","del(\""+ip+"\")")
                document.getElementById("infomenu").appendChild(eZsl44);
            }
        }
        function fi(id){
            document.getElementById("infomenu").innerHTML=document.getElementById(id).innerText
        }
        function onb(event,isEntry,id,isDir,ip){ 
            if(isEntry==true){
                switch (event.which) {
                    case 1:
                        break;
                    case 2:
                        break;
                    case 3:
                        wa=true;
                        reminfo()
                        uinfomenu(id,isDir,ip)
                        break;
                } 
            }else{
               switch (event.which) {
                    case 1:
                        reminfo()
                        break;
                    case 2:
                        break;
                    case 3:
                        if(wa){wa=false}else{
                            reminfo()
                            infomenu()
                        }
                        break;
                } 
            }
        }
        function newfile(){
            okk=prompt("Enter File Name","New File.txt");
            if(okk==null||okk==""){
            }else{
                okk="/"+okk
                fetch("fsnew.php?Auth=<?php Print($_GET["Auth"]); ?>&file="+encodeURIComponent(path)+okk)
                    .then(respon => respon.text())
                    .then((respon) => {
                        alert(respon)})
                    .catch(err => {
                        alert(err)
                    })
                }
        }
        function newdir(){
            okk=prompt("Enter Folder Name","New Folder");
            if(okk==null||okk==""){
            }else{
                okk="/"+okk
                fetch("fsnewdir.php?Auth=<?php Print($_GET["Auth"]); ?>&file="+encodeURIComponent(path)+okk)
                    .then(respon => respon.text())
                    .then((respon) => {
                        alert(respon)})
                    .catch(err => {
                        alert(err)
                    })
                }
        }
        function vex(){
            $("#file").trigger('click');
        }
        function refreshdirs(){
            fetch("fsdir.php?Auth=<?php Print($_GET["Auth"]); ?>")
                    .then(respon => respon.text())
                    .then((respon) => {
                        cos=JSON.parse(respon.slice(0,respon.length-1))
                        ccos=cos
                        cospath.forEach(cc=>{ccos=ccos[cc]})
                        iso(ccos);
                    })
                    .catch(err => {
                        alert(err)
                    })
        }
        <?php
        print("cos=");
        
        include("fsdir.php")
        ?>;
        function sav(){
            if(document.getElementById("lel").readOnly){document.getElementById("lel").value=document.getElementById("lel").value+"\nYou cant save now";}else{
                if(path=="/<?php print(dir_to_json(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Startfile"])); ?>"){
                    abz=document.getElementById("lel").value
                    document.getElementById("lel").readOnly=true;
                    document.getElementById("lel").value="You should not edit Important files!"
                    setTimeout(function(){document.getElementById("lel").value=abz;
                    document.getElementById("lel").readOnly=false;},1000)
                }else{
                    fetch("fswrite.php?Auth=<?php Print($_GET["Auth"]); ?>&file="+encodeURIComponent(path)+"&data="+encodeURIComponent(document.getElementById("lel").value))
                        .then(respons => respons.text())
                        .then((respons) => {
                            document.getElementById("lel").readOnly=true;
                            abz=document.getElementById("lel").value
                            document.getElementById("lel").value=respons
                            setTimeout(function(){
                                document.getElementById("lel").value=abz;
                                document.getElementById("lel").readOnly=false;
                            },1000)
                        })
                        .catch(err => {
                            document.getElementById("lel").readOnly=true;
                            abzl=document.getElementById("lel").value
                            document.getElementById("lel").value=err
                            setTimeout(function(){
                                document.getElementById("lel").value=abzl;
                                document.getElementById("lel").readOnly=false;
                            },1000)
                        })
                }
            }
        }
        function edut(er){
            if(path==""){path=path}else{
                if(path.startsWith("/")){}else{
                path="/"+path
                }
            }
            clrbdy()
            lel=document.createElement("textarea");
            lell=document.createElement("br");
            lelll=document.createElement("input");
            lellll=document.createElement("input");
            lellll1=document.createElement("input");
            lelllll=document.createElement("span");
            lelll.type="button";
            lelll.setAttribute("onclick","iso(ccos);path=opath;")
            lelll.value="Back"
            lellll.type="button";
            lellll1.type="button";
            lellll.setAttribute("onclick","edut(\""+er+"\")")
            lellll1.setAttribute("onclick","sav()")
            lellll.value="Refresh"
            lellll1.value="Save"
            lelllll.id="lell"
            lelllll.innerText="Loading Information"
            lel.rows="-1";
            lel.id="lel"
            lel.readOnly=true;
            lel.value="Loading File...";
            document.getElementById("sandbox").appendChild(lel)
            document.getElementById("sandbox").appendChild(lell)
            document.getElementById("sandbox").appendChild(lelll)
            document.getElementById("sandbox").appendChild(lellll)
            document.getElementById("sandbox").appendChild(lellll1)
            document.getElementById("sandbox").appendChild(lelllll)
            fetch("fsfetch.php?Auth=<?php Print($_GET["Auth"]); ?>&file="+encodeURIComponent(path))
                .then(response => response.text())
                .then((response) => {
                    document.getElementById("lel").value=response
                    document.getElementById("lel").readOnly=false;
                })
                .catch(err => {
                    document.getElementById("lel").value=err;
                    document.getElementById("lel").readOnly=true;
                })
            fetch("fsinfo.php?Auth=<?php Print($_GET["Auth"]); ?>&file="+encodeURIComponent(path))
                .then(responsee => responsee.text())
                .then((responsee) => {
                    document.getElementById("lel").readOnly=false;
                    document.getElementById("lell").innerHTML=responsee
                })
                .catch(err => {document.getElementById("lell").innerHTML=err;document.getElementById("lel").readOnly=true;})}
        function gsiz(e,d){
            fetch("fsinfo.php?Auth=<?php Print($_GET["Auth"]); ?>&file="+encodeURIComponent(e))
                .then(responseee => responseee.text())
                .then((responseee) => {
                    document.getElementById(d).title=responseee
                })
                .catch(err => {
                    document.getElementById(d).title=err
                }) 
        }
        function ver(){
            if(document.getElementsByName("Target1")[0].contentWindow.document.body.innerText==""){
                if(v<101){
                    alert("Loading")
                    setTimeout(function(){v=v+1;ver()},300)
                }else{
                    alert("Timed out")
                }
            }else{     
                alert(document.getElementsByName("Target1")[0].contentWindow.document.body.innerText)
            }
        }
        function iso(cos){
            clrbdy()
            if(ccos==null){ccos=cos;}
            eZsl=document.createElement("form");
            eZsl.id="eZsl";
            eZsl.setAttribute("enctype","multipart/form-data")
            eZsl.setAttribute("action","fsadd.php?Auth=<?php print($_GET["Auth"]);?>&file="+path)
            eZsl.setAttribute("method","POST")
            eZsl.setAttribute("target","Target1")
            document.getElementById("sandbox").appendChild(eZsl);
            eZsl1=document.createElement("input");
            eZsl1.setAttribute("name","file")
            eZsl1.setAttribute("style","display:none")
            eZsl1.setAttribute("onchange","upf()")
            eZsl1.setAttribute("id","file")
            eZsl1.setAttribute("type","file")
            document.getElementById("eZsl").appendChild(eZsl1);
            eZsl2=document.createElement("input");
            eZsl2.setAttribute("value","Send")
            eZsl2.setAttribute("id","Sendx")
            eZsl2.setAttribute("style","display:none")
            eZsl2.setAttribute("type","submit")
            eZsl2.setAttribute("onclick","ver()")
            document.getElementById("eZsl").appendChild(eZsl2);
            eZsl3=document.createElement("span");
            eZsl3.innerText=""
            eZsl3.id="eZsl3"
            document.getElementById("eZsl").appendChild(eZsl3);
            Object.keys(ccos).forEach(function(keys){
                if(ccos[keys].file==null){
                    eZs=document.createElement("img");
                    eZs.width="64";
                    eZs.height="64";
                    eZs.id="eZ";
                    eZs.src="ext/folder.png?";
                    document.getElementById("sandbox").appendChild(eZs);
                    eZ=document.createElement("span");
                    eZ.id=Math.floor(Math.random() * 999999999999); 
                    eZ.setAttribute("onclick","ccos=ccos["+keys+"][\"dir\"];cospath[cospath.length]=\""+keys+"\";cospath[cospath.length]=\"dir\";path=path+\"/"+ccos[keys].name+"\";opath=path;iso(ccos);");
                    eZ.setAttribute("onmousedown","onb(event,true,"+eZ.id+",true,path+\"/"+ccos[keys].name+"\");");
                    eZ.setAttribute("class","folder");
                    eZ.innerText=ccos[keys].name;
                    document.getElementById("sandbox").appendChild(eZ);
                    eZi=document.createElement("br");
                    document.getElementById("sandbox").appendChild(eZi);
                }else{
                    ext=ccos[keys].file.toString().split(".").slice(-1)[0];
                    if(ext==null){
                        ext="txt"
                    }else{
                        av=[<?php $f=true; 
                        foreach(scandir("ext") as $ds){
                            if($f){
                                $f=false;
                            }else{
                                print(",");
                            } print("\"".$ds."\"");
                        }; ?>]
                        if(av.indexOf("ext_"+ext+".png")==-1){ext="txt"}
                    }
                    eZs=document.createElement("img");
                    eZs.width="64";
                    eZs.height="64";
                    eZs.id="eZ";
                    eZs.src="ext/ext_"+ext+".png?";
                    document.getElementById("sandbox").appendChild(eZs);
                    eZ=document.createElement("span");
                    eZ.setAttribute("class","ext_"+ext);
                    eZ.id=Math.floor(Math.random() * 999999999999); 
                    eZ.setAttribute("onclick","opath=path;path=path+\"/"+ccos[keys].file+"\";f=false;d=\"\";cospath.forEach(cc=>{if(!f){f=true;d=d+\"\"+cc}});edut(path);");
                    eZ.setAttribute("onmousedown","onb(event,true,"+eZ.id+",false,path+\"/"+ccos[keys].file+"\");");
                    gsiz(opath+"/"+ccos[keys].file,eZ.id)
                    eZ.innerText=ccos[keys].file;
                    document.getElementById("sandbox").appendChild(eZ);
                    eZi=document.createElement("br");
                    document.getElementById("sandbox").appendChild(eZi);
                }
            })
            if(cospath.length==0){}else{
                eZs=document.createElement("img");
                eZs.width="64";
                eZs.height="64";
                eZs.id="eZ";
                eZs.src="ext/folder.png?";
                document.getElementById("sandbox").appendChild(eZs);
                eZu=document.createElement("span");
                eZu.id=Math.floor(Math.random() * 999999999999); 
                eZu.setAttribute("onclick","ccos=cos;cospath.pop();cospath.pop();cospath.forEach(cc=>{ccos=ccos[cc]});path=path.split(\"/\");path.pop();path=path.join(\"/\");opath=path;iso(ccos);");
                eZu.setAttribute("onmousedown","onb(event,true,\""+eZu.id+"\");");
                eZu.innerText="..";
                eZ.setAttribute("class","folder");
                document.getElementById("sandbox").appendChild(eZu);
                eZiu=document.createElement("br");
                document.getElementById("sandbox").appendChild(eZiu);
            } 
        }   
    function clrbdy(){
        document.getElementById("sandbox").innerHTML="";
    }
    </script>
    <style>
        #lel{
            width: 100%;
            height: 95%;
            outline-color:red;
            outline-style:groove;
            outline-width: 0px;
            resize: none;
            background-color: #2c2c2c;
        }
        #sandbox span:hover{
            color:red
        }
        #eZ{
            width: 64px;
            height: 64px;
            size:50%
        }
        #eZsl input{
            width: 20%;
            overflow: hidden;
            outline-width: 2px;
            outline-style:groove;
            outline-color:black;
            font-size:100%
        }
        #infomenu input:hover{
            color:red;
        }
        html{
            background-color: #1e1e1e;
        }
        ::-webkit-scrollbar {
            width: 0px;
        }
        *{
            cursor:url('cursor.cur'), auto;
            font-family: 'Big Shoulders Stencil Text', cursive;
            image-rendering: pixelated;
            font-size:130%;
            color:<?php print(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Color"]); ?>
        }
        input{
            outline-color:red;
            outline-style:groove;
            outline-width: 0px;
            background-color: #151515;
        }
        area,input{
           border:none; 
        }
        #selection_off{
            color:gray;
            font-size:120%
        }
        #selection_on{
            color:red;
            font-size:120%
        }
        #selection_split{
            margin:10px;
        }
        #selection{
            background-color:darkred;
            outline-color: black;
            outline-style: groove;
            outline-width: 2px;
            padding:10px;
        }
    </style>
    <script>
        function racist(pornhub){
            window.location.href=pornhub;
        }
        function addselector(you,suck,eZZd){                                          
            eZ = document.createElement("span");
            if(you){you="selection_on";}else{you="selection_off";}
            eZ.id=you;
            eZ.innerText=suck;
            eZ.setAttribute("onclick","racist(\""+eZZd+"\")")
            get=document.createElement("span");
            get.id="selection_split";
            if(typeof REKT =='undefined'){REKT=false}else{}
            if(REKT){document.getElementById("selection").appendChild(get);}else{REKT=true;}
            document.getElementById("selection").appendChild(eZ);
        }
            function mfs(yet,yeet){
                cp = document.createElement("textarea");
                cp.setAttribute("style","width:100%");
                cp.id="text"
                cp.value=yet;
                cp.setAttribute("onchange",yeet+"=this.value")
                document.body.appendChild(cp);
            }
        <?php
        if(isset($_GET["Mode"])){if($_GET["Mode"]=="Config"){
            print("soon=\"".str_replace("\r\n","\\n",str_replace("\"","\\\"",file_get_contents(".config.json")))." \";mfs(soon,\"soon\");");
        };}
        ?>
        function skr(){
                eZ = document.createElement("span");
                eZ.innerText="ExzsPanel";
                get=document.createElement("span");
                get.id="selection_split";
                if(typeof REKT =='undefined'){REKT=false}else{}
                if(REKT){document.getElementById("selection").appendChild(get);}else{REKT=true;}
                document.getElementById("selection").appendChild(eZ);
            }

    </script>
</head>
<body onload="addselector(false,'Panel','?Mode=panel&Auth=<?php print($_GET["Auth"]); ?>');addselector(true,'FS','?Mode=fs&Auth=<?php print($_GET["Auth"]); ?>');opath='';v=0;path='';cospath=[];ccos=cos;iso(cos,'cose');ezh=false;wa=false;refreshdirs();skr()">
<header>
    <iframe name="Target1" width="0" height="0" style="display: none"></iframe>
</header>
<div id="selection"></div>
<span id="sandbox"></span>
</body>
</html>