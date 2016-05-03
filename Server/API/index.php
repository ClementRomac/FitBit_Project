<?php
require_once 'vendor/autoload.php';

// Create and configure Slim app
$app = new \Slim\App;
$pdo = new \Slim\PDO\Database('mysql:host=mysql-fitbitproject.alwaysdata.net;dbname=fitbitproject_bdd','122417_root','password');

// Get container
$container = $app->getContainer();

// Define app routes

$app->get('/', function ($request, $response, $args) {
	// global $pdo;
	// $stt = $pdo->select()->from('jeu_video')->execute();
	// $jeux = $stt->fetchAll(PDO::FETCH_OBJ);
// 	$rows = array('<table');
// 	$rows[] = '<tr><th>ID</th><th>Nom</th></tr>';
// 	while ($rw = $stt->fetch(PDO::FETCH_OBJ)){
// 		$rows[] = '<tr><td>'.$rw->ID.'</td><td><a href=jeux/'.$rw->ID.'>'.$rw->nom.'</a></td></tr>';
// 	}
// 	$rows[] = '</table>';
// 	$content = file_get_contents("pages/jeu.html");
// 	$content = str_replace('{{jeux}}', implode(PHP_EOL, $rows), $content);
 	return $response->write("SLIM OK");
});

$app->get('/jeux/{id}', function ($request, $response, $args) {
	global $pdo;
	$stt = $pdo->select()->from('jeu_video')->where('id', '=', $args['id'])->execute();
	$jeu = $stt->fetch(PDO::FETCH_OBJ);
	return $this->view->render($response, 'jeu.html', [
			'jeu' => $jeu
	]);
});


// Run app
$app->run();