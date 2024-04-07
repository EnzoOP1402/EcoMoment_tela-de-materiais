<?php
    require_once('usuarios.php');
    require_once('ideias.php');
    
    $user = $_REQUEST['user'];
    $usuario = new Usuarios();
    
    //Dados da conta
    
    $id = '';
    $qtdeS1 = '';
    $qtdeS2 = '';
    $qtdeC = '';
    $qtdeP = '';
    $rep = '';
    $biog = '';

    include 'connection.php';

    $existe = false;

    $sql2 = 'SELECT * FROM EcoMomentBD_UsuarioWeb WHERE NomeWeb = '.$user;
    $result2 = $con->query($sql2);

    if ($result2->num_rows > 0){
        $existe = true;
        while ($row = $result2->fetch_assoc()){
            $id = $row['idUsuarioWeb'];
            $qtdeS1 = $row['qtdeSeguidores'];
            $qtdeS2 = $row['qtdeSeguindo'];
            $qtdeC = $row['qtdeCurtidas'];
            $qtdeP = $row['qtdePostagens'];
            $rep = $row['Reputacao'];
            $biog = $row['Biografia'];
        }
    }
    
    $con->close();

    //Postagens do usuário
    include 'connection.php';

    $postagens = array();
    $existe = false;

    $sql = 'SELECT * FROM prototipo_Postagem_EcoMoment WHERE nomeUsuario = "'.$user.'" ORDER BY idPostagem DESC';
    $result = $con->query($sql);

    if ($result->num_rows > 0){
        $existe = true;
        while ($row = $result->fetch_assoc()){
            $idIdeia = $row['idPostagem'];
            $nomeIdeia = $row['nomePostagem'];
            $userIdeia = $row['nomeUsuario'];
            $dificuldadeIdeia = $row['dificuldadePostagem'];
            $avaliacao = $row['avaliacaoPostagem'];
            $ideia = new Ideias($idIdeia, $nomeIdeia, $userIdeia, $dificuldadeIdeia, $avaliacao);
            $postagens[] = $ideia->createCardIdeia($nomeIdeia, $userIdeia, $dificuldadeIdeia, $avaliacao, $idIdeia);
        }
    }
    
    $con->close();
