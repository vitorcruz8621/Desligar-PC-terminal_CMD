<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculo gmdate</title>
</head>
    <body>
        <?php
        $arquivo_name = 'arquivo_vitor.txt';

        function acrescentar_txt($arquivo_name, $resultado, $resto){
            $myfile = fopen($arquivo_name, a) or die ("arquivo não encontrado");
            fwrite($myfile, "\n".$resultado);
            if($resto != 0){ fwrite($myfile, " ---resto---> ".$resto); }

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
            $resultado = number_format( ($cont/60), 3, ',', '.' );
            $resto = number_format( ($cont % 60), 0, ',', '.' );
            acrescentar_txt($arquivo_name, $resultado, $resto);
        }

        ler_txt($arquivo_name);
        ?>
    </body>
</html>