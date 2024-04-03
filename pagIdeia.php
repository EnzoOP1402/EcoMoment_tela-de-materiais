<?php 
    require_once('script-ideias.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$nomeIdeia?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/xhc2seb.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style-padrao.css">
    <link rel="stylesheet" href="style-ideia.css">
    <script>
        /* Carrossel */
        const controls = document.querySelectorAll(".control");
        let currentItem = 0;
        const items = document.querySelectorAll(".pics");
        const maxItems = items.length;

        controls.forEach((control) => {
        control.addEventListener("click", (e) => {
            isLeft = e.target.classList.contains("arrow-left");

            if (isLeft) {
            currentItem -= 1;
            } else {
            currentItem += 1;
            }

            if (currentItem >= maxItems) {
            currentItem = 0;
            }

            if (currentItem < 0) {
            currentItem = maxItems - 1;
            }

            items.forEach((item) => item.classList.remove("current-item"));

            items[currentItem].scrollIntoView({
            behavior: "smooth",
            inline: "center"
            });

            items[currentItem].classList.add("current-item");
        });
        });
    </script>
</head>
<body>
    <header>
        <?php
            require_once('navbar/navbar.html');
        ?>
    </header>

    <main id="navbarMargin">
        <section class="container mb-5">
            <h1 class="display-5 fw-bold text-center mb-2"><?=$nomeIdeia?></h1>
            <h2 class="center mb-2" id="sub-titulo"><a href="#"><?=$userIdeia?></a></h2><!--Link para a página de perfil-->
            <div class="avaliacao center nunito">
                <div class="av-head">
                    <?php
                        if ($dificuldadeIdeia == 'facil'){
                            $dif = 'Fácil';
                        } else if ($dificuldadeIdeia == 'media'){
                            $dif = 'Médio';
                        } else if ($dificuldadeIdeia == 'dificil'){
                            $dif = 'Difícil';
                        }
                        echo $ideia->carregaAvaliacao($idPostagem, $avaliacaoPostagem);
                    ?>
                    <span style="width: 6px;"></span>
                    <span><?=$avaliacaoPostagem?>/5</span>
                </div>
                <div class="av-head">
                    <span class="d-none d-sm-inline-block">Avaliações: </span><span class="d-inline-block d-sm-none">Av.: </span> <span style="width: 4px;"></span><?=$qtdeAvaliacoes?>
                </div>
            </div>
        </section>

        <!-- Início do Carrosel -->
        <!-- Será carregado da mesma forma que as ideias na tela de materiais -> depende das imagens no BD -->
        <section>
            <div class="container mb-5 c-inicio nunito">
                <!-- Início do carrosel -->
                <!-- <div class="cards-wrapper mb-5">
                    <div id="carouselExampleControls" class="carousel slide carousel-dark" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <div class="cards-wrapper">
                                <div id="card1" class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Título do card</h5>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="carousel-item">
                            <div class="cards-wrapper">
                                <div id="card1" class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Título do card 2</h5>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <
                            <span  aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            >
                            <span aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>
                        </a>
                    </div>
                </div> -->
                <!-- Fim do carrossel -->
                <div class="row center row-topico">
                    <div class="col-6 col-sm-3 col-md-3 topico">
                        Avaliar: 
                        <div class="rating-x">  
                            <input value="5" name="rating-x" id="x-star5" type="radio" onclick="avaliar(5)">
                            <label for="x-star5"></label>
                            <input value="4" name="rating-x" id="x-star4" type="radio" onclick="avaliar(4)">
                            <label for="x-star4"></label>
                            <input value="3" name="rating-x" id="x-star3" type="radio" onclick="avaliar(3)">
                            <label for="x-star3"></label>
                            <input value="2" name="rating-x" id="x-star2" type="radio" onclick="avaliar(2)">
                            <label for="x-star2"></label>
                            <input value="1" name="rating-x" id="x-star1" type="radio" onclick="avaliar(1)">
                            <label for="x-star1"></label>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-md-3 topico">
                            <div class="d-none d-md-block d-lg-flex dif">
                                Nível:
                                <br>
                                <div class="d-flex dif">
                                    <div class="dificuldade dificuldade-<?=$dificuldadeIdeia?>"></div><?=$dif?>
                                </div>
                            </div>
                            <div class="d-inline-flex d-md-none dif">
                                <div class="dificuldade dificuldade-<?=$dificuldadeIdeia?>"></div><?=$dif?>
                            </div>
                    </div>
                    <div class="col-6 col-sm-3 col-md-3 topico">
                        <div>
                            <!-- <span id="img-curtida"><img src="icones-materiais/curtida-1.png" alt="ícone de coração" class="btnInteraction" onclick="curtir()"></span> -->
                            <div class="curtida" onclick="curtir()">
                                <img class="btnInteraction" src="icones-materiais/curtida-2.png" alt="Ícone de coração sem preenchimento">
                            </div>
                            <span id="numCurtidas" class="center"><?=$numCurtidas?></span>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-md-3 topico">
                        <div>
                            <img src="icones-materiais/compartilhar.png" alt="ícone de seta para compartilhamento" class="btnInteraction" onclick="compartilhar()">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container c-corpo">
                <div class="row">
                    <div class="col-12 col-lg-8 nunito descricoes mb-5">
                        <div>
                            <div class="topico2">
                                <img class="img-topico ms-2" src="icones-materiais/descricao.png" alt="Ícone de folha pautada">
                                <strong> Descrição</strong>
                            </div>
                            <section class="sec-desc">
                                <?=$descricaoPostagem?>
                            </section>
                        </div>
                        
                        <div>
                            <div class="topico2">
                                <img class="img-topico ms-2" src="icones-materiais/materiais.png" alt="Ícone de caixa com materiais escolares">
                                <strong> Materiais</strong>
                            </div>
                            <section class="sec-desc">
                                <?=$materiaisNecessarios?>
                            </section>
                        </div>

                        <div>
                            <div class="topico2">
                                <img class="img-topico ms-2" src="icones-materiais/passo-a-passo.png" alt="ícone de pegadas">
                                <strong> Passo a passo</strong>
                            </div>
                            <section class="sec-desc">
                                <?=$instrucoesPostagem?>
                            </section>
                        </div>

                        <div>
                            <div class="topico2" style="display: flex; justify-content: space-between;">
                                <span>
                                    <img class="img-topico ms-2" src="icones-materiais/balao-de-fala.png" alt="Ícone de balões de fala">
                                    <strong> Comentários</strong>
                                </span>
                                <span class="me-2" style="font-size:14px;">Qtde</span>
                            </div>
                            <section class="sec-desc">
                                Blablabla <br>Blablabla <br>Blablabla
                            </section>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 outras-ideias mb-4">
                        <h1 class="display-6 fw-bold text-center mb-2">OUTRAS PUBLICAÇÕES</h1>
                        <!--Área das ideias-->
                        <div class="container-fluid mx-1 row center nunito ideias mt-3" id="row-ideias">
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
                            <div class="container-fluid ideias novaIdeia center">
                                <a href="#">
                                    <button class="button">Ver mais</button><!--link para a página de ideias do momento -->
                                </a>
                            </div>
                        </div>
                    </div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
        var curtida = false;

        function curtir(){
            if (curtida == false){
                curtida = true;
                document.querySelector('.curtida').innerHTML = '<img class="btnInteraction" src="icones-materiais/curtida-1.png" alt="Ícone de coração sem preenchimento">';
            } else{
                curtida = false;
                document.querySelector('.curtida').innerHTML = '<img class="btnInteraction" src="icones-materiais/curtida-2.png" alt="Ícone de coração sem preenchimento">';
            }
        }

        function compartilhar(){
            alert('Compartilhou')
        }

        function avaliar(n){
            alert(`${n} estrela(s)`)
            document.getElementById('x-star5').disabled = 'true';
            document.getElementById('x-star4').disabled = 'true';
            document.getElementById('x-star3').disabled = 'true';
            document.getElementById('x-star2').disabled = 'true';
            document.getElementById('x-star1').disabled = 'true';
        }
    </script>

</body>
</html>