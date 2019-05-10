function table1(query1) {
   // console.log("five");
    if (query1.matches) {
        var url = "table.php?numRow=" + "1";
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

function table2(query2) {
    //console.log("five");
    if (query2.matches) {
        var url = "table.php?numRow=" + "2";
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

function table3(query3) {
    //console.log("three");
    if (query3.matches) {
        var url = "table.php?numRow=" + "3";
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
    //console.log("four");
    if (query4.matches) {
        var url = "table.php?numRow=" + "4";
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
    //console.log("five");
    if (query5.matches) {
        var url = "table.php?numRow=" + "5";
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

var query1 = window.matchMedia("(max-width: 430px)");
table1(query1);
query1.addListener(table1);

var query2 = window.matchMedia("(min-width: 431px) and (max-width: 600px)");
table2(query2);
query2.addListener(table2);

var query3 = window.matchMedia("(min-width: 601px) and (max-width: 800px)");
table3(query3);
query3.addListener(table3);

var query4 = window.matchMedia("(min-width: 801px) and (max-width: 990px)");
table4(query4);
query4.addListener(table4);

var query5 = window.matchMedia("(min-width: 991px)");
table5(query5);
query5.addListener(table5);

function add_to_session(item) {
    var group = document.getElementsByName(item.getAttribute("name"));
    var title = group[0].innerHTML
    var img_src = group[1].firstChild.getAttribute("src");
    var img_alt = group[1].firstChild.getAttribute("alt");
    var price = group[2]. innerHTML;



    var url = "view_cart.php?title=" + title + "&img_src=" + img_src + "&img_alt=" + img_alt + "&price=" + price + '&ajax="true"';
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //no return just send values
            console.log(this.responseText);
        }
    }
    httpRequest.open("GET", url, true);
    httpRequest.send();
}