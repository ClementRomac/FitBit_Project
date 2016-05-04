var url = "http://localhost:8080/";

function getData(location){
    if (localStorage[''+location+'']){ //if json for this location is in cache
        renderChart(location);
    }else{
        $.get(url+location).done(function(data) {  // request data from url 
            localStorage[''+location+''] = data; // put it in cache
            renderChart(location);
        })
        .fail(function() {
            $("#error_message").text("Une erreur est survenue");
        });
    }
}

 