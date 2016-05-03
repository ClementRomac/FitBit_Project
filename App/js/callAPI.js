var xmlhttp = new XMLHttpRequest();
var url = "http://localhost:8080/weight";

xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("id01").innerHTML = xmlhttp.responseText;
        var myArr = JSON.parse(xmlhttp.responseText);
        myFunction(myArr);
    }
};
xmlhttp.open("GET", url, true);
xmlhttp.send();

function myFunction(arr) {
    out = arr;
    // var out = "";
    // var i;
    // for(i = 0; i < arr.length; i++) {
    //     out += '<p >' + arr[i].date + '   ' + 
    //     arr[i].weight + '</p><br>';
    // }
    //document.getElementById("id01").innerHTML = out;
}

/*
var stored = localStorage['myKey'];
if (stored) myVar = JSON.parse(stored);
else myVar = {a:'test', b: [1, 2, 3]};
Writing :

localStorage['myKey'] = JSON.stringify(myVar);
*/