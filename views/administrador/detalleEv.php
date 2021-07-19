<?php require 'views/Doctype.php';?>
<title>Detalle de Evento</title>
<?php require 'views/header.php'; ?>
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-8">
                <h2><?php echo $this->mensaje; ?> </h2>
                <h4>Actualizar datos de evento</h4>
                <p>Ingrese y/o modifique los datos y luego presione en guardar. <small style="color:darkblue">(Los cambios en el campo id no se veran reflejados)</small></p>
                <div id="reg_form" class="row">
                    <form action="<?php echo constant('URL');?>administrador/actualizarEvento" method="POST">
                        <p>ID Evento: <input type="number" name="id" value="<?php echo $this->item->id?>" disabled/></p>
                        <p>Nombre: <input type="text" name="nombre" value="<?php echo $this->item->nombre?>" required/></p>
                        <p>Capacidad Max: <input type="number" name="cap_max" value="<?php echo $this->item->cap_max?>" required/></p>
                        <p>Fecha Inicio: <input type="date" name="fecha_inicio" value="<?php echo $this->item->fecha_inicio?>" required/></p>
                        <p>Fecha Fin: <input type="date" name="fecha_fin" value="<?php echo $this->item->fecha_fin?>" required/></p>
                        <div class="row"><input id="btn" class="btn btn-info" type="submit" value="Confirmar cambios" /></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require 'views/footer.php'; ?>