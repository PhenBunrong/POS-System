$(function(){

    // product main category ajax
    $('.product_main_category').on('change', function(){
        let value = $(this).val();
        // alert(value);
        $.get('/get-all-cateogory-selected-by-main-category/'+value,(res)=>{
            $('.product_category').html(res);
            $('.product_sub_category').html('');
        });
    });

    // product category ajax
    $('.view_product_popup').on('change', function(){
        let value = $(this).val();
        // alert(value);

        $.get('/get-all-sub-cateogory-selected-by-category/'+value,(res)=>{
            $('.product_sub_category').html(res);
        });
    });



});