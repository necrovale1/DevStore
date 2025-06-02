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
        //cria o array para envio
        $data = array(
            'descProd' => $descProd,
            'categoriaProd' => $categoriaProd,
            'precoProd' => $precoProd,
            'tamanhoProd'=>$tamanhoProd,
            'fotoProd'=>$fotoProd
        );
        //transforma o data em json
        $json_data = json_encode($data);
        //url para requisitar o backend
        $url = 'http://localhost/devstore/produtos.php';
        //inicia a requisicao
        $ch = curl_init($url);
        //parametros da requisicao
        //informa se é pra retornar ao finalizar a transfer
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
        //chama a função de inserir foto
        insereFoto();
    }

    //função para inserir foto
    function insereFoto(){
        //caminho para onde a foto vai ser salva
        $target_dir = "./assets/images/products/";
        //nome do arquivo com o caminho
        $target_file = 
            $target_dir.basename($_FILES["foto"]["name"]);
        //PEGA A EXTENSAO DA IMAGEM JPG, PNG, ETC
            $imageFileType = strtolower(pathinfo($target_file,
            PATHINFO_EXTENSION));
        
        //variavel para controlar o upload
        $uploadOK=1;

        //verifica se o arquivo ja existe
        if(file_exists($target_file)){
            echo 'Arquivo já existe';
            $uploadOK = 0;
        }
        //checar o tamanho do arquivo
        if($_FILES["foto"]["size"]>500000){
            echo 'Arquivo muito grande';
            $uploadOK = 0;
        }
        //verifica o tipo de arquivo
        if($imageFileType != "jpg" && 
        $imageFileType !="png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"){
         echo 'Tipo de imagem não permitido';
        $uploadOK = 0;
        }
        //faz o upload caso $uploadOK seja 1
        if($uploadOK == 1){
            if(move_uploaded_file(
                $_FILES["foto"]["tmp_name"], $target_file)){
                header(
                "Location: http://localhost/devstore/index.html");
                }
                else{
                    echo 'Não foi possivel gravar a foto';
                }
        }

    }
    ?>
        
    

