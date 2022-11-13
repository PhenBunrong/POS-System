@if ($crud->hasAccess('delete'))
	<a href="javascript:void(0)"  class="btn btn-secondary" data-button-type="delete" data-bs-toggle="modal" data-bs-target="#importFile"></i>Import Excel</a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <style>
        .modal-backdrop.fade.show{
            display: none;
        }
		.modal-dialog {
			max-width: 500px;
			margin: 4.75rem auto;
		}
    </style>
    <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="importFile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form enctype="multipart/form-data" action="{{route("customer.import")}}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Import Excel</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="file" class="addFile" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary btn_save">Save</button>
            </div>
          </div>
      </form>
    </div>
  </div>
@endif

{{-- Button Javascript --}}
{{-- - used right away in AJAX operations (ex: List) --}}
{{-- - pushed to the end of the page, after jQuery is loaded, for non-AJAX operations (ex: Show) --}}
@push('after_scripts') @if (request()->ajax()) @endpush @endif
<script>

    $(function(){

        var Modal1 = $('.modal');
        var addFile = $('.addFile');
         $('body').on('click','.btn_save',function(){
            
			let route = $(this).attr('action');
			// alert(route);
            var frm_data = new FormData();
            frm_data.append('file',$('.addFile').get(0).files[0]);
            $.ajax({
                url: route,
                type:'POST',
                data:frm_data,
                contentType:false,
                cache:false,
                processData:false,
                dataType:"json",
                beforeSend:function(){
                        //work before success    
                },
                success:function(data){   
                    Modal1.hide();
                    addFile.val('');  
                    $('#crudTable_wrapper').find('table').DataTable().ajax.reload();
                }				
            }); 
        });
    });

	// make it so that the function above is run after each DataTable draw event
	// crud.addFunctionToDataTablesDrawEventQueue('deleteEntry');
</script>
@if (!request()->ajax()) @endpush @endif


{{-- {{ trans('backpack::crud.delete') }} --}}