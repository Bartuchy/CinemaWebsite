// rejestracja
let reg_form = document.querySelectorAll("a.reg-form");
let close = document.querySelectorAll(".close");

reg_form.forEach(function(form){
    form.addEventListener('click', function(){
        document.querySelector('.bg-modal-reg').style.display = 'block';
        document.querySelector('body').style.overflow = "hidden";
    })
});

close.forEach(function(cl){
    cl.addEventListener('click', function(){
        document.querySelector('.bg-modal-reg').style.display = 'none';
        document.querySelector('body').style.overflow = "visible";
    })
});

// logowanie
log_form = document.querySelectorAll("a.log-form");

log_form.forEach(function(form){
    form.addEventListener('click', function(){
        document.querySelector('.bg-modal-log').style.display = 'block';
        document.querySelector('body').style.overflow = "hidden";
    })
});

close.forEach(function(cl){
    cl.addEventListener('click', function(){
        document.querySelector('.bg-modal-log').style.display = 'none';
        document.querySelector('body').style.overflow = "visible";
    })
});
