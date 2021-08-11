$(document).ready(function(){
    
    $("#cadastrar-pergunta").validate({
        errorClass: 'is-invalid',
        rules:{
            enunciado: {
                required: true,
                minlength: 6,
            },
            resposta1:{
                required: true,
            },
            resposta2:{
                required: true,
            },
            resposta3:{
                required: true
            },
            resposta4:{
                required: true
            },
            resposta5:{
                required: true
            },
            respostaCorreta:{
                required: true
            }
        },
        submitHandler: function() {

            $("button").attr('disabled', true);
            $.ajax({
                type: 'POST',
                url: root_path + "/perguntas/salvar",
                data: $("#cadastrar-pergunta").serialize(),
                dataType: 'json',
                success: function(response){
                    if (response && response.success) {
                        window.location.href = root_path + "/admin/perguntas/gerenciar";
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

    $("#editar-pergunta").validate({
        errorClass: 'is-invalid',
        rules:{
            enunciado: {
                required: true,
                minlength: 6,
            },
            resposta1:{
                required: true,
            },
            resposta2:{
                required: true,
            },
            resposta3:{
                required: true
            },
            resposta4:{
                required: true
            },
            resposta5:{
                required: true
            },
            respostaCorreta:{
                required: true
            }
        },
        submitHandler: function() {

            $("button").attr('disabled', true);
            $.ajax({
                type: 'POST',
                url: root_path + "/perguntas/atualizar",
                data: $("#editar-pergunta").serialize(),
                dataType: 'json',
                success: function(response){
                    if (response && response.success) {
                        window.location.href = root_path + "/admin/perguntas/gerenciar";
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