<?php
    //cabeçalhos da página
    header("Content-Type:application/json");
    header("charset=utf-8");
    //chama o db.pbp
    include 'db.php';
    //variavel para o metodo
    $method = $_SERVER['REQUEST_METHOD'];
    //variavel para o input de dados
    $input = json_decode(
        file_get_contents('php://input'), true,
        JSON_UNESCAPED_UNICODE);
    //switch para verificar o metodo
    switch($method){
        case 'POST':
            if(isset($_POST['emailUser'])&& 
                isset($_POST['senhaUser'])){
                    consultaUser($pdo);
                }
            break;
        }
    //função para consultar o usuario
    function consultaUser($pdo){
        //pega os dados do usuario
        $emailUser = $_POST['emailUser'];
        $senhaUser = $_POST['senhaUser'];
        //cria o sql para a consulta
        $sql = "SELECT * FROM tblUsers WHERE
         emailUser like '%$emailUser%' AND
         senhaUser = $senhaUser";
        //prepara a execução
        $stmt = $pdo->prepare($sql);
        //executa a consulta
        $stmt->execute();
        //recebe os dados da consulta
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //exibe em json
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
