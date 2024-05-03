<?php

class Redimensionamento{
    public function processar($anexo){
        $caminhoAnexo = 'imagens/';

        if (count($anexo) > 0){
            $type = $anexo['type'][0];
            $tmpName = $anexo['tmp_name'][0];

            $geraNome = md5(time().rand(0, 9999).'.jpg');
            move_uploaded_file($tmpName, $caminhoAnexo.$geraNome);

            list($larguraOriginal, $alturaOriginal) = getimagesize($caminhoAnexo.$geraNome);

            $larguraNova = 620;
            $alturaNova = 360;

            $img = imagecreatetruecolor($larguraNova, $alturaNova);

            if($type == 'jpeg'){
                $original = imagecreatefromjpeg($caminhoAnexo.$geraNome);
                imagecopyresampled($img, $original, 0,0,0,0, $larguraNova, $alturaNova, $larguraOriginal, $alturaOriginal);
                imagejpeg($img, $caminhoAnexo.$geraNome, 80);
                return true;
            } else if($type == 'png'){
                $original = imagecreatefrompng($caminhoAnexo.$geraNome);
                imagecopyresampled($img, $original, 0,0,0,0, $larguraNova, $alturaNova, $larguraOriginal, $alturaOriginal);
                imagepng($img, $caminhoAnexo.$geraNome, 80);
                return true;
            } else if($type == 'webp'){
                $original = imagecreatefromwebp($caminhoAnexo.$geraNome);
                imagecopyresampled($img, $original, 0,0,0,0, $larguraNova, $alturaNova, $larguraOriginal, $alturaOriginal);
                imagewebp($img, $caminhoAnexo.$geraNome, 80);
                return true;
            }

        }
        else{
            return false;
        }
    }
}