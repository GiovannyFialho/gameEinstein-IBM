let url = window.location.toString();
let root_path;
if (url.indexOf('homolog') > 0) {
    root_path = 'http://' + document.location.hostname;
} else {
    root_path = 'https://' + document.location.hostname;
}

function blockUI(){
    $(".bx--loading-overlay").css("display","flex");
}

function unblockUI(){
    $(".bx--loading-overlay").css("display","none");
}

$(".btn-logout").click(function(){
    $.ajax({
        type: 'POST',
        url: root_path + "/cadastro/logout",
        dataType: 'json',
        success: function(response){
            if (response && response.success) {
                window.location.href = root_path;
            }
        }
    });
});


$(document).ready(function(){
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('invalido')) {
        console.log('triggered')
        $(".trigger-modal-invalido").trigger("click");
    }
})