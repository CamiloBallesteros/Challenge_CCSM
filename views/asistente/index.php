<?php require 'views/Doctype.php';?>
<title>Panel de registro de asistentes</title>
<?php require 'views/header.php'; ?>
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6">
                <h2><?php echo $this->mensaje; ?></h2>
                <p>Diligencie el siguiente formulario con los datos del asistente asi como el evento al que va a ingresar y presione en confirmar asistencia para registrarlo al evento seleccionado</p>
                <div id="reg_form" class="row">
                    <form action="<?php echo constant('URL');?>asistente/registrarAsistente" method="POST">
                        <p>Cedula: <input type="number" name="cedula" required/></p>
                        <p>Nombre: <input type="text" name="nombre" required/></p>
                        <p>Correo: <input type="email" name="correo" required/></p>
                        <p>Evento: 
                            <select name="evento" class="form-select" aria-label="Default select example" required>
                                <?php include_once 'models/evento.php';
                                    foreach($this->eventos as $row){
                                        $evento = new Evento();
                                        $evento = $row;
                                ?>
                                <option value="<?php echo $evento->id; ?>"><?php echo $evento->nombre; ?> | max_cap: <?php echo $evento->cap_max; ?> personas</option>
                                <?php } ?>
                            </select>
                        </p>
                        <?php if($this->eventos[0] == ""){echo "<small><b>(No hay eventos en curso, favor dirigirse al panel de administracion para crear un nuevo evento)</b></small>";} ?>
                        <div class="row"><input id="btn" class="btn btn-info" type="submit" value="Confirmar asistencia" /></div>
                    </form>
                    <h4><?php echo $this->info_reg; ?></h4>
                </div>
            </div>
            <div class="col-5">
                <h3>Eventos Activos</h3>
                <p>Panel con los eventos actualmente en curso y la cantidad de personas que se han registrado</p>
                <table class="table table-sm table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha_Inicio</th>
                            <th scope="col">Fecha_Fin</th>
                            <th scope="col">Capacidad</th>
                            <th scope="col">Asistentes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include_once 'models/evento.php';
                            foreach($this->eventos as $row){
                                $evento = new Evento();
                                $evento = $row;
                        ?>
                        <tr>
                            <td><?php echo $evento->nombre; ?></td>
                            <td><?php echo $evento->fecha_inicio; ?></td>
                            <td><?php echo $evento->fecha_fin; ?></td>
                            <td><?php echo $evento->cap_max; ?></td>
                            <td><?php echo $this->cantAsistentes[$evento->id]; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require 'views/footer.php'; ?>