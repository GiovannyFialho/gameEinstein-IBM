$(document).ready(function(){
    
    $("#cadastrar-usuario").validate({
        errorClass: 'is-invalid',
        rules:{
            nome: {
                required: true,
                minlength: 6,
                fullname: true
            },
            documento:{
                required: true,
                minlength: 14,
                cpf: true
            },
            email:{
                required: true,
                email: true
            },
            grupo:{
                required: true
            }
        },
        submitHandler: function() {

            $("button").attr('disabled', true);
            $.ajax({
                type: 'POST',
                url: root_path + "/usuarios/salvar",
                data: $("#cadastrar-usuario").serialize(),
                dataType: 'json',
                success: function(response){
                    if (response && response.success) {
                        window.location.href = root_path + "/admin/usuarios/gerenciar";
                    } else {
                        $("button").attr('disabled', false);
                        Swal.fire({
                            type  : 'error',
                            title: default_error_title,
                            text: default_error_text
                        })
                    }
                },
                error: function(response){
                    destroyLoader();
                    $("button").attr('disabled', false);
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

    $("#editar-usuario").validate({
        errorClass: 'is-invalid',
        rules:{
            nome: {
                required: true,
                minlength: 6,
                fullname: true
            },
            documento:{
                required: true,
                minlength: 14,
                cpf: true
            },
            email:{
                required: true,
                email: true
            },
            grupo:{
                required: true
            }
        },
        submitHandler: function() {

            $("button").attr('disabled', true);
            $.ajax({
                type: 'POST',
                url: root_path + "/usuarios/atualizar",
                data: $("#editar-usuario").serialize(),
                dataType: 'json',
                success: function(response){
                    if (response && response.success) {
                        window.location.href = root_path + "/admin/usuarios/gerenciar";
                    } else {
                        $("button").attr('disabled', false);
                        Swal.fire({
                            type  : 'error',
                            title: default_error_title,
                            text: default_error_text
                        })
                    }
                },
                error: function(response){
                    destroyLoader();
                    $("button").attr('disabled', false);
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