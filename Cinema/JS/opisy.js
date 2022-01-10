const plakaty = document.querySelectorAll("#plakaty figure");

plakaty.forEach(function(plakat){
   plakat.addEventListener("click", function(){
       const nazwa = plakat.dataset.nazwa;
       const sciezka = plakat.children[0].getAttribute("src");
       
       sessionStorage.setItem("sciezka",sciezka);
       sessionStorage.setItem("nazwa", nazwa);
       window.location.href="Opisy.php";
   }) 
});