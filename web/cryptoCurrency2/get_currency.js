function getCurrency() {
    var currency = document.getElementById("search").value;
    var rows = escapeHtml(document.getElementById("hiddens").innerHTML);
    console.log(rows);
    var tableHeader = '<table><th> Currency</th> <th>Price</th> <th>Volume</th> <th>Save</th>';
    var tableClosing = '</table>'
    var url = "API_currency.php?currency=" + currency;
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            var info = JSON.parse(this.responseText);
            var price = ((info["data"][currency]["quote"]["USD"]["price"]).toFixed(2));
            var volume = ((info["data"][currency]["quote"]["USD"]["volume_24h"]).toFixed(2));
            var name = ((info["data"][currency]["slug"]));

            rows = rows + '<tr><td>' + name + '</td><td>' + price + '</td><td>' + volume + '</td><td><input type="button" value="track" name="' + name + '"></td></tr>';
            console.log(rows);
            document.getElementById("hiddens").innerHTML = escapeHtml(rows);
            document.getElementById("table").innerHTML = tableHeader + rows + tableClosing;
        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();
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