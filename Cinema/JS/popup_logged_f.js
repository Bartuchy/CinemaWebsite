// rezerwacja
godziny = document.querySelectorAll("a.godzina");
close = document.querySelectorAll(".close");

godziny.forEach(function(godzina){
   godzina.addEventListener('click', function(){
       document.querySelector('.bg-modal-res').style.display = 'block'; 
       document.querySelector('body').style.overflow = "hidden";
   }) 
});

close.forEach(function(cl){
    cl.addEventListener('click', function(){
        document.querySelector('.bg-modal-res').style.display = 'none';
        document.querySelector('body').style.overflow = "visible";
    })
});

//profil
prof_form = document.querySelectorAll("a.prof-form");

prof_form.forEach(function (prof){
    prof.addEventListener('click', function () {
        document.querySelector('.bg-modal-reg').style.display = 'block';
        document.querySelector('body').style.overflow = "hidden";
    })
})

close.forEach(function(cl){
    cl.addEventListener('click', function(){
        document.querySelector('.bg-modal-reg').style.display = 'none';
        document.querySelector('body').style.overflow = "visible";
    })
});