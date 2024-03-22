<?php 
    require ("ideias.php")

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>*Nome da ideia*</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/xhc2seb.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" href="imagens/ideia (3).png" type="image/x-icon">
    <link rel="stylesheet" href="style-padrao.css">
    <link rel="stylesheet" href="style-ideia.css">

    <script>
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
        <section>
            <h1 class="display-5 fw-bold text-center mb-2">*Nome da ideia* </h1>
            <h2 class="center mb-5" id="sub-titulo">@*nome de usuário*</h2>
        </section>

        <!-- Início do Carrosel -->
        <section>
            <div class="container c-inicio">
                <div class="cards-wrapper mb-5">
                    <div id="carouselExampleControls" class="carousel slide carousel-dark" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <div class="cards-wrapper">
                                <div id="card1" class="card">
                                <img class="card-img-top" src="imagens/artesanato-reciclagem-caixa-de-sapato-8.jpg" alt="Imagem de capa do card">
                                <div class="card-body">
                                    <h5 class="card-title">Título do card</h5>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="carousel-item">
                            <div class="cards-wrapper">
                                <div id="card1" class="card">
                                <img class="card-img-top" src="imagens/artesanato-reciclagem-garrafa-pet-4.jpg" alt="Imagem de capa do card">
                                <div class="card-body">
                                    <h5 class="card-title">Título do card 2</h5>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" style="background: url(imagens/divisa-esquerda.png) no-repeat center center;"  href="#carouselExampleControls" role="button" data-slide="prev">
                            <span  aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" style="background: url(imagens/divisa-direita.png) no-repeat center center;" href="#carouselExampleControls" role="button" data-slide="next">
                            <span aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>
                        </a>
                    </div>
                </div>
                <div class="row center">
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="rating">
                            <input value="5" name="rating" id="star5" type="radio">
                            <label for="star5"></label>
                            <input value="4" name="rating" id="star4" type="radio">
                            <label for="star4"></label>
                            <input value="3" name="rating" id="star3" type="radio">
                            <label for="star3"></label>
                            <input value="2" name="rating" id="star2" type="radio">
                            <label for="star2"></label>
                            <input value="1" name="rating" id="star1" type="radio">
                            <label for="star1"></label>
                        </div>
                        <span class="rating">X/5</span>
                        <br>
                        <p>Avaliações: X</p>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <span><span class="d-none d-sm-block">Dificuldade:</span> <div class="dificuldade dificuldade-'.$dificuldade.'"></div></span>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <span><span class="d-none d-sm-block">Curtir</span> ♥</span>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <span><span class="d-none d-sm-block">Compartilhar</span> →</span>
                    </div>
                </div>
            </div>
        </section>

        <section>

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

</body>
</html>