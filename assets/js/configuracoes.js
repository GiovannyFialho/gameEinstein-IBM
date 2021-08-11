$(document).ready(function(){
    
    $("#configuracoes-senha").validate({
        errorClass: 'is-invalid',
        rules:{
            senha:{
                required: true,
                minlength: 8
            },
            senha2:{
                required: true,
                equalTo: 'input[name="senha"]' 
            }
        },
        submitHandler: function() {
            $(".submit-senha").attr('disabled', true);
            showLoader();
            $.ajax({
                type: 'POST',
                url: root_path + "/configuracoes/atualizar-senha",
                data: $("#configuracoes-senha").serialize(),
                dataType: 'json',
                success: function(response){
                    destroyLoader();

                    if (response && response.success) {
                        Swal.fire({
                          type  : 'success',
                          title: response.title,
                          text: response.text
                        }).then(() => {
                            window.location.href = root_path + "/configuracoes";
                        });
                    } else {
                        $("input[type='submit']").attr('disabled', false);
                        Swal.fire({
                            type  : 'error',
                            title: default_error_title,
                            text: default_error_text
                        })
                    }
                },
                error: function(response){
                    destroyLoader();
                    $("input[type='submit']").attr('disabled', false);
                    Swal.fire({
                        type  : 'error',
                        title: default_error_title,
                        text: default_error_text
                    })
                }
            });
            return false;
        }
    });
    
});