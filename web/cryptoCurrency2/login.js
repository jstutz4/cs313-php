function autoLogin(refresh) {
    console.log(refresh);
    var url = "home.php?userid=" + refresh;
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

/*
function login() {
    console.log("normal login");
    if (document.getElementById("uid").value != "") {
        var url = "home.php?user=" + document.getElementById("uid").value;
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
}
*/

