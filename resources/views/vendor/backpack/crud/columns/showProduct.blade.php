

    <div class="card" id="product_data">
        {{-- <input type="hidden" class="product_id" value="{{$products->id}}"> --}}
        <div class="card-header">
            <h6 class="">Product Name : {{ $products->name }}</h6>
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
                        <tr id="trData">
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
                                {{-- <input type="text" class="item_id{{$item->id}}" value="{{$item->id}}"> --}}
                                {{-- <a href="javascript:void(0)" onclick="deleteStudent({{$item->id}})">Delete</a> --}}
                                <a href="javascript:void(0)" onclick="deleteFun({{$item->id}})" data-route="{{url('admin/product/delFile/'.$item->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    .swal2-cancel {
        margin: 0 0.5rem;
        padding: 0.5rem 0.75rem;
    }
</style>

<script>

    function deleteFun(button){
        // alert(button);
        var route = $(button).attr('data-route');
       

        var token = $("meta[name='csrf-token']").attr("content");
        console.log(route);
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
                        type: "GET",
                        url: route,
                        data: {
                            "_token": token,
                        },
                        success: function (response) {
                            // $("table"+id).remove();
                            $("#trData"+id).remove();
                            // location.reload();
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
