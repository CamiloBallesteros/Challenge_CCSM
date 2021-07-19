<?php require 'views/Doctype.php';?>
<title>Crear nuevo evento</title>
<?php require 'views/header.php'; ?>
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <h2><?php echo $this->mensaje; ?></h2>
                <p>Diligencie el siguiente formulario para crear un nuevo evento.</p>
                <div id="reg_form" class="row">
                    <form action="<?php echo constant('URL');?>administrador/crearEvento" method="POST">
                        <p>ID Evento: <input type="number" name="id" required/></p>
                        <p>Nombre: <input type="text" name="nombre" required/></p>
                        <p>Capacidad Max: <input type="number" name="cap_max" required/></p>
                        <p>Fecha Inicio: <input type="date" name="fecha_inicio" required/></p>
                        <p>Fecha Fin: <input type="date" name="fecha_fin" required/></p>
                        <div class="row"><input id="btn" class="btn btn-info" type="submit" value="Crear Evento" /></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require 'views/footer.php'; ?>