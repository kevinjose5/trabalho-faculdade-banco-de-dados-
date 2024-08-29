function getCookie(nomeDoCookie) {
    let cookies = document.cookie.split('; ');
    for (let i = 0; i < cookies.length; i++) {
        let cookiePar = cookies[i].split('=');
        if (cookiePar[0] === nomeDoCookie) {
            return cookiePar[1];
        }
    }
    return null;
}
function consulta(){
    let valorobra = getCookie('obra');
    let valornota = getCookie('nota');
    let valorchave=getCookie('chave');
    let nota=valornota.replace(/\+/g,'');
    let chave=valorchave.replace(/\+/g,'');
    let obra= valorobra.replace(/\+/g,' ');



   
    res=getCookie('rest');
        
    

  
 

    
var aviso=document.getElementById("aviso");
var p=document.createElement("p");

p.appendChild(document.createTextNode("nota: "+nota));
p.appendChild(document.createElement("br"));
p.appendChild(document.createTextNode("xml: "+chave));
p.appendChild(document.createElement("br"));
p.appendChild(document.createTextNode("obra: "+obra));
p.appendChild(document.createElement("br"));
p.appendChild(document.createTextNode("materiais cadastrados: "+res));




aviso.appendChild(p);



}


window.addEventListener("load",consulta);