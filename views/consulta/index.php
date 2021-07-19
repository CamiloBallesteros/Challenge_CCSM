<?php require 'views/Doctype.php';?>
<title>Panel de consultas</title>
<?php require 'views/header.php'; ?>
<div id="content" class="container-fluid">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <h2 style="color:darkblue;"><?php echo $this->mensaje; ?></h2>
                <p>Seleccione uno de los elementos y presione en consultar para ver todos los datos, para busquedas especificas llene los campos de evento o asistente segun lo requiera</p>
                <form id="consulta_form" action="<?php echo constant('URL');?>consulta/consultarTabla" method="POST">
                    <div class="row">
                        <div class="col-4">
                            <p>Elemento: 
                            <select name="tabla" class="form-select" aria-label="Default select example" required>
                                <option selected value="default">--Seleccione un elemento--</option>
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
                <?php if(count($this->colNames)==5){
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
                        ?>
                        <tr>
                            <?php foreach($row as $item){?>
                            <td><?php echo $item; ?></td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
<?php require 'views/footer.php'; ?>