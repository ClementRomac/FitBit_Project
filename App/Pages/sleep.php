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
                    <button id="1" class="button-sleep active-sleep" onclick="changeSleepLocation('sleep', 1)" >Jours</button>
                    <button id="2" class="button-sleep" onclick="changeSleepLocation('sleep/week', 2)">Semaines</button>
                    <button id="3" class="button-sleep" onclick="changeSleepLocation('sleep/month', 3)">Mois</button>
                </div>
				<a href="graph.php"><div id="container_sleep" style="min-width: 310px; height: 400px; margin: 0 auto"></div></a>
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
                myCategories[i] = awake[''+sleep_length-i+''].date;
            };
            
            var sleepData = [];
            for (var i = 0; i <= sleep_length; i++) {
                sleepData[i] = sleep[''+sleep_length-i+''].time;
            };
            var awakeData = [];
            for (var i = 0; i <= awake_length; i++) {
                awakeData[i] = awake[''+awake_length-i+''].time;
            };
            var test = 0;
            new Highcharts.Chart({
                chart: {
                    renderTo: 'container_sleep'
                },
                title: {
                    text: 'Temps de sommeil / Eveil'
                },
                xAxis: [{
                    categories: myCategories,
                crosshair: true
                }],
                yAxis: [{ // Primary yAxis
                    labels: {
                        formatter: function () {
                            var result = 0;
                            var minutes = 0;
                            var heures = 0;
                            minutes = ((this.value%1)*60).toFixed(0);
                            heures = this.value-this.value%1;
                            
                            if (heures == 0)
                                if (minutes == 0 || minutes == 1)
                                    result = minutes+' minute';
                                else
                                    result = minutes+' minutes';
                            else if (minutes == 0)
                                if (heures == 0 || heures == 1)
                                result = heures+' heure';
                                else
                                result = heures+' heures';
                            else
                                result = heures+' h '+minutes+' min';

                        return result;
                        },
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Sommeil',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }, { // Secondary yAxis
                    title: {
                        text: 'Eveil',
                        style: {
                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    labels: {
                        formatter: function () {
                            var result = 0;
                            var minutes = 0;
                            var heures = 0;
                            minutes = ((this.value%1)*60).toFixed(0);
                            heures = this.value-this.value%1;
                            
                            if (heures == 0)
                                if (minutes == 0 || minutes == 1)
                                    result = minutes+' minute';
                                else
                                    result = minutes+' minutes';
                            else if (minutes == 0)
                                if (heures == 0 || heures == 1)
                                    result = heures+' heure';
                                else
                                    result = heures+' heures';
                            else
                                result = heures+' h '+minutes+' min';

                        return result;
                        },
                        style: {
                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    opposite: true
                }],
		        tooltip: {
		            formatter: function () {
		                var result = '<b>' + this.x + '</b>';
		                $.each(this.points, function () {
		                	var minutes = 0;
		                	var heures = 0;
	                		var data = Math.round(this.y*100)/100;
	                		minutes = ((data%1)*60).toFixed(0);
							heures = data-data%1;
	                    	result += '<br/><span style="color: '+this.series.color+';">' + this.series.name + ':</span> ';
			            	if (heures == 0)
			            		result += minutes+' min';
			            	else
			            		result += heures+' h '+minutes+' min';
		                });
		                return result;
		            },
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
                    name: 'Eveil',
                    type: 'column',
                    yAxis: 1,
                    data: awakeData
                }, {
                    name: 'Sommeil',
                    type: 'spline',
                    data: sleepData
                }]
            });
        }
        </script>
    </body>
</html>