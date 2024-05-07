<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $msg = '';
    $msgNome = '';
    $msgDesc = '';
    $msgMat = '';
    $msgInst = '';
    $msgFoto = '';
    //Dados do usuário logado
}
else if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $msg = '';
    $msgNome = '';
    $msgDesc = '';
    $msgMat = '';
    $msgInst = '';
    $msgFoto = '';

    $nome = trim($_REQUEST['nomeIdeia']);
    // $user = $_REQUEST['user']; /* Pega a informação do login */
    $user = '@enzoop1402';
    $descricao = trim($_REQUEST['descricaoIdeia']);
    $materiaisNec = trim($_REQUEST['materiaisNecessariosIdeia']);
    $instrucoes = trim($_REQUEST['instrucoesIdeia']);
    $material = $_REQUEST['material'];
    $dificuldade = $_REQUEST['dificuldade'];

    if(($nome != '' and $user != '' and $descricao != '' and $materiaisNec != '' and $instrucoes != '' and $material != null and $dificuldade != null and isset($_FILES['arquivo'])) and (strlen($nome)>3 and strlen($descricao)>10 and strlen($materiaisNec)>10 and strlen($instrucoes)>10)){
        if(! empty($_FILES['arquivo']['name'])){

            $nomeArq = $_FILES['arquivo']['name'];
            $tipo = $_FILES['arquivo']['type'];
            $nomeTemp = $_FILES['arquivo']['tmp_name'];
            $tamanho = $_FILES['arquivo']['size'];
            $erros = array();

            $tamanhoMaximo = 1024 * 1024 * 5;
            if($tamanho > $tamanhoMaximo){
                $erros[] = 'Seu arquivo excede o tamanho máximo<br>';
            }

            $arquivosPermitidos = ['png','jpg','jpeg'];
            $extensao = pathinfo($nomeArq, PATHINFO_EXTENSION);
            if(! in_array($extensao, $arquivosPermitidos)){
                $erros[] = 'Arquivo não permitido';
            }

            $typesPermitidos = ['image/png','image/jpg','image/jpeg'];
            if(! in_array($extensao, $arquivosPermitidos)){
                $erros[] = 'Tipo de arquivo não permitido';
            }

            // list($larguraOriginal, $alturaOriginal) = getimagesize($nomeArq);
            // if(($larguraOriginal != 64 and $alturaOriginal != 64) or $larguraOriginal/$alturaOriginal != 1){
            //     $erros[] = 'Imagem fora das dimensões permitidas';
            // }

            if(! empty($erros)){
                foreach($erros as $erro){
                    $msgFoto .= $erro.'<br>';
                }
            } else{
                $caminho = 'midias/imagens-ideias/';
                $novo_nome = md5(time().rand(0,999)).'.'.$extensao;
                if(move_uploaded_file($nomeTemp, $caminho.$novo_nome)){
                    
                    include 'connection.php';

                    $sql = 'INSERT INTO prototipo_Postagem_EcoMoment (nomePostagem, nomeUsuario, descricaoPostagem, materiaisNecessariosPostagem, instrucoesPostagem, materialPostagem, dificuldadePostagem) values ("'.$nome.'", "'.$user.'", "'.$descricao.'", "'.$materiaisNec.'", "'.$instrucoes.'", "'.$material.'", "'.$dificuldade.'")';

                    $stmt = $con->prepare($sql);
                    if($stmt->execute()){
                        echo '<script>document.alert("Muito obrigado! \n Sua ideia foi publicada com sucesso.");</script>';
                    }else{
                        echo '<script>document.alert("ERRO \n Não foi possível publicar sua ideia. Verifique se há algum erro ou tente novamente.");</script>';
                    }

                    $con->close();
                    $msg = '';
                    $msgNome = '';
                    $msgDesc = '';
                    $msgMat = '';
                    $msgInst = '';
                    $msgFoto = '';
                }
                else '<script>alert("Falha ao realizar o upload")</script>';
            }


        }
    }
    else{
        if(strlen($nome)<3){
            $msgNome = 'O nome deve ter no mínimo 3 caracteres.';
        }
        if(strlen($descricao)<10){
            $msgDesc = 'A descrição deve ter no mínimo 10 caracteres.';
        }
        if(strlen($materiaisNec)<10){
            $msgMat = 'A descrição dos materiais necessários deve ter no mínimo 10 caracteres.<br>Verifique se todos estão informados.';
        }
        if(strlen($instrucoes)<10){
            $msgInst = 'A descrição das instruções deve ter no mínimo 10 caracteres';
        }
        $msg = '<span class="erro" class="mb-3">Todos os campos devem estar preenchidos corretamente</span>';
    }

    

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style-padrao.css">
    <link rel="stylesheet" href="style-publicar-ideia.css">
    <title>Publicar ideia</title>
</head>
<body>
    <header>
        <?php
            require_once('navbar/navbar.html');
        ?>
    </header>

    <main id="navbarMargin">
        <section>
            <h1 class="display-5 fw-bold text-center center mb-2"><img class="icone-titulo d-none d-sm-inline" src="midias/icones-form-publicar/ideia-lamp.png" alt="Ícone de lâmpada saindo da caixa"> PUBLIQUE SUA NOVA IDEIA</h1>
            <h2 class=" display-6 fw-bold nunito text-center mb-1" id="sub-titulo">É super simples e ajuda muito!</h2>

            <div class="form-area container my-5 nunito">
                <form method="post" action="" class="needs-validation" id="form-ideia" enctype="multipart/form-data" novalidate> <!--Direcionar para uma pag intermediária-->
                    <div class="row sub-tpc2 my-2">
                        <h3 class="sub-tpc">MINHA IDEIA</h3>
                    </div>
                    <div class="container center3">
                        <div class="row container my-3">
                            <label for="nome" class="form-label">Nome da Ideia: <span class="obrigatorio">*</span></label>
                            <input class="form-control" type="text" name="nomeIdeia" id="nome" placeholder="Até 80 caracteres" maxlength="80" required>
                            <div class="invalid-feedback">Informe o nome da ideia</div>
                        </div>
                        <div class="center erro"><?=$msgNome?></div>
                        <div class="row container center3 mt-3">
                            <div class="col-12 col-md-6 center2 mb-3">
                                <input class="form-control d-block d-sm-none" type="file" name="arquivo" id="foto" required>
                                <label for="foto" class="d-none d-sm-flex" id="lbl-ft">
                                    <div id="foto-sqr"><img src="midias/icones-form-publicar/foto.png" alt="Ícone de imagem em preto e branco"></div>
                                    <div id="nome-ft" class="center">Nenhum arquivo selecionado</div>
                                    <div type="button" class="button" id="btn-ft">ESCOLHA UMA IMAGEM</div>
                                </label>
                                <div class="invalid-feedback"><span class="center">Insira pelo menos uma foto ou vídeo da ideia</span></div>
                                <div class="center erro"><?=$msgFoto?></div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <p class="form-label">Tipo de material: <span class="obrigatorio">*</span></p>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="radio form-check">
                                            <input class="form-check-input" type="radio" name="material" id="plastico" value="1" required>
                                            <label class="form-check-label" for="plastico">Plástico</label>
                                        </div>
                                        <div class="radio form-check mt-1">
                                            <input class="form-check-input" type="radio" name="material" id="metal" value="2" required>
                                            <label class="form-check-label" for="metal">Metal</label>
                                        </div>
                                        <div class="radio form-check mt-1">
                                            <input class="form-check-input" type="radio" name="material" id="papel" value="3" required>
                                            <label class="form-check-label" for="papel">Papel</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="radio form-check mt-1 mt-md-0">
                                            <input class="form-check-input" type="radio" name="material" id="vidro" value="4" required>
                                            <label class="form-check-label" for="vidro">Vidro</label>
                                        </div>
                                        <div class="radio form-check mt-1">
                                            <input class="form-check-input" type="radio" name="material" id="madeira" value="5" required>
                                            <label class="form-check-label" for="madeira">Madeira</label>
                                        </div>
                                        <div class="radio form-check mt-1">
                                            <input class="form-check-input" type="radio" name="material" id="organico" value="6" required>
                                            <label class="form-check-label" for="organico"><span class="d-none d-sm-block d-md-none d-xl-block">Resíduo orgânico</span><span class="d-block d-sm-none d-md-block d-xl-none">Orgânico</span></label>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="material" class="form-check-input d-none">
                                        <div class="invalid-feedback">Informe o material ao qual se refere a ideia</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row sub-tpc2 my-2">
                        <h3 class="sub-tpc">INFORMAÇÕES IMPORTANTES</h3>
                    </div>
                    <div class="row container center3 my-2 my-md-4">
                        <div class="row my-md-3">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="descricao" class="form-label">Descrição da ideia: <span class="obrigatorio">*</span></label>
                                <br>
                                <textarea class="form-control" name="descricaoIdeia" id="descricao" cols="30" rows="6" placeholder="Até 300 caracteres" maxlength="300" required></textarea>
                                <div class="invalid-feedback">Descreva a ideia</div>
                                <div class="center erro"><?=$msgDesc?></div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="materiaisNecessarios" class="form-label">Materiais necessários: <span class="obrigatorio">*</span></label>
                                <br>
                                <textarea class="form-control" name="materiaisNecessariosIdeia" id="materiaisNecessarios" cols="30" rows="6" placeholder="Coloque tudo o que vamos precisar" required></textarea>
                                <div class="invalid-feedback">Informe os materiais necessários</div>
                                <div class="center erro"><?=$msgMat?></div>
                            </div>
                        </div>
                        <div class="row my-md-3">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="instrucoes" class="form-label">Instruções para a ideia: <span class="obrigatorio">*</span></label>
                                <br>
                                <textarea class="form-control" name="instrucoesIdeia" id="instrucoes" cols="30" rows="6" placeholder="Como vamos fazer?" required></textarea>
                                <div class="invalid-feedback">Informe as instruções</div>
                                <div class="center erro"><?=$msgInst?></div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <p class="form-label">Dificuldade da ideia: <span class="obrigatorio">*</span></p>
                                <div class="radio form-check mt-1">
                                    <input class="form-check-input" type="radio" name="dificuldade" id="facil" value="1" required>
                                    <label class="form-check-label" for="facil">Facil</label>
                                </div>
                                <div class="radio form-check mt-1">
                                    <input class="form-check-input" type="radio" name="dificuldade" id="media" value="2" required>
                                    <label class="form-check-label" for="media">Média</label>
                                </div>
                                <div class="radio form-check mt-1">
                                    <input class="form-check-input" type="radio" name="dificuldade" id="dificil" value="3" required>
                                    <label class="form-check-label" for="dificil">Difícil</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="dificuldade" class="form-check-input d-none">
                                    <div class="invalid-feedback">Informe a dificuldade de execução</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="center">
                    </div>
                    <div class="nunito center">
                        <button type="submit" class="button">PUBLICAR</button>
                    </div>
                </form>
            </div>
        </section>
        <div class="center my-3">
            <?=$msg?>
        </div>
    </main>

    <footer>
        <?php
            require_once('rodape/rodape.html');
        ?>
    </footer>


    <!--Scripts Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script type="text/javascript"> //Para as validações
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
    </script>

    <script>
        document.getElementById('foto').addEventListener('change', function(){
            document.querySelector('#nome-ft').textContent = this.files[0].name;
            document.getElementById('foto-sqr').innerHTML = '<img src="midias/icones-form-publicar/certo.png" alt="Ícone de verificação correta">';
        });
    </script>

</body>
</html>