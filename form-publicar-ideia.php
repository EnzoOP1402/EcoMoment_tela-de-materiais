<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $msg = '456';
    //Dados do usuário logado
}
// else if ($_SERVER['REQUEST_METHOD'] === 'POST'){

//     $nome = trim($_REQUEST['nomeIdeia']);
//     // $user = $_REQUEST['user'];
//     $user = '@enzoop1402';
//     $descricao = trim($_REQUEST['descricaoIdeia']);
//     $materiaisNec = trim($_REQUEST['materiaisNecessariosIdeia']);
//     $instrucoes = trim($_REQUEST['instrucoesIdeia']);
//     $material = $_REQUEST['material'];
//     $dificuldade = $_REQUEST['dificuldade'];

//     // require_once('Redimensionamento.php');
//     // $redimensionar = new Redimensionamento();
//     // if(isset($_FILES['anexo'])){
//     //     $anexo = $_FILES['anexo'];
//     //     $retorno = $redimensionar->processar($anexo);
//     //     if($retorno){
//     //         echo("<script>Precisa não Antoin</script>");
//     //     }
//     // }

//     if($nome != '' and $user != '' and $descricao != '' and $materiaisNec != '' and $instrucoes != '' and $material != null and $dificuldade != null){
//         include 'connection.php';

//         $sql = 'INSERT INTO prototipo_Postagem_EcoMoment (nomePostagem, nomeUsuario, descricaoPostagem, materiaisNecessariosPostagem, instrucoesPostagem, materialPostagem, dificuldadePostagem) values ("'.$nome.'", "'.$user.'", "'.$descricao.'", "'.$materiaisNec.'", "'.$instrucoes.'", "'.$material.'", "'.$dificuldade.'")';

//         $stmt = $con->prepare($sql);
//         if($stmt->execute()){
//             echo '<script>document.alert("Muito obrigado! \n Sua ideia foi publicada com sucesso.");</script>';
//         }else{
//             echo '<script>document.alert("ERRO \n Não foi possível publicar sua ideia. Verifique se há algum erro ou tente novamente.");</script>';
//         }

//         $con->close();
//     }
//     else{
//         $msg = '<span id="erro" class="mb-3">Todos os campos devem estar preenchidos corretamente</span>';
//     }

    

// }

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
    <!-- <link rel="stylesheet" href="style-publicar-ideia.css"> -->
    <title>Publicar ideia</title>
    <style>
        #erro{
            color: red;
            font-weight: bold;
        }
        .obrigatorio{
            color: #3a7d44;
        }

        #sub-titulo{
            font-size: 1.5rem;
        }

        .sub-tpc{
            color: #3a7d44;
            font-family: Circe, sans-serif;
        }

        .form-area{
            width: 70%;
        }

        form{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .form-label{
            font-size: 20px;
            font-weight: bold;
        }

        textarea{
            border-radius: 10px;
            padding: 8px;
        }

        input[type="radio" i] + label{
            font-size: 18px;
            cursor: pointer;
        }

        input[type="file" i]{
            cursor: pointer;
        }

        .button{
            border: 2px solid #409d4e;
        }

        .button::before {
            background-color: #409d4e;
        }

        .button:hover {
            color: #f4f4f4;
        }

        @media screen and (min-width: 250px) and (max-width: 320px) {
            #sub-titulo{
                font-size: 14px;
            }
        }
        
        @media screen and (min-width: 321px) and (max-width: 520px) {
            #sub-titulo{
                font-size: 1rem;
            }
        }

        @media screen and (min-width: 521px) and (max-width: 780px) {
            #sub-titulo{
                font-size: 1.3rem;
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
        <section>
            <h1 class="display-5 fw-bold text-center mb-2">*ft* PUBLIQUE SUA NOVA IDEIA</h1>
            <h2 class=" display-6 fw-bold nunito text-center mb-1" id="sub-titulo">É super simples e ajuda muito!</h2>

            <div class="form-area container my-5 nunito">
                <h3 class="sub-tpc">MINHA IDEIA</h3>
                <form method="" action="" class="needs-validation">
                    <div class="row container my-3">
                        <label for="nome" class="form-label">Nome da Ideia: <span class="obrigatorio">*</span></label>
                        <br>
                        <input class="form-control" type="text" name="nomeIdeia" id="nome" placeholder="Até 80 caracteres" maxlength="80">
                        <div class="invalid-feedback">Informe o nome da ideia</div>
                    </div>
                    <div class="row container mt-3">
                        <div class="col-12 col-md-6 center mb-3">
                            <input type="file" name="anexo[]" id="foto">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <p class="form-label">Tipo de material: <span class="obrigatorio">*</span></p>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <input type="radio" name="material" id="plastico" value="1">
                                    <label for="plastico">Plástico</label>
                                    <br>
                                    <input type="radio" name="material" id="metal" value="2">
                                    <label for="metal">Metal</label>
                                    <br>
                                    <input type="radio" name="material" id="papel" value="3">
                                    <label for="papel">Papel</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="radio" name="material" id="vidro" value="4">
                                    <label for="vidro">Vidro</label>
                                    <br>
                                    <input type="radio" name="material" id="madeira" value="5">
                                    <label for="madeira">Madeira</label>
                                    <br>
                                    <input type="radio" name="material" id="organico" value="6">
                                    <label for="organico"><span class="d-none d-sm-block d-md-none d-xl-block">Resíduo orgânico</span><span class="d-block d-sm-none d-md-block d-xl-none">Orgânico</span></label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Informe o material ao qual se refere a ideia</div>
                        </div>
                    </div>
                    <div class="row my-2 my-md-4">
                        <h3 class="sub-tpc">INFORMAÇÕES IMPORTANTES</h3>
                        <div class="row my-md-3">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="descricao" class="form-label">Descrição da ideia: <span class="obrigatorio">*</span></label>
                                <br>
                                <textarea class="form-control" name="descricaoIdeia" id="descricao" cols="30" rows="6" placeholder="Até 300 caracteres" maxlength="300"></textarea>
                                <div class="invalid-feedback">Descreva a ideia</div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="materiaisNecessarios" class="form-label">Materiais necessários: <span class="obrigatorio">*</span></label>
                                <br>
                                <textarea class="form-control" name="materiaisNecessariosIdeia" id="materiaisNecessarios" cols="30" rows="6" placeholder="Coloque tudo o que vamos precisar"></textarea>
                                <div class="invalid-feedback">Informe os materiais necessários</div>
                            </div>
                        </div>
                        <div class="row my-md-3">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="instrucoes" class="form-label">Instruções para a ideia: <span class="obrigatorio">*</span></label>
                                <br>
                                <textarea class="form-control" name="instrucoesIdeia" id="instrucoes" cols="30" rows="6" placeholder="Coloque tudo o que vamos precisar"></textarea>
                                <div class="invalid-feedback">Informe as instruções</div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <p class="form-label">Dificuldade da ideia: <span class="obrigatorio">*</span></p>
                                <input type="radio" name="dificuldade" id="facil" value="1">
                                <label for="facil">Facil</label>
                                <br>
                                <input type="radio" name="dificuldade" id="media" value="2">
                                <label for="media">Média</label>
                                <br>
                                <input type="radio" name="dificuldade" id="dificil" value="3">
                                <label for="dificil">Difícil</label>
                                <div class="invalid-feedback">Informe a dificuldade de execução</div>
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

            <!-- <div class="formulario center nunito mt-4 mb-4">
                <form class="needs-validation" method="post">
                    <label for="user">Usuário <span class="obrigatorio">*</span></label>
                    <br>
                    <input type="text" name="user" id="user" placeholder="Até 50 caracteres" maxlength="50">


                    
                    <br><br>

                    <br><br>
                    
                    
                    <br><br>

                    <input type="submit" value="Publicar">
                    
                </form>
            </div> -->
        </section>
    </main>

    <footer>
        <?php
            require_once('rodape/rodape.html');
        ?>
    </footer>


    <!--Scripts Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- <script> 
        const tooltipTriggerList = document.querySelectorAll('.tt') //.tt é a classe que declaramos na tooltip
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script> Utilizado para habilitar as tooltips -->

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

</body>
</html>