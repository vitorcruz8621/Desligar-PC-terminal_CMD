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
        /*------------------------------------------------------------------------------
        **------------------------------------------------------------------------------
        ------------------------------------------------------------------------------*/

        /*
        ** Funções
        */

        function txt_acrescentar($arquivo_name, $minutos, $segundos, $horas){
            $myfile = fopen($arquivo_name, a) or die ("arquivo não encontrado");

            fwrite($myfile, "\n" . $horas);
            
            if($minutos >=10 ){ fwrite($myfile, ":" . $minutos . ":"); }
            else { fwrite($myfile, ":0" . $minutos . ":"); }
            
            if($segundos >= 10) { fwrite($myfile, $segundos." / FIM"); }
            else { fwrite($myfile, "0" . $segundos . " / FIM"); }

            if($segundos % 15 == 0) { fwrite($myfile, "---------------------------------"); }

            fclose($myfile);
        }

        function calcular_um($min){
            $energia = $min * 60 * 10;
            $horas = floor($energia / 3600);
            $minutos = floor( ($energia / 60) - ($horas * 60) );
            $segundos = ($energia % 3600) % 60;
            echo $horas .":". $minutos .":". $segundos;
        }

        function txt_calcular_todos($arquivo_name){
            $min = 100;
            for ($cont = $min*600; $cont > 0; $cont--) {
                
                //$horas = number_format( ($cont / 3600), 3, ',', '.');
                //$minutos = number_format( ($cont % 3600), 2, ',', '.' );
                //$segundos = number_format( ($cont % 3600 % 60), 0, ',', '.' );

                $horas = floor($cont / 3600);
                $minutos = floor( ($cont / 60) - ($horas * 60) );
                $segundos = ($cont % 3600) % 60;

                txt_acrescentar($arquivo_name, $minutos, $segundos, $horas);
            }
        }

        function txt_iniciar($arquivo_name){
            $myfile = fopen($arquivo_name, w) or die ("arquivo não encontrado");
            fwrite($myfile, "Números:\n");

            fclose($myfile);
        }

        function txt_ler($arquivo_name){
            $myfile = fopen($arquivo_name, r) or die ("arquivo não encontrado");

            while(!feof($myfile)) {
                echo fgets($myfile) . "<br>";
            }

            fclose($myfile);
        }

        /*------------------------------------------------------------------------------
        **------------------------------------------------------------------------------
        ------------------------------------------------------------------------------*/

        /*
        ** Menu Principal
        */

        $arquivo_name = 'arquivo_vitor.txt';
        
        /*
        txt_iniciar($arquivo_name);
        txt_calcular_todos($arquivo_name);
        txt_ler($arquivo_name);
        */

        calcular_um(100);

        ?>
    </body>
</html>