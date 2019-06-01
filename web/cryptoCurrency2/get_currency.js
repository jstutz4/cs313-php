function getCurrency() {
    var currency = document.getElementById("search").value;
    var table = document.getElementById("table").innerHTML;
    var url = "API_currency.php?currency=" + currency;
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            var info = JSON.parse(this.responseText);
            var price = ((info["data"][currency]["quote"]["USD"]["price"]).toFixed(2));
            var volume = ((info["data"][currency]["quote"]["USD"]["volume_24h"]).toFixed(2));
            var name = ((info["data"][currency]["slug"]));

        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();
}