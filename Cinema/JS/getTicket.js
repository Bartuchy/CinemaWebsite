const text = document.querySelector("p.ticket").textContent;
console.log(text);
let data = text.split(',');

for(let i = 0; i < data.length; i++){
    console.log(i + " " + data[i]);
}

document.getElementById('hidden').value = data[0];
document.getElementById('title_ed').value = data[1]
document.getElementById('date_res_ed').value = data[2];
document.getElementById('jezyk_ed').value = data[3];

for(let j = 4; j < data.length; j++){
    switch(data[j]){
        case "Z napisami":
            document.getElementById("ch1_ed").checked = true;
        break;

        case "Opcja 3D":
            document.getElementById("ch2_ed").checked = true;
        break;

        case "Wersja reżyserska":
            document.getElementById("ch3_ed").checked = true;
        break;

        case "visa":
            document.getElementById("rad1_ed").checked = true;
        break;

        case "mastercard":
            document.getElementById("rad2_ed").checked = true;
        break;

        case "blik":
            document.getElementById("rad3_ed").checked = true;
        break;
    }

    document.querySelector('.bg-modal-res-ed').style.display = 'block'; 
    document.querySelector('body').style.overflow = "hidden";

    close = document.querySelectorAll(".close");
    close.forEach(function(cl){
        cl.addEventListener('click', function(){
            document.querySelector('.bg-modal-res-ed').style.display = 'none';
            document.querySelector('body').style.overflow = "visible";
        })
    });
}
