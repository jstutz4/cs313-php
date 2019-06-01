function getCurrency() {
    var currency = document.getElementById("search").value;
    var rows = htmlDecode(document.getElementById("hiddens").innerHTML);
    var tableHeader = '<table><th> Currency</th> <th>Price</th> <th>Volume</th> <th>Save</th>';
    var tableClosing = '</table>'
    var url = "API_currency.php?currency=" + currency;
    var httpRequest = new XMLHttpRequest();
    if (currency != "") {
        httpRequest.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var info = JSON.parse(this.responseText);
                var price = ((info["data"][currency]["quote"]["USD"]["price"]).toFixed(2));
                var volume = ((info["data"][currency]["quote"]["USD"]["volume_24h"]).toFixed(2));
                var name = ((info["data"][currency]["slug"]));
                if (document.getElementById(name) == null) {
                    rows = rows + '<tr id="' + name + '"><td>' + name + '</td><td>' + price + '</td><td>' + volume + '</td><td><input type="button" value="track" name="' + name + '"></td></tr>';
                    document.getElementById("hiddens").innerHTML = escapeHtml(rows);
                    document.getElementById("table").innerHTML = tableHeader + rows + tableClosing;
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