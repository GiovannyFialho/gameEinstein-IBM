let cadastroAprovado = document.querySelector(".container-cadastro-aprovado");

const fecharCadastroAprovado = () => {
    if (cadastroAprovado.classList.contains("show")) {
        cadastroAprovado.classList.remove("show");
    }
};
