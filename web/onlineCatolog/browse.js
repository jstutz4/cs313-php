function table(numRow) {
    var url = "/browse.php?numRow=" + numRow;
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("items").innerHTML = this.responseText;
        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();
}