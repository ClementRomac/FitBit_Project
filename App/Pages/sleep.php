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
        var sleep = {'sleep' : '', 'awake' : ''};
        changeSleepLocation('sleep', 1);
        //console.log(sleep['sleep']);
        function changeSleepLocation(newLocation, id){
            if(newLocation == 'sleep'){
                getData('sleep');
                getData('awake');
            }
            else if(newLocation == 'sleep/week'){
                getData('sleep/week');
                getData('awake/week');
            }
            else if(newLocation == 'sleep/month'){
                getData('sleep/month');
                getData('awake/month');
            }
            $('button').removeClass("active-sleep");
            $('#'+id).addClass("active-sleep")
        }
        function renderChart(location) {
            if(location == "sleep" || location == "sleep/week" || location == "sleep/month"){
                sleep['sleep'] = location;
            }
            else if(location == "awake" || location == "awake/week" || location == "awake/month"){
                sleep['awake'] = location;
                renderSleep(sleep);
            }
        }
        function renderSleep(sleep_array){
            var sleep = JSON.parse(localStorage[''+sleep_array['sleep']+'']);
            var sleep_length = Object.keys(sleep).length - 1;
            var awake = JSON.parse(localStorage[''+sleep_array['awake']+'']);
            var awake_length = Object.keys(awake).length - 1;
            var myCategories = [];
            for (var i = 0; i <= sleep_length; i++) {
                myCategories[i] = sleep[''+sleep_length-i+''].date;
            };
            console.log(myCategories)
            
            var sleepData = [];
            for (var i = 0; i <= sleep_length; i++) {
                sleepData[i] = sleep[''+sleep_length-i+''].sleep;
            };
            var awakeData = [];
            for (var i = 0; i <= awake_length; i++) {
                awakeData[i] = awake[''+awake_length-i+''].awake;
            };
            new Highcharts.Chart({
                chart: {
                    renderTo: 'container_sleep'
                },
                title: {
                    text: 'Nombre de pas / Distance parcouru'
                },
                xAxis: [{
                    categories: myCategories,
                crosshair: true
                }],
                yAxis: [{ // Primary yAxis
                    labels: {
                        format: '{value}',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Nombre de pas',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }, { // Secondary yAxis
                    title: {
                        text: 'Distance parcouru',
                        style: {
                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    labels: {
                        format: '{value} Km',
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
                    x: 120,
                    verticalAlign: 'top',
                    y: 100,
                    floating: true,
                    backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                },
                series: [{
                    name: 'Distance parcouru',
                    type: 'column',
                    yAxis: 1,
                    data: awakeData,
                    tooltip: {
                        valueSuffix: ' Km'
                    },
                }, {
                    name: 'Nombre de pas',
                    type: 'spline',
                    data: sleepData
                }]
            });
        }
        </script>
    </body>
</html>