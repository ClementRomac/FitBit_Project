<!DOCTYPE html>
<html>
    <head>
        <title>FitiBit</title></colspan="2"d >
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/Pages/style.css">
        <script   src="../js/zepto.min.js"></script> 
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
        <script type="text/javascript" src="../js/renderCharts.js"></script>
    </head>
<body>
    <div id="container_full_screen" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script type="text/javascript">
    var post_parameters = <?php echo json_encode($_POST); ?>;

    if(Object.keys(post_parameters)[0] == "sleep"){
        renderSleep(post_parameters, "container_full_screen");
    }
    else if(Object.keys(post_parameters)[0] == "steps"){
        renderWalk(post_parameters, "container_full_screen");
    }
    else{
        var chart_location = post_parameters[Object.keys(post_parameters)[0]];
        if(chart_location == "activity" || chart_location == "activity/week" || chart_location == "activity/month" ){
            renderActivity(chart_location, "container_full_screen");
        }
        else if(chart_location == "weight/week" || chart_location == "weight/month" || chart_location == "weight/year"){
            renderWeight(chart_location, "container_full_screen");
        }
    }
</script>
</body>
</html>