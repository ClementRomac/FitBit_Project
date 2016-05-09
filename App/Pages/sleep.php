<html>
    <head>
        <title>FitiBit</title></colspan="2"d >
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/Pages/style.css">
        <script   src="../js/zepto.min.js"></script> 
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script type="text/javascript" src="../js/callAPI.js"></script>
        <script type="text/javascript" src="../js/renderCharts.js"></script>
    </head>
    <body>
    <?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ../index.html');
    }
    ?>
        <header class="sleepB">
            <a href="Dashboard.php"><img src="../img/back.png" class="img-back"></a>
            <h1>Qualitée de Sommeil</h1>
            <img src="../img/nightW.png" class="img-moon">
        </header>

        <div id="conteneur">

            <h2 class="sleepC"> Aujourd'hui </h2>

                <p>Dormir pendant : <span class="space"></span> 6h 52min </p>
                <p>Qualité de sommeil : <span class="space"></span> Bon | 8.5/10</p>

            <h2 class="sleepC">Durée du sommeil</h2>

                <div>
                    <button id="1" class="button-sleep active-sleep" onclick="changeSleepLocation('sleep', 1)" >Jours</button>
                    <button id="2" class="button-sleep" onclick="changeSleepLocation('sleep/week', 2)">Semaines</button>
                    <button id="3" class="button-sleep" onclick="changeSleepLocation('sleep/month', 3)">Mois</button>
                </div>
				<div id="container_sleep" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
 <script type="text/javascript">
        var sleep = {'sleep' : '', 'awake' : ''};
        changeSleepLocation('sleep', 1);

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
                renderSleep(sleep, "container_sleep");
            }
        }

        $("#container_sleep").on('click', function(e){
            fullScreenChart(sleep, e);
        });
        
        </script>
    </body>
</html>