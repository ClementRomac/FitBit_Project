<html>
    <head>
        
        <title>FitiBit</title></colspan="2"d >
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/Pages/dashboard.css">
    
    </head>
    <body>
    <?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ../index.html');
    }
    ?>
        <div id="header">
            <h1>Tableau de bord</h1>
        </div>
        <div class="date"> <script type="text/javascript" src="../js/time.js"></script> </div>
        <div id="small-tile">
            <a href="weight.php">
                <div class="squarre-1"><img src="../maquettes/sprite/icon.png" class="img-squarre">
                    <div class="text-1"> 90 Kg </div>
                    <div class="text-1-2"> Poids </div>
                </div>
            </a>
            <a href="walk.php">
                <div class="squarre-2"><img src="../maquettes/sprite/footsteps-silhouette-variant.png" class="img-squarre">
                    <div class="text-2"> 852 </div>
                    <div class="text-2-2"> + 8.5 % </div>
                </div>
            </a>
        </div>
        <a href="Sleep.php">
            <div id="large-tile">
                <div class="rectangle"><img src="../maquettes/sprite/night.png" class="img-rectangle">
                <div class="text-3"> Sommeil </div>
                <div class="text-3-2"> 6h 52min </div>  
                <div class="text-3-3"> 8.5/10 </div>
                </div>
            </div>
        </a>
    </body>
</html>