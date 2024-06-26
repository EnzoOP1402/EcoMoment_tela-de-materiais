<?php
class Ideias {
    private $idPostagem;
    private $nomeIdeia;
    private $userIdeia;
    private $numCurtidas = 0;
    private $descricaoPostagem;
    private $materiaisNecessarios;
    private $instrucoesPostagem;
    private $materialPostagem;
    private $dificuldadeIdeia;
    private $avaliacaoPostagem = 0;
    private $qtdeAvaliacoes = 0;
    

    //Construtores

    public function criaIdeia($id ,$nome, $usuario, $descricao, $materiaisNec, $instrucoes, $materialPost, $dificuldade){
        $this->idPostagem = $id;
        $this->nomeIdeia = $nome;
        $this->userIdeia = $usuario;
        $this->numCurtidas = 0;
        $this->descricaoPostagem = $descricao;
        $this->materiaisNecessarios = $materiaisNec;
        $this->instrucoesPostagem = $instrucoes;
        $this->materialPostagem = $materialPost;
        $this->dificuldadeIdeia = $dificuldade;
        $this->avaliacaoPostagem = 0;
        $this->qtdeAvaliacoes = 0;
    }


    public function __construct($id, $nome, $usuario, $dificuldade, $avaliacao){
        $this->idPostagem = $id;
        $this->nomeIdeia = $nome;
        $this->userIdeia = $usuario;
        $this->dificuldadeIdeia = $dificuldade;
        $this->avaliacaoPostagem = $avaliacao;
    }

    //Métodos

    public function createCardIdeia($nome, $usuario, $dificuldade, $avaliacao, $idPost){
        return '
        <div class="card">
            <div class="row">
                <div class="col-12 col-sm-6 card-col img-card">
                    <a href="pagIdeia.php?idPostagem='.$idPost.'"><img class="img-card-ideia" src="midias/icones-materiais/img-ideia.jpg" alt="Ideia de reutilização com garrafas pet"></a>
                </div>
                <div class="col-12 col-sm-6 card-col card-content">
                    <a href="pagIdeia.php?idPostagem='.$idPost.'">
                        <div class="card-title">'.$nome.'</div>
                    </a>
                    <a href="perfil.php?type=perfil&user='.$usuario.'">
                        <div class="card-subtitle">'.$usuario.'</div>
                    </a>
                    <a href="pagIdeia.php?idPostagem='.$idPost.'">
                        <div class="card-text">
                            '.$this->carregaAvaliacao2($avaliacao).'
                            <div class="dificuldade dificuldade-'.$dificuldade.'"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>';
    }
    /*
    Código acima descomprimido ↑

    '<div class="card">
            <div class="row">
                <div class="col-12 col-sm-6 card-col img-card">
                    <a href="pagIdeia.php?idPostagem='.$idPost.'"><img class="img-card-ideia" src="midias/icones-materiais/img-ideia.jpg" alt="Ideia de reutilização com garrafas pet"></a>
                </div>
                <div class="col-12 col-sm-6 card-col card-content">
                    <a href="pagIdeia.php?idPostagem='.$idPost.'">
                        <div class="card-title">'.$nome.'</div>
                    </a>
                    <a href="perfil.php?type=perfil&user='.$usuario.'">
                        <div class="card-subtitle">'.$usuario.'</div>
                    </a>
                    <a href="pagIdeia.php?idPostagem='.$idPost.'">
                        <div class="card-text">
                            '.$this->carregaAvaliacao2($avaliacao).'
                            <div class="dificuldade dificuldade-'.$dificuldade.'"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>';

    Código comprimido

    '<div class="card"><div class="row"><div class="col-12 col-sm-6 card-col img-card"><a href="pagIdeia.php?idPostagem='.$idPost.'"><img class="img-card-ideia" src="midias/icones-materiais/img-ideia.jpg" alt="Ideia de reutilização com garrafas pet"></a></div><div class="col-12 col-sm-6 card-col card-content"><a href="pagIdeia.php?idPostagem='.$idPost.'"><div class="card-title">'.$nome.'</div></a><a href="perfil.php?type=perfil&user='.$usuario.'"><div class="card-subtitle">'.$usuario.'</div></a><a href="pagIdeia.php?idPostagem='.$idPost.'"><div class="card-text">'.$this->carregaAvaliacao2($avaliacao).'<div class="dificuldade dificuldade-'.$dificuldade.'"></div> </div></a></div></div></div>';
    */

    public function createCardIdeia2($nome, $usuario, $dificuldade, $avaliacao, $idPost){
        return '
        <style>
            .row-av-ideia>*{
                width: min-content;
            }
        </style>
        <div class="card col-12 col-md-6 col-lg-12">
            <div class="row">
                <div class="col-12 card-col img-card">
                    <a href="pagIdeia.php?idPostagem='.$idPost.'"><img class="img-card-ideia" src="midias/icones-materiais/img-ideia.jpg" alt="Ideia de reutilização com garrafas pet"></a>
                </div>
                <div class="col-12 card-col card-content">
                    <a href="pagIdeia.php?idPostagem='.$idPost.'">
                        <div class="card-title">'.$nome.'</div>
                    </a>
                    <a href="perfil.php?type=perfil&user='.$usuario.'">
                        <div class="card-subtitle">'.$usuario.'</div>
                    </a>
                    <a href="pagIdeia.php?idPostagem='.$idPost.'">
                        <div class="card-text">
                            <div class="row row-av-ideia">
                                <div class="alinha-estrela">'.$this->carregaAvaliacao($avaliacao).'</div>
                                <div>
                                    <div class="dificuldade dificuldade-'.$dificuldade.'"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>';
    }

    public function createCardIdeia3($nome, $usuario, $dificuldade, $avaliacao, $idPost){
        return '
        <div class="card">
            <div class="row">
                <div class="col-12 col-sm-6 card-col img-card">
                    <a href="pagIdeia.php?idPostagem='.$idPost.'"><img class="img-card-ideia" src="midias/icones-materiais/img-ideia.jpg" alt="Ideia de reutilização com garrafas pet"></a>
                </div>
                <div class="col-12 col-sm-6 card-col card-content">
                    <a href="pagIdeia.php?idPostagem='.$idPost.'">
                        <div class="card-title">'.$nome.'</div>
                    </a>
                    <a href="perfil.php?type=perfil&user='.$usuario.'">
                        <div class="card-subtitle">'.$usuario.'</div>
                    </a>
                    <a href="pagIdeia.php?idPostagem='.$idPost.'">
                        <div class="card-text">
                            '.$this->carregaAvaliacao2($avaliacao).'
                            <div class="dificuldade dificuldade-'.$dificuldade.'"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>';
    }

    public function createCardIdeia4($nome, $usuario, $dificuldade, $avaliacao, $idPost){
        return '
        <div class="card">
        <img src="midias/icones-perfil/selo-ideia.png" class="d-none d-sm-block selo-melhor-ideia">
        <img src="midias/icones-perfil/selo-ideia.png" class="d-block d-sm-none selo-melhor-ideia-sm">
                <div class="row">
                    <div class="col-12 col-sm-6 card-col img-card">
                        <a href="pagIdeia.php?idPostagem='.$idPost.'"><img class="img-card-ideia" src="midias/icones-materiais/img-ideia.jpg" alt="Ideia de reutilização com garrafas pet"></a>
                    </div>
                    <div class="col-12 col-sm-6 card-col card-content">
                        <a href="pagIdeia.php?idPostagem='.$idPost.'">
                            <div class="card-title">'.$nome.'</div>
                        </a>
                        <a href="perfil.php?type=perfil&user='.$usuario.'">
                            <div class="card-subtitle">'.$usuario.'</div>
                        </a>
                        <a href="pagIdeia.php?idPostagem='.$idPost.'">
                            <div class="card-text">
                                '.$this->carregaAvaliacao($avaliacao).'
                                <div class="dificuldade dificuldade-'.$dificuldade.'"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>';
    }

    public function createCardIdeia5($nome, $usuario, $dificuldade, $avaliacao, $idPost){
        return '<div class="card"><div class="row"><div class="col-12 col-sm-6 card-col img-card"><a href="pagIdeia.php?idPostagem='.$idPost.'"><img class="img-card-ideia" src="midias/icones-materiais/img-ideia.jpg" alt="Ideia de reutilização com garrafas pet"></a></div><div class="col-12 col-sm-6 card-col card-content"><a href="pagIdeia.php?idPostagem='.$idPost.'"><div class="card-title">'.$nome.'</div></a><a href="perfil.php?type=perfil&user='.$usuario.'"><div class="card-subtitle">'.$usuario.'</div></a><a href="pagIdeia.php?idPostagem='.$idPost.'"><div class="card-text">'.$this->carregaAvaliacao3($avaliacao).'<div class="dificuldade dificuldade-'.$dificuldade.'"></div> </div></a></div></div></div>';
    }

    public function carregaAvaliacao($avaliacao){
        if ($avaliacao == 5){
            return '
            <div class="rating">
                <input value="5" name="rating-5" id="star5" type="radio" disabled checked>
                <label for="star5"></label>
                <input value="4" name="rating-4" id="star4" type="radio" disabled>
                <label for="star4"></label>
                <input value="3" name="rating-3" id="star3" type="radio" disabled>
                <label for="star3"></label>
                <input value="2" name="rating-2" id="star2" type="radio" disabled>
                <label for="star2"></label>
                <input value="1" name="rating-1" id="star1" type="radio" disabled>
                <label for="star1"></label>
            </div>';
        }
        else if ($avaliacao >= 4){
            return '
            <div class="rating">
                <input value="5" name="rating-5" id="star5" type="radio" disabled>
                <label for="star5"></label>
                <input value="4" name="rating-4" id="star4" type="radio" disabled checked>
                <label for="star4"></label>
                <input value="3" name="rating-3" id="star3" type="radio" disabled>
                <label for="star3"></label>
                <input value="2" name="rating-2" id="star2" type="radio" disabled>
                <label for="star2"></label>
                <input value="1" name="rating-1" id="star1" type="radio" disabled>
                <label for="star1"></label>
            </div>';
        }
        else if ($avaliacao >= 3){
            return '
            <div class="rating">
                <input value="5" name="rating-5" id="star5" type="radio" disabled>
                <label for="star5"></label>
                <input value="4" name="rating-4" id="star4" type="radio" disabled>
                <label for="star4"></label>
                <input value="3" name="rating-3" id="star3" type="radio" disabled checked>
                <label for="star3"></label>
                <input value="2" name="rating-2" id="star2" type="radio" disabled>
                <label for="star2"></label>
                <input value="1" name="rating-1" id="star1" type="radio" disabled>
                <label for="star1"></label>
            </div>';
        }
        else if ($avaliacao >= 2){
            return '
            <div class="rating">
                <input value="5" name="rating-5" id="star5" type="radio" disabled>
                <label for="star5"></label>
                <input value="4" name="rating-4" id="star4" type="radio" disabled>
                <label for="star4"></label>
                <input value="3" name="rating-3" id="star3" type="radio" disabled>
                <label for="star3"></label>
                <input value="2" name="rating-2" id="star2" type="radio" disabled checked>
                <label for="star2"></label>
                <input value="1" name="rating-1" id="star1" type="radio" disabled>
                <label for="star1"></label>
            </div>';
        }
        else if ($avaliacao >= 1){
            return '
            <div class="rating">
                <input value="5" name="rating-5" id="star5" type="radio" disabled>
                <label for="star5"></label>
                <input value="4" name="rating-4" id="star4" type="radio" disabled>
                <label for="star4"></label>
                <input value="3" name="rating-3" id="star3" type="radio" disabled>
                <label for="star3"></label>
                <input value="2" name="rating-2" id="star2" type="radio" disabled>
                <label for="star2"></label>
                <input value="1" name="rating-1" id="star1" type="radio" disabled checked>
                <label for="star1"></label>
            </div>';
        }
        else{
            return '
            <div class="rating">
                <input value="5" name="rating-5" id="star5" type="radio" disabled>
                <label for="star5"></label>
                <input value="4" name="rating-4" id="star4" type="radio" disabled>
                <label for="star4"></label>
                <input value="3" name="rating-3" id="star3" type="radio" disabled>
                <label for="star3"></label>
                <input value="2" name="rating-2" id="star2" type="radio" disabled>
                <label for="star2"></label>
                <input value="1" name="rating-1" id="star1" type="radio" disabled>
                <label for="star1"></label>
            </div>';
        }
    }

    public function carregaAvaliacao2($avaliacao){
        if ($avaliacao == 5){
            return '
            <div class="rating">
                <input value="5" name="rating-best-5" id="star5" type="radio" disabled checked>
                <label for="star5"></label>
                <input value="4" name="rating-best-4" id="star4" type="radio" disabled>
                <label for="star4"></label>
                <input value="3" name="rating-best-3" id="star3" type="radio" disabled>
                <label for="star3"></label>
                <input value="2" name="rating-best-2" id="star2" type="radio" disabled>
                <label for="star2"></label>
                <input value="1" name="rating-best-1" id="star1" type="radio" disabled>
                <label for="star1"></label>
            </div>';
        }
        else if ($avaliacao >= 4){
            return '
            <div class="rating">
                <input value="5" name="rating-best-5" id="star5" type="radio" disabled>
                <label for="star5"></label>
                <input value="4" name="rating-best-4" id="star4" type="radio" disabled checked>
                <label for="star4"></label>
                <input value="3" name="rating-best-3" id="star3" type="radio" disabled>
                <label for="star3"></label>
                <input value="2" name="rating-best-2" id="star2" type="radio" disabled>
                <label for="star2"></label>
                <input value="1" name="rating-best-1" id="star1" type="radio" disabled>
                <label for="star1"></label>
            </div>';
        }
        else if ($avaliacao >= 3){
            return '
            <div class="rating">
                <input value="5" name="rating-best-5" id="star5" type="radio" disabled>
                <label for="star5"></label>
                <input value="4" name="rating-best-4" id="star4" type="radio" disabled>
                <label for="star4"></label>
                <input value="3" name="rating-best-3" id="star3" type="radio" disabled checked>
                <label for="star3"></label>
                <input value="2" name="rating-best-2" id="star2" type="radio" disabled>
                <label for="star2"></label>
                <input value="1" name="rating-best-1" id="star1" type="radio" disabled>
                <label for="star1"></label>
            </div>';
        }
        else if ($avaliacao >= 2){
            return '
            <div class="rating">
                <input value="5" name="rating-best-5" id="star5" type="radio" disabled>
                <label for="star5"></label>
                <input value="4" name="rating-best-4" id="star4" type="radio" disabled>
                <label for="star4"></label>
                <input value="3" name="rating-best-3" id="star3" type="radio" disabled>
                <label for="star3"></label>
                <input value="2" name="rating-best-2" id="star2" type="radio" disabled checked>
                <label for="star2"></label>
                <input value="1" name="rating-best-1" id="star1" type="radio" disabled>
                <label for="star1"></label>
            </div>';
        }
        else if ($avaliacao >= 1){
            return '
            <div class="rating">
                <input value="5" name="rating-best-5" id="star5" type="radio" disabled>
                <label for="star5"></label>
                <input value="4" name="rating-best-4" id="star4" type="radio" disabled>
                <label for="star4"></label>
                <input value="3" name="rating-best-3" id="star3" type="radio" disabled>
                <label for="star3"></label>
                <input value="2" name="rating-best-2" id="star2" type="radio" disabled>
                <label for="star2"></label>
                <input value="1" name="rating-best-1" id="star1" type="radio" disabled checked>
                <label for="star1"></label>
            </div>';
        }
        else{
            return '
            <div class="rating">
                <input value="5" name="rating-best-5" id="star5" type="radio" disabled>
                <label for="star5"></label>
                <input value="4" name="rating-best-4" id="star4" type="radio" disabled>
                <label for="star4"></label>
                <input value="3" name="rating-best-3" id="star3" type="radio" disabled>
                <label for="star3"></label>
                <input value="2" name="rating-best-2" id="star2" type="radio" disabled>
                <label for="star2"></label>
                <input value="1" name="rating-best-1" id="star1" type="radio" disabled>
                <label for="star1"></label>
            </div>';
        }
    }

    public function carregaAvaliacao3($avaliacao){
        if ($avaliacao == 5){
            return '<div class="rating"><input value="5" name="rating-best-5" id="star5" type="radio" disabled checked><label for="star5"></label><input value="4" name="rating-best-4" id="star4" type="radio" disabled><label for="star4"></label><input value="3" name="rating-best-3" id="star3" type="radio" disabled><label for="star3"></label><input value="2" name="rating-best-2" id="star2" type="radio" disabled><label for="star2"></label><input value="1" name="rating-best-1" id="star1" type="radio" disabled><label for="star1"></label></div>';
        }
        else if ($avaliacao >= 4){
            return '<div class="rating"><input value="5" name="rating-best-5" id="star5" type="radio" disabled><label for="star5"></label><input value="4" name="rating-best-4" id="star4" type="radio" disabled checked><label for="star4"></label><input value="3" name="rating-best-3" id="star3" type="radio" disabled><label for="star3"></label><input value="2" name="rating-best-2" id="star2" type="radio" disabled><label for="star2"></label><input value="1" name="rating-best-1" id="star1" type="radio" disabled><label for="star1"></label></div>';
        }
        else if ($avaliacao >= 3){
            return '<div class="rating"><input value="5" name="rating-best-5" id="star5" type="radio" disabled><label for="star5"></label><input value="4" name="rating-best-4" id="star4" type="radio" disabled><label for="star4"></label><input value="3" name="rating-best-3" id="star3" type="radio" disabled checked><label for="star3"></label><input value="2" name="rating-best-2" id="star2" type="radio" disabled><label for="star2"></label><input value="1" name="rating-best-1" id="star1" type="radio" disabled><label for="star1"></label></div>';
        }
        else if ($avaliacao >= 2){
            return '<div class="rating"><input value="5" name="rating-best-5" id="star5" type="radio" disabled><label for="star5"></label><input value="4" name="rating-best-4" id="star4" type="radio" disabled><label for="star4"></label><input value="3" name="rating-best-3" id="star3" type="radio" disabled><label for="star3"></label><input value="2" name="rating-best-2" id="star2" type="radio" disabled checked><label for="star2"></label><input value="1" name="rating-best-1" id="star1" type="radio" disabled><label for="star1"></label></div>';
        }
        else if ($avaliacao >= 1){
            return '<div class="rating"><input value="5" name="rating-best-5" id="star5" type="radio" disabled><label for="star5"></label><input value="4" name="rating-best-4" id="star4" type="radio" disabled><label for="star4"></label><input value="3" name="rating-best-3" id="star3" type="radio" disabled><label for="star3"></label><input value="2" name="rating-best-2" id="star2" type="radio" disabled><label for="star2"></label><input value="1" name="rating-best-1" id="star1" type="radio" disabled checked><label for="star1"></label></div>';
        }
        else{
            return '<div class="rating"><input value="5" name="rating-best-5" id="star5" type="radio" disabled><label for="star5"></label><input value="4" name="rating-best-4" id="star4" type="radio" disabled><label for="star4"></label><input value="3" name="rating-best-3" id="star3" type="radio" disabled><label for="star3"></label><input value="2" name="rating-best-2" id="star2" type="radio" disabled><label for="star2"></label><input value="1" name="rating-best-1" id="star1" type="radio" disabled><label for="star1"></label></div>';
        }
    }
    
    //Getters e Setters

    public function getIdPostagem() {
        return $this->idPostagem;
    }
      
    public function setIdPostagem($name) {
    $this->idPostagem = $name;
    }

    public function getNomeIdeia() {
        return $this->nomeIdeia;
    }
      
    public function setNomeIdeia($name) {
    $this->nomeIdeia = $name;
    }

    public function getUserIdeia() {
        return $this->userIdeia;
    }
      
    public function setUserIdeia($name) {
    $this->userIdeia = $name;
    }

    public function getNumCurtidas() {
        return $this->numCurtidas;
    }
      
    public function setNumCurtidas($name) {
    $this->numCurtidas = $name;
    }

    public function getDescricaoPostagem() {
        return $this->descricaoPostagem;
    }
      
    public function setDescricaoPostagem($name) {
    $this->descricaoPostagem = $name;
    }

    public function getMateriaisNecessarios() {
        return $this->materiaisNecessarios;
    }
      
    public function setMateriaisNecessarios($name) {
    $this->materiaisNecessarios = $name;
    }

    public function getInstrucoesPostagem() {
        return $this->instrucoesPostagem;
    }
      
    public function setInstrucoesPostagem($name) {
    $this->instrucoesPostagem = $name;
    }

    public function getMaterialPostagem() {
        return $this->materialPostagem;
    }
      
    public function setMaterialPostagem($name) {
    $this->materialPostagem = $name;
    }

    public function getDificuldadeIdeia() {
        return $this->dificuldadeIdeia;
    }
      
    public function setDificuldadeIdeia($name) {
    $this->dificuldadeIdeia= $name;
    }

    public function getAvaliacaoPostagem() {
        return $this->avaliacaoPostagem;
    }
      
    public function setAvaliacaoPostagem($name) {
    $this->dificuldadeIdeia= $name;
    }

    public function getQtdeAvaliacoes() {
        return $this->qtdeAvaliacoes;
    }
      
    public function setQtdeAvaliacoes($name) {
    $this->qtdeAvaliacoes= $name;
    }

}
