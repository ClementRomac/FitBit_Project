<!DOCTYPE html>
<html lang="html">
    <head>
        <title>FitiBit</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/style.css">
        <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon"/>
        <script src="../js/zepto.min.js"></script> 
    </head>
    <body>
    <?php
    session_start();
    if (!isset($_SESSION['user']))
        header('Location: ../index.php');
    ?>
    <div class="chart-page-container">
        <header class="header-chart helpB">
            <a href="dashboard.php"><img src="../img/backW.png" class="img-back" alt="Retour" title="Retour"></a>
            <h1>Aide</h1>
            <img src="../img/infoW.png" class="img-moon" alt="Sommeil" title="Sommeil">
        </header>

        <div class="conteneur">

            <h2 class="helpC"> Aide </h2>

            <p>La police d'écriture Roboto et ses variantes appartiennent à Google.</p>
            <p>Les icônes suivantes sont à la propriété de leur créateurs :</p>
            <br>
            <p>Freepik :</p>
            <p>- Hamburger</p>
            <p>- Info</p>
            <p>- Weight</p>
            <p>- Feet</p>
            <p>- Avatar</p>
            <p>- Disconnected</p>
            <br>
            <p>Dave Gandy :</p>
            <p>- Moon</p>
            <br>
            <p>Gregor Cresnar :</p>
            <p>- Back</p>
            <br>
            <p>Graphique :</p>
            <p>- HighGraph</p>
        </div>
    </div> 
    </body>
</html>