<?php
    //incia que vamos ter uma sessão
    session_start();
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
                    fazLogin($pdo);
                 }
             break;
         }
    //função para fazer login
    function fazLogin($pdo){
        //pega o usuario e senha
        $emailUser = $_POST['emailUser'];
        $senhaUser = $_POST['senhaUser'];
        //cria o sql para consulta
        $sql = "SELECT * FROM tblUsers
        WHERE emailUser like '%$emailUser%' 
        AND senhaUser = $senhaUser";
        //prepara a execucao
        $stmt = $pdo->prepare($sql);
        //executa a consulta
        $stmt->execute();
        //traz os resultados
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //verifica se teve resultado
        $elementCount = count($result);
        //verifica se veio mais de 0
        if($elementCount>0){
            //caso tenha senha e usuario valido
            //for each separa os campos do registro
            foreach($result as $key){
                //pega o nome do usuario
                $_SESSION['username'] = $key['nomeUser'];
                //pega o id do usuario
                $_SESSION['user_id'] = $key['idUser'];
                //redireciona para uma outra página
               // echo('Usuário: '.$_SESSION['username'].'<br>');
                //echo('ID: '.$_SESSION['user_id']);
                exit();
                header("Location: menuAdm.php");
            }
        }else{
            //caso senha ou usuario estejam errados
            echo('Senha ou usuário Inválidos');
            //header("Location: login.html");
        }
    }