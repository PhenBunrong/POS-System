@extends(backpack_view('blank'))


@section('content')
    <br>
    <!-- Icons CSS-->
    <link href="{{ asset('contents/admin') }}/css/icons.css" rel="stylesheet" type="text/css" />

    <!-- Custom Style-->
    <link href="{{ asset('contents/admin') }}/css/style2.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('contents/admin') }}/custom2.css">

    <!-- សម្រាប់Alert Succes and Error -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-print-none with-border">
                        <a href="{{ backpack_url('product/create') }}" class="btn btn-primary mb-3 mb-lg-0"><i
                                class="la la-plus"></i>New Product</a>
                        <a href="{{ backpack_url('product') }}" class="btn btn-primary mb-3 mb-lg-0"><i
                                class="bx bxs-plus-square"></i>List Product</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
                @foreach ($products as $product)
                    <div class="col admin_product_individual_body">
                        <div class="card position-relative">
                            <img src="/{{ $product->image }}" class="card-img-top"
                                alt="product image {{ $product->image }}" />
                            <div class="">
                                <div class="product-discount"><span
                                        class="title-discount">-{{ $product->discount }}%</span></div>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title cursor-pointer d-block">{{ $product->name }}</h6>
                                <div class="clearfix d-flex justify-content-between">
                                    {{-- <p class="mb-0 "><strong>134</strong> Sales</p> --}}
                                    <p class="mb-0  fw-bold">
                                        <span class="me-2 text-decoration-line-through"><del> ${{ $product->price }}</del></span>
                                        <span class="">&nbsp;&nbsp; ${{ $product->discount_price }}</span>
                                    </p>
                                </div>
                                {{-- <div class="d-flex align-items-center mt-3 fs-6">
                                        <div class="cursor-pointer">
                                            <i class="fa fa-star text-white"></i>
                                            <i class="fa fa-star text-white"></i>
                                            <i class="fa fa-star text-white"></i>
                                            <i class="fa fa-star text-light-4"></i>
                                            <i class="fa fa-star text-light-4"></i>
                                        </div>
                                        <p class="mb-0 ms-auto">4.2(182)</p>
                                    </div> --}}
                            </div>
                            <div class="card-footer">
                                <ul class="d-flex flex-wrap justify-content-end">
                                    <li><a href="{{ route('product.edit', $product->id) }}"
                                            class="btn btn-sm btn-success ml-2">Edit</a></li>
                                    <li><a href="{{ route('product.show', $product->id) }}"
                                            class="btn btn-sm btn-warning ml-2">View</a></li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="deleteEntry(this)"
                                            data-route="{{ url('admin/product/' . $product->id) }}"
                                            class="btn delete_btn btn-sm btn-danger ml-2">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <div aria-label="Page navigation example" class="navigation_body">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--start overlay-->
    <div class="overlay"></div>
    <!--end overlay-->
@endsection

{{-- Button Javascript --}}
{{-- - used right away in AJAX operations (ex: List) --}}
{{-- - pushed to the end of the page, after jQuery is loaded, for non-AJAX operations (ex: Show) --}}
@push('after_scripts') @if (request()->ajax())
@endpush
@endif
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
                                    if (typeof crud != 'undefined' && typeof crud.table !=
                                        'undefined') {
                                        // Move to previous page in case of deleting the only item in table
                                        if (crud.table.rows().count() === 1) {
                                            crud.table.page("previous");
                                        }

                                        crud.table.draw(false);
                                    }

                                    // Show a success notification bubble
                                    new Noty({
                                        type: "success",
                                        text: "{!! '<strong>' . trans('backpack::crud.delete_confirmation_title') . '</strong><br>' . trans('backpack::crud.delete_confirmation_message') !!}"
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
                                    } else { // Show an error alert
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

        // make it so that the function above is run after each DataTable draw event
        // crud.addFunctionToDataTablesDrawEventQueue('deleteEntry');
    </script>
@if (!request()->ajax())
@endpush
@endif
