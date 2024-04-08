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
    <style>
        /*Container conta*/
        .container-conta{
            background-color: #d9d9d9;
            border-radius: 15px;
        }
        .col-perfil{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            flex-wrap: nowrap;
        }
            
            /* Coluna -> Foto perfil e dados */
            /* Foto perfil */
                .img-perfil{
                    height: 150px;
                    width:150px;    
                }

                /* Button Follow */
                .btn-follow {
                    width: 100%;
                    background-color: #3a7d44;
                    border: 2px solid #3a7d44;
                    border-radius: 34px;
                    background-color: transparent;
                }

                .btn-follow::before {
                    content: '';
                    position: absolute;
                    inset: 0;
                    margin: auto;
                    width: 100%;
                    border-radius: inherit;
                    scale: 0;
                    z-index: -1;
                    background-color: #3a7d44;
                    transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
                }
                        
                .btn-follow:hover::before {
                    scale: 1;
                }

                .btn-follow:hover {
                    color: #f4f4f4;
                    font-weight: bold;
                    scale: 1.05;
                    box-shadow: 0 0px 20px rgba(193, 163, 98,0.4);
                }

                .btn-follow:active {
                    scale: 1;
                }

                /* Button Share */
                .btn-share {
                    width: 100%;
                    background-color: #555555;
                    border: 2px solid #555555;
                    border-radius: 34px;
                    background-color: transparent;
                }

                .btn-share::before {
                    content: '';
                    position: absolute;
                    inset: 0;
                    margin: auto;
                    width: 100%;
                    border-radius: inherit;
                    scale: 0;
                    z-index: -1;
                    background-color: #555555;
                    transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
                }
                        
                .btn-share:hover::before {
                    scale: 1;
                }

                .btn-share:hover {
                    color: #f4f4f4;
                    font-weight: bold;
                    scale: 1.05;
                    box-shadow: 0 0px 20px rgba(193, 163, 98,0.4);
                }

                .btn-share:active{
                    scale: 1;
                }

                /* Dados */
                .col-dados{
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    flex-wrap: wrap;
                }
                .nome-user{
                    font-weight: bolder;
                    font-size: 2rem;
                    text-align: center;
                }
                .txt-bio{
                    font-weight: bold;
                    font-size: 1.5rem;
                }
                .row-topico{
                    display: flex;
                    align-items: center;
                    flex-wrap: wrap;
                    font-size: 15px;
                }
                .topico{
                    font-size: 16px;
                    font-weight: bold;
                }
                .reputacao{
                    display: flex;
                    flex-wrap: nowrap;
                    align-items: center;
                }
                .rating-user label{
                    text-shadow: 1px 1px 3px #aaa;
                    color: #adadad;
                }

            /* Coluna -> Background */
            .back{
                width: 100%;
                height: 100%;
                background-color: gray;
                border-radius: 20px;
            }
        /* Fim do Container Conta */

        /* Container Publicações */
        .linha{
            border-bottom: 1px solid #ada7ad;
        }

        /* Fim do container publicações */
        
        /* Media Query */
        @media screen and (min-width: 260px) and (max-width: 312px) {
            .txt-c{
                text-align: center;
            }
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
        <section class="container mb-4">
            <h1 class="display-5 fw-bold text-center mb-2">MINHA CONTA</h1>
        </section>
        <!-- Container com os dados -->
        <section class="mb-4 px-2 nunito">
            <div class="container container-conta p-4">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5">
                        <div class="row">
                            <!-- Coluna foto perfil -->
                            <div class="col-12 col-md-6 center col-perfil">
                                <img class="img-perfil" src="icones-materiais/perfil.png" alt="Círculo com silhueta de pessoa">
                                <!-- <button class="btn-perfil btn-follow my-2 d-none d-md-block">
                                    Editar
                                </button> -->
                                <button class="button btn-follow my-2 d-none d-md-block">Editar</button>
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
                                        <span class="bio">
                                        <?=$biog?> Usar <strong>VER MAIS</strong>
                                        </span>
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
                                    <button class="button btn-perfil btn-follow my-2 d-block d-md-none">
                                        Editar
                                    </button>
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
        <section class="container my-5 px-2 nunito">
            <div class="row center mb-3">
                <div class="d-none d-sm-inline-block col-sm-3 col-lg-4"><div class="row linha"></div><div class="row"><br></div></div>
                <div class="col-12  col-sm-6 col-lg-4"><h1 class="display-5 fw-bold text-center mb-2">PUBLICAÇÕES</h1></div>
                <div class="d-none d-sm-inline-block col-sm-3 col-lg-4"><div class="row linha"></div><div class="row"><br></div></div>
            </div>
            <div class="container-fluid row center ideias mb-5">
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
        </section>
    </main>

    <footer>
        <?php
            require_once('rodape/rodape.html');
        ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>