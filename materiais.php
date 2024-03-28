<?php
    require_once ('script-materiais.php');
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
    <link rel="stylesheet" href="style-padrao.css">
    <link rel="stylesheet" href="style-materiais.css">
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

        .table .tituloTabela{
            color: <?=$cor?>;
        }
    </style>
</head>

<body>
    <header>
        <?php
            require_once('navbar/navbar.html');
        ?>
    </header>

    <main id="navbarMargin">
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
                            <button class="nav-link nunito active" id="nav-definicao-tab" data-bs-toggle="tab" data-bs-target="#nav-definicao" type="button" role="tab" aria-controls="nav-definicao" aria-selected="true"><?=$tabDesc?></button>
                            <button class="nav-link nunito" id="nav-origem-tab" data-bs-toggle="tab" data-bs-target="#nav-origem" type="button" role="tab" aria-controls="nav-origem"><?=$tabOrigem?></button>
                            <button class="nav-link nunito" id="nav-descartar-tab" data-bs-toggle="tab" data-bs-target="#nav-descartar" type="button" role="tab" aria-controls="nav-descartar"><?=$tabDescarte?></button>
                            <button class="nav-link nunito" id="nav-alternativas-tab" data-bs-toggle="tab" data-bs-target="#nav-alternativas" type="button" role="tab" aria-controls="nav-alternativas"><?=$tabAlt?></button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active p-3" id="nav-definicao" role="tabpanel" aria-labelledby="nav-definicao-tab">
                            <?=$descricao?>
                        </div>
                        <div class="tab-pane fade show p-3" id="nav-origem" role="tabpanel" aria-labelledby="nav-origem-tab">
                            <?=$origem?>
                        </div>
                        <div class="tab-pane fade show p-3" id="nav-descartar" role="tabpanel" aria-labelledby="nav-descartar-tab">
                            <?=$descartar?>
                        </div>
                        <div class="tab-pane fade show p-3" id="nav-alternativas" role="tabpanel" aria-labelledby="nav-alternativas-tab">
                            <?=$alternativas?>
                        </div>
                    </div>
                </div>
                <!--Accordion-->
                <div class="d-lg-none">
                    <div class="accordion nunito" id="chapters">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#chapter-1" aria-expanded="true" aria-controls="chapter-1"><?=$tabDesc?></button>
                            </h2>
                            <div class="accordion-collapse collapse show" id="chapter-1" aria-labelledby="heading-1" data-bs-parent="#chapters">
                                <div class="accordion-body">
                                    <p><?=$descricao?></p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-2">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#chapter-2" aria-expanded="true" aria-controls="chapter-2"><?=$tabOrigem?></button>
                            </h2>
                            <div class="accordion-collapse collapse" id="chapter-2" aria-labelledby="heading-2" data-bs-parent="#chapters">
                                <div class="accordion-body">
                                    <p><?=$origem?></p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-3">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#chapter-3" aria-expanded="true" aria-controls="chapter-3"><?=$tabDescarte?></button>
                            </h2>
                            <div class="accordion-collapse collapse" id="chapter-3" aria-labelledby="heading-3" data-bs-parent="#chapters">
                                <div class="accordion-body">
                                    <p><?=$descartar?></p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-4">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#chapter-4" aria-expanded="true" aria-controls="chapter-4"><?=$tabAlt?></button>
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
                          <li class="filtroDflt" id="filtro1" onclick="selecionaFiltro(1)"> Dificuldade</li> <!--Chama uma função de ordenar por JS-->
                          <li class="filtroDflt" id="filtro2" onclick="selecionaFiltro(2)"> Avaliação</li>
                          <li class="filtroDflt" id="filtro3" onclick="selecionaFiltro(3)"> Curtidas</li>
                          <li class="filtroDflt" id="filtro-1" onclick="selecionaFiltro(-1)"></li>
                        </ul>

                        <div id="drop-dif" class="mt-2" style="display: none;">
                            <button class="btn dropdown-toggle filtro" type="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="icones-materiais/semaforo.png" alt="ícone de semáforo"> <span class="d-none d-sm-block mx-1" id="selectedFiltro2">Dificuldades</span> </button>
                            <ul class="dropdown-menu">
                              <li class="filtroDflt" id="filtro4" onclick="selecionaFiltro2(1)"> Fácil</li> <!--Chama uma função de ordenar por JS-->
                              <li class="filtroDflt" id="filtro5" onclick="selecionaFiltro2(2)"> Média</li>
                              <li class="filtroDflt" id="filtro6" onclick="selecionaFiltro2(3)"> Difícil</li>
                              <li class="filtroDflt" id="filtro-2" onclick="selecionaFiltro2(-1)"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-2 col-sm-4 col-lg-6"></div>
                    <div class="col-7 col-sm-5 col-lg-3 pesquisa">
                    <form class="d-flex" role="search">
                        <div class="input-group">
                            <input class="form-control" id="search2" type="search" placeholder="Buscar" aria-label="Buscar">
                            <button class="btn btnPesq input-group-text" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="container-fluid mx-1 row center nunito ideias mt-3" id="row-ideias">
                    
                    <!--Área das ideias-->
                    <?php
                        //Carregamento das ideias de reutilazação
                        if ($existe){       
                            foreach($postagens as $post){
                                echo $post;
                            }
                        }
                        else{
                            echo '<div class="novaIdeia">Nenhuma postagem cadastrada</div>';
                        }
                    ?>
                    
                </div>
                <div class="container-fluid ideias novaIdeia center">
                    <a href="form-publicar-ideia.php">
                        <button class="button">Publicar ideia</button>
                    </a>
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
                    document.getElementById('selectedFiltro').innerHTML = '<strong>Dificuldade</strong>';
                    document.getElementById('filtro1').innerHTML = '<strong> Dificuldade</strong>';
                    document.getElementById('filtro2').innerHTML = ' Avaliação';
                    document.getElementById('filtro3').innerHTML = ' Curtidas';
                    document.getElementById('filtro-1').innerHTML = 'Limpar seleção';
                    document.getElementById('drop-dif').style.display = 'block';
                    break;
                case 2:
                    document.getElementById('selectedFiltro').innerHTML = '<strong>Avaliação</strong>';
                    document.getElementById('filtro2').innerHTML = '<strong> Avaliação</strong>';
                    document.getElementById('filtro1').innerHTML = ' Dificuldade';
                    document.getElementById('filtro3').innerHTML = ' Curtidas';
                    document.getElementById('filtro-1').innerHTML = 'Limpar seleção';
                    document.getElementById('drop-dif').style.display = 'none';
                    
                    break;
                case 3:
                    document.getElementById('selectedFiltro').innerHTML = '<strong>Curtidas</strong>';
                    document.getElementById('filtro3').innerHTML = '<strong> Curtidas</strong>';
                    document.getElementById('filtro2').innerHTML = ' Avaliação';
                    document.getElementById('filtro1').innerHTML = ' Dificuldade';
                    document.getElementById('filtro-1').innerHTML = 'Limpar seleção';
                    document.getElementById('drop-dif').style.display = 'none';
                    break;
                case -1:
                    document.getElementById('selectedFiltro').innerHTML = 'Ordenar';
                    document.getElementById('filtro3').innerHTML = ' Curtidas';
                    document.getElementById('filtro2').innerHTML = ' Avaliação';
                    document.getElementById('filtro1').innerHTML = ' Dificuldade';
                    document.getElementById('filtro-1').innerHTML = '';
                    document.getElementById('drop-dif').style.display = 'none';
                    break;
                default:
                    alert('ERRO! Houve um problema ao selecionar o filtro. Tente novamente ou reinicie a página.');
                    break;
            }
            
        }
                
        function selecionaFiltro2(n){
            switch (n){
                case 1:
                    document.getElementById('selectedFiltro2').innerHTML = '<strong>Fácil</strong>';
                    document.getElementById('filtro4').innerHTML = '<strong> Fácil</strong>';
                    document.getElementById('filtro5').innerHTML = ' Média';
                    document.getElementById('filtro6').innerHTML = ' Difícil';
                    document.getElementById('filtro-2').innerHTML = 'Limpar seleção';
                    break;
                case 2:
                    document.getElementById('selectedFiltro2').innerHTML = '<strong>Média</strong>';
                    document.getElementById('filtro5').innerHTML = '<strong> Média</strong>';
                    document.getElementById('filtro4').innerHTML = ' Fácil';
                    document.getElementById('filtro6').innerHTML = ' Difícil';
                    document.getElementById('filtro-2').innerHTML = 'Limpar seleção';
                    break;
                case 3:
                    document.getElementById('selectedFiltro2').innerHTML = '<strong>Difícil</strong>';
                    document.getElementById('filtro6').innerHTML = '<strong> Difícil</strong>';
                    document.getElementById('filtro5').innerHTML = ' Média';
                    document.getElementById('filtro4').innerHTML = ' Fácil';
                    document.getElementById('filtro-2').innerHTML = 'Limpar seleção';
                    break;
                case -1:
                    document.getElementById('selectedFiltro').innerHTML = 'Ordenar';
                    document.getElementById('selectedFiltro2').innerHTML = 'Dificuldades';
                    document.getElementById('filtro1').innerHTML = 'Dificuldade';
                    document.getElementById('filtro6').innerHTML = ' Difícil';
                    document.getElementById('filtro5').innerHTML = ' Média';
                    document.getElementById('filtro4').innerHTML = ' Fácil';
                    document.getElementById('filtro-1').innerHTML = '';
                    document.getElementById('filtro-2').innerHTML = '';
                    document.getElementById('drop-dif').style.display = 'none';
                    break;
                default:
                    alert('ERRO! Houve um problema ao selecionar o filtro. Tente novamente ou reinicie a página.');
                    break;
            }
            
        }

    </script>
</body>
</html>