<?php
    //cabeçalhos da página
    header("Content-Type:application/json");
    header("charset=utf-8");
    //inclui o db.php
    include 'db.php';
    //variavel para verificar o metodo de requisicao
    $method = $_SERVER['REQUEST_METHOD'];
    //variavel para pegar os dados enviados na
    //requisicao
    $input = json_decode(
        file_get_contents('php://input'), true,
        JSON_UNESCAPED_UNICODE);
    //switch para verificar o metodo requisitado
    switch($method){
        case 'GET':
            if(isset($_GET['idProd'])){
                handleGetFiltroID($pdo);
            }else{
                handleGet($pdo);
            }
            break;
        default:
            echo json_encode(['message'=>
            'Método inválido'], 
            JSON_UNESCAPED_UNICODE);
            break;
    }
    //trazer todos os produtos
    function handleGet($pdo){
        //consulta para trazer tudo
        $sql = "SELECT * FROM tblProdutos";
        //prepara a execucao do sql
        $stmt = $pdo->prepare($sql);
        //executa a consulta
        $stmt->execute();
        //coloca o resultado em um vetor
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //exibe os dados na tela em json
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    // traz os produtos com filtro pelo ID
    function handleGetFiltroID($pdo){
        // variavel para o filtro do ID
        $filtro = $_GET['idProd'];
        // sql para consultar com o filtro do ID
        $sql = "SELECT * FROM tblProdutos WHERE idProd='$filtro'";
        // prepara a execução
        $stmt = $pdo->prepare($sql);
        // executa o sql
        $stmt->execute();
        //recebe os dados vindos da consulta
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //exibe os resultados em json
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
?>
