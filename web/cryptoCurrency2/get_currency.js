function getCurrency() {
    var currency = document.getElementById("symbol").value;
    var rows = htmlDecode(document.getElementById("hiddens").innerHTML);
    var tableHeader = '<table><th> Currency</th> <th>Price</th> <th>Volume (B)</th> <th>24hr % change</th> <th>Save</th>';
    var tableClosing = '</table>'
    var url = "API_currency.php?currency=" + currency;
    var httpRequest = new XMLHttpRequest();
    if (currency != "") {
        httpRequest.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var info = JSON.parse(this.responseText);
                var price = ((info["data"][currency]["quote"]["USD"]["price"]).toFixed(2));
                var volume = ((info["data"][currency]["quote"]["USD"]["volume_24h"]) / 1000000000).toFixed(2);
                var name = ((info["data"][currency]["slug"]));
                var change = (info["data"][currency]["quote"]["USD"]["percent_change_24h"]).toFixed(2);
                if (document.getElementById(name) == null) {
                    rows = rows + '<tr id="' + name + '"><td>' + name + '</td><td name="' + currency + '">' + price + '</td><td>' + volume + '</td><td>' + change + '</td><td><input type="button" value="track" name="' + name + '" onclick="insertCurrency(this)"></td></tr>';
                    document.getElementById("hiddens").innerHTML = escapeHtml(rows);
                    document.getElementById("researchTable").innerHTML = tableHeader + rows + tableClosing;
                }
            }
        }
        httpRequest.open("GET", url, true);
        httpRequest.send();
    }
}

function escapeHtml(text) {
    var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };

    return text.replace(/[&<>"']/g, function (m) { return map[m]; });
}

function htmlDecode(input) {
    var doc = new DOMParser().parseFromString(input, "text/html");
    return doc.documentElement.textContent;
}

function insertCurrency(button) {
    var name = button.name;
    var row = document.getElementById(name);
    var currency = name;
    var prices = (row.childNodes[1].innerHTML);
    var volumes = (row.childNodes[2].innerHTML);
    var change = (row.childNodes[3].innerHTML);
    var symbol = row.childNodes[1].getAttribute("name");


    var url = 'insert_currency.php?name=' + currency + '&price=' + prices + '&volume=' + volumes + '&change=' + change + '&symbol=' + symbol;
    console.log("url: " + url);
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText)
            window.location.href = "invest.php";
        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();
}