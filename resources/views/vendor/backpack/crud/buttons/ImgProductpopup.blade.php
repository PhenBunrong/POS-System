{{-- @if ($crud->hasAccess('image'))
	<a href="{{URL('admin/product/getFile/'.$entry->getKey())}}"   class="btn btn-sm btn-warning"><i class="las la-images"></i></a>
@endif --}}


@if ($crud->hasAccess('image'))
    {{-- <input type="text" class="product_id" value="{{$entry->getKey()}}"> --}}
	<a href="javascript:void(0)"  class="btn btn-sm btn-warning view_product_popup" onclick="view_product_popup(this)" data-route="{{URL('admin/product/getFile/'.$entry->getKey())}}"><i class="las la-images"></i></a>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <style>
        .modal-backdrop.fade.show{
            display: none;
        }
		.modal-dialog {
			max-width: 60%;
			margin: 4.75rem auto;
		}
    </style>

  <div class="modal fade" id="viewProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">View Image Attribute</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
			<div class="productDetail">

            </div>
          </div>
    </div>
  </div>
@endif

<script>

    // $('.view_product_popup').on('click', function(e){
    //     e.preventDefault();
        
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     let route = $(this).attr('data-route');
    //     alert(route);
    // })
    
</script>

@push('after_scripts') @if (request()->ajax()) @endpush @endif
<script>

	if (typeof view_product_popup != 'function') {
	  $("[data-button-type=get]").unbind('click');
        // View Detail Product
        function view_product_popup(button){
            // let value = $(button).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let _token = $("input[name=_token]").val();

            // var value = $(button).attr('data-value');
            var route = $(button).attr('data-route');
            // var value = $(button).closest('.table').find('.product_id').val();

            // alert(route);

            $.ajax({
                url: route,
                type: "GET",
                // url: "/admin/product/getFile",
                data: {
                    'checking_viewbtn': true,
                    // 'product_id': value,
                    // _token: _token
                },
                success: function (response) {
                /*    console.log(response); */
                    $('.productDetail').html(response);
                     // Hide the modal, if any
			            //   $('.modal').modal('show');
                    $('#viewProduct').modal('show');
                },
            });

        };

        // function btn_close(button){
            
        //     $('#viewProduct').modal('hide');
        // }
	}

	// make it so that the function above is run after each DataTable draw event
	// crud.addFunctionToDataTablesDrawEventQueue('deleteEntry');
</script>
@if (!request()->ajax()) @endpush @endif

