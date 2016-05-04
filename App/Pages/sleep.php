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
        <header class="sleep">
            <a href="Dashboard.php"><img src="../maquettes/sprite/back.png" class="img-back"></a>
            <h1>Qualitée de Sommeil</h1>
            <img src="../maquettes/sprite/nightW.png" class="img-moon">
        </header>

        <div id="conteneur">

            <h2> Aujourd'hui </h2>

                <p>Dormir pendant : <span class="space"></span> 6h 52min </p>
                <p>Qualité de sommeil : <span class="space"></span> Bon | 8.5/10</p>

            <h2>Graphique </h2>

                <div>
                    <button class="button-sleep active-sleep" onclick="changeLocation('weight')" >Semaines</button>
                    <button class="button-sleep" onclick="changeLocation('weight/month')">Deux mois</button>
                    <button class="button-sleep" onclick="changeLocation('weight/year')">Années</button>
                </div>
        </div>
        
    </body>
</html>