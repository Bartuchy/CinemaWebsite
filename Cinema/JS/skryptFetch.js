let skrypty;
document.addEventListener("DOMContentLoaded", function() {
    skrypty = document.querySelectorAll("script");
    const nav1 = document.getElementById("repertuar");
    nav1.addEventListener('click', function(){
        fetch("http://localhost/Cinema/dane/repertuar.txt")
        .then( response => {return response.text();} )
        .then( dane => { document.getElementById("dynamic").innerHTML = dane; })
        document.body.removeChild(skrypty[2]);
        document.body.removeChild(skrypty[3]);
        
        let script1 = document.createElement("script");
        script1.setAttribute("src", "JS/popup_logged_f.js");
        document.body.appendChild(script1);
        
        let script2 = document.createElement("script");
        script2.setAttribute("src", "JS/opisyRepertuar_f.js");
        document.body.appendChild(script2);
        skrypty = document.querySelectorAll("script");
    }, false);
    
    const nav2 = document.getElementById("media");
    nav2.addEventListener('click', function(){
        fetch("http://localhost/Cinema/dane/cennik.txt")
        .then( response => {return response.text();} )
        .then( dane => { document.getElementById("dynamic").innerHTML = dane; })
    }, false);
    
    const nav4 = document.getElementById("last");
    nav4.addEventListener('click', function(){
        fetch("http://localhost/Cinema/dane/info.txt")
        .then( response => {return response.text();} )
        .then( dane => { document.getElementById("dynamic").innerHTML = dane; })
    }, false);
})