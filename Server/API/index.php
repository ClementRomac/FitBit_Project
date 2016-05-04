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

	/******* WEIGHT *******/
$app->get('/weight', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('date', 'round(weight, 1) AS weight'))->from('WeightWeek')->orderBy('date', 'DESC')->limit(8)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});

$app->get('/weight/month', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('date', 'round(weight, 1) AS weight'))->from('WeightTwoMonth')->orderBy('date', 'DESC')->limit(6)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});

$app->get('/weight/year', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('date', 'round(weight, 1) AS weight'))->from('WeightYear')->orderBy('date', 'DESC')->limit(6)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});

/******* IMC *******/
$app->get('/imc', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('round(imc, 2) AS imc'))->from('Imc')->orderBy('date', 'DESC')->limit(1)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});



// Run app
$app->run();