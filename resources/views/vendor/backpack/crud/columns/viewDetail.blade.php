@extends(backpack_view('blank'))

@section('content')
    <nav aria-label="breadcrumb" class="d-none d-lg-block">
        <ol class="breadcrumb bg-transparent p-0 justify-content-end">
            <li class="breadcrumb-item text-capitalize"><a href="http://127.0.0.1:8000/admin/dashboard">Admin</a></li>
            <li class="breadcrumb-item text-capitalize"><a href="http://127.0.0.1:8000/admin/product">products</a></li>
            <li class="breadcrumb-item text-capitalize active" aria-current="page">Preview</li>
        </ol>
    </nav>
    <section class="">
        <a href="javascript: window.print();" class="btn float-right"><i class="la la-print"></i></a>
        <h2>
            <span class="text-capitalize">products</span>
            <small>Preview product.</small>
            <small class=""><a href="http://127.0.0.1:8000/admin/product" class="font-sm"><i
                        class="la la-angle-double-left"></i> Back to all <span>products</span></a></small>
        </h2>
    </section>

    <div class="card" id="product_data">
        <input type="hidden" class="product_id" value="{{$products->id}}">
        <div class="card-header">
            <h5 class="">Product Name : {{ $products->name }}</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Fileable Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products->files as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('uploads/files/' . $item->url) }}" style="width:80px; height:70px" alt="" />
                            </td>
                            <td>
                                {{ $item->mime_type }}
                            </td>
                            <td>
                                {{ $item->fileable_type }}
                            </td>
                            <td>
                                <a href="javascript:void(0)" onclick="deleteFun({{$item->id}})" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    .swal2-cancel {
        margin: 0 0.5rem;
        padding: 0.5rem 0.75rem;
    }
</style>

<script>
    function deleteFun(id){
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
                buttonsStyling: false
            })

            // alert(id);
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "/product/delFile/"+id,
                        data: {
                            _token : $("input[name=_token]").val()
                        },
                        success: function (response) {
                            $("#Entry_id"+id).remove();
                        }
                    });
                    swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
                )
            }
        })
    }
</script>
@endsection
