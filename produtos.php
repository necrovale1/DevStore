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
            }else if(isset($_GET['categoriaProd'])){
                handleGetFiltroCategoria($pdo);
            }else{
                handleGet($pdo);
            }
            break;
        case 'POST':
            handlePost($pdo, $input);
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
        echo json_encode($result, 
            JSON_UNESCAPED_UNICODE);
    }
    //traz os produtos com filtro pelo ID
    function handleGetFiltroID($pdo){
        //variavel para o filtro pelo id
        $filtro = $_GET['idProd'];
        //sql para consultar com filtro do ID
        $sql = "SELECT * FROM tblProdutos 
        WHERE idProd='$filtro'";
        //prepara a execucao com o statement
        $stmt = $pdo->prepare($sql);
        //executa o sql
        $stmt->execute();
        //recebe os dados vindos da consulta sql
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //exibe os resultado em json
        echo json_encode($result, 
        JSON_UNESCAPED_UNICODE);
    }
    //filtra os produtos pela categoria
    function handleGetFiltroCategoria($pdo){
        //variavel para o filtro por categoria
        $filtro = $_GET['categoriaProd'];
        //sql para consultar na base
        $sql = "SELECT * FROM tblProdutos WHERE 
        categoriaProd = '$filtro'";
        //prepara a execucao
        $stmt = $pdo->prepare($sql);
        //executa a consulta no banco
        $stmt->execute();
        //recebe os dados vindos da consulta
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //exibe os dados num json
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
//função do post - insere dados na base
function handlePost($pdo, $input){
    //sql para inserir o registro
    $sql = "INSERT INTO tblProdutos(descProd, categoriaProd, precoProd, tamanhoProd, fotoProd)
    VALUES (:descProd, :categoriaProd, :precoProd, :tamanhoProd, :fotoProd)";
    //prepara a execucao
    $stmt=$pdo->prepare($sql);
    //executa e substitui os parametros
    $stmt->execute(['descProd'=>$input['descProd'],
    'categoriaProd'=>$input['categoriaProd'],
    'precoProd'=>$input['precoProd'],
    'tamanhoProd'=>$input['tamanhoProd'],
    'fotoProd'=>$input['fotoProd']
    ]); 
    //exibe resposta do servidor
    echo json_encode(['message'=>'Produto Cadastrado'],JSON_UNESCAPED_UNICODE);
}
