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

        <header class="weight">
            <a href="Dashboard.php"><img src="../maquettes/sprite/back.png" class="img-back"></a>
            <h1>Poids</h1>
            <img src="../maquettes/sprite/iconW.png" class="img-moon">
        </header>


        <div id="conteneur">

            <h2>Aujourd'hui</h2>
                <p>Dormir pendant :<span class="space"></span>6h 52min</p>
                <p>Qualité de sommeil :<span class="space"></span>Bon | 8.5/10</p>

            <h2>Graphique</h2>

                <div>
                    <button class="button-weight active-weight" onclick="changeLocation('weight')">Semaines</button>
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