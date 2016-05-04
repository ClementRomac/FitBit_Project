<html>
    <head>
        <title>FitiBit</title></colspan="2"d >
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/Pages/style.css">
    </head>
    <body>
    <?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ../index.html');
    }
    ?>
        <div id="header-sleep">
            <a href="Dashboard.php"><img src="../maquettes/sprite/back.png" class="img-back"></a>
            <h1>Qualitée de Sommeil</h1>
            <img src="../maquettes/sprite/nightW.png" class="img-moon">
        </div>
        <div id="conteneur">
            <h2 class="h-sleep"> Aujourd'hui </h2>
            <p><span class="span-1-1">Dormir pendant : </span><span class="span-1-2"> 6h 52min </span></p>
            <p><span class="span-2-1">Qualité de sommeil : </span><span class="span-2-2"> Bon | 8.5/10 </span></p>
            <h3 class="h-sleep"><span class="span-3">Graphique </span></h3>
            <div>
                <input type="button" value="Jours" class="button-sleep">
                <input type="button" value="Semaines" class="button-sleep">
                <input type="button" value="Mois" class="button-sleep">
            </div>
        </div>
        
    </body>
</html>