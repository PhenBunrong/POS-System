@if ($crud->hasAccess('show'))
	<a href="javascript:void(0)"  class="btn btn-primary" data-button-type="show" data-bs-toggle="modal" data-bs-target="#createForm"><i class="la la-plus"></i> Purchase</a>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <style>
        .modal-backdrop.fade.show{
            display: none;
        }
		.modal-dialog {
			max-width: 1100px;
			margin: 4.75rem auto;
		}
    </style>
    <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="createForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog bg">
      <form action="{{URL('/purchase/create')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Purchase</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<?php $products = App\Models\Product::get();?>
							<label for="">Product Select</label>
							<select class="form-control" name="product_id">
								@foreach ($products as $item)
									<option value="{{$item->id}}">{{$item->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<?php $supplier = App\Models\Supplier::get();?>
							<label for="">Supplier Select</label>
							<select class="form-control" name="supplier_id">
								@foreach ($supplier as $item)
									<option value="{{$item->id}}">{{$item->company_name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Cost</label>
							<input type="number" class="form-control" name="cost" placeholder="Enter cost">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Price</label>
							<input type="number" class="form-control" name="price" placeholder="Enter price">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Qty</label>
							<input type="number" class="form-control" name="qty" placeholder="Enter qty">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="status">status</label>
							<select type="text" name="status" class="form-control" id="status">
								<option value="1" {{ old('status') === 1 ? 'selected' : ''}} >Active</option>
								<option value="0" {{ old('status') === 0 ? 'selected' : ''}}>Inactive</option>
							</select>	
						</div>
					</div>					
				</div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn_save">Save</button>
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

	if (typeof deleteEntry != 'function') {
	  $("[data-button-type=delete]").unbind('click');

	  function deleteEntry(button) {
		// ask for confirmation before deleting an item
		// e.preventDefault();
		var route = $(button).attr('data-route');

		swal({
		  title: "{!! trans('backpack::base.warning') !!}",
		  text: "{!! trans('backpack::crud.delete_confirm') !!}",
		  icon: "warning",
		  buttons: ["{!! trans('backpack::crud.cancel') !!}", "{!! trans('backpack::crud.delete') !!}"],
		  dangerMode: true,
		}).then((value) => {
			if (value) {
				$.ajax({
			      url: route,
			      type: 'DELETE',
			      success: function(result) {
			          if (result == 1) {
						  // Redraw the table
						  if (typeof crud != 'undefined' && typeof crud.table != 'undefined') {
							  // Move to previous page in case of deleting the only item in table
							  if(crud.table.rows().count() === 1) {
							    crud.table.page("previous");
							  }

							  crud.table.draw(false);
						  }

			          	  // Show a success notification bubble
			              new Noty({
		                    type: "success",
		                    text: "{!! '<strong>'.trans('backpack::crud.delete_confirmation_title').'</strong><br>'.trans('backpack::crud.delete_confirmation_message') !!}"
		                  }).show();

			              // Hide the modal, if any
			              $('.modal').modal('hide');
			          } else {
			              // if the result is an array, it means 
			              // we have notification bubbles to show
			          	  if (result instanceof Object) {
			          	  	// trigger one or more bubble notifications 
			          	  	Object.entries(result).forEach(function(entry, index) {
			          	  	  var type = entry[0];
			          	  	  entry[1].forEach(function(message, i) {
					          	  new Noty({
				                    type: type,
				                    text: message
				                  }).show();
			          	  	  });
			          	  	});
			          	  } else {// Show an error alert
				              swal({
				              	title: "{!! trans('backpack::crud.delete_confirmation_not_title') !!}",
	                            text: "{!! trans('backpack::crud.delete_confirmation_not_message') !!}",
				              	icon: "error",
				              	timer: 4000,
				              	buttons: false,
				              });
			          	  }			          	  
			          }
			      },
			      error: function(result) {
			          // Show an alert with the result
			          swal({
		              	title: "{!! trans('backpack::crud.delete_confirmation_not_title') !!}",
                        text: "{!! trans('backpack::crud.delete_confirmation_not_message') !!}",
		              	icon: "error",
		              	timer: 4000,
		              	buttons: false,
		              });
			      }
			  });
			}
		});

      }
	}
    // $(function(){

    //     var Modal1 = $('.modal');
    //     var addFile = $('.addFile');
    //      $('body').on('click','.btn_save',function(){
            
    //         var frm_data = new FormData();
    //         frm_data.append('file',$('.addFile').get(0).files[0]);
    //         $.ajax({
    //             url:'{{route("customer.import")}}',
    //             type:'POST',
    //             data:frm_data,
    //             contentType:false,
    //             cache:false,
    //             processData:false,
    //             dataType:"json",
    //             beforeSend:function(){
    //                     //work before success    
    //             },
    //             success:function(data){   
    //                 Modal1.hide();
    //                 addFile.val('');  
    //                 $('#crudTable_wrapper').find('table').DataTable().ajax.reload();
    //             }				
    //         }); 
    //     });
    // });

	// make it so that the function above is run after each DataTable draw event
	// crud.addFunctionToDataTablesDrawEventQueue('deleteEntry');
</script>
@if (!request()->ajax()) @endpush @endif


{{-- {{ trans('backpack::crud.delete') }} --}}