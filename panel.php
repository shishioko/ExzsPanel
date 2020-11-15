<!DOCTYPE html>
<html>
    <head>
        <title>Exzs Panel | Panel</title>
        <meta charset="utf8">
        <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Text:wght@900&display=swap" rel="stylesheet">
        <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
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
                font-size:130%;
                background-color:darkred;
                outline-color: black;
                outline-style: groove;
                outline-width: 2px;
                padding:10px;
            }
            #log{
                height: 90%;
            }
            #Slisslw{
                width: 100%;
            }
            #Slisslwl{
                width: 100%;
            }
        </style>
        <script>
            $(document).bind("contextmenu", function(e) {
                return false;
            });
            function weew(leel){
                window.location.href=leel;
            }
            function addselector(you,suck,eZZd){                                          
                eZ = document.createElement("span");
                if(you){you="selection_on";}else{you="selection_off";}
                eZ.id=you;
                eZ.innerText=suck;
                eZ.setAttribute("onclick","weew(\""+eZZd+"\");")
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
                fetch("plrs.php")
                .then(respon => respon.text())
                .then((respon) => {
                rrr=respon.split("\n")[0]
                rrrr=respon.split("\n")
                rrrr.shift()
                rrrrr=rrrr.join("\n")
                eZ = document.createElement("span");
                eZ.innerText=rrr;
                eZ.title=rrrrr;
                get=document.createElement("span");
                get.id="selection_split";
                if(typeof REKT =='undefined'){REKT=false}else{}
                if(REKT){document.getElementById("selection").appendChild(get);}else{REKT=true;}
                document.getElementById("selection").appendChild(eZ);
                })
                .catch(err => {
                    alert(err)
                }) 
            }
            function skr2(){
                eZ = document.createElement("span");
                eZ.innerText="ExzsPanel";
                get=document.createElement("span");
                get.id="selection_split";
                if(typeof REKT =='undefined'){REKT=false}else{}
                if(REKT){document.getElementById("selection").appendChild(get);}else{REKT=true;}
                document.getElementById("selection").appendChild(eZ);
            }
            function ref(){
                fetch("getlog.php?Auth=<?php Print($_GET["Auth"]); ?>")
                .then(respon => respon.text())
                .then((respon) => {
                    document.getElementById("log").innerHTML=mineParse(HtmlEncode(respon)).raw})
                .catch(err => {
                    document.getElementById("log").innerText=err;
                })
            }
            function sub(){
                fetch("runcmd.php?Auth=<?php Print($_GET["Auth"]); ?>&cmd="+encodeURIComponent(document.getElementById("Slisslw").value))
                .then(respon => respon.text())
                .then((respon) => {
                    document.getElementById("Slisslw").value="";
                    document.getElementById("Slisslwe").innerHTML=mineParse(HtmlEncode(respon)).raw;
                    ref()
                })
                .catch(err => {
                    alert(err)
                })
            }
            function HtmlEncode(s)
            {
                var el = document.createElement("div");
                el.innerText = el.textContent = s;
                s = el.innerHTML;
                return s;
            }
            function iref(){
                setTimeout(function(){ref();iref()},<?php print(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["ConsoleRefreshInterval"]); ?>)
            }
    </script>
    <script>

(function () {

'use strict';

var currId = 0,
    obfuscators = {},
    alreadyParsed = [],
    styleMap = {
        '§0': 'color:#000000',
        '§1': 'color:#0000AA',
        '§2': 'color:#00AA00',
        '§3': 'color:#00AAAA',
        '§4': 'color:#AA0000',
        '§5': 'color:#AA00AA',
        '§6': 'color:#FFAA00',
        '§7': 'color:#AAAAAA',
        '§8': 'color:#555555',
        '§9': 'color:#5555FF',
        '§a': 'color:#55FF55',
        '§b': 'color:#55FFFF',
        '§c': 'color:#FF5555',
        '§d': 'color:#FF55FF',
        '§e': 'color:#FFFF55',
        '§f': 'color:#FFFFFF',
        '§l': 'font-weight:bold',
        '§m': 'text-decoration:line-through',
        '§n': 'text-decoration:underline',
        '§o': 'font-style:italic'
    };

function obfuscate(elem, string) {
    var multiMagic,
        currNode,
        listLen,
        nodeI;

    function randInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function replaceRand(string, i) {
        var randChar = String.fromCharCode(randInt(64, 95));
        return string.substr(0, i) + randChar + string.substr(i + 1, string.length);
    }

    function initMagic(el, str) {
        var i = 0,
            obsStr = str || el.innerHTML,
            strLen = obsStr.length;
        if(!strLen) return;
        obfuscators[currId].push(
            window.setInterval(function () {
                if (i >= strLen) i = 0;
                obsStr = replaceRand(obsStr, i);
                el.innerHTML = obsStr;
                i++;
            }, 0)
        );
    }

    if (string.indexOf('<br>') > -1) {
        elem.innerHTML = string;
        listLen = elem.childNodes.length;
        for (nodeI = 0; nodeI < listLen; nodeI++) {
            currNode = elem.childNodes[nodeI];
            if (currNode.nodeType === 3) {
                multiMagic = document.createElement('span');
                multiMagic.innerHTML = currNode.nodeValue;
                elem.replaceChild(multiMagic, currNode);
                initMagic(multiMagic);
            }
        }
    } else {
        initMagic(elem, string);
    }
}

function applyCode(string, codes) {
    var elem = document.createElement('span'),
        obfuscated = false;

    string = string.replace(/\x00/g, '');

    codes.forEach(function (code) {
        elem.style.cssText += styleMap[code] + ';';
        if (code === '§k') {
            obfuscate(elem, string);
            obfuscated = true;
        }
    });

    if (!obfuscated) elem.innerHTML = string;

    return elem;
}

function parseStyle(string) {
    var finalPre = document.createElement('pre'),
        codes = string.match(/§.{1}/g) || [],
        codesLen = codes.length,
        indexes = [],
        indexDelta,
        apply = [],
        strSlice,
        i;

    if (!obfuscators[currId]) obfuscators[currId] = [];

    string = string.replace(/\n|\\n/g, '<br>');

    for (i = 0; i < codesLen; i++) {
        indexes.push(string.indexOf(codes[i]));
        string = string.replace(codes[i], '\x00\x00');
    }

    if (indexes[0] !== 0) {
        finalPre.appendChild(applyCode(string.substring(0, indexes[0]), []));
    }

    for (i = 0; i < codesLen; i++) {
        indexDelta = indexes[i + 1] - indexes[i];
        if (indexDelta === 2) {
            while (indexDelta === 2) {
                apply.push(codes[i]);
                i++;
                indexDelta = indexes[i + 1] - indexes[i];
            }
            apply.push(codes[i]);
        } else {
            apply.push(codes[i]);
        }
        if (apply.lastIndexOf('§r') > -1) {
            apply = apply.slice(apply.lastIndexOf('§r') + 1);
        }
        strSlice = string.substring(indexes[i], indexes[i + 1]);
        finalPre.appendChild(applyCode(strSlice, apply));
    }

    return finalPre;
}

function clearObfuscators(id) {
    obfuscators[id].forEach(function (interval) {
        clearInterval(interval);
    });
    alreadyParsed[id] = [];
    obfuscators[id] = [];
}

window.mineParse = function initParser(input) {
    var parsed,
        i = currId;
    if (i > 0) {
        while (i--) {
            if (alreadyParsed[i].nodeType) {
                if (!document.contains(alreadyParsed[i])) {
                    clearObfuscators(i);
                }
            }
        }
    }
    parsed = parseStyle(input);
    alreadyParsed.push(parsed);
    currId++;
    return {
        parsed: parsed,
        raw: parsed.innerHTML
    };
};

}());
    </script>
    </head>
    <body onload="debug=<?php print(json_decode(file_get_contents(".config.json"),TRUE)["Server"]["My SMP"]["Debug"]); ?>;addselector(true,'Panel','?Mode=panel&Auth=<?php print($_GET["Auth"]); ?>');addselector(false,'FS','?Mode=fs&Auth=<?php print($_GET["Auth"]); ?>');addselector(false,'Github','https://github.com/xPopbobx/ExzsPanel');skr();iref();skr2()">
        <div id="selection"></div>
        <span id="log">
        </span>
        <input type="text" id="Slisslw" placeholder="Command">
        <input type="button" id="Slisslwl" onclick="sub()" value="Send">
        <span id="Slisslwe"></span>
    </body>
</html>