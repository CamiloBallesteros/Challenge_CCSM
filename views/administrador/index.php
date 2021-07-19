<?php require 'views/Doctype.php';?>
<title>Panel de administracion</title>
<?php require 'views/header.php'; ?>
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <h2><?php echo $this->mensaje; ?></h2>
                <h5 style="color:darkgreen;"><?php echo $this->info;?></h5>
                <p>Seleccione uno de los elementos y presione en consultar para ver todos los datos, para busquedas especificas llene los campos de evento o asistente segun lo requiera <small>(Puede crear, editar o eliminar los datos con las opciones que se habilitan luego de cargar la tabla)</small></p>
                <form id="consulta_form" action="<?php echo constant('URL');?>administrador/consultarTabla" method="POST">
                    <div class="row">
                        <div class="col-4">
                            <p>Elemento: 
                            <select name="tabla" class="form-select" aria-label="Default select example" required>
                                <option selected value="">--Seleccione un elemento--</option>
                                <option value="asistente">Asistente</option>
                                <option value="asistentes_del_evento">Asistentes del evento:</option>
                                <option value="evento">Evento</option>
                            </select>
                            </p>
                        </div>
                        <div class="col">
                            <p>Evento: <input type="number" name="evento" class="form-control" disabled></p>
                        </div>
                        <div class="col">
                            <p>Asistente: <input type="number" name="asistente"class="form-control" disabled></p>
                        </div>
                        <div class="col">
                            <input id="btn" class="btn btn-info" type="submit" value="Consultar" />
                        </div>
                    </div>
                </form>
                <?php /*var_dump($this->result);*/if(count($this->colNames)==5){
                        $temp = $this->colNames[0];$this->colNames[0] = $this->colNames[1];$this->colNames[1] = $temp;
                        $temp = $this->colNames[3];$this->colNames[3] = $this->colNames[2];$this->colNames[2] = $temp;
                        $temp = $this->colNames[4];$this->colNames[4] = $this->colNames[2];$this->colNames[2] = $temp;
                    }
                    if(count($this->colNames)==3){
                        $temp = $this->colNames[0];$this->colNames[0] = $this->colNames[2];$this->colNames[2] = $temp;
                        if(strcmp($this->colNames[2],"hora_llegada")==0){}else{
                            $temp = $this->colNames[1];$this->colNames[1] = $this->colNames[2];$this->colNames[2] = $temp;
                        }
                    }?>
                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <?php 
                            foreach($this->colNames as $row){
                            ?>
                            <th scope="col"><?php echo $row; ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                            foreach($this->result as $row){
                                $cont=0;
                        ?>
                        <tr>
                            <?php foreach($row as $item){$cont++;?>
                            <td><?php echo $item;?></td>
                            <?php } ?>
                            <td><a href="<?php if($cont==5){echo constant('URL').'administrador/verEvento/'.$row->id;}else{echo constant('URL').'administrador/verAsistente/'.$row->cedula;}?>">Editar</a></td>
                            <td><a href="<?php if($cont==5){echo constant('URL').'administrador/eliminarEvento/'.$row->id;}else{echo constant('URL').'administrador/eliminarAsistente/'.$row->cedula;}?>">Eliminar</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button onclick="location.href='<?php if(strcmp($this->table,'asistente')==0){echo constant('URL').'administrador/createAsist';}else{echo constant('URL').'administrador/createEvent';}?>'" type="button" class="btn btn-primary" <?php if((strcmp($this->table,"asistentes_del_evento")==0)||(strcmp($this->table,"")==0)){echo "disabled";} ?>>Crear nuevo <?php if(strcmp($this->table,"asistentes_del_evento")!=0){echo $this->table;} ?></button>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
<?php require 'views/footer.php'; ?>