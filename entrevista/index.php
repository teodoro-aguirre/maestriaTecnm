<?php

    // Validar si recibe el tipo de entrevista y matricula
    if( !isset($_POST['numeroControl']) || !isset($_POST['tipo']) ){
        echo'
        <script type="text/javascript">
            alert("No se han recibio los datos solicitados");
            history.back();
        </script>';
    } else {
        $numeroControl = $_POST['numeroControl'];
        $tipoEntrevista = $_POST['tipo'];

        if( $tipoEntrevista == "inicio" ){
            header("Location: ./inicio.php?numeroControl=$numeroControl", TRUE, 301);
        } elseif ( $tipoEntrevista == "final" ) {
            header("Location: ./final.php?numeroControl=$numeroControl", TRUE, 301);
        } elseif ( $tipoEntrevista == "extraordinaria" ) {
            header("Location: ./extraordinaria.php?numeroControl=$numeroControl", TRUE, 301);
        }
    }


?>