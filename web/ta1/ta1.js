function showClick() {
    alert("The button has been clicked");
}

function changeColor(div) {
    //plain js
    //div.parentNode.style.backgroundColor = document.getElementById("color1").value;

    //try jQuery
    var color = $( "#color1" ).val();
    console.log(color);
    $(div).closest("div").css({
        backgroundColor: color
    })
}