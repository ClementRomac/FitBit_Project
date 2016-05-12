<!DOCTYPE html>
<html lang="html">
    <head>
        <title>FitiBit</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/style.css">
        <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon"/>
        <script src="../js/zepto.min.js"></script> 
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
        <script type="text/javascript" src="../js/renderCharts.js"></script>
    </head>
<body class="bg_custom">
    <?php
    session_start();
    if (!isset($_SESSION['user']))
        header('Location: ../index.php');
    if(empty($_POST)) 
        header('Location: dashboard.php');
    ?>
    <a><div class="img-back"><img src="../img/backB.png" alt="back" alt="Retour" title="Retour"> <span>Retour</span></div></a>
    <div id="container_full_screen" class="center" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script type="text/javascript">
    var post_parameters = <?php echo json_encode($_POST); ?>;
    if(Object.keys(post_parameters)[0] == "sleep"){
        renderSleep(post_parameters, "container_full_screen");
        $('a').attr('href', 'sleep.php');
    }
    else if(Object.keys(post_parameters)[0] == "steps"){
        renderWalk(post_parameters, "container_full_screen");
        $('a').attr('href', 'walk.php');
    }
    else{
        var chart_location = post_parameters[Object.keys(post_parameters)[0]];
        if(chart_location == "activity" || chart_location == "activity/week" || chart_location == "activity/month" ){
            renderActivity(chart_location, "container_full_screen");
            $('a').attr('href', 'walk.php');
        }
        else if(chart_location == "weight/week" || chart_location == "weight/month" || chart_location == "weight/year"){
            renderWeight(chart_location, "container_full_screen");
            $('a').attr('href', 'weight.php');
        }
        else{
            window.location.replace('dashboard.php');
        }
    }
</script>
</body>
</html>