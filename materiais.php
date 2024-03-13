<?php

    //Conteúdo
    // $idMaterial = $_REQUEST['material'];
    $idMaterial = 1; //EU esqueci a sintaxe pra mandar pela url e fiz assim pq tava mais fácil, se vc lembrar é só descomentar a linha de cima e apagar essa
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
                $materialLower = 'plástico';
                $imagem = '<img class="imgMaterial" src="icones-materiais/residuos-plasticos.png" alt="Ícone de sacola plástica">';
                break;
            }

        case 2:
            {
                $materialLower = 'metal';
                $imagem = '<img class="imgMaterial" src="icones-materiais/metal.png" alt="Ícone de sacola plástica">';
                break;
            }

        case 3:
            {
                $materialLower = 'papel';
                $imagem = '<img class="imgMaterial" src="icones-materiais/papel.png" alt="Ícone de sacola plástica">';
                break;
            }

        case 4:
            {
                $materialLower = 'vidro';
                $imagem = '<img class="imgMaterial" src="icones-materiais/vidro.png" alt="Ícone de sacola plástica">';
                break;
            }

        case 5:
            {
                $materialLower = 'madeira';
                $imagem = '<img class="imgMaterial" src="icones-materiais/madeira.png" alt="Ícone de sacola plástica">';
                break;
            }

        case 6:
            {
                $materialLower = 'o resíduo orgânico';                $imagem = '<img class="imgMaterial" src="icones-materiais/desperdicio-organico.png" alt="Ícone de sacola plástica">';
                break;
            }
    }

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styleMateriais.css">
    <title><?=$material?></title><!--Variável Php-->
    <style>
        .btnPesq{
            background-color: <?=$cor?>;
            color: #f4f4f4;
        }
        
        #titulo{
            color: <?=$cor?>; /*Muda com Php*/
        }

        .accordion{
            --bs-accordion-btn-focus-border-color: #f9f9f9;
            --bs-accordion-active-color: black;
            --bs-accordion-active-bg: #f9f9f9;
            --bs-accordion-btn-focus-box-shadow: #f9f9f9;
        }

        .nav{
            --bs-nav-link-color: black;
            --bs-nav-link-hover-color: <?=$cor?>; /*Muda com Php*/
        }

        .nav-tabs{
            --bs-nav-tabs-link-active-color: <?=$cor?>; /*Muda com Php*/
            --bs-nav-tabs-link-active-border-color: #737373;
            --bs-nav-tabs-link-active-bg: #f4f4f4;
            --bs-nav-tabs-border-color: #737373;
            --bs-nav-tabs-link-hover-border-color: #d9d9d9;
        }

        #navbarMargin{
            margin-top: 90px;
        }
    </style>
</head>

<body onload="carregaPostagem()">
    <?php 
        require_once('navbar/navbar.html');
    ?>

    <main id="navbarMargin">
        <!-- Navegação em tab control -> mudar nome, cor e conteúdo dos componentes conforme o tipo de material-->
        <!--Informações sobre o material-->
        <section class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-4 center"></div>
                   <div class="col-4 center"><?=$imagem?></div>
                   <div class="col-4 center"></div>
                </div>
            </div>
        
            <!--Tab Control-->
            <div class="container px-5 mt-3">
                <h1 class="display-5 fw-bold text-center mb-5" id="titulo"><?=$material?></h1> <!--Muda com Php-->
                <div class="d-none d-lg-block">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tab-list">
                            <button class="nav-link nunito active" id="nav-definicao-tab" data-bs-toggle="tab" data-bs-target="#nav-definicao" type="button" role="tab" aria-controls="nav-definicao" aria-selected="true">O que é <?=$materialLower?>?</button>
                            <button class="nav-link nunito" id="nav-origem-tab" data-bs-toggle="tab" data-bs-target="#nav-origem" type="button" role="tab" aria-controls="nav-origem">De onde vem?</button>
                            <button class="nav-link nunito" id="nav-descartar-tab" data-bs-toggle="tab" data-bs-target="#nav-descartar" type="button" role="tab" aria-controls="nav-descartar">Como fazer o descarte correto?</button>
                            <button class="nav-link nunito" id="nav-alternativas-tab" data-bs-toggle="tab" data-bs-target="#nav-alternativas" type="button" role="tab" aria-controls="nav-alternativas">Alternativas sustentáveis</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active p-3" id="nav-definicao" role="tabpanel" aria-labelledby="nav-definicao-tab">
                            <p class="nunito"><?=$descricao?></p>
                        </div>
                        <div class="tab-pane fade show p-3" id="nav-origem" role="tabpanel" aria-labelledby="nav-origem-tab">
                            <p class="nunito"><?=$origem?></p>
                        </div>
                        <div class="tab-pane fade show p-3" id="nav-descartar" role="tabpanel" aria-labelledby="nav-descartar-tab">
                            <p class="nunito"><?=$descartar?></p>
                        </div>
                        <div class="tab-pane fade show p-3" id="nav-alternativas" role="tabpanel" aria-labelledby="nav-alternativas-tab">
                            <p class="nunito"><?=$alternativas?></p>
                        </div>
                    </div>
                </div>
                <!--Accordion-->
                <div class="d-lg-none">
                    <div class="accordion nunito" id="chapters">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#chapter-1" aria-expanded="true" aria-controls="chapter-1">O que é <?=$materialLower?>?</button>
                            </h2>
                            <div class="accordion-collapse collapse show" id="chapter-1" aria-labelledby="heading-1" data-bs-parent="#chapters">
                                <div class="accordion-body">
                                    <p><?=$descricao?></p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-2">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#chapter-2" aria-expanded="true" aria-controls="chapter-2">De onde vem?</button>
                            </h2>
                            <div class="accordion-collapse collapse" id="chapter-2" aria-labelledby="heading-2" data-bs-parent="#chapters">
                                <div class="accordion-body">
                                    <p><?=$origem?></p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-3">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#chapter-3" aria-expanded="true" aria-controls="chapter-3">Como fazer o descarte correto?</button>
                            </h2>
                            <div class="accordion-collapse collapse" id="chapter-3" aria-labelledby="heading-3" data-bs-parent="#chapters">
                                <div class="accordion-body">
                                    <p><?=$descartar?></p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-4">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#chapter-4" aria-expanded="true" aria-controls="chapter-4">Alternativas sustentáveis</button>
                            </h2>
                            <div class="accordion-collapse collapse" id="chapter-4" aria-labelledby="heading-4" data-bs-parent="#chapters">
                                <div class="accordion-body">
                                    <p><?=$alternativas?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Ideias de reutilização-->
        <section class="my-5">
            <div class="container px-sm-3 px-md-5 mt-5">
                <h1 class="display-5 fw-bold text-center mb-5" id="titulo">IDEIAS DE REUTILIZAÇÃO COM <?=$material?></h1> <!--Muda com Php-->
                <div class="row center nunito">
                    <div class="dropdown col-3">
                        <button class="btn dropdown-toggle filtro" type="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="icones-materiais/ordenacao.png" alt="ícone de organização em lixeiras"> <span class="d-none d-sm-block mx-1" id="selectedFiltro">Ordenar</span> </button>
                        <ul class="dropdown-menu">
                          <li id="filtro1" onclick="selecionaFiltro(1)"> Filtro 1</li> <!--Chama uma função de ordenar por JS-->
                          <li id="filtro2" onclick="selecionaFiltro(2)"> Filtro 2</li>
                          <li id="filtro3" onclick="selecionaFiltro(3)"> Filtro 3</li>
                        </ul>
                    </div>
                    <div class="col-2 col-sm-4 col-lg-6"></div>
                    <div class="col-7 col-sm-5 col-lg-3 pesquisa">
                    <form class="d-flex" role="search">
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                            <button class="btn btnPesq input-group-text" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="container-fluid mx-1 row center nunito ideias mt-3" id="row-ideias">
                    
                    <!--Área das ideias-->
                    <?php
                        //Carregamento das ideias de reutilazação

                        include 'script-materiais.php';
                        foreach($postagens as $post){
                            echo $post;
                        }
                    ?>

                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php
            require_once('rodape/rodape.html');
        ?>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>

        function selecionaFiltro(n){
            switch (n){
                case 1:
                    document.getElementById('selectedFiltro').innerHTML = '<strong>Filtro 1</strong>';
                    document.getElementById('filtro1').innerHTML = '<strong> Filtro 1</strong>';
                    document.getElementById('filtro2').innerHTML = ' Filtro 2';
                    document.getElementById('filtro3').innerHTML = ' Filtro 3';
                    break;
                case 2:
                    document.getElementById('selectedFiltro').innerHTML = '<strong>Filtro 2</strong>';
                    document.getElementById('filtro2').innerHTML = '<strong> Filtro 2</strong>';
                    document.getElementById('filtro1').innerHTML = ' Filtro 1';
                    document.getElementById('filtro3').innerHTML = ' Filtro 3';
                    break;
                case 3:
                    document.getElementById('selectedFiltro').innerHTML = '<strong>Filtro 3</strong>';
                    document.getElementById('filtro3').innerHTML = '<strong> Filtro 3</strong>';
                    document.getElementById('filtro2').innerHTML = ' Filtro 2';
                    document.getElementById('filtro1').innerHTML = ' Filtro 1';
                    break;
                default:
                    alert('ERRO! Houve um problema ao selecionar o filtro. Tente novamente ou reinicie a página.');
                    break;
            }
            
        }

    </script>
</body>
</html>