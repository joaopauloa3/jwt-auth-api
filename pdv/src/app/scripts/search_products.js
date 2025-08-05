$(function () {
    $("body").on("submit", '#form-search-product', function () {
        const token = localStorage.getItem("tokenSearchProducts");
        const eanProduct = $(".ean_product").val()        

        if(!token) {
            alert("Você não está autenticado!")
            return
        }

        
        $.ajax({
            url: include_path+`api/index.php?ean=${eanProduct}`,
            method: 'GET',
            dataType: 'json',
            beforeSend: function (xhr) {
                xhr.setRequestHeader("Authorization", `Bearer ${token}`)
            }
        }).done(function(data) {
            if (data.success) {
                const product = data.product.name
                alert(product) 
            }else {
                alert(data.success)
            }
        });
        return false;
    })

})