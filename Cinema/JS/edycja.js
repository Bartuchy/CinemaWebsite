let flaga = false;

function zapisz(){
    
    const bilet = {};
    bilet.imie = document.getElementById("imie").value;
    bilet.nazw = document.getElementById("nazwisko").value;
    bilet.email = document.getElementById("email").value;
    bilet.nrtel = document.getElementById("nrtel").value;
    bilet.date = document.getElementById("date").value;
    bilet.jezyk = document.getElementById("jezyk").value;
    bilet.custom = [];
        
    for(let i = 0; i<3; i++){
        if(document.getElementById("ch"+(i+1)).checked)
            bilet.custom.push(document.getElementById("ch"+(i+1)).value); 
        if(document.getElementById("rad"+(i+1)).checked)
            bilet.platnosc = document.getElementById("rad"+(i+1)).value;
                
    }
    let lista = JSON.parse(localStorage.getItem('dane'));
    if(lista === null) lista = [];
    lista.push(bilet);
        
    localStorage.setItem('dane', JSON.stringify(lista));
    czysc();
}

function czysc(){
    document.getElementById("imie").value ="";
    document.getElementById("nazwisko").value ="";
    document.getElementById("email").value ="";
    document.getElementById("nrtel").value ="";
    document.getElementById("date").value = null;
    document.getElementById("jezyk").selectedIndex = 0;
    
    for(let i = 0; i<3; i++){
            if(document.getElementById("ch"+(i+1)).checked)
                document.getElementById("ch"+(i+1)).checked = false; 
    }
    
    document.getElementById("rad1").checked = true;
}

function rezerwacje(){
    const bilet = JSON.parse(localStorage.getItem('dane'));
    let dane = '<table id="rezerwacja"><tr><td></td><td></td> <td>Imię</td><td>Nazwisko</td><td>Email</td><td>Nr Telefonu</td><td>Data Seansu</td><td>Język</td><td>Sczegóły</td><td>Płatność</td></tr>';
    
    for(let i = 0; i<bilet.length; i++){
        dane += '<tr><td><button onclick="usun('+i+')">X</button></td>';
        dane += '<td><button onclick="edytujRezerwacje('+i+')">Edytuj</button></td>';
        dane += '<td>'+bilet[i].imie+'</td>';
        dane += '<td>'+bilet[i].nazw+'</td>';
        dane += '<td>'+bilet[i].email+'</td>';
        dane += '<td>'+bilet[i].nrtel+'</td>';
        dane += '<td>'+bilet[i].date+'</td>';
        dane += '<td>'+bilet[i].jezyk+'</td>';
        dane += '<td>'+bilet[i].custom+'</td>';
        dane += '<td>'+bilet[i].platnosc+'</td></tr>';
    }
    
    dane += '</table>';
    
    document.getElementById("dynamic").innerHTML = dane;
}

function usun(i){
    let dane = JSON.parse(localStorage.getItem('dane'));
    
    if (confirm("Usunąć rezerwację?")) dane.splice(i,1);
    
    localStorage.setItem('dane', JSON.stringify(dane));
    rezerwacje();
}

var dane;
var index;
function edytujRezerwacje(i){
    flaga = true;
    document.querySelector('.bg-modal').style.display = 'block'; 
    document.querySelector('body').style.overflow = "hidden";
    index = i;
    dane = JSON.parse(localStorage.getItem('dane'));
    document.getElementById("imie").value = dane[i].imie;
    document.getElementById("nazwisko").value = dane[i].nazw;
    document.getElementById("email").value = dane[i].email;
    document.getElementById("nrtel").value = dane[i].nrtel;
    document.getElementById("date").value = dane[i].date;
    document.getElementById("jezyk").value = dane[i].jezyk;
    
    for(let j = 0; j<3; j++){
        for(let k = 0; k<dane[i].custom.length; k++){
            if(dane[i].custom[k] == document.getElementById("ch"+(j+1)).value)
                document.getElementById("ch"+(j+1)).checked = true;
        }
        if(dane[i].platnosc == document.getElementById("rad"+(j+1)).value)
            document.getElementById("rad"+(j+1)).checked = true;
    }
}

function edit(){
    dane[index].imie = document.getElementById("imie").value;
    dane[index].nazw = document.getElementById("nazwisko").value;
    dane[index].email = document.getElementById("email").value;
    dane[index].nrtel = document.getElementById("nrtel").value;
    dane[index].date = document.getElementById("date").value;
    dane[index].jezyk = document.getElementById("jezyk").value;
    
    dane[index].custom = [];
    for(let i = 0; i<3; i++){
        if(document.getElementById("ch"+(i+1)).checked)
            dane[index].custom.push(document.getElementById("ch"+(i+1)).value); 
        if(document.getElementById("rad"+(i+1)).checked)
           dane[index].platnosc = document.getElementById("rad"+(i+1)).value;       
    }
    
    localStorage.setItem('dane', JSON.stringify(dane));
    rezerwacje();
    document.getElementById("imie").value ="";
    document.getElementById("nazwisko").value ="";
    document.getElementById("email").value ="";
    document.getElementById("nrtel").value ="";
    document.getElementById("date").selectedIndex = null;
    document.getElementById("jezyk").selectedIndex = 0;
    
    for(let i = 0; i<3; i++){
        if(document.getElementById("ch"+(i+1)).checked)
            document.getElementById("ch"+(i+1)).checked = false; 
    }
    
    document.getElementById("rad1").checked = true;
    
    document.querySelector('.bg-modal').style.display = 'none';
    document.querySelector('body').style.overflow = "visible";
}

let date = document.getElementById("date").value;
let newDate = new Date(Date.parse(date));
function flag(){
    
    let dzis = new Date();
    if(newDate.getTime() <= dzis.getTime()){
        document.querySelector("#date").setCustomValidity("Nie możesz wybrać daty z przeszłości");
    }else{
        if(!flaga) zapisz();
        else{
            edit();
            flaga = false;
        } 
    }   
}

document.getElementById("date").addEventListener("change", function(){
    date = document.getElementById("date").value;
    newDate = new Date(Date.parse(date));
    document.getElementById("date").setCustomValidity("");
});

document.querySelector("form").addEventListener('submit', function(e){
    e.preventDefault();
    flag();
});