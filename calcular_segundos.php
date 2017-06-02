<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calcular Horário</title>
</head>
<body>
    <?php

    $myfileName = "arquivo_vitor.txt";

    function ler_arquivo($myfileName) {
        $myfile = fopen($myfileName, "r") or die("Unable to open file!");
        echo fread($myfile,filesize($myfileName));
        fclose($myfile);
    }

    function ler_arquivo_por_linha($myfileName) {
        $myfile = fopen($myfileName, "r") or die("Unable to open file!");

        while(!feof($myfile)) {
            echo fgets($myfile) . "<br>";
        }

        fclose($myfile);
    }

    function ler_arquivo_por_caractere($myfileName) {
        $myfile = fopen($myfileName, "r") or die("Unable to open file!");

        while(!feof($myfile)) {
            echo fgetc($myfile);
        }

        fclose($myfile);
    }

    function escrever_arquivo($myfileName){
        $myfileName = "arquivo_vitor.txt";
        $myfile = fopen($myfileName, "w") or die("Unable to open file!");
        $txt = "John Doe";
        fwrite($myfile, $txt);
        fclose($myfile);
    }

    if( !escrever_arquivo($myfileName) ){ echo "<br/>_fracasso."; }
    else
        echo "sucesso";

    ?>
</body>
</html>