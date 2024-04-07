<?php

class Usuarios{

    private $idUsuarioWeb;
    private $email;
    private $senha;
    private $nomeWeb;
    private $qtdeSeguidores;
    private $qtdeSeguindo;
    private $qtdeCurtidas;
    private $qtdePostagens;
    private $reputacao;
    private $bio;

    public function __construct(){
        
    }

    public function Usuarios($id, $nome, $qtdeS1, $qtdeS2, $qtdeC, $qtdeP, $rep, $bio){
        $this->idUsuarioWeb = $id;
        $this->nomeWeb = $nome;
        $this->qtdeSeguidores = $qtdeS1;
        $this->qtdeSeguindo = $qtdeS2;
        $this->qtdeCurtidas = $qtdeC;
        $this->qtdePostagens = $qtdeP;
        $this->reputacao = $rep;
        $this->bio = $bio;
    }

    public function carregaReputacaoUser($idUser, $reputacao){
        if ($reputacao == 5){
            return '
            <div class="rating">
                <input value="5" name="raiting-user-'.$idUser.'" id="star5" type="radio" disabled checked>
                <label for="star5"></label>
                <input value="4" name="raiting-user-'.$idUser.'" id="star4" type="radio" disabled>
                <label for="star4"></label>
                <input value="3" name="raiting-user-'.$idUser.'" id="star3" type="radio" disabled>
                <label for="star3"></label>
                <input value="2" name="raiting-user-'.$idUser.'" id="star2" type="radio" disabled>
                <label for="star2"></label>
                <input value="1" name="raiting-user-'.$idUser.'" id="star1" type="radio" disabled>
                <label for="star1"></label>
            </div>';
        }
        else if ($reputacao >= 4){
            return '
            <div class="rating">
                <input value="5" name="raiting-user-'.$idUser.'" id="star5" type="radio" disabled>
                <label for="star5"></label>
                <input value="4" name="raiting-user-'.$idUser.'" id="star4" type="radio" disabled checked>
                <label for="star4"></label>
                <input value="3" name="raiting-user-'.$idUser.'" id="star3" type="radio" disabled>
                <label for="star3"></label>
                <input value="2" name="raiting-user-'.$idUser.'" id="star2" type="radio" disabled>
                <label for="star2"></label>
                <input value="1" name="raiting-user-'.$idUser.'" id="star1" type="radio" disabled>
                <label for="star1"></label>
            </div>';
        }
        else if ($reputacao >= 3){
            return '
            <div class="rating">
                <input value="5" name="raiting-user-'.$idUser.'" id="star5" type="radio" disabled>
                <label for="star5"></label>
                <input value="4" name="raiting-user-'.$idUser.'" id="star4" type="radio" disabled>
                <label for="star4"></label>
                <input value="3" name="raiting-user-'.$idUser.'" id="star3" type="radio" disabled checked>
                <label for="star3"></label>
                <input value="2" name="raiting-user-'.$idUser.'" id="star2" type="radio" disabled>
                <label for="star2"></label>
                <input value="1" name="raiting-user-'.$idUser.'" id="star1" type="radio" disabled>
                <label for="star1"></label>
            </div>';
        }
        else if ($reputacao >= 2){
            return '
            <div class="rating">
                <input value="5" name="raiting-user-'.$idUser.'" id="star5" type="radio" disabled>
                <label for="star5"></label>
                <input value="4" name="raiting-user-'.$idUser.'" id="star4" type="radio" disabled>
                <label for="star4"></label>
                <input value="3" name="raiting-user-'.$idUser.'" id="star3" type="radio" disabled>
                <label for="star3"></label>
                <input value="2" name="raiting-user-'.$idUser.'" id="star2" type="radio" disabled checked>
                <label for="star2"></label>
                <input value="1" name="raiting-user-'.$idUser.'" id="star1" type="radio" disabled>
                <label for="star1"></label>
            </div>';
        }
        else if ($reputacao >= 1){
            return '
            <div class="rating">
                <input value="5" name="raiting-user-'.$idUser.'" id="star5" type="radio" disabled>
                <label for="star5"></label>
                <input value="4" name="raiting-user-'.$idUser.'" id="star4" type="radio" disabled>
                <label for="star4"></label>
                <input value="3" name="raiting-user-'.$idUser.'" id="star3" type="radio" disabled>
                <label for="star3"></label>
                <input value="2" name="raiting-user-'.$idUser.'" id="star2" type="radio" disabled>
                <label for="star2"></label>
                <input value="1" name="raiting-user-'.$idUser.'" id="star1" type="radio" disabled checked>
                <label for="star1"></label>
            </div>';
        }
    }

    public function getIdUsuarioWeb() {
        return $this->idUsuarioWeb;
    }
      
    public function setIdUsuarioWeb($name) {
    $this->idUsuarioWeb = $name;
    }

    public function getEmail() {
        return $this->email;
    }
      
    public function setEmail($name) {
    $this->email = $name;
    }

    public function getSenha() {
        return $this->senha;
    }
      
    public function setSenha($name) {
    $this->senha = $name;
    }

    public function getNomeWeb() {
        return $this->nomeWeb;
    }
      
    public function setNomeWeb($name) {
    $this->nomeWeb = $name;
    }

    public function getQtdeSeguidores() {
        return $this->qtdeSeguidores;
    }
      
    public function setQtdeSeguidores($name) {
    $this->qtdeSeguidores = $name;
    }
    
    public function getQtdeSeguindo() {
        return $this->qtdeSeguindo;
    }
      
    public function setQtdeSeguindo($name) {
    $this->qtdeSeguindo = $name;
    }

    
    public function getQtdeCurtidas() {
        return $this->qtdeCurtidas;
    }
      
    public function setQtdeCurtidas($name) {
    $this->qtdeCurtidas = $name;
    }
    
    public function getQtdePostagens() {
        return $this->qtdePostagens;
    }
      
    public function setQtdePostagens($name) {
    $this->qtdePostagens = $name;
    }
    
    public function getReputacao() {
        return $this->reputacao;
    }
      
    public function setReputacao($name) {
    $this->reputacao = $name;
    }
    
    public function getBiografia() {
        return $this->bio;
    }
      
    public function setBiografia($name) {
    $this->bio = $name;
    }

}