function getCurrencyNames() {
    var url = "update_currency.php";
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            return this.responseText;
        }
    }
    httpRequest.open("POST", url, true);
    httpRequest.send();
}

function updateCurrency() {

    var send_names = getCurrencyNames();
    var names = send_names.split(',');
    console.log("log " + send_names);
    var rows;
    var tableHeader = '<table><th> Currency</th> <th>Price</th> <th>Volume (B)</th> <th>24h % change</th> <th>Save</th>';
    var tableClosing = '</table>'
    var url = "API_currency.php?currency=" + send_names;
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            var info = JSON.parse(this.responseText);
            var price;
            var volume;
            var name;
            var change;
            for (var i = 0; i < names.length; i++) {
                price = ((info["data"][names[i]]["quote"]["USD"]["price"]).toFixed(2));
                volume = ((info["data"][names[i]]["quote"]["USD"]["volume_24h"]) / 1000000000).toFixed(2);
                name = ((info["data"][names[i]]["slug"]));
                change = (info["data"][names[i]]["quote"]["USD"]["percent_change_24h"]).toFixed(2);
                rows = rows + '<tr id="' + name + '"><td>' + name + '</td><td>' + price + '</td><td>' + volume + '</td><td>' + change + '</td><td><input type="button" value="track" name="' + name + '" onclick="insertCurrency(this)"></td></tr>';
            }
            document.getElementById("tableCurrency").innerHTML = tableHeader + rows + tableClosing;
        }
    }
    httpRequest.open("POST", url, true);
    httpRequest.send();


}