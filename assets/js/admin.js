$(document).ready(function(){
    
    $("#logout").click(function(e){
        e.preventDefault();
        
        $.ajax({
            type: 'POST',
            url: root_path + "/admin/logout",
            dataType: 'json',
            success: function(response){
                if (response.success) {
                    window.location.href = root_path + '/admin';
                }
            }
        });
    })

});