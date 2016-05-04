var url = "http://localhost:8080/weight";
var stored = localStorage['weight_weeks'];

$(function(){
    if (stored){ 
        renderChart()
    }else{
        $.get( url).done(function(data) {
            localStorage['weight_weeks'] = data;
            renderChart();
        })
        .fail(function() {
            $("#error_message").text("Une erreur est survenue");
        });
    }
});

 