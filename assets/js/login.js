$(document).ready(function(){
    
	$("#login").validate({
        errorClass: 'is-invalid',
        rules:{
            email:{
                required: true,
                email: true
            },
            senha:{
                required: true,
                minlength: 8
            }
        },
        submitHandler: function() {
            $("input[type='submit']").attr('disabled', true);
            let serializedData = $("#login").serialize()
            showLoader();
            $.ajax({
                type: 'POST',
                url: root_path + "/admin/logar",
                data: serializedData,
                dataType: 'json',
                success: function(response){
                    if (response && response.success) {
                        window.location.href = root_path + "/admin/home";
                    } else {
                        destroyLoader();
                        $("input[type='submit']").attr('disabled', false);
                        Swal.fire({
                            type  : 'error',
                            title: response.title,
                            text: response.text
                        })
                    }
                },
                error: function(response){
                    destroyLoader();
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