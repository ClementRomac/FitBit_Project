<?php
require_once 'vendor/autoload.php';

// Create and configure Slim app
$app = new \Slim\App;

// Cross Request
$corsOptions = array(
    "origin" => "*",
    "exposeHeaders" => array("Content-Type", "X-Requested-With", "X-authentication", "X-client"),
    "allowMethods" => array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS')
);
$cors = new \CorsSlim\CorsSlim($corsOptions);
$app->add($cors);

// BDD
$pdo = new \Slim\PDO\Database('mysql:host=mysql-fitbitproject.alwaysdata.net;dbname=fitbitproject_bdd','122417_root','password');

// Get container
$container = $app->getContainer();

// Define app routes

$app->get('/', function ($request, $response, $args) {
 	return $response->write("SLIM OK");
});

$app->get('/weight', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('date', 'round(weight, 2) AS weight'))->from('Weight_Weeks')->orderBy('date', 'DESC')->limit(8)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);


	/*$json = array();
	for ($i=1; $i < 11; $i++) { 
		$json[$i] = array('date' => $i.'-'.$i.'-2016', 'weight'=> 60+rand($i, 10));
	}*/

	$json_response = json_encode($json);
	return $response->write($json_response);

});


// Run app
$app->run();