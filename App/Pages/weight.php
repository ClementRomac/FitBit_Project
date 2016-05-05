<html>
    <head>
        <title>FitiBit</title></colspan="2"d >
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/Pages/style.css">
        <script   src="../js/zepto.min.js"></script> 
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
                    <button id ="1" class="button-weight active-weight" onclick="changeWeightLocation('weight/week', 1)">Semaines</button>
                    <button id ="2" class="button-weight" onclick="changeWeightLocation('weight/month', 2)">Deux mois</button>
                    <button id ="3" class="button-weight" onclick="changeWeightLocation('weight/year', 3)">Années</button>
                </div>
                <div id="container_weight" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                <div id="container_imc" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>

        <script type="text/javascript">
        //var myLocation = "weight"; //default location
        getData("weight/week"); //get data for default location
        getData("imc"); //get data for default location

        function changeWeightLocation(newLocation, id){
            getData(newLocation);
            $('button').removeClass("active-weight");
            $('#'+id).addClass("active-weight")
        }

        function renderChart(location) {
            if(location == "weight/week" || location == "weight/month" || location == "weight/year"){
                renderWeight(location);
            }
            else if(location == "imc"){
                renderImc(location);
            }
        }

        function renderWeight(weightLocation){
            var weights = JSON.parse(localStorage[''+weightLocation+'']);
            var weights_length = Object.keys(weights).length - 1;

            var myCategories = [];
            for (var i = 0; i <= weights_length; i++) {
                myCategories[i] = weights[''+weights_length-i+''].date;
            };
            
            var myData = [];
            for (var i = 0; i <= weights_length; i++) {
                myData[i] = weights[''+weights_length-i+''].weight;
            };

            new Highcharts.Chart({
                chart : {
                  renderTo : 'container_weight'
                },
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

        function renderImc(imcLocation){
            var imc = (JSON.parse(localStorage[''+imcLocation+'']))[0].imc

            var gaugeOptions = {

                chart: {
                    type: 'solidgauge',
                    renderTo: 'container_imc'
                },

                title: null,

                pane: {
                    center: ['50%', '85%'],
                    size: '140%',
                    startAngle: -90,
                    endAngle: 90,
                    background: {
                        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
                        innerRadius: '60%',
                        outerRadius: '100%',
                        shape: 'arc'
                    }
                },

                tooltip: {
                    enabled: false
                },

                // the value axis
                yAxis: {
                    stops: [
                        [0, '#2980b9'], // green
                        [0.50, '#2ecc71'], // yellow
                        [0.60, '#f1c40f'], // yellow
                        [0.80, '#e74c3c'] // red
                    ],
                    lineWidth: 0,
                    minorTickInterval: null,
                    tickPixelInterval: 190,
                    tickWidth: 0,
                    title: {
                        y: -70
                    },
                    labels: {
                        y: 16
                    }
                },

                plotOptions: {
                    solidgauge: {
                        dataLabels: {
                            y: 5,
                            borderWidth: 0,
                            useHTML: true
                        }
                    }
                }
            };

            // The speed gauge
            new Highcharts.Chart(Highcharts.merge(gaugeOptions, {
                yAxis: {
                    min: 0,
                    max: 40,
                    title: {
                        text: 'IMC'
                    }
                },

                credits: {
                    enabled: false
                },

                series: [{
                    name: 'Speed',
                    data: [imc],
                    dataLabels: {
                        format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                            ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                               '<span style="font-size:12px;color:silver">IMC</span></div>'
                    },
                    tooltip: {
                        valueSuffix: ' IMC'
                    }
                }]

            }));
        }
        </script>
    </body>
</html>