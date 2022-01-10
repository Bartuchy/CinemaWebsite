function show(){
    var request = new XMLHttpRequest();
    request.onload = function () {
        data = this.responseText.split(',');
        let table = '<table id="rezerwacja">'
            '<tr><td>Tytuł</td>' 
            '<td>Data Seansu</td><td>Język</td>'
            '<td>Sczegóły</td><td>Płatność</td></tr>';

        for(let i = 0; i < data.length; i++){
            table += '<tr><td>'+data[i]+'</td></tr>';
        }

        data += '</table>';
    
        document.getElementById("dynamic").innerHTML = data;
    }

    request.open("get", "./ticketsData.php", true);
    request.send();
}