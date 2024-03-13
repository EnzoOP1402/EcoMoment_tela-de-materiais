<?php
class Ideias {
    private $nomeIdeia;
    private $userIdeia;
    private $dificuldadeIdeia;

    //Construtor
    public function Ideias($nome, $usuario, $dificuldade){
        $this->nomeIdeia = $nome;
        $this->userIdeia = $usuario;
        $this->dificuldadeIdeia = $dificuldade;
    }

    //Métodos

    public function createIdeia($nome, $usuario, $dificuldade){
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
    $this->nomeIdeia= $name;
    }

    public function getUserIdeia() {
        return $this->userIdeia;
    }
      
    public function setUserIdeia($name) {
    $this->userIdeia= $name;
    }

    public function getDificuldadeIdeia() {
        return $this->dificuldadeIdeia;
    }
      
    public function setDificuldadeIdeia($name) {
    $this->dificuldadeIdeia= $name;
    }

}
