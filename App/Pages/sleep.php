<html>
    <head>
        <title>FitiBit</title></colspan="2"d >
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/Pages/style.css">
        <script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
        <script type="text/javascript" src="../js/callAPI.js"></script>
    </head>
    <body>
    <?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ../index.html');
    }
    ?>
        <header class="sleepB">
            <a href="Dashboard.php"><img src="../maquettes/sprite/back.png" class="img-back"></a>
            <h1>Qualitée de Sommeil</h1>
            <img src="../maquettes/sprite/nightW.png" class="img-moon">
        </header>

        <div id="conteneur">

            <h2 class="sleepC"> Aujourd'hui </h2>

                <p>Dormir pendant : <span class="space"></span> 6h 52min </p>
                <p>Qualité de sommeil : <span class="space"></span> Bon | 8.5/10</p>

            <h2 class="sleepC">Durée du sommeil</h2>

                <div>
                    <button class="button-sleep active-sleep" onclick="changeSleepLocation('sleep')" >Semaines</button>
                    <button class="button-sleep" onclick="changeSleepLocation('sleep/month')">Deux mois</button>
                    <button class="button-sleep" onclick="changeSleepLocation('sleep/year')">Années</button>
                </div>
<div id="container_sleep" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    <script type="text/javascript">
        //var myLocation = "weight"; //default location
        getData("sleep"); //get data for default location

        function changeSleepLocation(newLocation, id){
            getData(newLocation);
            $('button').removeClass("active-sleep");
            $('#'+id).addClass("active-sleep")
        }

        function renderChart(location) {
            if(location == "sleep" || location == "sleep/month" || location == "sleep/year"){
                renderSleep(location);
            }
        }

        function renderSleep(sleepLocation){
            var sleep = JSON.parse(localStorage[''+sleepLocation+'']);
            var sleep_length = Object.keys(sleep).length - 1;

            var myCategories = [];
            for (var i = 0; i <= sleep_length; i++) {
                myCategories[i] = sleep[''+sleep_length-i+''].date;
            };
            
            var myDataSommeil = [];
            for (var i = 0; i <= sleep_length; i++) {
                myDataSommeil[i] = sleep[''+sleep_length-i+''].hours;
            };
            var myDataEveil = [];
            for (var i = 0; i <= sleep_length; i++) {
                myDataEveil[i] = sleep[''+sleep_length-i+''].minutes;
            };

            
    $('#container_sleep').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Sommeil'
        },
        xAxis: [{
          categories: myCategories,
          crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Heure sommeil',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: '{value} h',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            }

        }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Eveil',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value} min',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            opposite: true
        }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            x: 80,
            verticalAlign: 'top',
            y: 55,
            floating: true,
        },
        series: [{
            name: 'Eveil',
            type: 'spline',
            yAxis: 1,
            data: myDataEveil,
            tooltip: {
                valueSuffix: ' min'
            }

        },  {
            name: 'Sommeil',
            type: 'spline',
            data: myDataSommeil,
            tooltip: {
                valueSuffix: ' h'
            }
        }]
    });










        }
        </script>
    </body>
</html>