<link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<script src="<?php echo base_url(); ?>/css/jquery-3.6.0.js"></script>

<div class="container card my-4">
    <div>
        <h1 class="titulo_Vista"><?php echo $titulo?></h1>
    </div>

    <div class="div-botones">
        <button type="button" class="btn-agregar" data-bs-toggle="modal" data-bs-target="#municipioModal">Agregar</button>
        <button type="button" class="btn-eliminar" >Eliminados</button>
        <a href="<?php echo base_url('/principal'); ?>" class="btn-regresar"><button class="btn-eliminar">Regresar</button></a>
    </div>

    <br>
    <div class="table-responsive">
        <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr style="color:#D0C7FC;font-weight:300;text-align:center;font-family:'Libre Bodoni', serif;;font-size:20px;">
                    <th>Id</th>
                    <th>Id_Departamentos</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th colspan="2">Acciones</th>

                </tr>
            </thead>
            <tbody style="font-family:'Libre Baskerville', serif;font-size:14px;">
                <?php foreach ($municipios as $municipio) { ?>
                    <tr>
                        <td><?php echo $municipio['id']; ?></td>
                        <td><?php echo $municipio['id_dpto']; ?></td>
                        <td><?php echo $municipio['nombre']; ?></td>
                        <td><?php echo $municipio['estado']; ?></td>

                        <td style="height:0.2rem;width:1rem;"><input class="eliminarlog" href="#" data-href="<?php echo base_url('/paises/eliminar') . '/' .$municipio['id']. '/' .'E'; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma" type="image" src="<?php echo base_url(); ?>/img/basurita.png" width="30" height="30" title="Editar Registro"></input></td>

                        <td id="inp_edita" style="height:0.2rem;width:1rem;"><input class="editar" href="#" onclick="seleccionaMunicipio(<?php echo $municipio['id'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#municipioModal" type="image" src="<?php echo base_url(); ?>/img/edit.png" width="30" height="30" title="Editar Registro"></input></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- modal guardar y actualizar -->
<form method="POST" action="<?php echo base_url('/municipios/insertar'); ?>" autocomplete="off">
<div class="modal fade" id="municipioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" style="background: linear-gradient(180deg, #DEDDFC, #FCF6FA);">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel" >Agregar municipio</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">id departamento</label>
            <input type="text" class="form-control" id="dpto" name="id_dpto">
            <input hidden id="tp" name="tp">
            <input hidden id="id" name="id">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
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

<!-- Modal Confirmar Eliminar -->
<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div style="background: linear-gradient(90deg, #838da0, #b4c1d9);" class="modal-content">
                <div style="text-align:center;" class="modal-header">
                    <h5 style="color:#FCF6FA;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>

                </div>
                <div style="text-align:center;font-weight:bold;" class="modal-body">
                    <p>Seguro Desea Eliminar éste Registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary close" data-dismiss="modal">No</button>
                    <a class="btn btn-danger btn-ok">Si</a>
                </div>
            </div>
        </div>
    </div>
       <!-- Modal Elimina -->

       <script>
  function seleccionaMunicipio(id, tp) {
    document.getElementById('exampleModalLabel').innerText="Actualizar municipio";
    if (tp == 2) {
      dataURL = "<?php echo base_url('/municipios/buscar_Municipio'); ?>" + "/" + id;
      $.ajax({
        type: "POST",
        url: dataURL,
        dataType: "json",
        success: function(rs) {
          $("#tp").val(2);
          $("#id").val(id);
          $("#dpto").val(rs[0]['id_dpto']);
          // $("#dpto").text(rs[0]['id_dpto']);
          $("#nombre").val(rs[0]['nombre']);
          $("#btn_guardar").text('Actualizar');
          $("#paisModal").modal("show");
        }
      })
    }else{$("#tp").val(1);
      document.getElementById('exampleModalLabel').innerText="Agregar municipio";
      $("#id_dpto").val('');
      $("#nombre").val('');
      $("#btn_guardar").text('Guardar');
    }
  };
</script>