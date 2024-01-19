<link rel="stylesheet" href="<?php echo base_url('css/styles.css'); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<script src="<?php echo base_url(); ?>/css/jquery-3.6.0.js"></script>



<div class="container card my-4">
    <div>
        <h1 class="titulo_Vista"><?php echo $titulo?></h1>
    </div>
    <div class="div-botones">
    <button type="button" class="btn-agregar"  data-bs-target="#paisModal" data-bs-toggle="modal"  onclick="seleccionaPais(<?php echo 1 . ',' . 1 ?>);">Agregar</button>
    <a href="<?php echo base_url('eliminados_paises'); ?>"  class="btn btn-secondary regresar_Btn">Eliminados</a>
        <a href="<?php echo base_url('/principal'); ?>" class="btn-regresar"><button class="btn-eliminar">Regresar</button></a>
    </div>

    <br>
    <div class="table-responsive">
        <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr style="color:#D0C7FC;font-weight:300;text-align:center;font-family:'Libre Bodoni', serif;;font-size:20px;">
                    <th>Id</th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody style="font-family:'Libre Baskerville', serif;font-size:14px;">
                <?php foreach ($paises as $pais) { ?>
                    <tr>
                        <td><?php echo $pais['id']; ?></td>
                        <td>+<?php echo $pais['codigo']; ?></td>
                        <td><?php echo $pais['nombre']; ?></td>
                        <td><?php echo $pais['estado']; ?></td>


                        <td style="height:0.2rem;width:1rem;"><input class="eliminarlog" href="#" data-href="<?php echo base_url('/paises/eliminar') . '/' .$pais['id']. '/' .'E'; ?>" data-bs-toggle="modal" data-bs-target="#modal-confirma" type="image" src="<?php echo base_url(); ?>/img/basurita.png" width="30" height="30" title="Eliminar Registro"></input></td>

                        <td id="inp_edita" style="height:0.2rem;width:1rem;"><input class="editar" href="#" onclick="seleccionaPais(<?php echo $pais['id'] . ',' . 2 ?>);" data-bs-toggle="modal" data-bs-target="#paisModal" type="image" src="<?php echo base_url(); ?>/img/edit.png" width="30" height="30" title="Editar Registro"></input></td>


                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<form method="POST" action="<?php echo base_url('/paises/insertar'); ?>" autocomplete="off">
<div class="modal fade" id="paisModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div style="background: linear-gradient(180deg, #DEDDFC, #FCF6FA);"class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar pais</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Codigo</label>
            <input type="text" class="form-control" id="codigo" name="codigo">
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
        <button type="submit" class="btn_guardar1" id="btn_guardar">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal Confirma Eliminar -->
<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div style="background: linear-gradient(180deg, #DEDDFC, #FCF6FA);" class="modal-content">
                <div style="text-align:center;" class="modal-header">
                    <h5 style="color:#3A3A3A;font-family: 'Cinzel', serif;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>

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
  $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

  function seleccionaPais(id, tp) {
    document.getElementById('exampleModalLabel').innerText="Actualizar pais";
    if (tp == 2) {
      dataURL = "<?php echo base_url('/paises/buscar_Pais'); ?>" + "/" + id;
      $.ajax({
        type: "POST",
        url: dataURL,
        dataType: "json",
        success: function(rs) {
          $("#tp").val(2);
          $("#id").val(id);
          $("#codigo").val(rs[0]['codigo']);
          $("#nombre").val(rs[0]['nombre']);
          $("#btn_guardar").text('Actualizar');
          $("#paisModal").modal("show");
        }
      })
    }else{$("#tp").val(1);
      document.getElementById('exampleModalLabel').innerText="Agregar pais";
      $("#codigo").val('');
      $("#nombre").val('');
    }
  };
  $('.close').click(function() {$("#modal-confirma").modal("hide");});
</script>
