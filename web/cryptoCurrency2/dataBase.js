function investing(button) {
    console.log("invest is good");
    var currency = button.name;
    var hidden = document.getElementById("hidden").value;
    var row = document.getElementsByClassName(currency);

    var name = currency;
    var price = row[1].innerHTML;
    var amount = row[2].firstChild.value;
    console.log("STOP " + name + price + amount);
    var url = "addInvestment.php?currency=" + name + "&price=" + price + "&amount=" + amount + "&hidden=" + hidden;
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();
    window.location.href = "invest.php";
}

function invester(button) {
    window.location.href = "invest.php";
}

function home() {
    window.location.href = "home.php";
}
function logout() {
    window.location.href = "logout.php";
}

function reSearch() {
    window.location.href = "reSearch.php";
}

function deleteRow(table, id) {

    var url = 'delete_row.php?rowID=' + id + '&table=' + table;
    console.log(url);
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();

    if (table == "currency") {
        window.location.href = "home.php";
    }
    else {
       //window.location.href = "invest.php";
    }
}