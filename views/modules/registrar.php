<?php
session_start();
if(!$_SESSION['usuarioValido']) {
    header('location:index.php?action=inicio');
}
$usuarioControlador = new UsuarioController();
$usuarioControlador->registrarUsuarioControlador();
?>
<div class="container">
    <div class="row">
        Usuario: <?php echo $_SESSION['nombreUsuario'] ?>
    </div>
    <form method="post">
        <fieldset>
            <legend>Registrar Usuarios</legend>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre Completo del Usuario</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre Completo">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electronico del Usuario</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Correo Electronico">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="clave" class="form-label">Contraseña deL Usuario</label>
                        <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña">
                    </div>
                </div>
            </div>
            <button type="submit" name="registrar" id="registrar" class="btn btn-primary">Registrar</button>
        </fieldset>
    </form>
    <?php
    if (isset($_GET['action'])) {
        if(isset($_GET['dato']) && $_GET['dato'] == 'fal') {
            $msg = '¡ERROR: Faltan datos en el Formulario!';
            $clase = 'alert-danger';
        }
    ?>
        <div class="alert <?php echo (isset($clase))? $clase: ''; ?> mt-2" role="alert">
            <?php echo (isset($msg)) ? $msg : ''; ?>
        </div>

    <?php
    }
    ?>

</div>