<?php
include("../../Bdd.php"); 

if($_POST){

    $opinion = (isset($_POST["Opinion"])) ? $_POST["Opinion"] : "";
    $nombre = (isset($_POST["Nombre"])) ? $_POST["Nombre"] : "";

    // CORRECCIÓN COMPLETA: Marcadores en minúsculas y sin comillas
    $sentencia = $conexion->prepare("INSERT INTO `tbl_testimonios` (`ID`, `Opinion`, `Nombre`) VALUES (NULL, :opinion, :nombre);");
    
    // Vinculación exacta con los nuevos marcadores
    $sentencia->bindParam(":opinion", $opinion);
    $sentencia->bindParam(":nombre", $nombre);
    
    $sentencia->execute(); // Línea 11
    
    header("Location:index.php");
    exit();
}
include("../../Templates/Header.php");
?>

<br>
<div class="card">
    <div class="card-header naranja">Testimonios</div>
    <div class="card-body">
    <form action="" method="post">
       <div class="mb-3">
        <label for="" class="form-label">Opinión:</label>
            <input type="text"class="form-control"name="Opinion"id="Opinion"aria-describedby="helpId"placeholder=""/>
       </div>

        <div class="mb-3">
            <label for="" class="form-label">Nombre:</label>
            <input type="text"class="form-control"name="Opinion"id="Opinion"aria-describedby="helpId"placeholder=""/>
       </div>

            <button type="submit" href="index.php" class="btn btn-success">Agregar Testimonio</button>
            <a name=""id=""class="btn btn-danger" href="index.php" role="button">Cancelar</a>
    
    </form>
    </div>
    <div class="card-footer text-body-secondary"></div>
</div>

<?php
include("../../Templates/Footer.php")
?>