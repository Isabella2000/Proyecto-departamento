<link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="<?php echo base_url('bootstrap/bootstrap.min.css'); ?>">
<script src="<?php echo base_url('bootstrap/bootstrap.bundle.min.js'); ?>"></script>

<div class="container card my-4">
    <div>
        <h1 class="titulo_Vista"><?php echo $titulo?></h1>
    </div>

    <div class="div-botones">
        <button type="button" class="btn-agregar" data-bs-toggle="modal" data-bs-target="#empleadoModal">Agregar</button>
        <button type="button" class="btn-eliminar" >Eliminados</button>
        <a href="<?php echo base_url('/principal'); ?>" class="btn-regresar"><button class="btn-eliminar">Regresar</button></a>
    </div>

    <br>
   
    
    <div class="table-responsive">
        <table class="table table-bordered table-sm table-striped" id="dataTable" width="50%" cellspacing="0">
            <thead>
                <tr style="color:#D0C7FC;font-weight:300;text-align:center;font-family:Ar'Libre Bodoni', serif;font-size:20px;">
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Id_Municipio</th>
                    <th>Nacimiento</th>
                    <th>Id_Cargo</th>
                    <th>Estado</th>
                    <th colspan="2">Acciones</th>
                    
                </tr>
            </thead>
            <tbody style="font-family:'Libre Baskerville', serif;font-size:14px;">
                <?php foreach ($empleados as $empleado) { ?>
                    <tr>
                        <td><?php echo $empleado['id']; ?></td>
                        <td><?php echo $empleado['nombres']; ?></td>
                        <td><?php echo $empleado['apellidos']; ?></td>
                        <td><?php echo $empleado['id_municipio']; ?></td>
                        <td><?php echo $empleado['nacimiento']; ?></td>
                        <td><?php echo $empleado['id_cargo']; ?></td>
                        <td><?php echo $empleado['estado']; ?></td>
                        
                        <td style="height:0.2rem;width:1rem;"><input class="eliminarlog" href="#" data-href="<?php echo base_url('/paises/eliminar') . '/' .$empleado['id']. '/' .'E'; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma" type="image" src="<?php echo base_url(); ?>/img/basurita.png" width="30" height="30" title="Editar Registro"></input></td>

                        <td id="inp_edita" style="height:0.2rem;width:1rem;"><input class="editar" href="#" onclick="seleccionaPais(<?php echo $empleado['id'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#paisModal" type="image" src="<?php echo base_url(); ?>/img/edit.png" width="30" height="30" title="Editar Registro"></input></td> 
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
  
</div>

<form method="POST" action="<?php echo base_url('/empleados/insertar'); ?>" autocomplete="off">
<div class="modal fade" id="empleadoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar empleado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombres</label>
            <input type="text" class="form-control" id="nombres" name="nombres">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">id municipio</label>
            <input type="text" class="form-control" id="id_municipio" name="id_municipio">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Fecha nacimiento</label>
            <input type="text" class="form-control" id="nacimiento" name="nacimiento">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">id cargo</label>
            <input type="text" class="form-control" id="id_cargo" name="id_cargo">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn_cerrar" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn_guardar1">Guardar</button>
      </div>
    </div>
  </div>
</div>
                </form>