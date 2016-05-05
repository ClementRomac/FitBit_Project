var url = "http://localhost:8080/";

function getData(location){
    if (localStorage[''+location+'']){ //if json for this location is in cache
        renderChart(location);
    }else{
        $.get(url+location, function(data, response) {  // request data from url 
            if(response == 'success'){
                localStorage[''+location+''] = data; // put it in cache
                renderChart(location); 
            }
            else {
                $("#error_message").text("Une erreur est survenue");
            }
        });
    }
}

 