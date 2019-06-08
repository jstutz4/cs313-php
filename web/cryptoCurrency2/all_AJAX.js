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

function alterInvest() {
    var url = 'updateInvestTable.php';
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById("investTable").innerHTML = this.responseText;
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
            if (table == 'currency') {
                alterTable();
            }
            else {
                document.getElementById("investTable").innerHTML = this.responseText;
            }
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
            alterInvest();
        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();

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
            alterTable();
        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();
}

function filter(table) {
    if (table == 'currency') {
        var currency = document.getElementById('searchCurrency').value;
    }
    else {
        var currency = document.getElementById('searchInvesting').value;
    }
    var url = 'filterTable.php?table=' + table + '&name=' + currency;
    console.log("url: " + url);
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText)
            if (table == 'currency') {
                document.getElementById("tableMoney").innerHTML = this.responseText;
            }
            else {
                document.getElementById("investTable").innerHTML = this.responseText;
            }
        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();
}

function reSearch() {
    var table = document.getElementById('researchTable').style.display;
    if (table == '') {
        document.getElementById('researchTable').style.display = 'none';
    } else {
        document.getElementById('researchTable').style.display = '';
    }

}

function home() {
    var table = document.getElementById('tableMoney').style.display;
    if (table == "") {
        document.getElementById('tableMoney').style.display = 'none';
    }
    else {
        document.getElementById('tableMoney').style.display = '';
    }
}

function invester() {
    var table = document.getElementById('investTable').style.display;
    if (table == "") {
        document.getElementById('investTable').style.display = 'none';
    }
    else {
        document.getElementById('investTable').style.display = '';
    }

}