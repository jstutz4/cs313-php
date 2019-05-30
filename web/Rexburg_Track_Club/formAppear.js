function showBlank(){
    document.getElementById("changeForms").style.display = "none";
    document.getElementsByClassName("signUp")[0].style.display = "initial";
    document.getElementById("a_f_name").focus();
}

function showInfo(input) {
    document.getElementById("old_athlete").style.display = "initial";
    input.style.display = "none";
}

function getAthlete() {
    document.getElementById("reset").click();
    var inputs = document.forms["old_athlete"].getElementsByTagName("input");
    inputs[0].value = capitalize_Name(inputs[0].value);
    inputs[1].value = capitalize_Name(inputs[1].value);
    var id = inputs[0].value + " " + inputs[1].value + " " + inputs[2].value;
    var url = "getAthlete.php?" + "id=" + id;
    if(checkDOB(inputs[2])){
      /* http request with the given id */
      console.log("making request");
    var httpRequest = new XMLHttpRequest();
    	httpRequest.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
      
        var athletes = JSON.parse(this.responseText);
        for(var i = 0; i < athletes.length; i++){
          if(id == athletes[i]["id"]){            
            var gender = athletes[i]["dictionary"]["gender"];
            if (gender == "M") {
                //console.log("Boy");
                gender = 0;
            }
            else if (gender == "F") {
                //console.log("girl");
                gender = 1;
            }
            else {
                //console.log("unknown");
                gender = -1;
            }
            
            document.getElementById("a_f_name").value = athletes[i]["dictionary"]["a_first_name"];
            document.getElementsByName("mName")[0].value = athletes[i]["dictionary"]["a_middle_name"];
            document.getElementById("a_l_name").value = athletes[i]["dictionary"]["a_last_name"];
            document.getElementById("birth_date").value = athletes[i]["dictionary"]["DOB"];
            
            if (gender == 0 || gender == 1) {
                document.getElementsByName("gender")[gender].checked = true;
            }
            /*
            document.getElementsByName("street")[0].value = athletes[i]["dictionary"]["street"];
            document.getElementsByName("city")[0].value = athletes[i]["dictionary"]["city"];
            document.getElementsByName("state")[0].value = athletes[i]["dictionary"]["state"];
            document.getElementsByName("zip")[0].value = athletes[i]["dictionary"]["zip"];
            */
            document.getElementById("p1FN").value = athletes[i]["dictionary"]["parent_first_name"];
            document.getElementById("p1LN").value = athletes[i]["dictionary"]["parent_last_name"];
            document.getElementById("phone").value = athletes[i]["dictionary"]["parent_number"];
            document.getElementById("p1Emails").value = athletes[i]["dictionary"]["parent_email"];
        
            document.getElementById("fn2").value = athletes[i]["dictionary"]["parents_first_name"];
            document.getElementById("p1LN2").value = athletes[i]["dictionary"]["parents_last_name"];
            document.getElementById("phone2").value = athletes[i]["dictionary"]["parents_number"];
            document.getElementById("email2").value = athletes[i]["dictionary"]["parents_email"];
        
            document.getElementById("changeForms").style.display = "none";
            document.getElementsByClassName("signUp")[0].style.display = "initial";
            checkForm();
          }
        } 
    		}
    	}
    	httpRequest.open("GET",url,true);
    	httpRequest.send();
   }
   else{
   inputs[2].style.backgroundColor = "red";
   inputs[2].value = "";
   inputs[2].placeholder = "no existing Athlete check format";
   }

/*
    
    */
}