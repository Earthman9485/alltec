<?php
//VALLEJO PATIÑO MATIAS JERONIMO 1008
include("../../Bdd.php");

if($_POST){

    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $titulo = (isset($_POST['Titulo'])) ? $_POST['Titulo'] : "";
    $descripcion = (isset($_POST['Descripcion'])) ? $_POST['Descripcion'] : "";
    $linkfacebook = (isset($_POST['Linkfacebook'])) ? $_POST['Linkfacebook'] : "";
    $linkinstagram = (isset($_POST['LinkInstagram'])) ? $_POST['LinkInstagram'] : "";
    $linklinkedin = (isset($_POST['LinkLinkedin'])) ? $_POST['LinkLinkedin'] : "";

    // Actualizar datos
    $sentencia = $conexion->prepare("UPDATE tbl_colaboradores
    SET Titulo=:Titulo,
        Descripcion=:Descripcion,
        Linkfacebook=:Linkfacebook,
        LinkInstagram=:LinkInstagram,
        LinkLinkedin=:LinkLinkedin
    WHERE ID=:ID");

    $sentencia->bindParam(":Titulo",$titulo);
    $sentencia->bindParam(":Descripcion",$descripcion);
    $sentencia->bindParam(":Linkfacebook",$linkfacebook);
    $sentencia->bindParam(":LinkInstagram",$linkinstagram);
    $sentencia->bindParam(":LinkLinkedin",$linklinkedin);
    $sentencia->bindParam(":ID",$txtID);
    $sentencia->execute();


    // Proceso de la foto
    if(isset($_FILES["Fotos"]) && $_FILES["Fotos"]["name"] != ""){

        // Buscar la foto anterior
        $sentencia = $conexion->prepare(
            "SELECT Fotos FROM tbl_colaboradores WHERE ID=:ID"
        );
        $sentencia->bindParam(":ID",$txtID);
        $sentencia->execute();

        $registro_foto = $sentencia->fetch(PDO::FETCH_ASSOC);

        // Crear nombre para la nueva foto
        $fecha_foto = new DateTime();
        $nombre_foto = $fecha_foto->getTimestamp() . "_" . $_FILES["Fotos"]["name"];

        // Guardar la nueva foto
        move_uploaded_file(
            $_FILES["Fotos"]["tmp_name"],
            "../../../Images/Colaboradores/" . $nombre_foto
        );

        // Eliminar la foto anterior
        if(isset($registro_foto['Fotos'])){

            $ruta_foto = __DIR__ . "/../../../Images/Colaboradores/" . $registro_foto['Fotos'];

            if(file_exists($ruta_foto)){
                unlink($ruta_foto);
            }
        }

        // Actualizar el nombre de la nueva foto en MySQL
        $sentencia = $conexion->prepare(
            "UPDATE tbl_colaboradores
             SET Fotos=:Fotos
             WHERE ID=:ID"
        );

        $sentencia->bindParam(":Fotos",$nombre_foto);
        $sentencia->bindParam(":ID",$txtID);
        $sentencia->execute();
    }

    header("Location:index.php");
    exit;
}

if(isset($_GET['txtID'])){
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia = $conexion->prepare("SELECT * FROM `tbl_colaboradores` WHERE ID=:ID");
    $sentencia->bindParam(":ID",$txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    //Recuperar los valores de la base de datos
    $titulo=$registro["Titulo"];
    $descripcion=$registro["Descripcion"];
    $foto=$registro["Fotos"];

    $linkfacebook=$registro["Linkfacebook"];
    $linkinstagram=$registro["LinkInstagram"];
    $linklinkedin=$registro["LinkLinkedin"];


}

include("../../Templates/header.php");
?>
<br>
<div class="card">
    <div class="card-header naranja">Ingenieros</div>
    <div class="card-body">
    
        <form action="" method="post" enctype="multipart/form-data">

             <div class="mb-3">
                <label for="titulo" class="form-label">ID</label>
                <input type="text" class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" aria-describedby="helpId" placeholder="Escriba el título del banner"/>
            </div>

            <div class="mb-3">
                <label for="Fotos" class="form-label">Foto:</label><br>
                <img src="../../../Images/Colaboradores/<?php echo $foto; ?>" width="100" alt="">
                <input type="file" class="form-control" name="Fotos" id="Fotos" placeholder="" aria-describedby="fileHelpId"/>
            </div>

            <div class="mb-3">
                <label for="Titulo" class="form-label">Nombre:</label>
                <input type="text" value="<?php echo $titulo; ?>" class="form-control" name="Titulo" id="Titulo" aria-describedby="helpId" placeholder=""/>
            </div>

            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripción:</label>
                <input type="text" value="<?php echo $descripcion; ?>" class="form-control" name="Descripcion" id="Descripcion" aria-describedby="helpId" placeholder=""/>
            </div>

            <div class="mb-3">
                <label for="Linkfacebook" class="form-label">Facebook:</label>
                <input type="text" value="<?php echo $linkfacebook; ?>" class="form-control" name="Linkfacebook" id="Linkfacebook" aria-describedby="helpId" placeholder=""/>
            </div>

            <div class="mb-3">
                <label for="LinkInstagram" class="form-label">Instagram:</label>
                <input type="text" value="<?php echo $linkinstagram; ?>" class="form-control" name="LinkInstagram" id="LinkInstagram" aria-describedby="helpId" placeholder=""/>
            </div>

             <div class="mb-3">
                <label for="LinkLinkedin" class="form-label">Linkedin:</label>
                <input type="text" value="<?php echo $linklinkedin; ?>" class="form-control" name="LinkLinkedin" id="LinkLinkedin" aria-describedby="helpId" placeholder=""/>
            </div>

            <button type="submit" href="index.php" class="btn btn-success">Modificar</button>
            <a name=""id=""class="btn btn-danger" href="index.php" role="button">Cancelar</a>
    
        </form>
    </div>
</div>
<br>
<?php
include("../../Templates/footer.php");
?>