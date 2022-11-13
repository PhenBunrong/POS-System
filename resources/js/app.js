/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('pagination', require('laravel-vue-pagination'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

if (document.getElementById('app')) {
    const app = new Vue({
        el: "#app",
        created: function(){
           this.get_latest_product();
        },
        data: function(){
            return{
                cart: [],
                products:{},
                pos_product_list:[],
                // pos_total_price: 0,
            }
        },
        methods:{

            get_latest_product: function(page=1){
                $.get('/latest-products-json?page='+ page, (res) => {
                    this.products = res;
                });
            },

            search_product: _.debounce(function(key){
                key.length > 0 ?
                    $.get('/search_product_json/6/'+key,(res) => {
                        this.products = res;
                    })
                :
                    this.get_latest_product();
            },500),

            add_product_to_pos_list: function(product){
                let product_check = this.pos_product_list.find((item)=>item.id === product.id);
                if(product_check){
                    product_check.qty++;
                }else{

                    let post_product = {
                        id : product.id,
                        name : product.name,
                        image : product.image,
                        price : product.price,
                        qty : 1,
                    }
                    this.pos_product_list.unshift(post_product);
                }
                // this.update_pos_total_price();
            },

            // submitForm: function(product){
            //     let post_product = {
            //         id : product.id,
            //         name : product.name,
            //         image : product.image,
            //         price : product.price,
            //         qty : 1,
            //     }
            // },
            submitForm: function(){
                Swal.fire({
                    title: 'Received Amount',
                    input: 'text',
                    inputValue: '305.64',
                    inputAttributes: {
                      autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Send',
                    showLoaderOnConfirm: true,
                    preConfirm: (login) => {
                        return fetch(`//api.github.com/users/${login}`)
                          .then(response => {
                            if (!response.ok) {
                              throw new Error(response.statusText)
                            }
                            return response.json()
                          })
                          .catch(error => {
                            Swal.showValidationMessage(
                              `Request failed: ${error}`
                            )
                          })
                      },
                    allowOutsideClick: () => !Swal.isLoading()
                  }).then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire({
                        title: `${result.value.login}'s avatar`,
                        imageUrl: result.value.avatar_url
                      })
                    }
                  })
            },  

            // getTotal(cart){
            //     const total = cart.map(c => c.pivot.quantity * c.price);
            //     return sum(total).toFixed(2);
            // },

            remove_post_product: function(product){
                this.pos_product_list = this.pos_product_list.filter((item)=>item.id !== product.id);
                // this.update_pos_total_price();
            },

            update_pos_qty: function(product,qty){
                let check_product = this.pos_product_list.find((item)=>item.id === product.id);
                check_product.qty = qty;
                // this.update_pos_total_price();
            },



            // update_pos_total_price: function(){
            //     this.pos_total_price = this.pos_product_list.reduce((total,product)=>{
            //         return total + (product.price * product.qty);
            //     },0);
            // }
        },

        //បានគណនា
        computed: {
            // a computed getter
            get_pos_total_price: function(){
                this.pos_total_price = this.pos_product_list.reduce((total,product)=>{
                    return total + (product.price * product.qty);
                },0);

                return this.pos_total_price;
            }
        }
    });
}
