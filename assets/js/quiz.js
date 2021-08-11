$(document).ready(function(){
    
    $("#dataHoraInicioInscricao").mask("00/00/0000 00:00:00");
    $("#dataHoraInicioQuiz").mask("00/00/0000 00:00:00");

    $("#editar-quiz").validate({
        errorClass: 'is-invalid',
        rules:{
            dataHoraInicioInscricao: {
                required: true,
            },
            dataHoraInicioQuiz:{
                required: true,
            }
        },
        submitHandler: function() {

            $("button").attr('disabled', true);
            $.ajax({
                type: 'POST',
                url: root_path + "/quiz/atualizar",
                data: $("#editar-quiz").serialize(),
                dataType: 'json',
                success: function(response){
                    if (response && response.success) {
                        window.location.href = root_path + "/admin/quiz/gerenciar";
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