<?php
    $altura = $_POST["Altura"];
    $largura = $_POST["Largura"];

    echo "Altura pretendida: $altura - Largura pretendida: $largura <br>";  

    switch ($_FILES['imgMensal'] ['type']) {
        case 'image/jpeg':
        case 'image/pjpeg':
            $imagemTemporaria = imagecreatefromjpeg($_FILES['imgMensal'] ['tmp_name']);

            $largura_original = imagesx($imagemTemporaria);
            $altura_original = imagesy($imagemTemporaria);

            echo "Largura original $largura_original - Altura original $altura_original<br>";

            $novaLargura = $largura ? $largura : floor(($largura_original / $altura_original) * $altura);
            $novaAltura = $altura ? $altura : floor(($altura_original / $largura_original) * $largura);

            $imagemRedimensionada = imagecreatetruecolor($novaLargura, $novaAltura);
            imagecopyresampled($imagemRedimensionada, $imagemTemporaria, 0, 0, 0, 0, $novaLargura, $novaAltura, $largura_original, $altura_original);
            
            imagejpeg($imagemRedimensionada, "arquivo/" . $_FILES['imgMensal'] ['name']);

            echo "<img src='arquivo/".$_FILES['imgMensal']['name']."'>";
            break;
        
        case 'image/png':
        case 'image/x-png':
            $imagemTemporaria = imagecreatefrompng($_FILES['imgMensal'] ['tmp_name']);

            $largura_original = imagesx($imagemTemporaria);
            $altura_original = imagesy($imagemTemporaria);

            echo "Largura original $largura_original - Altura original $altura_original<br>";

            $novaLargura = $largura ? $largura : floor(($largura_original / $altura_original) * $altura);
            $novaAltura = $altura ? $altura : floor(($altura_original / $largura_original) * $largura);

            $imagemRedimensionada = imagecreatetruecolor($novaLargura, $novaAltura);
            imagecopyresampled($imagemRedimensionada, $imagemTemporaria, 0, 0, 0, 0, $novaLargura, $novaAltura, $largura_original, $altura_original);
            
            imagepng($imagemRedimensionada, "arquivo/" . $_FILES['imgMensal'] ['name']);

            echo "<img src='arquivo/".$_FILES['imgMensal']['name']."'>";
            break;
    }
?>