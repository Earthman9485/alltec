<?php
include("../../Bdd.php");

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM tbl_banners WHERE ID=:ID");
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $titulo = $registro['Titulo'];
    $descripcion = $registro['Descripcion'];
    $link = $registro['Link'];
}

if ($_POST) {
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
    $link = (isset($_POST['link'])) ? $_POST['link'] : "";
    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    
    $sentencia = $conexion->prepare("UPDATE tbl_banners SET titulo=:titulo, descripcion=:descripcion, link=:link WHERE ID=:ID");
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":link", $link);
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();
    
    header("Location: index.php");
    exit();
}

include("../../Templates/header.php");
?>
<br>
<div class="card">
    <div class="card-header naranja">Banners</div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID</label>
                <input type="text" class="form-control" readonly value="<?php echo htmlspecialchars($txtID ?? ''); ?>" name="txtID" id="txtID" />
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($titulo ?? ''); ?>" name="titulo" id="titulo" placeholder="Escriba el título del banner" />
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($descripcion ?? ''); ?>" name="descripcion" id="descripcion" placeholder="Escriba la descripción del banner" />
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Enlace:</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($link ?? ''); ?>" name="link" id="link" placeholder="Escriba el enlace del banner" />
            </div>
            <button type="submit" href="index.php" class="btn btn-success">Editar</button>
            <a class="btn btn-danger" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-body-secondary"></div>
</div>
<br/><br/><br/><br/><br/><br/>
<?php include("../../Templates/footer.php"); ?>