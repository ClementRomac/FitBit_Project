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
	$stt = $pdo->select(array('round(weight, 1) AS weight'))->from('WeightDay')->orderBy('date', 'DESC')->limit(1)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});

$app->get('/weight/week', function ($request, $response, $args) {
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

/******* SLEEP *******/

$app->get('/sleep', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('date', 'label', 'time'))->from('SleepDay')->orderBy('date', 'DESC')->limit(8)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});

$app->get('/sleep/month', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('date', 'label', 'time'))->from('SleepMonth')->orderBy('date', 'DESC')->limit(6)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});

$app->get('/sleep/week', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('date', 'label', 'time'))->from('SleepWeek')->orderBy('date', 'DESC')->limit(6)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});


/******* Eveil *******/

$app->get('/awake', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('date', 'label', 'time'))->from('AwakeDay')->orderBy('date', 'DESC')->limit(8)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});

$app->get('/awake/month', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('date', 'label', 'time'))->from('AwakeMonth')->orderBy('date', 'DESC')->limit(6)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});

$app->get('/awake/week', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('date', 'label', 'time'))->from('AwakeWeek')->orderBy('date', 'DESC')->limit(6)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});

/******* STEPS *******/

$app->get('/steps', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('date', 'steps'))->from('StepsDay')->orderBy('date', 'DESC')->limit(7)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});

$app->get('/steps/week', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('date', 'steps'))->from('StepsWeek')->orderBy('date', 'DESC')->limit(4)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});

$app->get('/steps/month', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('date', 'steps'))->from('StepsMonth')->orderBy('date', 'DESC')->limit(12)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});

/******* DISTANCE *******/

$app->get('/distance', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('date', 'round(distance, 1) AS distance'))->from('DistanceDay')->orderBy('date', 'DESC')->limit(7)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});

$app->get('/distance/week', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('date', 'round(distance, 1) AS distance'))->from('DistanceWeek')->orderBy('date', 'DESC')->limit(4)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});

$app->get('/distance/month', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select(array('date', 'round(distance, 1) AS distance'))->from('DistanceMonth')->orderBy('date', 'DESC')->limit(12)->execute();
	$json = $stt->fetchAll(PDO::FETCH_ASSOC);

	$json_response = json_encode($json);
	return $response->write($json_response);

});


// Run app
$app->run();