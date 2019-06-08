function getCurrencyNames() {
    var url = "update_currency.php";
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log("\n naming" + this.responseText);
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
    var url = "API_currency.php?currency=" + send_names;
    var send_url;
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log("\n API" + this.responseText);
            return JSON.parse(this.responseText);
        }
    }
    httpRequest.open("POST", url, true);
    httpRequest.send();
}

function alterTable() {
    var url = 'updateCurrency.php';
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById("tableMoney").innerHTML = this.responseText;
        }
    }
    httpRequest.open("POST", url, true);
    httpRequest.send();
}

function deleteRow(table, id) {

    var url = 'delete_row.php?rowID=' + id + '&table=' + table;
    console.log(url);
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById("investTable").innerHTML = this.responseText;

        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();
}


function investing(button) {
    console.log("invest is good");
    var currency = button.name;
    //var hidden = document.getElementById("hidden").value;
    var row = document.getElementsByClassName(currency);

    var name = currency;
    var price = row[1].innerHTML;
    var symbol = row[1].getAttribute("name");
    var amount = row[2].firstChild.value;
    console.log("STOP " + name + price + amount + symbol);
    var url = "addInvestment.php?currency=" + name + "&price=" + price + "&amount=" + amount + "&symbol=" + symbol;
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            
        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();

}