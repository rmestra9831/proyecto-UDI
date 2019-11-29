<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="editModalUser{{$user->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title m-auto" style="border: none" id="staticBackdropLabel">Editar usuario {{$user->name}} </h3>
      </div>
        <div class="modal-body" style="height: 20rem;">
          <iframe id="frame_show_editUser" src="" frameborder="0"></iframe>
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
    

