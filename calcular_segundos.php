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

        function acrescentar_txt($arquivo_name, $minutos, $segundos){
            $myfile = fopen($arquivo_name, a) or die ("arquivo não encontrado");
            fwrite($myfile, "\n---minutos---> ".$minutos." / ");
            
            if($segundos != 0){
                if($segundos >= 10) { fwrite($myfile, " ---segundos--> ".$segundos." / FIM"); }
                else { fwrite($myfile, " ---segundos--> 0".$segundos." / FIM"); }
            }

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

        echo (6 - ceil(5.8) . "<p/>");

        for ($cont = 14400; $cont > 0; $cont--) {

            $minutos = number_format( ($cont/60), 3, ',', '.' );
            $segundos = number_format( ($cont % 60), 0, ',', '.' );

            acrescentar_txt($arquivo_name, $minutos, $segundos);
        }

        ler_txt($arquivo_name);
        ?>
    </body>
</html>