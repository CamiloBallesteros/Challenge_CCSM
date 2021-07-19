<?php require 'views/Doctype.php';?>
<title>CCSM - Landing Page</title>
<?php require 'views/header.php'; ?>
<div id="content" class="container-fluid">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h1 style="color:darkblue;"><?php echo $this->mensaje; ?></p>
            <h2>Bienvenido al panel de eventos</h2>
            <p>Puede seleccionar el boton de registrar asistencia para confirmar el ingreso al evento, o puede seleccionar el panel de administracion para registrar eventos, realizar consultas entre otras funciones... <small>(require admin access)</small></p>
            <div class="row">
                <div class="col"></div>
                <div class="col-4">
                    <button onclick="location.href='<?php echo constant('URL'); ?>asistente'" type="button" class="btn btn-primary">Registrar asistencia a evento</button>
                </div>
                <div class="col-1"></div>
                <div class="col-4">
                    <button onclick="location.href='<?php echo constant('URL'); ?>administrador'" type="button" class="btn btn-success">Panel de administracion</button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
</div>
<?php require 'views/footer.php'; ?>