<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Login</title>
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
        <b><i>VALLEJO PATIÑO MATÍAS JERÓNIMO - 1008</i></b>
    </head>

    <body>

        <main>
        <div class="container">
        <div class="row">
            <div class="col"></div>

            <div class="col">
                <br><br>
                <div class="card text-center">
                    <div class="card-header bg-secondary">Login</div>
                    <div class="card-body">
                        <form action="index.php" method="post">    
                         <div class="mb-3">
                             <label for="" class="form-label">Usuario</label>
                             <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId"/>
                         </div>

                         <div class="mb-3">
                             <label for="" class="form-label">Password:</label>
                             <input type="password" class="form-control" name="password" id="password" placeholder=""/>
                         </div>

                            <button type="submit" class="btn btn-warning">Login</button>

                        </form>
                    </div>
                </div>

            </div>
            
            <div class="col"></div>
        </div>
        </div>
        </main>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
