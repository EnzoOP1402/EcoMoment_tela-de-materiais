<?php
class Ideias {
    private $nomeIdeia;
    private $userIdeia;
    private $numCurtidas = 0;
    private $descricaoPostagem;
    private $materiaisNecessarios;
    private $instrucoesPostagem;
    private $materialPostagem;
    private $dificuldadeIdeia;

    

    //Construtor

    public function criaIdeia($nome, $usuario, $descricao, $materiaisNec, $instrucoes, $materialPost, $dificuldade){
        $this->nomeIdeia = $nome;
        $this->userIdeia = $usuario;
        $this->numCurtidas = 0;
        $this->descricaoPostagem = $descricao;
        $this->materiaisNecessarios = $materiaisNec;
        $this->instrucoesPostagem = $instrucoes;
        $this->materialPostagem = $materialPost;
        $this->dificuldadeIdeia = $dificuldade;
    }


    public function __construct($nome, $usuario, $dificuldade){
        $this->nomeIdeia = $nome;
        $this->userIdeia = $usuario;
        $this->dificuldadeIdeia = $dificuldade;
    }

    //Métodos

    public function createCardIdeia($nome, $usuario, $dificuldade){
        return '
        <div class="card">
            <div class="row">
                <div class="col-12 col-sm-6 card-col img-card">
                    <img src="icones-materiais/img-ideia.jpg" alt="Ideia de reutilização com garrafas pet">
                </div>
                <div class="col-12 col-sm-6 card-col card-content">
                    <div class="card-title">'.$nome.'</div>
                    <div class="card-subtitle">'.$usuario.'</div>
                    <div class="card-text">
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
                        <div class="dificuldade dificuldade-'.$dificuldade.'"></div>
                    </div>
                </div>
            </div>
        </div>';
    }
    
    //Getters e Setters

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

}
