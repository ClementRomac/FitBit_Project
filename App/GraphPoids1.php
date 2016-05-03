<script src="https://code.highcharts.com/highcharts.js"></script>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<?php 
//Sommeil * Jour
?>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Poids',
            x: -20 //center
        },
        xAxis: {
            categories: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche',]
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
            valueSuffix: 'h'
        },
        series: [{
            name: 'Poids',
            data: [7.0, 6.9, 9.5, 14.5, 7.0, 6.9, 9.5]
        }]
    });
});
</script>
<?php 
//Sommeil * 8 Semaines
?>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Poids',
            x: -20 //center
        },
        xAxis: {
         		categories: ['S-7', 'S-6', 'S-5', 'S-4', 'S-3', 'S-2', 'S-1', 'Cette semaine']
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
            valueSuffix: 'h'
        },
        series: [{
            name: 'Poids',
            data: [7.0, 6.9, 9.5, 14.5, 7.0, 6.9, 9.5, 9.5]
        }]
    });
});
</script>
<?php 
//Sommeil * année
?>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Poids',
            x: -20 //center
        },
        xAxis: {
         		categories: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre']
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
            valueSuffix: 'h'
        },
        series: [{
            name: 'Poids',
            data: [7.0, 6.9, 9.5, 14.5, 7.0, 6.9, 9.5,7.0, 6.9, 9.5, 14.5, 7.0]
        }]
    });
});
</script>