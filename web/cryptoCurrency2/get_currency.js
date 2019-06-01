function getCurrency() {
    var currency = document.getElementById("search").value;
    var table = document.getElementById("content").innerHTML;
    var url = "API_currency.php?currency=" + currency;
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            var info = JSON.parse(this.responseText);
            var price = ((info["data"][currency]["quote"]["USD"]["price"]).toFixed(2));
            var volume = ((info["data"][currency]["quote"]["USD"]["volume_24h"]).toFixed(2));
            var name = ((info["data"][currency]["slug"]));

            table = table + '<tr><td>' + name + '</td><td>' + price + '</td><td>' + volume + '</td><td><input type="button" value="track" name="' + name + '"></td></tr>';
            document.getElementById("content").innerHTML = table;
        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();
}