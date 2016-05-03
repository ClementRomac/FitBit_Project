var xmlhttp = new XMLHttpRequest();
var url = "http://localhost:8080/weight";
// var stored = localStorage['test'];


xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        var myArr = JSON.parse(xmlhttp.responseText);
        console.log(Object.keys(myArr).length);
        myFunction(myArr);
    }
};

// if (stored){ 
//     myVar = stored
xmlhttp.open("GET", url, true);
xmlhttp.send();

function myFunction(arr) {
    var out = "";
    var i;
    for(i = 1; i < Object.keys(arr).length; i++) {
        out += '<p> Date:' + arr[''+i+''].date + '   Poids:' + 
        arr[''+i+''].weight + '</p><br>';
    }
    document.getElementById("id01").innerHTML = out;
}



// else myVar = {a:'test', b: [1, 2, 3]};
// Writing :

// localStorage['myKey'] = JSON.stringify(myVar);