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

$app->get('/kelompok3/{name}', function ($request, $response, $args) {
    echo 'Hai ' . $args['name'];
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
$app->get('/home', function ($request, $response){
    return $this->renderer->render($response, '/vhome.php', array("nama"=>"Dhaniel","nim"=>"67201510"));
});


//CRUD
function DBConnection(){
	return new PDO('mysql:dbhost=localhost;dbname=db_mahasiswa', 'root', '');
}

//READ
$app->get('/show', function ($request, $response, $args){
	echo json_encode(DBConnection()->query("select * from mahasiswa")->fetchAll());
});
$app->get('/tabel', function ($request, $response){
    return $this->renderer->render($response, '/vtabel.php');
});

//DELETE
$app->delete('/hapus/{nim}', function ($request, $response, $args) {
	DBConnection()->exec("delete from mahasiswa where nim = '".$args['nim']."';");
	echo('Data berhasil dihapus !');
	echo('<br/><a href="http://slimframeworkcrud/tabel">back</a>');
});
$app->get('/hapus/{nim}', function ($request, $response, $args) {
	DBConnection()->exec("delete from mahasiswa where nim = '".$args['nim']."';");
	echo('Data berhasil dihapus !');
	echo('<br/><a href="http://slimframeworkcrud/tabel">back</a>');
});
$app->post('/hapus/{nim}', function ($request, $response, $args) {
	DBConnection()->exec("delete from mahasiswa where nim = '".$args['nim']."';");
	echo('Data berhasil dihapus !');
	echo('<br/><a href="http://slimframeworkcrud/tabel">back</a>');
});

//INSERT
$app->post('/insert', function ($request, $response, $args) {
	$nim = $request->getParam('nim');
	$nama = $request->getParam('nama');
	DBConnection()->exec("insert into mahasiswa values('".$nim."','".$nama."');");
	echo('Data berhasil diinsert !');
	echo('<br/><a href="http://slimframeworkcrud/forminsert">back</a>');
});
$app->get('/forminsert', function ($request, $response){
    return $this->renderer->render($response, '/vinsert.php');
});

//UPDATE
$app->put('/update/{nim}', function ($request, $response, $args) {
	$nama = $request->getParam('nama');
	DBConnection()->exec("update mahasiswa set nama = '".$nama."' where nim = '".$args['nim']."';");
	echo('Data berhasil diupdate !');
	echo('<br/><a href="http://slimframeworkcrud/tabel">back</a>');
});
$app->get('/update/{nim}', function ($request, $response, $args) {
	$nama = $request->getParam('nama');
	DBConnection()->exec("update mahasiswa set nama = '".$nama."' where nim = '".$args['nim']."';");
	echo('Data berhasil diupdate !');
	echo('<br/><a href="http://slimframeworkcrud/tabel">back</a>');
});
$app->post('/update/{nim}', function ($request, $response, $args) {
	$nama = $request->getParam('nama');
	DBConnection()->exec("update mahasiswa set nama = '".$nama."' where nim = '".$args['nim']."';");
	echo('Data berhasil diupdate !');
	echo('<br/><a href="http://slimframeworkcrud/tabel">back</a>');
});

$app->get('/formupdate', function ($request, $response){
    return $this->renderer->render($response, '/vupdate.php');
});

$app->run();
?>