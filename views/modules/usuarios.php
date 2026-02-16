<?php
session_start();
if (!$_SESSION['usuarioValido']) {
    header(('location:index.php?action=inicio'));
}
$usuarioControlador = new UsuarioController();
$usuarioControlador->eliminarUsuarioControlador();
$datos = $usuarioControlador->listarUsuariosControlador();
///SWEETALERT///
if(isset($_GET['resp'])){
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            Swal.fire({
                icon: "<?php echo ($_GET['resp'] == 'success') ? 'success' : 'error'; ?>",
                title: "<?php echo ($_GET['resp'] == 'success') ? 'Usuario Eliminado' : 'Error';  ?>",
                text: "<?php echo ($_GET['resp'] == 'success') ? '¡Usuario Eliminado Correctamente': 'Error al eliminar el Usuario'; ?>",
                confirmButtonText: 'Aceptar'
            })
        })
    </script>
    <?php
}
?>
<div class="container">
    <div class="row">
        <?php

        if (isset($_GET['dato'])) {
            if ($_GET['dato'] == 'ok') {
                $msg = '¡Usuario Registrado Correctamente!';
                $estado = 'success';
            } else {
                $msg = '¡ERROR: Surgio algun problema!';
                $estado = 'danger';
            }
        } elseif (isset($_GET['up'])) {
            if ($_GET['up'] == 'ok') {
                $msg = "¡Usuario Actualizado Correctamente!";
                $estado = "success";
            } else {
                $msg = '¡ERROR: Surgio algun problema!';
                $estado = 'danger';
            }
        }
        if (isset($msg)) {
        ?>
            <div class="alert alert-<?php echo $estado ?> mt-3" role="alert">
                <p><?php echo $msg; ?></p>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="row">
        <div class="col">
            <h1>LISTADO DE USUARIOS</h1>
        </div>
        <div class="col">Usuario: <?php echo $_SESSION['nombreUsuario'] ?></div>
    </div>


    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nombre Usuario</th>
                <th scope="col">Correo Electronico</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($datos as $usuarios) {
            ?>
                <tr>
                    <th scope="row"><?php echo $usuarios['nombre'] ?></th>
                    <td><?php echo $usuarios['email'] ?></td>
                    <td><a href="index.php?action=editar&id=<?php echo $usuarios['id']; ?>"><i class="bi bi-pencil-square"></i>Editar</a>
                        | <a href="#" onclick="eliminarUsuario(<?php echo $usuarios['id'] ?>)"><i class="bi bi-trash3-fill"></i>Eliminar</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>