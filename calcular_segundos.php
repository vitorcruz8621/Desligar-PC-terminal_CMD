<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <body>
        <?php
        $arquivo_name = 'arquivo_vitor.txt';
        $text = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.';

        function acrescentar_txt($arquivo_name, $resultado){
            $myfile = fopen($arquivo_name, a) or die ("arquivo não encontrado");
            fwrite($myfile, "\n".$resultado);

            fclose($myfile);
        }

        function iniciar_txt($arquivo_name){
            $myfile = fopen($arquivo_name, w) or die ("arquivo não encontrado");
            fwrite($myfile, "Números:\n");

            fclose($myfile);
        }

        function ler_txt($arquivo_name){
            $myfile = fopen($arquivo_name, r) or die ("arquivo não encontrado");
            //echo fread($myfile, filesize($arquivo_name));

            while(!feof($myfile)) {
                echo fgets($myfile) . "<br>";
            }

            fclose($myfile);
        }

        iniciar_txt($arquivo_name);

        for ($cont = 14400; $cont > 0; $cont--) {
            $resultado = $cont/60;
            $resultado = number_format($resultado, 3, ',', '.');
            acrescentar_txt($arquivo_name, $resultado);
        }

        //ler_txt($arquivo_name);
        ?>
    </body>
</html>