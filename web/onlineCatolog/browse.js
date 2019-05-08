function table(query3) {
    if (query3.matches) {
        var url = "/browse.php?numRow=" + "3";
        var httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("items").innerHTML = this.responseText;
            }
        }
        httpRequest.open("GET", url, true);
        httpRequest.send();
    }
    else if (query5.matches) {
        var url = "/browse.php?numRow=" + "5";
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

var query3 = window.matchMedia("(max-width: 775px"));
query3.addListener(table);
var query5 = window.matchMedia("(min-width: 776px)");
table(query5);
query5.addListener(table);