<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="RbBUf1RxtgWruzYXcpmGe4Xi3Qu3arkLfpF3aVxf" />
    <title>Backpack Admin Panel</title>


    <link rel="stylesheet" type="text/css"
        href="http://127.0.0.1:8000/packages/backpack/base/css/bundle.css?v=4.1.69@248e2e034cedcffe01732cdce01fb3d1ecad9ffa">
    <link rel="stylesheet" type="text/css"
        href="http://127.0.0.1:8000/build/css/intlTelInput.css?v=4.1.69@248e2e034cedcffe01732cdce01fb3d1ecad9ffa">
    <link rel="stylesheet" type="text/css"
        href="http://127.0.0.1:8000/packages/source-sans-pro/source-sans-pro.css?v=4.1.69@248e2e034cedcffe01732cdce01fb3d1ecad9ffa">
    <link rel="stylesheet" type="text/css"
        href="http://127.0.0.1:8000/packages/line-awesome/css/line-awesome.min.css?v=4.1.69@248e2e034cedcffe01732cdce01fb3d1ecad9ffa">
    <link rel="stylesheet" type="text/css"
        href="http://127.0.0.1:8000/dist/css/lightbox.css?v=4.1.69@248e2e034cedcffe01732cdce01fb3d1ecad9ffa">

    <link rel="stylesheet" href="{{ asset('contents/website') }}/css/font-awesome.min.css" />
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('contents/website') }}/style.css" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .navbar {
            padding: 0rem 1rem !important;
        }
    </style>

</head>

<body class="app aside-menu-fixed sidebar-lg-show">

    <header class="app-header navbar navbar-color bg-primary border-0">
        <!-- Logo -->
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto ml-3" type="button" data-toggle="sidebar-show"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="http://127.0.0.1:8000" title="Backpack Admin Panel">
            <b>Back</b>pack
        </a>

        <ul class="nav navbar-nav ml-auto ">
            <li class="nav-item dropdown pr-0">
                <a data-toggle="dropdown" href="locale/en" role="button" aria-haspopup="true" aria-expanded="false"
                    class="nav-link">
                    <img src="https://cicstaging.z1central.com/images/flag/english.png" style="width: 25px;">
                </a>
                <div class="dropdown-menu dropdown-menu-right mr-4 pb-1 pt-1">
                    <a href="locale/en" class="dropdown-item">
                        <img src="https://cicstaging.z1central.com/images/flag/english.png" class="mr-2"
                            style="width: 25px;"> អង់គ្លេស
                    </a>
                    <div class="dropdown-divider m-0"></div>
                    <a href="locale/kh" class="dropdown-item">
                        <img src="https://cicstaging.z1central.com/images/flag/khmer.png" class="mr-2"
                            style="width: 25px;"> ខ្មែរ
                    </a>
                </div>
            </li>

            <li class="nav-item dropdown pr-4">
                <a data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"
                    class="nav-link text-light">
                    <img src="{{ backpack_avatar_url(backpack_auth()->user()) }}"
                        alt="{{ backpack_auth()->user()->name }}" class="img-avatar">
                    <span>{{ backpack_user()->getAttribute('name') ? mb_substr(backpack_user()->name, 0, 4, 'UTF-8') : 'A' }}</span>
                    <em class="la la-caret-down"></em>
                </a>
                <div class="dropdown-menu dropdown-menu-right mr-4 pb-1 pt-1">
                    <a class="dropdown-item" href="{{ route('backpack.account.info') }}"><i
                            class="la la-user"></i> {{ trans('backpack::base.my_account') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ backpack_url('logout') }}"><i class="la la-lock"></i>
                        {{ trans('backpack::base.logout') }}</a>
                </div>
            </li>

        </ul>
        <!-- ========== End of top menu right items ========== -->
    </header>

    <div class="card-body">

        <div class="row" id="app">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-2">
                                        <h3 class="text-uppercase">Pos</h3>
                                    </div>
                                    <div class="col-md-4">
                                        <input  type="text"
                                            @keyup="search_product($event.target.value)"
                                            placeholder="search by name, code, price, discount rate"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        {{-- <pagination :show-disabled="true" :data="products" @pagination-change-page="get_latest_product">
                                            <span slot="prev-nav">&lt; Previous</span>
                                            <span slot="next-nav">Next &gt;</span>
                                        </pagination> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-4 mb-4" v-for="product in products.data" :key="product.id">
                                        <example-component :product="product"  :add_product_to_pos_list="add_product_to_pos_list"></example-component> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <form action=""  id="orderForm">
                                            @csrf
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>product</th>
                                                        <th class="text-center">qty</th>
                                                        <th class="text-right">price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="cart-content" v-for="product in pos_product_list" :key="product.id">
                                                        <div class="">
                                                            <td>
                                                                {{-- <input type="text" id="id" :value="product.id">
                                                                <input type="text" id="name" :value="product.name"> --}}
                                                                <div class="d-flex">
                                                                    <img :src="`/${product.image}`" style="height: 40px;padding-right: 5px;" alt="">
                                                                    @{{product.name}}
                                                                </div>
                                                            </td>
                                                            <td class="cart-box" style="width: 145px;">
                                                                <div class="qty text-center">
                                                                    <input type="number" id="qty"
                                                                        @change="update_pos_qty(product,$event.target.value)"
                                                                        @keyup="update_pos_qty(product,$event.target.value)"
                                                                        :value="product.qty"
                                                                        min="1"
                                                                        style="width: 50px">
            
                                                                    <i @click="update_pos_qty(product,1)" class="fa fa-recycle btn-sm btn-warning"></i>
                                                                    <i @click="remove_post_product(product)" class="fa fa-trash btn-sm btn-danger"></i>
                                                                </div>
                                                            </td>
                                                            <td style="width: 80px;" class="text-right">
                                                                <h6>$ @{{ product.price * product.qty }}</h6>
                                                            </td>
                                                        </div>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="2" class="text-right">Total</th>
                                                        <th class="text-right">
                                                            <h6 class="total-price">$ @{{get_pos_total_price}}</h6>
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <div>
                                                <button type="button" @click="submitForm()"  class="btn btn-primary float-right" ><i class="nav-icon las la-shopping-bag"></i>  Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="clear:both;padding-top:20px;text-align:center;">
                            <div class="pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    

    </div><!-- ./app-body -->

    <footer class="app-footer d-print-none">
        <div class="text-muted ml-auto mr-auto">
            Handcrafted by <a target="_blank" rel="noopener" href="http://tabacitu.ro">Cristian Tabacitu</a>.
            Powered by <a target="_blank" rel="noopener"
                href="http://backpackforlaravel.com?ref=panel_footer_link">Backpack for Laravel</a>.
        </div>
    </footer>

    <script type="text/javascript"
        src="http://127.0.0.1:8000/packages/backpack/base/js/bundle.js?v=4.1.69@248e2e034cedcffe01732cdce01fb3d1ecad9ffa">
    </script>
    <script type="text/javascript"
        src="http://127.0.0.1:8000/dist/js/lightbox.js?v=4.1.69@248e2e034cedcffe01732cdce01fb3d1ecad9ffa"></script>
    <script type="text/javascript"
        src="http://127.0.0.1:8000/build/js/intlTelInput.js?v=4.1.69@248e2e034cedcffe01732cdce01fb3d1ecad9ffa"></script>


    <script>
        $(function(){

            $("#submitform").on('click',function(e){
                e.preventDefault();
                alert('Data Order Success');
                // $(this).parents(".cart-content").remove();
                // $("#orderForm")[0].reset();
                // let id = $("#id");
                // let name = $("#name");
                // let qty = $("#qty");
                // let price = $("#price");

                // $.ajax({
                //     type: "POST",
                //     url: "{{route('order.add')}}",
                //     data: {
                //         id : id,
                //         name : name,
                //         qty : qty,
                //         price : price,
                //     },
                //     success: function (response) {
                //     }
                // });
            });
        });
    </script>
    {{-- <script>
        // Cart Working  JS
        if (document.readyState == "loading") {
            document.addEventListener("DOMContentLoaded", ready);
        } else {
            ready();
        }

        // Making Function
        function ready() {
            // Remove Items From Cart
            var removeCartButtons = document.getElementsByClassName('cart-remove');
            console.log(removeCartButtons);
            for (var i = 0; i < removeCartButtons.length; i++) {
                var button = removeCartButtons[i];
                button.addEventListener('click', removeCartItem);
            }

            // Quantity Changes
            var quantityInputs = document.getElementsByClassName("cart-quantity");
            for (var i = 0; i < quantityInputs.length; i++) {
                var input = quantityInputs[i];
                input.addEventListener("change", quantityChanged);
            }
        }

        // Remove Items From Cart
        function removeCartItem(event) {
            var buttonClicked = event.target;
            $(this).parents('.cart-content').remove();
            // buttonClicked.parentElement.remove();
            updatetotal();
        }

        // Quantity Changes
        function quantityChanged(event) {
            var input = event.target;
            if (isNaN(input.value) || input.value <= 0) {
                input.value = 1;
            }
            updatetotal();
        }

        // update Total
        function updatetotal() {
            var cartContent = document.getElementsByClassName('cart-content')[0];
            var cartBoxes = cartContent.getElementsByClassName("cart-box");
            var total = 0;

            for (var i = 0; i < cartBoxes.length; i++) {
                var cartBox = cartBoxes[i];
                var priceElement = cartBox.getElementsByClassName('cart-price')[0];
                var quantityElement = cartBox.getElementsByClassName("cart-quantity")[0];
                var price = parseFloat(priceElement.innerText.replace("$", ""));
                var quantity = quantityElement.value;
                total = total + (price * quantity);

                document.getElementsByClassName('total-price')[0].innerText = '$' + total;
            }
        }
    </script> --}}

</body>

</html>
