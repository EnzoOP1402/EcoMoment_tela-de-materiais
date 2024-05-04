<?php
 $pasta = 'imagens/';
 $diretorio = dir($pasta);

 while($arquivo = $diretorio->read()){
    if($arquivo!='.' && $arquivo!='..'){
        list($larguraNova, $alturaNova) = getimagesize($pasta.$arquivo);?>
        <div>
            <div><img src="<?php echo $pasta.$arquivo;?>" width="100%"></div>
            <div>Dimensões: <?php echo $larguraNova.' x '.$alturaNova; ?> </div>
        </div>
        <?php
    }
 }