<?php $url_base="http://localhost/alltec/admin/"; ?>
<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Admin Panel</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="/alltec/Estilos.css">
        <style>
            b{
                color: #ffff !important;
            }
            f{
                color: #ffff !important;
            }
        </style>
    </head>

<body class="d-flex flex-column min-vh-100">
        <header>
            <!-- place navbar here -->
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="nav navbar-nav container">

            <a class="navbar-brand logo-container" href="#" > <span class="logo-title"><f>all</f><b>tec.</b></span><span class="logo-subtitle"><small style="text-align: center;" > TODO EN SISTEMAS Y TECNOLOGIA</small></span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-item nav-link active" href="<?php echo $url_base; ?>" aria-current="page">Administrador<span class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-item nav-link" href="<?php echo $url_base; ?>Seccion/Banners/">Banners</a>
                </li>
                <li class="nav-item">       
                <a class="nav-item nav-link" href="<?php echo $url_base; ?>Seccion/Colaboradores/">Ingenieros</a>
                </li>
                <li class="nav-item">
                <a class="nav-item nav-link" href="<?php echo $url_base; ?>Seccion/Testimonios/">Testimonios</a>
                </li>
                <li class="nav-item">
                <a class="nav-item nav-link" href="<?php echo $url_base; ?>Seccion/Menu/">Servicios</a>
                </li>
                <li class="nav-item">
                <a class="nav-item nav-link" href="<?php echo $url_base; ?>Seccion/Comentarios/">Comentarios</a>
                </li>
                <li class="nav-item">
                <a class="nav-item nav-link" href="<?php echo $url_base; ?>Seccion/Usuarios/">Usuarios</a>
                </li>
                <li class="nav-item">
                <a class="nav-item nav-link" href="#">Cerrar Sesión</a>
                </li>
            </div>
        </nav>
        

        </header>

        <main>
        <section class="container">

