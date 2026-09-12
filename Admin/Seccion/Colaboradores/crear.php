<?php
include("../../Bdd.php");
if($_POST){
    $titulo = (isset($_POST['Titulo'])) ? $_POST['Titulo'] : "";
    $descripcion = (isset($_POST['Descripcion'])) ? $_POST['Descripcion'] : "";
    $linkfacebook = (isset($_POST['Linkfacebook'])) ? $_POST['Linkfacebook'] : "";
    $linkinstagram = (isset($_POST['LinkInstagram'])) ? $_POST['LinkInstagram'] : "";
    $linklinkedin = (isset($_POST['LinkLinkedin'])) ? $_POST['LinkLinkedin'] : "";
//VALLEJO PATIÑO MATIAS JERONIMO 1008
    $sentencia = $conexion->prepare("INSERT INTO `tbl_colaboradores` (`ID`, `Titulo`, `Descripcion`, `Linkfacebook`, `LinkInstagram`, `LinkLinkedin`, `Fotos`) 
    VALUES (NULL,:Titulo,:Descripcion,:Linkfacebook, :LinkInstagram, :LinkLinkedin, :Fotos)");
    
    $foto = (isset($_FILES['Fotos']['name'])) ? $_FILES['Fotos']['name'] : "";
    $fecha_foto = new DateTime();
    $nombre_foto = $fecha_foto->getTimestamp(). "_" . $foto;
    $tmp_foto = $_FILES["Fotos"]["tmp_name"];

    if($tmp_foto != ""){
        move_uploaded_file($tmp_foto,"../../../Images/Colaboradores/".$nombre_foto);
    }

    $sentencia->bindParam(":Titulo",$titulo);
    $sentencia->bindParam(":Descripcion",$descripcion);
    $sentencia->bindParam(":Linkfacebook",$linkfacebook);
    $sentencia->bindParam(":LinkInstagram",$linkinstagram);
    $sentencia->bindParam(":LinkLinkedin",$linklinkedin);
    $sentencia->bindParam(":Fotos", $nombre_foto);
    $sentencia->execute();
}
include("../../Templates/header.php");
?>
<br>
<div class="card">
    <div class="card-header naranja">Ingenieros</div>
    <div class="card-body">
    
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="Fotos" class="form-label">Foto</label>
                <input type="file" class="form-control" name="Fotos" id="Fotos" placeholder="" aria-describedby="fileHelpId"/>
            </div>

            <div class="mb-3">
                <label for="Titulo" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="Titulo" id="Titulo" aria-describedby="helpId" placeholder=""/>
            </div>

            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="Descripcion" id="Descripcion" aria-describedby="helpId" placeholder=""/>
            </div>

            <div class="mb-3">
                <label for="Linkfacebook" class="form-label">Facebook</label>
                <input type="text" class="form-control" name="Linkfacebook" id="Linkfacebook" aria-describedby="helpId" placeholder=""/>
            </div>

            <div class="mb-3">
                <label for="LinkInstagram" class="form-label">Instagram</label>
                <input type="text" class="form-control" name="LinkInstagram" id="LinkInstagram" aria-describedby="helpId" placeholder=""/>
            </div>

             <div class="mb-3">
                <label for="LinkLinkedin" class="form-label">Linkedin</label>
                <input type="text" class="form-control" name="LinkLinkedin" id="LinkLinkedin" aria-describedby="helpId" placeholder=""/>
            </div>

            <button type="submit" href="index.php" class="btn btn-success">Agregar</button>
            <a name=""id=""class="btn btn-danger" href="index.php" role="button">Cancelar</a>
    
        </form>
    </div>
</div>

<?php include("../../Templates/footer.php");?>