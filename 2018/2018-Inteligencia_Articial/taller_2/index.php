<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Obtener Documentos</title>

        <!-- Estilos Página -->
        <link rel="stylesheet" href="node_modules/select2/dist/css/select2.min.css"/>
        <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="node_modules/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css"/>
        <link rel="stylesheet" href="assets/css/app.css"/>
    </head>

    <body class="bg-light">

        <div class="container">
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="https://lh3.googleusercontent.com/AV-LsHXaXCQfaQnQo3RZyidy5I-cPbNmsbLA-9vkDbT2LjvOox7_3nvrQiie6WYC_Hho=w300"
                     alt="" width="72" height="72">
                <h2>Inteligencia Artificial</h2>
                <p class="lead">
                    En este trabajo, podemos fitrar palabras en contenedor de texto
                </p>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-3">Trabajo</h4>
                    <form class="needs-validation" id="frmFiltro" novalidate>
                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <label>Seleccionar Documentos</label>
                                <select class="form-control" name="nomFiles[]" id="nomFiles" multiple="">
                                </select>
                                <small class="form-text text-muted">
                                    Campo para seleccionar uno o varios documentos
                                </small>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>Seleccionar Todos</label>
                                <input type="checkbox" class="bs-switch"  />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <label>Buscar Palabra</label>
                                <input type="text" class="form-control" name="txtBuscar" autocomplete="false" placeholder="Ingrese aquí la palabra" id="txtBuscar">
                                <small class="form-text text-muted">
                                    Al momento de buscar la palabra, este seleccionara con un fondo amarillo en el texto
                                </small>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>&nbsp;</label>
                                <button type="button" class="btn btn-block btn-primary" id="btnBuscar"> <i class="fa fa-search"></i> Buscar</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body" id="cardText">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">&copy; 2018 Anderson Barbosa - Andres Parra</p>
            </footer>
        </div>

        <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="node_modules/popper.js/dist/umd/popper-utils.min.js"></script>
        <script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="node_modules/select2/dist/js/select2.min.js"></script>
        <script type="text/javascript" src="node_modules/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
        <script type="text/javascript" src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="assets/js/app.js"></script>
    </body>

</html>