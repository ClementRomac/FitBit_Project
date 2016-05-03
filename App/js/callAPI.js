var xmlhttp = new XMLHttpRequest();
var url = "http://localhost:8080/weight";
var stored = localStorage['test'];


xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        console.log("API Request!");
        localStorage['test'] = xmlhttp.responseText;
        myFunction(xmlhttp.responseText);
    }
};

if (stored){ 
    myFunction(stored);
}else{
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

function myFunction(json_string) {
    var arr = JSON.parse(json_string);
    var out = "";
    for(var i = 1; i < Object.keys(arr).length; i++) {
        out += '<p> Date:' + arr[''+i+''].date + '   Poids:' + 
        arr[''+i+''].weight + '</p><br>';
    }
    
    document.getElementById("id01").innerHTML = out;
}



// else myVar = {a:'test', b: [1, 2, 3]};
// Writing :

 