<html>
    <head>
        <title>FitiBit</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/style.css">
        <script   src="../js/zepto.min.js"></script> 
        <script src="../js/highcharts.js"></script>
        <script type="text/javascript" src="../js/callAPI.js"></script>
        <script type="text/javascript" src="../js/renderCharts.js"></script>
    </head>
    <body>
    <?php
    session_start();
    if (!isset($_SESSION['user']))
        header('Location: ../index.php');
    ?>
    <div class="chart-page-container">
        <header class="header-chart sleepB">
            <a href="dashboard.php"><img src="../img/backW.png" class="img-back" alt="Retour" title="Retour"></a>
            <h1>Qualité de Sommeil</h1>
            <img src="../img/nightW.png" class="img-moon" alt="Sommeil" title="Sommeil">
        </header>

        <div class="conteneur">

            <h2 class="sleepC"> Aujourd'hui </h2>

                <p>Dormi pendant : <span class="space"></span> <span id="sleep_value">Chargement...</span> </p>
                <p>Qualité de sommeil (semaine) : <span class="space"></span> <span id="sleep_quality">Chargement...</span></p>

            <h2 class="sleepC">Durée du sommeil</h2>

                <div>
                    <button id="1" class="button-sleep active-sleep" onclick="changeSleepLocation('sleep', 1)" >Jours</button>
                    <button id="2" class="button-sleep" onclick="changeSleepLocation('sleep/week', 2)">Semaines</button>
                    <button id="3" class="button-sleep" onclick="changeSleepLocation('sleep/month', 3)">Mois</button>
                </div>
				<div id="container_sleep" style="min-width: 310px; height: 400px; margin: 0 auto">Chargement...</div>
        </div>
    </div>
 <script type="text/javascript">
        var sleep = {'sleep' : '', 'awake' : ''};
        changeSleepLocation('sleep', 1);
        setHeaderInfos();

        function changeSleepLocation(newLocation, id){
            $("#container_sleep").text("Chargement...");
            $('button').removeClass("active-sleep");
            $('#'+id).addClass("active-sleep");
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
        }

        function renderChart(ChartLocation) {
            if(ChartLocation == "sleep" || ChartLocation == "sleep/week" || ChartLocation == "sleep/month")
                sleep['sleep'] = ChartLocation;
            else if(ChartLocation == "awake" || ChartLocation == "awake/week" || ChartLocation == "awake/month"){
                sleep['awake'] = ChartLocation;
                renderSleep(sleep, "container_sleep");
            }
        }

        function setHeaderInfos(){
            data = JSON.parse(localStorage['sleep'])[0].time;
            data = Math.round(data*100)/100;
            minutes = ((data%1)*60).toFixed(0);
            heures = data-data%1;
            $("#sleep_value").text(heures+"h "+minutes+"min");

            quality = JSON.parse(localStorage['sleep_quality']).sleep_quality;
            $("#sleep_quality").text((quality >= 0 ? "+ " : "") + quality + " %");
        }

        $("#container_sleep").on('click', function(e){
            fullScreenChart(sleep, e);
        });
        
        </script>
    </body>
</html>