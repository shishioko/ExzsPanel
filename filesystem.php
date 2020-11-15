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
            eZslxb.setAttribute("onclick","reminfo();refreshdirs()")
            document.getElementById("infomenu").appendChild(eZslxb);
            if(clip==""){}else{
                eZslXbu=document.createElement("br");
                document.getElementById("infomenu").appendChild(eZslXbu);
                eZslxbuG=document.createElement("input");
                eZslxbuG.setAttribute("value","Paste")
                eZslxbuG.setAttribute("type","button")
                eZslxbuG.setAttribute("onclick","mov(\""+clip+"\");clip=\"\"")
                document.getElementById("infomenu").appendChild(eZslxbuG);
            }
        }
        function del(ip){
            fetch("fsdel.php?Auth=<?php Print($_GET["Auth"]); ?>&file="+encodeURIComponent(ip))
                .then(respon => respon.text())
                .then((respon) => {
                    alert(respon)
                    refreshdirs()
                    if(debug){
                            console.debug("Deleted file/dir")
                        }
                    })
                .catch(err => {
                    alert(err)
                    if(debug){
                            console.debug("Failed deleting file/dir")
                        }
                })
        }
        function refcospath(cb){
            console.log("d")
                    if(path==""){
                        rpath=[""]
                    }else{
                        rpath=path.split("/")
                    }
                    rpath.shift()
                    xos=cos
                    cospath=[]
                    rpath.forEach(rp=>{
                        Object.keys(xos).forEach(function(key){
                            if(typeof(xos[key]["name"])=="undefined"){}else{      
                                if(xos[key]["name"]==rp){
                                    console.log("f")
                                    xxos=xos[key]["dir"]
                                    cospath.push(key)
                                    cospath.push("dir")
                                    }

                            }

                        })
                        xos=xxos
                    })                             
                ccos=xos
                cb()
        }
        function mov(ip){
            gg=ip.split("/")[ip.split("/").length-1]
            dd=prompt("Unpack into",gg)
            if(dd==null||dd==""){

            }else{
            fetch("fsmov.php?Auth=<?php Print($_GET["Auth"]); ?>&file="+encodeURIComponent(ip)+"&to="+encodeURIComponent(path+"/"+dd))
                .then(respon => respon.text())
                .then((respon) => {
                    alert(respon)  
                    refreshcos(function(){refcospath(function(){refreshdirs()});})
                    if(debug){
                            console.debug("Moved file/dir")
                        }
                    })
                .catch(err => {
                    alert(err+"!")
                    if(debug){
                            console.debug("Failed deleting file/dir")
                        }
                })
            }
        }
        function uinfomenu(id,isDir,ip,isZip){
            if(isDir){ad="Folder"}else{ad="File"}
            if(ip==null){ad="Folder"}
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
            if(ip==null){}else{
            eZslXc=document.createElement("br");
            document.getElementById("infomenu").appendChild(eZslXc);
                eZsl44=document.createElement("input");
                eZsl44.setAttribute("value","Delete "+ad)
                eZsl44.setAttribute("type","button")
                eZsl44.setAttribute("onclick","del(\""+ip+"\")")
                document.getElementById("infomenu").appendChild(eZsl44);
                eZslXcc=document.createElement("br");
                document.getElementById("infomenu").appendChild(eZslXcc);
                eZsl448=document.createElement("input");
                eZsl448.setAttribute("value","Download "+ad)
                eZsl448.setAttribute("type","button")
                eZsl448.setAttribute("onclick","don(\""+ip+"\")")
                document.getElementById("infomenu").appendChild(eZsl448);
                eZslXcc2=document.createElement("br");
                document.getElementById("infomenu").appendChild(eZslXcc2);
                eZsl4487=document.createElement("input");
                eZsl4487.setAttribute("value","Cut "+ad)
                eZsl4487.setAttribute("type","button")
                eZsl4487.setAttribute("onclick","clip=\""+ip+"\"")
                document.getElementById("infomenu").appendChild(eZsl4487);
                if(isDir==false){
                    if(isZip){
                        eZslXcc2e=document.createElement("br");
                        document.getElementById("infomenu").appendChild(eZslXcc2e);
                        eZsl44873=document.createElement("input");
                        xccv=ip.split("/")[ip.split("/").length-1]
                        eZsl44873.setAttribute("value","Unzip "+ad)
                        eZsl44873.setAttribute("type","button")
                        eZsl44873.setAttribute("onclick","unzip(\""+ip+"\")")
                        document.getElementById("infomenu").appendChild(eZsl44873);
                    }
                }else{
                    eZslXcc2e=document.createElement("br");
                    document.getElementById("infomenu").appendChild(eZslXcc2e);
                    eZsl44873=document.createElement("input");
                    xccv=ip.split("/")[ip.split("/").length-1]
                    eZsl44873.setAttribute("value","Unzip "+ad)
                    eZsl44873.setAttribute("type","button")
                    eZsl44873.setAttribute("onclick","zip(\""+ip+"\")")
                    document.getElementById("infomenu").appendChild(eZsl44873);
                }
            }
        }
        function unzip(ip){
            gg=ip.split("/")[ip.split("/").length-1]
            dd=prompt("Unpack into",gg+"-unpacked")
            if(dd==null||dd==""){
            }else{   
                ipx=ip.split("/")
                ipx.pop()     
                ipx=ipx.join("/")      
                fetch("fsunzip.php?Auth=<?php Print($_GET["Auth"]); ?>&file="+encodeURIComponent(ip)+"&to="+encodeURIComponent(ipx+"/"+dd))
                    .then(respon => respon.text())
                    .then((respon) => {
                        alert(respon)  
                        refreshcos(function(){refcospath(function(){refreshdirs()});})
                        if(debug){
                                console.debug("Unpacked file/dir")
                            }
                        })
                    .catch(err => {
                        alert(err+"!")
                        if(debug){
                                console.debug("Failed unpacking file/dir")
                            }
                    })
            }
        }
        function zip(ip){
            gg=ip.split("/")[ip.split("/").length-1]
            dd=prompt("Pack into",gg+".zip")
            if(dd==null||dd==""){
            }else{   
                ipx=ip.split("/")
                ipx.pop()     
                ipx=ipx.join("/")      
                fetch("fszip.php?Auth=<?php Print($_GET["Auth"]); ?>&file="+encodeURIComponent(ip)+"&to="+encodeURIComponent(ipx+"/"+dd))
                    .then(respon => respon.text())
                    .then((respon) => {
                        alert(respon)  
                        refreshcos(function(){refcospath(function(){refreshdirs()});})
                        if(debug){
                                console.debug("Packed file/dir")
                            }
                        })
                    .catch(err => {
                        alert(err+"!")
                        if(debug){
                                console.debug("Failed packing file/dir")
                            }
                    })
            }
        }
        function don(xd){
            fetch("fsfetch.php?Auth=<?php Print($_GET["Auth"]); ?>&file="+encodeURIComponent(xd))
                .then(response => response.text())
                .then((response) => {
                    download(response,xd.split("/")[xd.split("/").length-1],"text/txt")
                })
                .catch(err => {
                    alert(err)
                })
        }
        function fi(id){
            document.getElementById("infomenu").innerHTML=document.getElementById(id).innerText
        }
        function onb(event,isEntry,id,isDir,ip,isZip){ 
            if(isEntry==true){
                switch (event.which) {
                    case 1:
                        break;
                    case 2:
                        break;
                    case 3:
                        wa=true;
                        reminfo()
                        uinfomenu(id,isDir,ip,isZip)
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
                fetch("fsnew.php?Auth=<?php Print($_GET["Auth"]); ?>&file="+encodeURIComponent(path+okk))
                    .then(respon => respon.text())
                    .then((respon) => {
                        alert(respon)
                        refreshdirs()
                        if(debug){
                            console.debug("Created new file")
                        }
                        })
                    .catch(err => {
                        alert(err)
                        if(debug){
                            console.debug("Failed Creating new file")
                        }
                    })
                }
        }
        function newdir(){
            okk=prompt("Enter Folder Name","New Folder");
            if(okk==null||okk==""){
            }else{
                okk="/"+okk
                fetch("fsnewdir.php?Auth=<?php Print($_GET["Auth"]); ?>&file="+encodeURIComponent(path+okk))
                    .then(respon => respon.text())
                    .then((respon) => {
                        alert(respon)
                        refreshdirs()
                        if(debug){
                            console.debug("Created new dir")
                        }
                        })
                    .catch(err => {
                        alert(err)
                        if(debug){
                            console.debug("Failed Creating new dir")
                        }
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
                        cospath.forEach(cc=>{ccos=ccos[cc];console.log(ccos)})        
                        iso(ccos);
                        if(debug){
                            console.debug("Files:")
                        console.debug(cos)
                        }
                    })
                    .catch(err => {
                        alert(err)
                    })
        }
        function refreshcos(cb){
            fetch("fsdir.php?Auth=<?php Print($_GET["Auth"]); ?>")
                    .then(respon => respon.text())
                    .then((respon) => {
                        cos=JSON.parse(respon.slice(0,respon.length-1))
                        ccos=cos
                        cb()
                    })
                    .catch(err => {
                        alert(err)
                    })
        }
        <?php
        print("cos=");
        
        include("fsdir.php")
        ?>;
        function download(strData, strFileName, strMimeType) {
            var D = document,
            a = D.createElement("a");
            strMimeType= strMimeType || "application/octet-stream";
            if (navigator.msSaveBlob) {
                 return navigator.msSaveBlob(new Blob([strData], {type: strMimeType}), strFileName);
            }
            if ('download' in a) {
                a.href = "data:" + strMimeType + "," + encodeURIComponent(strData);
                a.setAttribute("download", strFileName);
                a.innerHTML = "downloading...";
                D.body.appendChild(a);
                a.click();
                D.body.removeChild(a);
                return true;
            }
            var f = D.createElement("iframe");
            D.header.appendChild(f);
            f.src = "data:" +  strMimeType   + "," + encodeURIComponent(strData);
            D.body.removeChild(f);
            return true;
        }
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
            if(debug){
                console.debug("Now editing: "+path)
                console.debug("In dir: "+opath)
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
                    setTimeout(function(){v=v+1;ver()},300)
                }else{
                    alert("Timed out")
                    if(debug){
                        console.debug("Failed uploading file")
                    }
                }
            }else{     
                alert(document.getElementsByName("Target1")[0].contentWindow.document.body.innerText)
                refreshdirs()
                if(debug){
                    console.debug("Uploaded file")
                }
            }
        }
        function iso(cos){
            if(debug){
                console.debug("Showing: "+opath)
            }
            clrbdy()
            if(ccos==null){ccos=cos;}
            eZsl=document.createElement("form");
            eZsl.id="eZsl";
            eZsl.setAttribute("enctype","multipart/form-data")
            eZsl.setAttribute("action","fsadd.php?Auth=<?php print($_GET["Auth"]);?>&file="+path)
            eZsl.setAttribute("method","POST")
            eZsl.setAttribute("onsubmit","sus()")
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
                    console.log(keys+" = "+ccos[keys].name)
                    eZ.setAttribute("onclick","ccos=ccos["+keys+"][\"dir\"];cospath[cospath.length]=\""+keys+"\";cospath[cospath.length]=\"dir\";path=path+\"/"+ccos[keys].name+"\";opath=path;iso(ccos);");
                    eZ.setAttribute("onmousedown","onb(event,true,"+eZ.id+",true,path+\"/"+ccos[keys].name+"\",false);");
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
                    if(["zip","rar","gz","jar","cab","iso","pak","apk"].indexOf(ext)>(-1)){
                        isZip=true;
                    }else{
                        isZip=false;
                    }
                    eZ.setAttribute("onmousedown","onb(event,true,"+eZ.id+",false,path+\"/"+ccos[keys].file+"\","+isZip+");");
                    <?php 
                    if(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["ActiveFetchFileSize"]){
                        print(";gsiz(opath+\"/\"+ccos[keys].file,eZ.id);");
                    }
                    ?>
                    ///
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
        function weew(leel){
            window.location.href=leel;
        }
        function addselector(you,suck,eZZd){                                          
            eZ = document.createElement("span");
            if(you){you="selection_on";}else{you="selection_off";}
            eZ.id=you;
            eZ.innerText=suck;
            eZ.setAttribute("onclick","weew(\""+eZZd+"\")")
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
<body onload="debug=<?php print(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Debug"]); ?>;addselector(false,'Panel','?Mode=panel&Auth=<?php print($_GET["Auth"]); ?>');addselector(true,'FS','?Mode=fs&Auth=<?php print($_GET["Auth"]); ?>');addselector(false,'Github','https://github.com/xPopbobx/ExzsPanel');clip='';opath='';v=0;path='';cospath=[];ccos=cos;iso(cos,'cose');ezh=false;wa=false;refreshdirs();skr()">
<header>
    <iframe name="Target1" width="0" height="0" style="display: none"></iframe>
</header>
<div id="selection"></div>
<span id="sandbox"></span>
</body>
</html>