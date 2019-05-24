function adduser() {
    console.log(document.getElementById("uid").value);
    var url = "generate_table.php?user=" + document.getElementById("uid").value;
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("table").innerHTML = this.responseText;
            console.log(this.responseText);
        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();
}

function searchName() {
    console.log(document.getElementById("search").value);
    var url = "generate_table.php?currency=" + document.getElementById("search").value;
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText != "") {
                document.getElementById("table").innerHTML = this.responseText;
            }
            console.log(this.responseText);
        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();
}