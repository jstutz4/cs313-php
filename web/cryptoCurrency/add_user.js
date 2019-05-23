function adduser() {
    console.log(document.getElementById("uid").value);
    var url = "generate_table.php?user=" + document.getElementById("uid").value + "&currency=*";
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