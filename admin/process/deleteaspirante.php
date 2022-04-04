<?php
    if(!isset($_SESSION)){ 
        session_start(); 
        error_reporting(E_PARSE);
    } 
    if(!$_SESSION['verificar']){
        header("Location: ./menu.php");
    } else{
        if($_SESSION['tipo'] != 'DIRECTIVO'){
            header("Location: ./menu.php");
        }
    }

    include "../inc/link.php";
    include "../inc/navbar.php";
    include "../php/conexion.php";
    
    $folio = $_GET['folio'];

    echo '
        <br>
        <div class="container">
            <a href="../aspirantes.php" class="button is-info">REGRESAR</a>
        </div>
    ';
    if($folio != ""){
        $query2 = "SELECT * FROM aspirante where folio = $folio";
        $consulta = consultarSQL($query2); 
        if($consulta->num_rows == 0){
            echo '
            <section class="section">
                <div class="container">
                    <h3>Este folio no existe.</h3>
                </div>
            </section>
            ';
        } else{
            $query = "DELETE FROM aspirante where folio = $folio";
            if(consultarSQL($query)){
                echo '
                <section class="section">
                    <div class="container">
                        <h3>Se elimino correctamente el folio: '.$folio.'</h3>
                    </div>
                </section>';
            } else {
                echo '
                <section class="section">
                    <div class="container">
                        <h3>OCURRIO UN ERROR CON LA BASE DE DATOS</h3>
                    </div>
                </section>';
            }
            
        }
        
    } else {
        echo '
        <section class="section">
            <div class="container">
                <h3>No se le eligió ningún registro.</h3>
            </div>
        </section>
        ';
    }

    include "../inc/footer.php";

?>