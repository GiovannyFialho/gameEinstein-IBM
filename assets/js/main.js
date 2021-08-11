//masks
$("input[name='telefone']").mask("(00) 0000-0000");
$("input[name='celular']").mask("(00) 00009-0000");
$("input[name='documento'],input[name='cpf'], input[name='credito-cpf']").mask("000.000.000-00");
$("input[name='cnpj']").mask("00.000.000/0000-00");
$("input[name='cep']").mask("00000-000");
$("input[name='credito-numero']").mask("0000 0000 0000 0000");
$("input[name='credito-validade']").mask("00/00");
$("input[name='credito-ccv']").mask("0009");
$("input[name='nascimento']").mask("00/00/0000");

const root_path = 'http://' + document.location.hostname;
const env = (document.location.hostname.indexOf('hestilolivrecriacoes') !== -1) ? 'HOMOLOG' : 'PROD';
const default_error_title = "Ops...";
const default_error_text = "Algo deu errado. Por favor, tente novamente.";

function showLoader() {
    var html = '<div id="loading-overlay"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>';
    $('body').prepend(html);
}

function destroyLoader() {
    $("#loading-overlay").remove()
}