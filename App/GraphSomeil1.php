<script src="https://code.highcharts.com/highcharts.js"></script>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<?php 
//Sommeil *Jour
?>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Sommeil'
        },
        xAxis: [{
          categories: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
          crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Heure sommeil',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value} h',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }

        }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Eveil',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: '{value} min',
                style: {
                    color: Highcharts.getOptions().colors[1]
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
            x: 80,
            verticalAlign: 'top',
            y: 55,
            floating: true,
        },
        series: [{
            name: 'Sommeil',
            type: 'spline',
            yAxis: 1,
            data: [7.0, 6.9, 9.5, 14.5, 7.0, 6.9, 9.5],
            tooltip: {
                valueSuffix: ' h'
            }

        },  {
            name: 'Eveil',
            type: 'spline',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2],
            tooltip: {
                valueSuffix: ' min'
            }
        }]
    });
});
</script>
<?php 
//Sommeil *Semaine
?>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Sommeil'
        },
        xAxis: [{
          categories: ['S-3', 'S-2', 'S-1', 'Cette semaine'],
          crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Heure sommeil',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value} h',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }

        }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Eveil',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: '{value} min',
                style: {
                    color: Highcharts.getOptions().colors[1]
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
            x: 80,
            verticalAlign: 'top',
            y: 55,
            floating: true,
        },
        series: [{
            name: 'Sommeil',
            type: 'spline',
            yAxis: 1,
            data: [7.0, 6.9, 9.5, 14.5],
            tooltip: {
                valueSuffix: ' h'
            }

        },  {
            name: 'Eveil',
            type: 'spline',
            data: [14.5, 18.2, 21.5, 25.2],
            tooltip: {
                valueSuffix: ' min'
            }
        }]
    });
});
</script>
<?php 
//Sommeil *Moi
?>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Sommeil'
        },
        xAxis: [{
          categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
          crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Heure sommeil',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value} h',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }

        }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Eveil',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: '{value} min',
                style: {
                    color: Highcharts.getOptions().colors[1]
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
            x: 80,
            verticalAlign: 'top',
            y: 55,
            floating: true,
        },
        series: [{
            name: 'Sommeil',
            type: 'spline',
            yAxis: 1,
            data: [7.0, 6.9, 9.5, 14.5, 7.0, 6.9, 9.5,7.0, 6.9, 9.5, 14.5, 7.0],
            tooltip: {
                valueSuffix: ' h'
            }

        },  {
            name: 'Eveil',
            type: 'spline',
            data: [14.5, 18.2, 21.5, 25.2,7.0, 6.9, 9.5, 14.5, 7.0, 6.9, 9.5,7.0],
            tooltip: {
                valueSuffix: ' min'
            }
        }]
    });
});
</script>