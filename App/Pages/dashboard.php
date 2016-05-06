<html>
    <head>
        <title>FitiBit</title></colspan="2"d >
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/Pages/dashboard.css">
        <script   src="../js/zepto.min.js"></script> 
        <script type="text/javascript" src="../js/callAPI.js"></script>
    </head>
    <body>
    <?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ../index.html');
    }
    ?>
        <div id="header">
            <h1>Tableau de bord</h1>
        </div>
        <div class="date"> <script type="text/javascript" src="../js/time.js"></script> </div>
        <div id="small-tile">
            <a href="weight.php">
                <div class="squarre-1"><img src="../maquettes/sprite/icon.png" class="img-squarre">
                    <div class="text-1"> <span id="dashboard-weight">90</span> Kg </div>
                    <div class="text-1-2"> Poids </div>
                </div>
            </a>
            <a href="walk.php">
                <div class="squarre-2"><img src="../maquettes/sprite/footsteps-silhouette-variant.png" class="img-squarre">
                    <div class="text-2"> <span id="dashboard-steps">852</span> Pas </div>
                    <div class="text-2-2"> <span id="dashboard-steps-variation">+ 8.5 %</span> </div>
                </div>
            </a>
        </div>
        <a href="Sleep.php">
            <div id="large-tile">
                <div class="rectangle"><img src="../maquettes/sprite/night.png" class="img-rectangle">
                <div class="text-3"> Sommeil </div>
                <div class="text-3-2"> <span id="dashboard-sleep">852</span> </div>  
                <div class="text-3-3"> 8.5/10 </div>
                </div>
            </div>
        </a>
        <script type="text/javascript">
            getData("weight");
            getData("steps");
            getData("sleep");

            function renderChart (location) {
                if(location == 'weight'){
                    $("#dashboard-weight").text(JSON.parse(localStorage[''+location+''])[0].weight);
                }
                else if(location == 'steps'){
                    var steps_today = JSON.parse(localStorage[''+location+''])[0].steps;
                    var steps_yesterday = JSON.parse(localStorage[''+location+''])[1].steps;
                    var steps_variation = ((steps_today-steps_yesterday)/steps_yesterday)*100;

                    $("#dashboard-steps").text(steps_today);
                    $("#dashboard-steps-variation").text((steps_variation >= 0 ? "+ " : "") + steps_variation.toFixed(1) + " %");
                }
                else if(location == 'sleep'){
                    $("#dashboard-sleep").text(JSON.parse(localStorage[''+location+''])[0].time);
                }
            }
        </script>
    </body>
</html>