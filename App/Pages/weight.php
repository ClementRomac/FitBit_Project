<html>
    <head>
        <title>FitiBit</title></colspan="2"d >
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/Pages/style.css">
        <script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script type="text/javascript" src="../js/callAPI.js"></script>
    </head>
    <body>
    <?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ../index.html');
    }
    ?>
        <div id="header-weight">
            <a href="Dashboard.php"><img src="../maquettes/sprite/back.png" class="img-back"></a>
            <h1>Comment t'es gros wesh</h1>
            <img src="../maquettes/sprite/iconW.png" class="img-moon">
        </div>
        <div id="conteneur">
            <h2 class="h-weight"> Aujourd'hui </h2>
            <p><span class="span-1-1">Dormir pendant : </span><span class="span-1-2"> 6h 52min </span></p>
            <p><span class="span-2-1">Qualité de sommeil : </span><span class="span-2-2"> Bon | 8.5/10 </span></p>
            <h3 class="h-weight"><span class="span-3">Graphique </span></h3>
            <div>
                <button class="button-weight" onclick="changeLocation('weight')">Semaines</button>
                <button class="button-weight" onclick="changeLocation('weight/month')">Deux mois</button>
                <button class="button-weight" onclick="changeLocation('weight/year')">Années</button>
            </div>
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>

        <script type="text/javascript">
        var myLocation = "weight";
        getData(myLocation);

        function changeLocation(newLocation){
            myLocation = newLocation;
            getData(myLocation);
        }

        function renderChart() {
            var weights = JSON.parse(localStorage[''+myLocation+'']);
            var weights_length = Object.keys(weights).length - 1;

            var myCategories = [];
            for (var i = 0; i <= weights_length; i++) {
                myCategories[i] = weights[''+weights_length-i+''].date;
            };
            
            var myData = [];
            for (var i = 0; i <= weights_length; i++) {
                myData[i] = weights[''+weights_length-i+''].weight;
            };

            $('#container').highcharts({
                title: {
                    text: 'Poids',
                    x: -20 //center
                },
                xAxis: {
                    categories: myCategories
                },
                yAxis: {
                    title: {
                        text: 'Poids (Kg)'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: ' Kg'
                },
                series: [{
                    name: 'Poids',
                    data: myData
                }]
            });
        }
        </script>
    </body>
</html>