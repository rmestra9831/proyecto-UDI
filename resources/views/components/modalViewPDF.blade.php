<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <h5 class="modal-title h3" id="exampleModalCenterTitle">Radicado <strong>{{$radicado->fechradic_id}}-{{$radicado->year}}</strong> </h5>
      </div>
      <div class="modal-body">
					<iframe 
					style="
					 width: 100%;
					 height: 45em;
					 background: grey;
					"
					src="{{Storage::url($radicado->filePDF)}}" frameborder="0"></iframe>
      </div>
      <div class="modal-footer justify-content-center">
				<img class="img_foot_modal" src=" {{asset('img/logo_udi.png')}} " alt="">
      </div>
    </div>
  </div>
</div>