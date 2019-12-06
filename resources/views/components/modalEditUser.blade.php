<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="editModalUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title m-auto" style="border: none" id="staticBackdropLabel">Editar usuario </h3>
      </div>
      <div class="showAlert">
        
      </div>
      <div class="modal-body align-items-center d-flex" style="height: 20rem;">
        <div class="container-fluid justify-content-center row">
          <div class="form-row xtreme">
            <span class="xtreme_u" gateway=""></span>
            <div class="col-md-12 mb-3">
              <label for="validationCustom01">Nombre</label>
              <input type="text" name="name" id="name" class="col-12 form-control user_name" value="Cargando..">
              <div class="valid-feedback"> Looks good! </div>
            </div>

            <div class="col-md-12 mb-3">
              <label for="validationCustom01">Tipo de Usuario</label>
              <select name="type_user" id="select_user_rol" class="text-capitalize form-control @error('program_id') is-invalid @enderror">                             
              </select>
            </div>

            <div class="col-md-12 mb-3 " id="select_programa">
              <label for="validationCustom01">Programa</label>
              <select name="program_id" id="select_user_prog" class="text-capitalize form-control @error('program_id') is-invalid @enderror">                             
              </select>
            </div>
            
            <button id="btnSaveUpdateUser" class="col-12 btn btn-success" >Actualizar</button>
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
    $(select_user_rol).change(function (e) { 
      var selectOption_user_rol = this.options[select_user_rol.selectedIndex];
      if(selectOption_user_rol.value == 4){
        $('#select_programa').show(); //.removeClass('d-none')
      }else{
        $('#select_programa').fadeToggle("slow"); //.addClass('d-none')
      }
    });

    $('.alert').alert()

    $('.modal-footer #close').click(function (e) { 
      location.reload();
    });
  });
</script>
    

