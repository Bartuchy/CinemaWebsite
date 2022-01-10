let tytuly = document.querySelectorAll("#dynamic table tbody tr td.tytul");

tytuly.forEach(function(tytul){
   tytul.addEventListener("click", function(){
       const nazwa = tytul.dataset.nazwa;
       let sciezka;
       
       switch(nazwa){
               
           case 'JGC':
               sciezka = "plakaty/JGC.png";
               break;
               
            case 'CM2':
               sciezka = "plakaty/CM2.jfif";
               break;
               
            case 'Cruella':
               sciezka = "plakaty/Cruella.jpg";
               break;
               
            case 'MortalCombat':
               sciezka = "plakaty/MortalCombat.jpg";
               break;
               
            case 'DrugaPolowa':
               sciezka = "plakaty/DrugaPolowa.jpg";
               break;
               
            case 'CWDG':
               sciezka = "plakaty/CWDG.jpg";
               break;
       }
       
       sessionStorage.setItem("sciezka",sciezka);
       sessionStorage.setItem("nazwa", nazwa);
       window.location.href="Opisy.php";
       
   }) 
});