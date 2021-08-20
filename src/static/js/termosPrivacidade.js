let termosPrivacidade = document.querySelector(".container-privacidade");

if (termosPrivacidade) {
    document.onreadystatechange = () => {
        if (document.readyState == "complete") {
            termosPrivacidade.classList.add("show");
        }
    };
}

function aceitoTermos() {
    termosPrivacidade.classList.remove("show");
}
