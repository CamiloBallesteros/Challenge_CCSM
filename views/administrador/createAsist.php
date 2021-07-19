<?php require 'views/Doctype.php';?>
<title>Crear nuevo asistente</title>
<?php require 'views/header.php'; ?>
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <h2><?php echo $this->mensaje; ?></h2>
                <p>Diligencie el siguiente formulario con los datos del asistente para crear el usuario.</p>
                <div id="reg_form" class="row">
                    <form action="<?php echo constant('URL');?>administrador/crearAsistente" method="POST">
                        <p>Cedula: <input type="number" name="cedula" required/></p>
                        <p>Nombre: <input type="text" name="nombre" required/></p>
                        <p>Correo: <input type="email" name="correo" required/></p>
                        <div class="row"><input id="btn" class="btn btn-info" type="submit" value="Crear Usuario" /></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require 'views/footer.php'; ?>