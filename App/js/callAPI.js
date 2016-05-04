var url = "http://localhost:8080/weight";
var stored = localStorage['weight_weeks'];

$(function(){
    if (stored){ 
        renderChart()
    }else{
        $.get(url).done(function(data) {
            localStorage['weight_weeks'] = data;
            renderChart();
        })
        .fail(function() {
            $("#error_message").text("Une erreur est survenue");
        });
    }
});

 
  /*function myFunction(arr) {
     arr = JSON.parse(arr);
     console.log(arr);
     var out = "";
     var i;
     for(i = 1; i < Object.keys(arr).length; i++) {
         out += '<p> Date:' + arr[''+i+''].date + '   Poids:' + 
         arr[''+i+''].weight + '</p><br>';
     }
     document.getElementById("container").innerHTML = out;
  }*/

 