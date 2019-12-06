<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="editModalProg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title m-auto" style="border: none" id="staticBackdropProgram">Editar usuario </h3>
      </div>
      <div class="showAlert">
        
      </div>
      <div class="modal-body align-items-center d-flex" style="height: 20rem;">
        <div class="container-fluid justify-content-center row">
          <div class="form-row xtreme">
            <span class="xtreme_p" gateway=""></span>
            <div class="col-md-12 mb-3">
              <label for="validationCustom01">correo</label>
              <input type="email" name="correo_director" id="name" class="col-12 form-control correo_prog" value="Cargando..">
              <div class="valid-feedback"> Looks good! </div>
            </div>

            <div class="col-md-12 mb-3">
              <label for="validationCustom01">Sede</label>
              <select name="sede" id="select_sede" class="text-capitalize form-control @error('program_id') is-invalid @enderror">                             
              </select>
            </div>

            <button id="btnSaveUpdateProg" class="col-12 btn btn-success" >Actualizar</button>
        </div>
        </div>

      </div>   
        <div class="modal-footer">
          <button id="close" class="btn btn-secondary" >Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function () {
    //motrar usuarios
    var select_user_rol = document.getElementById('select_user_rol');
    var selectOption_user_rol = document.getElementById('selectOption_user_rol');

    $('.alert').alert()

    $('.modal-footer #close').click(function (e) { 
      location.reload();
    });
  });
</script>
    

