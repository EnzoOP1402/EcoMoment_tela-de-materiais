<?php
//Ideias
include 'connection.php';
include 'ideias.php';

$postagens = array();

$sql2 = 'SELECT * FROM prototipo_Postagem_EcoMoment WHERE materialPostagem = 1 ORDER BY idPostagem DESC';
$result2 = $con->query($sql2);

if ($result2->num_rows > 0){
    while ($row = $result2->fetch_assoc()){
        $nomeIdeia = $row['nomePostagem'];
        $userIdeia = $row['nomeUsuario'];
        $dificuldadeIdeia = $row['dificuldadePostagem'];
        $ideia = new Ideias($nomeIdeia, $userIdeia, $dificuldadeIdeia);
        $postagens[] = $ideia->createIdeia($nomeIdeia, $userIdeia, $dificuldadeIdeia);
    }
}
else{
    echo '<div style="text-align: center; display: flex; justify-content: center">Nenhuma postagem cadastrada<br>
    <button>Publicar ideia</button>';
}

$con->close();

