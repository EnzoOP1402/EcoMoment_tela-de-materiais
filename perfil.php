<?php 
    require_once('script-conta.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha conta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style-padrao.css">
    <link rel="stylesheet" href="style-conta.css">
</head>
<body>
    <header>
        <?php
            require_once('navbar/navbar.html');
        ?>
    </header>

    <main id="navbarMargin">
        <?php
            $btn = $btn2 = '';
            if($type == 'conta'){
                echo'<section class="container mb-4"><h1 class="display-5 fw-bold text-center mb-2">MINHA CONTA</h1></section>';
                $btn1 = '<button class="button btn-follow my-2 d-none d-md-block">Editar</button>';
                $btn2 = '<button class="button btn-follow my-2 d-block d-md-none">Editar</button>';
            }
            else{
                $btn1 = '<button class="button btn-follow my-2 d-none d-md-block">Seguir</button>';
                $btn2 = '<button class="button btn-follow my-2 d-block d-md-none">Seguir</button>';
            }
        ?>
        <!-- Container com os dados -->
        <section class="mb-4 px-2 nunito">
            <div class="container container-conta p-4">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5">
                        <div class="row">
                            <!-- Coluna foto perfil -->
                            <div class="col-12 col-md-6 center col-perfil">
                                <img class="img-perfil" src="midias/icones-perfil/perfil.png" alt="Círculo com silhueta de pessoa">
                                <!-- <button class="btn-perfil btn-follow my-2 d-none d-md-block">
                                    Editar
                                </button> -->
                                <?=$btn1?>
                                <button class="button btn-share my-2 d-none d-md-block">Compartilhar</button>
                            </div>
                            <!-- Dados -->
                            <div class="col-12 col-md-6 col-dados">
                                <h2 class="mb-1 nome-user"><?=$user?></h2>
                                <div class="row row-topico my-1">
                                    <div class="col-6 txt-c"><span class="topico">Seguidores:</span> <?=$qtdeS1?></div>
                                    <div class="col-6 txt-c"><span class="topico">Seguindo:</span> <?=$qtdeS2?></div>
                                </div>
                                <div class="row row-topico my-1">
                                    <div class="col-12">
                                        <span class="topico">Sobre mim: </span>
                                        <span class="bio" id="bio"><?=$biog?></span>
                                    </div>
                                </div>
                                <div class="row row-topico my-1">
                                    <div class="col-6 txt-c"><span class="topico">Postagens:</span> <?=$qtdeP?></div>
                                    <div class="col-6 txt-c"><span class="topico">Curtidas:</span> <?=$qtdeC?></div>
                                </div>
                                <div class="mt-1">
                                    <div class="col-12 reputacao">
                                        <span class="topico">Reputação:</span> 
                                        <?php
                                            echo $usuario->carregaReputacaoUser($id, $rep);
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <?=$btn2?>
                                    <button class="button btn-perfil btn-share my-1 d-block d-md-none">
                                        Compartilhar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-7 center col-bg">
                        <div class="back"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Postagens -->
        <section class="container my-4 px-2 nunito">
            <div class="row center mb-3">
                <div class="d-none d-sm-inline-block col-sm-3 col-lg-4"><div class="row linha"></div><div class="row"><br></div></div>
                <div class="col-12  col-sm-6 col-lg-4"><h1 class="display-5 fw-bold text-center mb-2">PUBLICAÇÕES</h1></div>
                <div class="d-none d-sm-inline-block col-sm-3 col-lg-4"><div class="row linha"></div><div class="row"><br></div></div>
            </div>
            <div class="center2">
                <div class="container-fluid row center ideias mb-3">
                    <?=$melhorPost?>
                </div>
                <div class="container-fluid row center ideias">
                    <?php
                        //Carregamento das ideias de reutilazação
                        if ($existe){
                            foreach($postagens2 as $post){
                                echo $post;
                            }
                        }
                        else{
                            echo '<div class="novaIdeia">Nenhuma postagem cadastrada</div>';
                        }
                    ?>
                </div>
            </div>
        </section>
        <?php
        if($type == 'conta'){
            include_once('botao.html');
        }
        ?>
    </main>

    <footer>
        <?php
            require_once('rodape/rodape.html');
        ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>

    <script>
        var bio = document.getElementById('bio');
        var biog = bio.innerText;
        var biog2 = '';
        console.log(biog)
        if(biog.length > 50){
            for (let index = 0; index < 50; index++) {
                biog2 += `${biog.charAt(index)}`;
            }
            biog2 = `${biog2}... <span id="ver-mais" onclick="ver()">Ver mais</span>`;
            bio.innerHTML = biog2;
        }

        function ver(){
            if (bio.innerHTML.toString() == biog2.toString()){
                console.log(biog);
                bio.innerHTML = `${biog}... <span id="ver-mais" onclick="ver()">Ver menos</span>`;
            }
            else {
                bio.innerHTML = biog2;
                console.log(biog2);
            }
        }
    </script>

</body>
</html>