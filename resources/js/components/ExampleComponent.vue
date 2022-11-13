<template>
        <div class="product-wrapper bl">
            <div class="product-img">
                <div class="discount_amount">
                    <span>{{product.discount}}%</span>
                </div>
                <a href="#">
                    <span v-if="product.image">
                        <img :src="'/'+product.image" alt="" class="primary">
                        <img :src="'/uploads/files/'+product.files[0].url" alt="" class="secondary">
                    </span>
                    <span v-else>
                        <img src="/image_load.gif" style="width:100%" alt="">
                    </span>
                </a>
                <div class="product-icon c-fff home3-hover-bg">
                     <ul>
                        <li><a @click="add_product_to_pos_list(product)" data-toggle="tooltip" title="" data-original-title="Add to cart"><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a data-toggle="tooltip" title="" data-original-title="Wishlist"><i class="fa fa-heart-o"></i></a></li>
                        <li><a data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-comments"></i></a></li>
                        <li><a @click.prevent="set_product" title="view product" ><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="product-content home3-hover">
                <h3><a>{{product.name}}</a></h3>
                <ul>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                </ul>


                <span>$ {{product.price}}</span>
                <button class="btn btn-dark btn-sm mt-4" @click="add_product_to_pos_list(product)" type="button">add to cart</button>

            </div>
        </div>

</template>

<script>
    export default {
        props:[
            'product', 
            'add_product_to_pos_list'
        ],
    }
</script>

<style>

</style>