function autoLogin() {
    window.location.href = "home.php";
}

function adduser() {

    var url = "addUser.php";
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

function error(tag) {
    var error = tag.value;
    console.log("red " + error + "  " + error.substring(0, 4));
    if (error.substring(0, 4) == "sorry") {
        tag.style.color = "darkviolet";
    }
}
