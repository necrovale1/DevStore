<?php
    //chama a função para salvar o registro na base
    salvaRegistro();
    //função para salvar o registro
    function salvaRegistro(){
    //cria as variaveis para pegar os dados do post
    $descProd = $_POST['descProd'];
    $precoProd = $_POST['precoProd'];
    $tamanhoProd = $_POST['tamanhoProd'];
    $categoriaProd = $_POST['categoriaProd'];
    //pega o nome do arquivo da foto
    $fotoProd = basename($_FILES['foto']['name']);
    //cria um array para envio
    $data = array(
        'descProd' => $descProd,
        'categoriaProd' => $categoriaProd,
        'precoProd' => $precoProd,
        'tamanhoProd' => $tamanhoProd,
        'fotoProd' => $fotoProd
    );
    //transforma o data em json
    $json_data = json_encode($data);
    //url para requisitar o backend
    $url = 'http://localhost/devstore/produtos.php';
    //inicia a requisicao
    $ch = curl_init($url);
    //parametros da requisicao
    //informa se é para retornar ao finalizar a transfer
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //informa o metodo da requisicao
    curl_setopt($ch, CURLOPT_POST, true);
    //envia o json no corpo da requisicao
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    //cabeçalho da requisicao
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length:'.strlen($json_data)
    ));
    //executa a requisicao
    $response = curl_exec($ch);
    //verifica se deu erro
    if(curl_errno($ch)){
        throw new Exception(curl_error($ch));
    }
    $result = json_decode($response, true);
    //chama a função de inserir a foto
    //insereFoto();             05/05
}
?>