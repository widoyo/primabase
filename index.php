<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

require 'vendor/autoload.php';
 
$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);
$app->get('/', function () {
	echo '672015210';
});

$app->get('/kelompok1', function () {
	echo 'Hai dhnchrs';
});

$app->get('/kelompok2/:id', function ($id) {
	echo 'Hai '.$id;
});

$app->get('/kelompokForm', function () {
	echo '
		<form method = "POST">
			<table>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="nama"/></td>
				</tr>
				<tr>
					<td>NIM</td>
					<td>:</td>
					<td><input type="text" name="nim"/></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" value="kirim"/></td>
				</tr>
			</table>
		</form>
	';
});

$app->post('/kelompokForm', function () {
	echo '<pre>', print_r($_POST), '</pre>';
});

$container = $app->getContainer();
$container['renderer'] = new PhpRenderer('./templates');
$app->get('/home', function (Request $request, Response $response){
    return $this->renderer->render($response, '/vhome.php', array("nama"=>"Dhaniel","nim"=>"67201510"));
});


//CRUD
function DBConnection(){
	return new PDO('mysql:dbhost=localhost;dbname=db_mahasiswa', 'root', '');
}
//READ
$app->get('/show', function()use($app){
	$db = DBConnection();
	$result = $db->query("select * from mahasiswa")->fetchAll();
	echo json_encode($result);
});
$app->get('/tabel', function (Request $request, Response $response){
    return $this->renderer->render($response, '/vtabel.php');
});
//DELETE
$app->delete('/hapus/:nim', function($nim)use($app) {
	echo DBConnection()->exec("delete from mahasiswa where nim = '$nim';");
});
//INSERT
$app->post('/insert', function()use($app){
	echo DBConnection()->exec("insert into mahasiswa values('".$app->request->post('nama', 'nim')."');");
});
//UPDATE
$app->put('/update/:nim',  function($nim)use($app){
	echo DBConnection()->exec("update mahasiswa set nim = '".$app->request->post('nama')."' where nim = '$nim';");
});

$app->run();
?>