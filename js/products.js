var debug = true;

$(document).ready(function(){
   
    if(debug)
        alert("Page Ready!");
    
    loadProducts();
    
    //modal to insert product
    $("#modalNewProduct").submit(function(e){
        
        e.preventDefault();
        if(debug)
            alert("Product Form Submitted!");
        
        registerNewProduct();
        
    });
    
     //modal to insert image
   $(document).on("click",".upload",function(){
       
            let productId = $(this).data('id');
        $("#uploadImageId").val(productId);
            $("#uploadImage").modal('show');
       
    });
    //edit modal 
     $(document).on("click",".edit-button",function(){
       
            let productId = $(this).data('id');
            let productName = $(this).data('name');
            let productDesc = $(this).data('desc');
         let productQnty = $(this).data('qty');
         let productPrice = $(this).data('price');
        
         $("#productId").val(productId);
        $("#productName").val(productName);
         $("#productDesc").val(productDesc);
         $("#productQty").val(productQnty);
         $("#productPrice").val(productPrice);
         
            $("#editModal").modal('show');
       
    });
    
    //upload edit to database
    $("#editProductForm").submit(function (e) {
    e.preventDefault();

    let productId = $('#productId').val();
    let productName = $('#productName').val();
        let productDesc = $('#productDesc').val();
        let productQty = $('#productQty').val();
        let productPrice = $('#productPrice').val();
    var formData = new FormData();
        formData.append("id",productId);
        formData.append("name",productName);
        formData.append("desc",productDesc);
        formData.append("qty",productQty);
        formData.append("price",productPrice);

       $.ajax({
        type: "POST",
        url: "php/edit_product.php?",  
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            alert(response);
            $('#editModal').modal('hide');
        },
        error: function () {
            alert("Error occurred.");
        }
    });
});
    
    
   //upload iamge to database
$("#imageUploadForm").submit(function (e) {
    e.preventDefault();

    let productId = $('#uploadImageId').val();
    var formData = new FormData(this);

    $.ajax({
        type: "POST",
        url: "php/image_db.php?id=" + productId,  
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            alert(response);
            $('#uploadImage').modal('hide');
        },
        error: function () {
            alert("Error occurred.");
        }
    });
});

    
    //on off button 
    $(document).on('click', '.product-button', function(){
        
        let productId = $(this).data('id');
        let currentStatus = $(this).data('val');
        
         let newStatus = (currentStatus === 1) ? 0 : 1;

        $.post("php/edit_status.php", {id: productId, status: newStatus},
              function(json_response){
           
            let response = JSON.parse(json_response);
            if(response.success ==1){
                if(newStatus ===1){
                    $('.product[data-id="${productId}"]').data('dataval',
                    1).text('ON').removeClass('btn-outline-dark').addClass('btn-outline-primary');
                }else{
                    $('.product[data-id="${productId}"]').data('dataval',
                    0).text('OFF').removeClass('btn-dark').addClass('btn-outline-danger');
                }
            }else{
                alert("Failed to update product status in the database.");
            }
            window.location.reload();       
        });
    });
   //delete button
$(document).on('click', '.delete', function(){
        
        let productId = $(this).data('id');  

        $.post("php/delete.php", {id: productId},
              function(json_response){
           
            let response = JSON.parse(json_response);
            if(response.success ==1){
                alert("Successfully Deleted product from the database.");
            }else{
                alert("Failed to Delete product from the database.");
            }
            window.location.reload();       
        });
    }); 
    
});

    
    



function loadProducts(){
    if(debug)
        alert("Loading Products!");
    $.get("php/select_products.php", {}, function(json_response){
        
        let products_table = "";
        
        let response = JSON.parse(json_response);
        let arr = response.data;
        
        if(arr.length>0){
            products_table += "<table class='table table-bordered'>";
            products_table += "<thead>";
            products_table += "<tr>";
            products_table += "<th>#</th>";
            products_table += "<th>Product</th>";
            products_table += "<th>Description</th>";
            products_table += "<th>Quantity</th>";
            products_table += "<th>Price</th>";
            products_table += "<th>Image</th>";
            products_table += "<th>Status</th>";
            
            products_table += "</tr>";
            products_table += "</thead>";
            products_table += "<tbody>";
            
            for(let i = 0; i < arr.length; i++){
                products_table += "<tr>";
                products_table += "<td>"+(i+1)+"</td>";
                products_table += "<td>"+arr[i].product+"</td>";
                products_table += "<td>"+arr[i].desc+"</td>";
                products_table += "<td>"+arr[i].quantity+"</td>";
                products_table += "<td>"+arr[i].price+"</td>";
                products_table += "<td>"+arr[i].img+"</td>";
                if(arr[i].status == 1){
                    products_table += "<td><button data-id=" + arr[i].id + " data-val='1' class='btn btn-sm btn-dark product-button'>OFF</button>&nbsp&nbsp&nbsp<button class='btn btn-sm btn-secondary upload' data-id=" + arr[i].id + ">Upload</button>&nbsp&nbsp&nbsp<button data-price="+arr[i].price+" data-qty="+arr[i].quantity+" data-desc="+arr[i].desc+" data-name="+ arr[i].product + " data-id=" + arr[i].id + " class='btn btn-sm btn-primary edit-button'>Edit</button>&nbsp&nbsp&nbsp<button class='btn btn-sm btn-danger delete' data-id=" + arr[i].id + ">Delete</button></td>";
                }else{
                    products_table += "<td><button data-id=" + arr[i].id + " data-val='0' class='btn btn-sm btn-outline-dark product-button'>ON</button>&nbsp&nbsp&nbsp<button class='btn btn-sm btn-secondary upload' data-id=" + arr[i].id + ">Upload</button>&nbsp&nbsp&nbsp<button data-price="+arr[i].price+" data-qty="+arr[i].quantity+" data-desc="+arr[i].desc+" data-name="+ arr[i].product + " data-id=" + arr[i].id + " class='btn btn-sm btn-primary edit-button'>Edit</button>&nbsp&nbsp&nbsp<button class='btn btn-sm btn-danger delete' data-id=" + arr[i].id + ">Delete</button></td>";
                }
                
                products_table += "</tr>";
               
            }
            
            products_table += "</tbody>";
            products_table += "</table>";
        }else{
            products_table += "<div class='text-center'><h4>No Products Found</h4></div>";
        }
        $("#card_products").html(products_table);
    });
}

function registerNewProduct(){
    
    if(debug)
        alert("Attemplting to register product!");
    
    //COLLECTING FORM DATA
    let form_data = $("#form_new_product").serialize();
    
    //POST METHOD - USED TO SEND DATA
    //STRUCTURE BELOW
    //LINK , DATA TO BE SENT, FUNCTION TO RECIEVE DATA
    $.post("php/insert_product.php", form_data, function(json_response){
        let response = JSON.parse(json_response);
        if(response.success == 1){
            //CLOSE MODAL
            $("#modalNewProduct").modal("hide");
            //RELOAD PRODUCTS
            loadProducts();
        }else{
            alert("Products could not be saved");
        }
    });
}