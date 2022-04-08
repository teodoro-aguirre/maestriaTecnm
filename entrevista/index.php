<?php

    // Validar si recibe el tipo de entrevista y matricula
    if( isset($_GET['matricula']) || isset($_GET['tipo']) ){
        echo'
        <script type="text/javascript">
            alert("No se han recibio los datos solicitados");
            history.back();
        </script>';
    } else {
        $matricula = $_GET['matricula'];
        $tipoEntrevista = $_GET['tipo'];

        if( $tipoEntrevista == "inicio" ){
            header("Location: ./inicio", TRUE, 301);
        } elseif ( $tipoEntrevista == "final" ) {
            header("Location: ./final", TRUE, 301);
        } elseif ( $tipoEntrevista == "extraordinaria" ) {
            header("Location: ./extraordinaria", TRUE, 301);
        }
    }


?>