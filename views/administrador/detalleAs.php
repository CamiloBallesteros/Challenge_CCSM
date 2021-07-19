<?php require 'views/Doctype.php';?>
<title>Detalle de Asistente</title>
<?php require 'views/header.php'; ?>
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-8">
                <h2><?php echo $this->mensaje; ?> </h2>
                <h4>Actualizar datos de asistente</h4>
                <p>Ingrese y/o modifique los datos y luego presione en guardar. <small style="color:darkblue">(Los cambios en el campo cedula no se veran reflejados)</small></p>
                <div id="reg_form" class="row">
                    <form action="<?php echo constant('URL');?>administrador/actualizarAsistente" method="POST">
                        <p>Cedula: <input type="number" name="cedula" value="<?php echo $this->item->cedula?>" disabled/></p>
                        <p>Nombre: <input type="text" name="nombre" value="<?php echo $this->item->nombre?>" required/></p>
                        <p>Correo: <input type="email" name="correo" value="<?php echo $this->item->correo?>" required/></p>
                        <div class="row"><input id="btn" class="btn btn-info" type="submit" value="Confirmar cambios" /></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require 'views/footer.php'; ?>