$(function() {
    $("body").on("submit", "#form-generate-token", function(){
         let form = $(this);
        $.ajax({
            beforeSend: function () {
                $("#status-token").text("Gerando token...")
            },
            url:include_path+"pdv/src/app/ajax/generate_token.php",
            method: 'post',
            dataType: 'json',
            data: form.serialize()
        }).done(function(data) {
            if (data.success) {
                $("#status-token").text("Token gerado com sucesso! Faça sua pesquisa")
                console.log(data.token);
                localStorage.setItem('tokenSearchProducts', data.token);
            }else {
                alert("genereta_token.php NÃO acessado")
            }
        }).fail(function(jqXHR) {
            const response = jqXHR.responseJSON;
            if (response && response.message) {
                alert(`Falha na autenticação: ${response.message}`);
            } else {
                alert("Erro de comunicação com o servidor.");
            }
        });;
        
        return false;
    })
    
})