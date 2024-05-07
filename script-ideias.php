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

    
    function curtirPHP($numCurt, $usuarioCurtida, $id){
        $res = 0;
        echo'<script>alert("CurtirPHP")</script>';
        if(curtido($usuarioCurtida, $id)){
            include 'connection.php';
    
            $sql = 'UPDATE prototipo_Postagem_EcoMoment SET numeroCurtidas = '.$numCurt.' WHERE idPostagem = '.$id;
    
            $stmt = $con->prepare($sql);
            if($stmt->execute()){
                $con->close();
                $res = 1;
                return $res;
            }
            else{
                $con->close();
                return $res;  
            }
        }
        else{
            include 'connection.php';
    
            $sql = 'INSERT INTO prototipo_Curtidas_EcoMoment (idPostagem, idUsuarioWeb) VALUES ('.$id.', '.$usuarioCurtida.')';
    
            $stmt = $con->prepare($sql);
            if($stmt->execute()){
                $sql2 = 'UPDATE prototipo_Postagem_EcoMoment SET numeroCurtidas = '.$numCurt.' WHERE idPostagem = '.$id;
                $stmt2 = $con->prepare($sql2);
                if($stmt2->execute()){
                    $con->close();
                    $res = 1;
                    return $res;
                }
                else{
                    $con->close();
                    return $res; 
                }
            }
            else{
                $con->close();
                return $res;  
            }
        }
    }

    function curtido($usuarioCurtida, $id){
        $res = 0;
        include 'connection.php';
        echo'<script>alert("Usuário: '.$usuarioCurtida.'\nId postagem: '.$id.'")</script>';
        $sql = 'SELECT * FROM prototipo_Curtidas_EcoMoment WHERE idUsuarioWeb = '.$usuarioCurtida.' and idPostagem = '.$id;
        $result = $con->query($sql);

        if ($result->num_rows > 0){
            $con->close();
            // echo'<script>alert("True")</script>';
            $res = 1;
            return $res;
        }
        else{
            $con->close();
            // echo'<script>alert("Falso")</script>';
            return $res;
        }
    }
    
    function avaliarPHP($valor, $usuarioAv, $id){
        $res = 0;
        echo'<script>alert("AvaliarPHP")</script>';
        if(avaliado($usuarioAv, $id)){
            include 'connection.php';
    
            $sql = 'UPDATE prototipo_Avaliacao_EcoMoment SET valor = '.$valor.' WHERE idPostagem = '.$id.' and idUsuarioWeb = '.$usuarioAv;
    
            $stmt = $con->prepare($sql);
            if($stmt->execute()){
                $sql2 = 'SELECT count(idAvaliacao) AS numero FROM prototipo_Avaliacao_EcoMoment WHERE idPostagem = '.$id.' and idUsuarioWeb = '.$usuarioAv;
                $result2 = $con->query($sql2);
                if ($result2->num_rows > 0){
                    while ($row = $result2->fetch_assoc()){
                        $qtdeAv = $row['numero'];
                    }
                    $sql3 = 'SELECT sum(valor) AS soma FROM prototipo_Avaliacao_EcoMoment WHERE idPostagem = '.$id.' and idUsuarioWeb = '.$usuarioAv;
                    $result3 = $con->query($sql3);
                    if ($result3->num_rows > 0){
                        while ($row = $result3->fetch_assoc()){
                            $somaValor = $row['soma'];
                        }
                        $sql4 = 'UPDATE prototipo_Postagem_EcoMoment SET avaliacaoPostagem = '.($somaValor/$qtdeAv).' WHERE idPostagem = '.$id;
                        $stmt4 = $con->prepare($sql4);
                        if($stmt4->execute()){
                            $con->close();
                            $res = 1;
                            return $res;
                        }
                    }
                }
            }
            else{
                $con->close();
                return $res;  
            }
        }
        else{
            include 'connection.php';
    
            $sql = 'INSERT INTO prototipo_Avaliacao_EcoMoment (idPostagem, idUsuarioWeb, valor) VALUES ('.$id.', '.$usuarioAv.', '.$valor.')';
    
            $stmt = $con->prepare($sql);
            if($stmt->execute()){
                $sql2 = 'UPDATE prototipo_Postagem_EcoMoment SET numeroCurtidas = '.$numCurt.' WHERE idPostagem = '.$id;
                $stmt2 = $con->prepare($sql2);
                if($stmt2->execute()){
                    $sql3 = 'SELECT count(idAvaliacao) AS numero FROM prototipo_Avaliacao_EcoMoment WHERE idPostagem = '.$id.' and idUsuarioWeb = '.$usuarioAv;
                    $result3 = $con->query($sql3);
                    if ($result3->num_rows > 0){
                        while ($row = $result3->fetch_assoc()){
                            $qtdeAv = $row['numero'];
                        }
                        $sql4 = 'SELECT sum(valor) AS soma FROM prototipo_Avaliacao_EcoMoment WHERE idPostagem = '.$id.' and idUsuarioWeb = '.$usuarioAv;
                        $result4 = $con->query($sql4);
                        if ($result4->num_rows > 0){
                            while ($row = $result4->fetch_assoc()){
                                $somaValor = $row['soma'];
                            }
                            $sql5 = 'UPDATE prototipo_Postagem_EcoMoment SET avaliacaoPostagem = '.($somaValor/$qtdeAv).' WHERE idPostagem = '.$id;
                            $stmt5 = $con->prepare($sql5);
                            if($stmt5->execute()){
                                $con->close();
                                $res = 1;
                                return $res;
                            }
                        }
                    }
                }
                else{
                    $con->close();
                    return $res; 
                }
            }
            else{
                $con->close();
                return $res;  
            }
        }
    }

    function avaliado($usuarioAv, $id){
        $res = 0;
        include 'connection.php';
        echo'<script>alert("Usuário: '.$usuarioAv.'\nId postagem: '.$id.'")</script>';
        $sql = 'SELECT * FROM prototipo_Avaliacao_EcoMoment WHERE idUsuarioWeb = '.$usuarioAv.' and idPostagem = '.$id;
        $result = $con->query($sql);

        if ($result->num_rows > 0){
            $con->close();
            // echo'<script>alert("True")</script>';
            $res = 1;
            return $res;
        }
        else{
            $con->close();
            // echo'<script>alert("Falso")</script>';
            return $res;
        }
    }
    