function checkName(input) {
    if (input.value == "") {
        input.focus();
        input.style.backgroundColor = "red";
        return false;
    }
    else {
        input.style.backgroundColor = "white";
        input.value = capitalize_Name(input.value);
        return true;
    }
}

//capitalize_Words 
function capitalize_Name(str)
{
 return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}



function checkDOB(element) {
    var date = element.value;
    var month = date.indexOf("/");
    var year = date.lastIndexOf("/");
    var day = date.slice(month + 1, year)
    
    month = date.substring(0, month);
    year = date.slice(year + 1);

    if (/^(1[0-2]|0[1-9]|[1-9])\/(1[0-9]|2[0-9]|3[0-1]|0[1-9]|[1-9])\/(19|20)\d{2}$/.test(element.value)) {
        if (day >= 31 && (month == 4 || month == 6 || month == 9 || month == 11)) {
            console.log("that month does not have 31+ days");
            element.style.backgroundColor = "red";
            return false;
        }
        else if (day >= 30 && month == 2) {
            element.style.backgroundColor = "red";
            console.log("feb does not have 30 or 31 days");
            return false;
        }
        else if (month == 2 && day == 29 && !(year % 4 == 0 && (year % 100 != 0 || year % 400 == 0))) {
            element.style.backgroundColor = "red";
            console.log("feb is outside of leap year");
            return false;
        }
        else {
            element.style.backgroundColor = "white";
            return true;
        }
    }
    else {
        element.focus();
        element.style.backgroundColor = "red";
        return false;
    }

}

function checkData(item) {
    if (item.value != "") {
        item.style.backgroundColor = "white";
        return true;
    }
    else {
        item.focus();
        item.style.backgroundColor = "red";
        return false;
    }
}

function checkRadio(group) {
    var i = 0;
    var groupSelected = false;
    for (i; i < group.length; i++) {
        if (group[i].checked) {
            groupSelected = true;
            document.getElementById(group[i].getAttribute("name") + "s").style.backgroundColor = "#D3D3D3";
            break;
        }
        else {
            document.getElementById(group[i].getAttribute("name") + "s").focus();
            document.getElementById(group[i].getAttribute("name") + "s").style.backgroundColor = "red";
            groupSelected = false;
        }
    }

    if (groupSelected) {
        return true;
    }
    else {     
        return false;
    }
}

function checkSelect(item) {
    if (item.value == "NONE") {
        item.style.backgroundColor = "red";
        return false;
    }
    else {
        item.style.backgroundColor = "white";
        return true;
    }
}

function checkPhone(number) {
    if (/^\d{3}-\d{3}-\d{4}$/.test(number.value)) {
        number.style.background = "white";
        return true;
    }
    else {
        number.focus();
        number.style.background = "red";
        number.value = "";
        number.placeholder = "incorrect format";
        return false;
    }
}

function checkEmail(email) {
    if (/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(email.value)){
        email.style.backgroundColor = "white";
        return true;
    }
    else {
        email.style.backgroundColor = "red";
        email.focus();
        email.value = "";
        email.placeholder = "incorrect format";
        return false;
    }

}

function checkForm() {
    console.log("checking form");
    
    if (checkName(document.getElementById("a_f_name")) && checkName(document.getElementById("a_l_name"))
        && checkDOB(document.getElementById("birth_date")) && checkSelect(document.getElementById("grades")) && checkRadio(document.getElementsByName("gender"))
        && checkRadio(document.getElementsByName("citizen")) && checkData(document.getElementById("street_adress")) && checkData(document.getElementById("cities"))
        && checkSelect(document.getElementById("states")) && checkSelect(document.getElementById("uniforms")) && checkData(document.getElementById("p1FN"))
        && checkData(document.getElementById("p1LN")) && checkPhone(document.getElementById("phone")) && checkEmail(document.getElementById("p1Emails"))) {
        /* maybe formData object */
        return true;
    }
    else {
        return false;
    }
}