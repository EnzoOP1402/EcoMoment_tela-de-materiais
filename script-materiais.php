<?php

    //Conteúdo
    $idMaterial = $_REQUEST['material'];
    // $idMaterial = 1; //EU esqueci a sintaxe pra mandar pela url e fiz assim pq tava mais fácil, se vc lembrar é só descomentar a linha de cima e apagar essa
    $material = '';
    $cor = '';
    $descricao = '';
    $origem = '';
    $descartar = '';
    $alternativas = '';

    include 'connection.php';

    $sql = 'SELECT * FROM prototipo_info_materiais WHERE idMaterial = '.$idMaterial;
    $result = $con->query($sql);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $material = $row['nome'];
            $cor = $row['cor'];
            $descricao = $row['descricao'];
            $origem = $row['origem'];
            $descartar = $row['descartar'];
            $alternativas = $row['alternativas'];
        }
    }
    else{
        echo 'Material não identificado.';
    }

    $con->close();

    switch ($idMaterial){
        case 1:
            {
                $imagem = '<img class="imgMaterial" src="icones-materiais/residuos-plasticos.png" alt="Ícone de sacola plástica">';
                $tabDesc = 'O que é plástico?';
                $tabOrigem = 'De onde vem?';
                $tabDescarte = 'Como fazer o descarte correto?';
                $tabAlt = 'Alternativas sustentáveis';
                break;
            }

        case 2:
            {
                $imagem = '<img class="imgMaterial" src="icones-materiais/metal.png" alt="Ícone de sacola plástica">';
                $tabDesc = 'O que é metal?';
                $tabOrigem = 'De onde vem?';
                $tabDescarte = 'Como fazer o descarte correto?';
                $tabAlt = 'Alternativas sustentáveis';
                break;
            }

        case 3:
            {
                $imagem = '<img class="imgMaterial" src="icones-materiais/papel.png" alt="Ícone de sacola plástica">';
                $tabDesc = 'O que é papel?';
                $tabOrigem = 'De onde vem?';
                $tabDescarte = 'Como fazer o descarte correto?';
                $tabAlt = 'Alternativas sustentáveis';
                break;
            }

        case 4:
            {
                $imagem = '<img class="imgMaterial" src="icones-materiais/vidro.png" alt="Ícone de sacola plástica">';
                $tabDesc = 'O que é vidro?';
                $tabOrigem = 'De onde vem?';
                $tabDescarte = 'Como fazer o descarte correto?';
                $tabAlt = 'Alternativas sustentáveis';
                break;
            }

        case 5:
            {
                $imagem = '<img class="imgMaterial" src="icones-materiais/madeira.png" alt="Ícone de sacola plástica">';
                $tabDesc = 'O que é madeira?';
                $tabOrigem = 'De onde vem?';
                $tabDescarte = 'Como fazer o descarte correto?';
                $tabAlt = 'Alternativas sustentáveis';
                break;
            }

        case 6:
            {
                $imagem = '<img class="imgMaterial" src="icones-materiais/desperdicio-organico.png" alt="Ícone de sacola plástica">';
                $tabDesc = 'O que é resíduo orgânico?';
                $tabOrigem = 'O que é a compostagem?';
                $tabDescarte = 'Passo a passo da compostagem';
                $tabAlt = 'Tipos de compostagem';
                break;
            }
    }

    //---------------------------------------------------------------------------------------------------------------------

    //Ideias
    include 'connection.php';
    include 'ideias.php';

    $postagens = array();
    $existe = false;

    $sql2 = 'SELECT * FROM prototipo_Postagem_EcoMoment WHERE materialPostagem = '.$idMaterial.' ORDER BY idPostagem DESC';
    $result2 = $con->query($sql2);

    if ($result2->num_rows > 0){
        $existe = true;
        while ($row = $result2->fetch_assoc()){
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

