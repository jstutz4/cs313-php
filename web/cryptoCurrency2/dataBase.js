function investing(button) {
    console.log("invest is good");
    var currency = button.name;
    var row = document.getElementsByClassName(currency);

    var name = row[2].firstChild.innerHTML;
    var price = row[1].innerHTML;
    var amount = row[2].firstChild.value;
    console.log(row);
    console.log("currency " + currency + " name " + name + "\n price " + price + "\n amount " + amount);
    var url = "addInvestment.php?currency=" + name + "&price=" + price + "&amount=" + amount;
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();


   // window.location.href = "invest.php";
}

function home() {
    window.location.href = "home.php";
}
function logout() {
    window.location.href = "logout.php";
}

