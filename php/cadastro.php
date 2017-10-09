<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 07/10/2017
 * Time: 14:48
 */

if (file_exists('../../settings_mysql.php')) {
    include '../../settings_mysql.php';
    $json['fileExists'] = "Arquivo encontrado";


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
        //echo 'Conectado ao mysql';
    } catch (PDOException $e) {
        $code = $e->getCode();
        $message = $e->getMessage();
        echo '<h2 style="color: red;font-weight: bold">Não foi possivel se conectar ao banco de dados</h2><br>';
        echo $code . '<br/>';
        echo $message . '<br/>';
        exit;
    }
    $nome = filter_input(INPUT_POST, 'fullName');
    $whatsapp = filter_input(INPUT_POST, 'whatsApp');
    $email = filter_input(INPUT_POST, 'email');

    $pdo->beginTransaction();

    $stmtAddUser = $pdo->prepare("INSERT INTO usuarios (nome, whatsapp, email) VALUES ( :nome, :whatsapp, :email)");

    $stmtAddUser->bindParam(":nome", $nome, PDO::PARAM_STR);
    $stmtAddUser->bindParam(":whatsapp", $whatsapp, PDO::PARAM_STR);
    $stmtAddUser->bindParam(":email", $email, PDO::PARAM_STR);

    $stmtAddUser->execute();
    $json['lastId'] = $pdo->lastInsertId();
    $pdo->commit();


    $json['nome'] = $nome;
    $json['whatsapp'] = $whatsapp;
    $json['email'] = $email;
    echo json_encode($json);

} elseif (!file_exists('../../settings_mysql.php')) {
    $json['fileExists'] = "file settings_mysql not found";
    echo json_encode($json);
}
