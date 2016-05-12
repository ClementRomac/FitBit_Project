<html>
    <head>
        <title>FitiBit</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/style.css">
        <script   src="../js/zepto.min.js"></script> 
        <script src="../js/highcharts.js"></script>
        <script src="../js/highcharts-more.js"></script>
        <script src="../js/solid-gauge.js"></script>
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

            <header class="header-chart weightB">
                <a href="dashboard.php"><img src="../img/backW.png" class="img-back" alt="Retour" title="Retour"></a>
                <h1>Poids</h1>
                <img src="../img/weightW.png" class="img-moon" alt="Poids" title="Poids">
            </header>


            <div class="conteneur">

                <h2 class="weightC">Aujourd'hui</h2>
                    <p>Poids : <span class="space"></span> <span id="weight_value">Chargement...</span> Kg</p>

                <h2 class="weightC">Historique du poids</h2>

                    <div>
                        <button id ="1" class="button-weight active-weight" onclick="changeWeightLocation('weight/week', 1)">Semaines</button>
                        <button id ="2" class="button-weight" onclick="changeWeightLocation('weight/month', 2)">Deux mois</button>
                        <button id ="3" class="button-weight" onclick="changeWeightLocation('weight/year', 3)">Années</button>
                    </div>
                    <div id="container_weight" style="min-width: 310px; height: 400px; margin: 0 auto">Chargement...</div>
                    
                <h2 class="weightC">IMC</h2>

                    <div id="container_imc" style="min-width: 310px; height: 400px; margin: 0 auto">Chargement...</div>
            </div>
        </div>

        <script type="text/javascript">
        var location_weight="";
        changeWeightLocation("weight/week", 1);
        getData("imc");
        setHeaderInfos();

        function changeWeightLocation(newLocation, id){
            $("#container_weight").text("Chargement...");
            $('button').removeClass("active-weight");
            $('#'+id).addClass("active-weight");
            getData(newLocation);
            location_weight = newLocation;
        }

        function renderChart(location) {
            if(location == "weight/week" || location == "weight/month" || location == "weight/year")
                renderWeight(location, "container_weight");
            else if(location == "imc")
                renderImc(location, "container_imc");
        }

        function setHeaderInfos(){
            $("#weight_value").text(JSON.parse(localStorage['weight'])[0].weight);
        }


        $("#container_weight").on('click', function(e){
            fullScreenChart(location_weight, e);
        });
        </script>
    </body>
</html>