<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="editModalUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title m-auto" style="border: none" id="staticBackdropLabel">Editar usuario </h3>
      </div>
      <div class="modal-body" style="height: 20rem;">
        <div>
          <span class="elif"></span>
        </div>
        <div class="xtreme">
            <span class="xtreme_u" gateway=""></span>
            <input type="text" name="name" id="name" class="user_name" value="Cargando..">
            <select name="type_user" id="select_user_rol" class="text-capitalize form-control form-control-sm @error('program_id') is-invalid @enderror">                             
            </select>
            <button id="btnSaveUpdateUser" class="btn btn-success" >Guardar</button>
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
    $('.modal-footer #close').click(function (e) { 
      location.reload();
    });
  });
</script>
    

