<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 07/10/2017
 * Time: 14:48
 */

//var_dump($_POST);

include '../../settings_mysql.php';

try {
    $pdo = new PDO(
        sprintf(
            'mysql:host=%s;dbname=%s;port=%s;charset=%s',
            $settings['host'],
            $settings['name'],
            $settings['port'],
            $settings['charset']
        ),
        $settings['username'],
        $settings['password']
    );
    echo 'Conectado ao mysql';
} catch (PDOException $e) {
    $code = $e->getCode();
    $message = $e->getMessage();
    echo '<h2 style="color: red;font-weight: bold">Não foi possivel se conectar ao banco de dados</h2><br>';
    echo $code . '<br/>';
    echo $message . '<br/>';
    exit;
}

$pdo->beginTransaction();

$stmtAddUser = $pdo->prepare("INSERT INTO usuarios (nome, whatsapp, email) VALUES (:nome,:whatsapp,:email)");

$nome = filter_input(INPUT_POST, 'fullName');
$whatsapp = filter_input(INPUT_POST, 'whatsApp');
$email = filter_input(INPUT_POST, 'email');

$json = $nome . ' - ' . $whatsapp . ' - ' . $email;
echo json_encode($json);

$stmtAddUser->bindValue(':nome',$nome);
$stmtAddUser->bindValue(':whatsapp',$whatsapp);
$stmtAddUser->bindValue(':email',$email);

$stmtAddUser->execute();

$pdo->commit();