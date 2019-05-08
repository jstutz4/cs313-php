function table3(query3) {
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

function table5(query5) {
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

var query3 = window.matchMedia("(max-width: 450px)");
table3(query3);
query3.addListener(table3);
var query5 = window.matchMedia("(min-width: 456px)");
table5(query5);
query5.addListener(table5);