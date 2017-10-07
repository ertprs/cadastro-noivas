<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 07/10/2017
 * Time: 14:48
 */

try {
    $pdo = new PDO('mysql:host=177.85.101.50:3306;dbname=blogmoda_noivasn;charset=utf8', 'blogmoda_noivas_news', 'LZc})&_}+yp9');
} catch (PDOException $e) {
    $code = $e->getCode();
    $message = $e->getMessage();
    echo 'Não foi possivel se conectar ao banco de dados';
    echo $code . '<br/>';
    echo $message . '<br/>';
    exit;
}


$sql = "INSERT INTO usuarios (nome, whatsapp, email) VALUES (':nome',':whatsapp',':email')";

$nome = filter_input(INPUT_POST, 'nome');
$whatsapp = filter_input(INPUT_POST, 'whatsapp');
$email = filter_input(INPUT_POST, 'email');

/*$stmt = $pdo->prepare($sql);
  $result->execute();
*/