function table3(query3) {
    console.log("three");
    if (query3.matches) {
        var url = "browse.php?numRow=" + "3";
        var httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("items").innerHTML = this.responseText;
            }
        }
        httpRequest.open("GET", url, true);
        httpRequest.send();
    }
}

function table4(query4) {
    console.log("four");
    if (query4.matches) {
        var url = "browse.php?numRow=" + "4";
        var httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("items").innerHTML = this.responseText;
            }
        }
        httpRequest.open("GET", url, true);
        httpRequest.send();
    }
}

function table5(query5) {
    console.log("five");
    if (query5.matches) {
        var url = "browse.php?numRow=" + "5";
        var httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("items").innerHTML = this.responseText;
            }
        }
        httpRequest.open("GET", url, true);
        httpRequest.send();
    }
}

var query3 = window.matchMedia("(max-width: 765px)");
table3(query3);
query3.addListener(table3);
var query4 = window.matchMedia("(min-width: 765px) && (max-width:900px)");
table4(query4);
query4.addListener(table3);
var query5 = window.matchMedia("(min-width: 901px)");
table5(query5);
query5.addListener(table5);