var url = "http://localhost:8080/";

function getData(dataLocation){

    if (localStorage[''+dataLocation+'']) //if json for this location is in cache
        renderChart(dataLocation);
    else{
        $.get(url+dataLocation, function(data, response) {  // request data from url 
            if(response == 'success'){
                localStorage[''+dataLocation+''] = data; // put it in cache
                renderChart(dataLocation); 
            }
        });
    }
}

 