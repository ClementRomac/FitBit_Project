<html>
    <head>
        <title>FitiBit</title></colspan="2"d >
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/pages/style.css">
        <script   src="../js/zepto.min.js"></script> 
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
        <script type="text/javascript" src="../js/callAPI.js"></script>
        <script type="text/javascript" src="../js/renderCharts.js"></script>
    </head>
    <body>
    <?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ../index.php');
    }
    ?>

        <header class="weightB">
            <a href="Dashboard.php"><img src="../img/back.png" class="img-back"></a>
            <h1>Poids</h1>
            <img src="../img/iconW.png" class="img-moon">
        </header>


        <div id="conteneur">

            <h2 class="weightC">Aujourd'hui</h2>
                <p>Dormir pendant :<span class="space"></span>6h 52min</p>
                <p>Qualité de sommeil :<span class="space"></span>Bon | 8.5/10</p>

            <h2 class="weightC">Historique du poids</h2>

                <div>
                    <button id ="1" class="button-weight active-weight" onclick="changeWeightLocation('weight/week', 1)">Semaines</button>
                    <button id ="2" class="button-weight" onclick="changeWeightLocation('weight/month', 2)">Deux mois</button>
                    <button id ="3" class="button-weight" onclick="changeWeightLocation('weight/year', 3)">Années</button>
                </div>
                <div id="container_weight" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                
            <h2 class="weightC">IMC</h2>

                <div id="container_imc" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>

        <script type="text/javascript">
        var location_weight="";
        changeWeightLocation("weight/week", 1); //get data for default location
        getData("imc"); //get data for default location

        function changeWeightLocation(newLocation, id){
            getData(newLocation);
            $('button').removeClass("active-weight");
            $('#'+id).addClass("active-weight");
            location_weight = newLocation;
        }

        function renderChart(location) {
            if(location == "weight/week" || location == "weight/month" || location == "weight/year"){
                renderWeight(location, "container_weight");
            }
            else if(location == "imc"){
                renderImc(location, "container_imc");
            }
        }

        $("#container_weight").on('click', function(e){
            fullScreenChart(location_weight, e);
        });
        </script>
    </body>
</html>