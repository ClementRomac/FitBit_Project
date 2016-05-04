<script src="https://code.highcharts.com/highcharts.js"></script>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<?php 
// Jour
?>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Calories'
        },
        xAxis: {
            categories: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche']
        },
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value} Kj',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            title: {
                text: 'Calories',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }
        }, { // Secondary yAxis
            labels: {
                format: '{value} min',
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
        series: [{
            type: 'column',
            name: 'Sedentaire',
            data: [3, 2, 1, 3, 4, 2, 3]
        }, {
            type: 'column',
            name: 'Mobile',
            data: [2, 3, 5, 7, 6, 3, 4]
        }, {
            type: 'column',
            name: 'Active',
            yAxis: 1,
            data: [4, 3, 3, 9, 0, 3, 5]
        }, {
            type: 'column',
            name: 'Trés active',
            data: [4, 3, 3, 9, 0, 3, 5]
        }, {
            type: 'spline',
            name: 'Calories',
            data: [3, 2.67, 3, 6.33, 3.33, 6, 3],
            lineColor: Highcharts.getOptions().colors[0],
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[0],
                fillColor: 'white'
            }
        }]
    });
});


</script>
<?php 
// Semaine
?>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Calories'
        },
        xAxis: {
            categories: ['S-3', 'S-2', 'S-1', 'Cette semaine']
        },
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value} Kj',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            title: {
                text: 'Calories',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }
        }, { // Secondary yAxis
            labels: {
                format: '{value} min',
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
        series: [{
            type: 'column',
            name: 'Sedentaire',
            data: [3, 2, 1, 3]
        }, {
            type: 'column',
            name: 'Mobile',
            data: [2, 3, 5, 7]
        }, {
            type: 'column',
            name: 'Active',
            yAxis: 1,
            data: [4, 3, 3, 9]
        }, {
            type: 'column',
            name: 'Trés active',
            data: [4, 3, 3, 9]
        }, {
            type: 'spline',
            name: 'Calories',
            data: [3, 2.67, 3, 6.33],
            lineColor: Highcharts.getOptions().colors[0],
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[0],
                fillColor: 'white'
            }
        }]
    });
});
</script>
<?php 
// Mois
?>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Calories'
        },
        xAxis: {
            categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre']
          },
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value} Kj',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            title: {
                text: 'Calories',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }
        }, { // Secondary yAxis
            labels: {
                format: '{value} min',
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
        series: [{
            type: 'column',
            name: 'Sedentaire',
            data: [3, 2, 1, 3, 4, 2, 3, 5, 7, 6, 10, 5]
        }, {
            type: 'column',
            name: 'Mobile',
            data: [2, 3, 5, 7, 6, 3, 4, 2, 3, 5, 7, 2]
        }, {
            type: 'column',
            name: 'Active',
            yAxis: 1,
            data: [4, 3, 3, 9, 0, 3, 5, 7, 6, 3, 4, 2]
        }, {
            type: 'column',
            name: 'Trés active',
            data: [4, 3, 3, 9, 0, 3, 5, 7, 6, 3, 4, 2]
        }, {
            type: 'spline',
            name: 'Calories',
            data: [3, 2.67, 3, 6.33, 3.33, 6, 3, 4, 2, 3, 5, 7],
            lineColor: Highcharts.getOptions().colors[0],
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[0],
                fillColor: 'white'
            }
        }]
    });
});


</script>