<?php
include("../../Bdd.php");

if(isset($_GET['txtID'])){
    
    $txtID = $_GET['txtID'];

    // Buscar primero el nombre de la foto
    $sentencia = $conexion->prepare(
        "SELECT Fotos FROM tbl_colaboradores WHERE ID=:ID"
    );
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();

    $registro_foto = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Eliminar la foto de la carpeta
    if(isset($registro_foto['Fotos'])){
        
        $ruta_foto = __DIR__ . "/../../../Images/Colaboradores/" . $registro_foto['Fotos'];

        if(file_exists($ruta_foto)){
            unlink($ruta_foto);
        }
    }

    // Eliminar el registro de la base de datos
    $sentencia = $conexion->prepare(
        "DELETE FROM tbl_colaboradores WHERE ID=:ID"
    );
    $sentencia->bindParam(":ID", $txtID);
    $sentencia->execute();

    header("Location:index.php");
    exit;
}

$sentencia = $conexion->prepare("SELECT * FROM `tbl_colaboradores`");
$sentencia->execute();
$lista_colaboradores = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../Templates/header.php");
?>
<br>
<div class="card">
    <div class="card-header naranja"> <a name="" id="" class="btn btn-alltec" href="crear.php" role="button" style="border: 2px solid #b6b4b4;">Agregar Registros</a></div>
    <div class="card-body">

    <div class="table-responsive-sm">
        <table class="table">
            <thead>	
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Información</th>
                    <th scope="col">Redes Sociales</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($lista_colaboradores as $key => $value) { ?>
                <tr class="">
                    <td scope="row"><?php echo $value['ID'] ?></td>
                    <td><?php echo $value['Titulo'] ?></td>
                    <td>
                        <img src="../../../Images/Colaboradores/<?php echo $value['Fotos'] ?>" width="50 "alt="" srcset="">
                    </td>
                    <td><?php echo $value['Descripcion'] ?></td>
                    <td><?php echo $value['Linkfacebook'] ?><br/>
                        <?php echo $value['LinkInstagram'] ?><br/>
                        <?php echo $value['LinkLinkedin'] ?>
                    </td>
                    <td>
                        <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $value['ID']; ?>" role="button">Editar</a>
                        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $value['ID']; ?>" role="button">Eliminar</a>
                    </td>
                </tr>
            <?php } ?> 
            </tbody>  
        </table>
    </div>
    

    </div>
    <div class="card-footer text-body-secondary"></div>
</div>
  

<?php include("../../Templates/footer.php");?>