var request = new XMLHttpRequest();
request.onload = function () {
    dane = this.responseText.split(',');
    document.getElementById("imie_reg").value = dane[0];
    document.getElementById("nazwisko_reg").value = dane[1];
    document.getElementById("wiek_reg").value = dane[2];
    document.getElementById("email_reg").value = dane[3];
    document.getElementById("nrtel_reg").value = dane[4];
    document.getElementById("passwd_reg").value = dane[5];
};
request.open("get", "./userData.php", true);
request.send();
   

