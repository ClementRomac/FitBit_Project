var url = "http://localhost:8080/";

function getData(location){
    if (localStorage[''+location+'']){ 
        renderChart()
    }else{
        $.get(url+location).done(function(data) {
            localStorage[''+location+''] = data;
            renderChart();
        })
        .fail(function() {
            $("#error_message").text("Une erreur est survenue");
        });
    }
}

 