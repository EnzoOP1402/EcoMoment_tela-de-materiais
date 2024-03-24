<?php

    include 'connection.php';
    include_once 'ideias.php';

    $idPostagem = $_REQUEST['idPostagem'];
    $existe = false;

    
    $sql = 'SELECT * FROM prototipo_Postagem_EcoMoment WHERE idPostagem = '.$idPostagem;
    $result = $con->query($sql);

    if ($result->num_rows > 0){
        $existe = true;
        while ($row = $result->fetch_assoc()){
            $nomeIdeia = $row['nomePostagem'];
            $userIdeia = $row['nomeUsuario'];
            $numCurtidas = $row['numeroCurtidas'];
            $descricaoPostagem = $row['descricaoPostagem'];
            $materiaisNecessarios = $row['materiaisNecessariosPostagem'];
            $instrucoesPostagem = $row['instrucoesPostagem'];
            $materialPostagem = $row['materialPostagem'];
            $dificuldadeIdeia = $row['dificuldadePostagem'];
            $avaliacaoPostagem = $row['avaliacaoPostagem'];
            $qtdeAvaliacoes = $row['qtdeAvaliacoesPostagem'];
            $ideia = new Ideias($idPostagem, $nomeIdeia, $userIdeia, $dificuldadeIdeia, $avaliacaoPostagem);
        }
    }
    
    $con->close();

    //---------------------------------------------------------------------------------------------------------------------

    //Ideias semelhantes
    include 'connection.php';

    $postagens = array();

    $sql2 = 'SELECT * FROM prototipo_Postagem_EcoMoment GROUP BY idPostagem HAVING NOT idPostagem = '.$idPostagem.' ORDER BY RAND() LIMIT 3';
    $result2 = $con->query($sql2);

    if ($result2->num_rows > 0){
        $existe = true;
        while ($row = $result2->fetch_assoc()){
            $idPub = $row['idPostagem'];
            $nomeIdeiaPub = $row['nomePostagem'];
            $userIdeiaPub = $row['nomeUsuario'];
            $dificuldadeIdeiaPub = $row['dificuldadePostagem'];
            $avaliacaoPub = $row['avaliacaoPostagem'];
            $ideiaPub = new Ideias($idPub, $nomeIdeiaPub, $userIdeiaPub, $dificuldadeIdeiaPub, $avaliacaoPub);
            $postagens[] = $ideiaPub->createCardIdeia2($nomeIdeiaPub, $userIdeiaPub, $dificuldadeIdeiaPub, $avaliacaoPub, $idPub);
        }
    }
    
    $con->close();