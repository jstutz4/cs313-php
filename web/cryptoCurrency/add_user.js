function add_user() {
    var url = "generate_table.php?user=" + document.getElementById(u_id).value;
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("items").innerHTML = this.responseText;
            console.log(this.responseText);
        }
    }
    httpRequest.open("POST", url, true);
    httpRequest.send();
}