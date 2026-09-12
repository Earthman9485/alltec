<?php 
include("../../bdd.php");

if($_POST){
    $titulo = (isset($_POST["titulo"]))?$_POST["titulo"]:"";
    $descripcion = (isset($_POST["descripcion"]))?$_POST["descripcion"]:"";
    $link = (isset($_POST["link"]))?$_POST["link"]:"";
  
    $sentencia = $conexion->prepare("INSERT INTO `tbl_banners` 
    (`ID`, `Titulo`, `Descripcion`, `Link`) 
    VALUES (NULL, :titulo, :descripcion, :link);");

    $sentencia->bindParam(':titulo', $titulo);
    $sentencia->bindParam(':descripcion', $descripcion);
    $sentencia->bindParam(':link', $link);

    $sentencia->execute();
    header("Location:index.php");
}

include("../../Templates/header.php");?>
<br>
<div class="card">
    <div class="card-header naranja">
        Banners
    </div>
    <div class="card-body">
       
        <form action="" method="post">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Escriba el título del banner"/>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input type="text" class="form-control"name="descripcion"id="descripcion"aria-describedby="helpId"placeholder="Escriba la descripción del banner"/>
        </div>
        
        <div class="mb-3">
            <label for="link" class="form-label">Enlace:</label>
            <input type="text" class="form-control"name="link"id="link"aria-describedby="helpId"placeholder="Escriba el enlace del banner"/>
        </div>

        <button type="submit" href="index.php" class="btn btn-success">Agregar</button>
        <a name=""id=""class="btn btn-danger"href="index.php"role="button">Cancelar</a>
        
        </form>

    </div>
    <div class="card-footer text-body-secondary"></div>
</div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<?php include("../../Templates/footer.php");?>