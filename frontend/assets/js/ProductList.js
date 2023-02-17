$(document).ready(() => {
    function getProducts(){
        $('.product').html('');
        $.get('/getProducts', function(products, status) {
            if(Array.isArray(products)) {
                products.forEach(product => {
                    $('.product').append(`                                                
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card border-dark border-3 fs-5">
                            <div class="card-body">
                                <input type="checkbox" class="delete-checkbox form-check-input border-dark" value="${product.id}">
                                <P class="card-title text-center mb-0">${product.sku}</P>
                                <P class="card-text text-center mb-0">${product.name}</P>
                                <P class="card-text text-center mb-0">${(new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(product.price).replace("$", ""))} $</P>
                                <p class="card-text text-center">${product.type === 'dvd' ? 'Size: ' : product.type === 'book' ? 'Weight: ' : 'Dimensions: '}${product.attribute}</p>                                
                            </div>
                        </div>
                    </div>
                `);
                });
            }
        });
    }
    getProducts();

    let selected_ids = [];
    $(document).on("click","#delete-product-btn", function (){
        //reset values
        selected_ids = [];
        let $boxes = $('input[type=checkbox]:checked');
        $boxes.each(function(index){
            selected_ids[index] = $(this).val();
        });
        if(selected_ids[0]) {
            $.ajax({
                url: "/deleteProduct",
                type: "post",
                data: {product_ids: selected_ids},
                success: function (status) {
                    window.location.reload();
                }
            });
        } else {
            alert("Please select products to delete!");
        }
    });
});