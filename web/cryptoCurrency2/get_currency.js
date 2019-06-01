function getCurrency() {
    var currency = document.getElementById("search").value;

    var url = "API_currency.php?currency=" + currency;
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            var info = JSON.parse(this.responseText);
            var prices = "info.data." + currency + ".quote.USD.price";
            console.log((info["data"][currency]["quote"]["USD"]["price"]).toFixed(2));
            console.log((info["data"][currency]["quote"]["USD"]["volume_24h"]).toFixed(2));
            console.log((info["data"][currency]["slug"]));

        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();
}