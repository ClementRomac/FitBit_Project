/********************* CHARTS *********************/

function renderSleep(sleep_array, renderContainer){
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
            renderTo: renderContainer
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

function renderWalk(walk_array, renderContainer){
    var steps = JSON.parse(localStorage[''+walk_array['steps']+'']);
    var steps_length = Object.keys(steps).length - 1;
    var distance = JSON.parse(localStorage[''+walk_array['distance']+'']);
    var distance_length = Object.keys(distance).length - 1;

    var myCategories = [];
    for (var i = 0; i <= steps_length; i++) {
        myCategories[i] = steps[''+steps_length-i+''].date;
    };

    var stepsData = [];
    for (var i = 0; i <= steps_length; i++) {
        stepsData[i] = steps[''+steps_length-i+''].steps;
    };

    var distanceData = [];
    for (var i = 0; i <= distance_length; i++) {
        distanceData[i] = distance[''+distance_length-i+''].distance;
    };

    new Highcharts.Chart({
        chart: {
            renderTo: renderContainer
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
            data: distanceData,
            tooltip: {
                valueSuffix: ' Km'
            },

        }, {
            name: 'Nombre de pas',
            type: 'spline',
            data: stepsData
        }]
    });
}

function renderActivity(activityLocation, renderContainer){
    console.log(activityLocation)
    var activity_length = (activityLocation == "activity" ? 7 : (activityLocation == "activity/week" ? 4 : 12)) - 1;
    var activity = JSON.parse(localStorage[''+activityLocation+'']);

    var sedentary = [];
    for (var i = 0; i <= activity_length; i++) {
        sedentary[i] = activity[''+activity_length-i+''].time;
    };

    var mobile = [];
    for (var i = 0; i <= activity_length; i++) {
        mobile[i] = activity[''+((activity_length*2)+1)-i+''].time;
    };

    var active = [];
    for (var i = 0; i <= activity_length; i++) {
        active[i] = activity[''+((activity_length*3)+2)-i+''].time;
    };

    var very_active = [];
    for (var i = 0; i <= activity_length; i++) {
        very_active[i] = activity[''+((activity_length*4)+3)-i+''].time;
    };

    var calories = [];
    for (var i = 0; i <= activity_length; i++) {
        calories[i] = activity[''+((activity_length*5)+4)-i+''].time;
    };

    var myCategories = [];
    for (var i = 0; i <= activity_length; i++) {
        myCategories[i] = activity[''+activity_length-i+''].date;
    };
    
    new Highcharts.Chart({
        chart: {
            renderTo: renderContainer
        },
        title: {
            text: 'Calories'
        },
        xAxis: {
            categories: myCategories
        },
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value} Kj',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            title: {
                text: 'Calories perdues',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }
        }, { // Secondary yAxis
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
                text: 'Activité',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            opposite: true
        }],
        tooltip: {
            formatter: function () {
                var result = '<b>' + this.x + '</b>';
                $.each(this.points, function () {
                    result += '<br/><span style="color: '+this.series.color+';">' + this.series.name + ':</span> ';
                    data = this.y;
                    if(this.series.name != 'Calories perdues'){
                        var minutes = 0;
                        var heures = 0;
                        var data = Math.round(data*100)/100;

                        minutes = ((data%1)*60).toFixed(0);
                        heures = data-data%1;
                        if (heures == 0)
                            result += minutes+' min';
                        else
                            result += heures+' h '+minutes+' min';
                    }else{
                        result += data + ' Kj';
                    }
                });
                return result;
            },
            shared: true
        },
        series: [{
            type: 'column',
            name: 'Sedentaire',
            yAxis: 1,
            data: sedentary
        }, {
            type: 'column',
            name: 'Mobile',
            yAxis: 1,
            data: mobile
        }, {
            type: 'column',
            name: 'Active',
            yAxis: 1,
            data: active
        }, {
            type: 'column',
            name: 'Trés active',
            yAxis: 1,
            data: very_active
        }, {
            type: 'spline',
            name: 'Calories perdues',
            data: calories,
            lineColor: Highcharts.getOptions().colors[0],
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[0],
                fillColor: 'white'
            }
        }]
    });
}

function renderWeight(weightLocation, renderContainer){
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
          renderTo : renderContainer
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

function renderImc(imcLocation, renderContainer){
    var imc = (JSON.parse(localStorage[''+imcLocation+'']))[0].imc

    var gaugeOptions = {

        chart: {
            type: 'solidgauge',
            renderTo: renderContainer
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

/********************* FULL SCREEN *********************/

function fullScreenChart(location, container){
    if(container.path[4].className.baseVal != 'highcharts-legend'){
        var i = 0;
        if(typeof(location) == "object"){
            i = Object.keys(location).length - 1;
        }else{
            location = {"key" : location};
        }

        var input = "";
        for (j = 0; j <= i; j++) {
            var key = Object.keys(location)[j];
            input+= '<input type="text" name="'+key+'" value="'+location[key]+'"/>';
        };
        
        var form = $('<form action="fullScreenChart.php" method="post" style="display:none">'+input+'</form>');
        $('body').append(form);
        form.submit();
    }
}