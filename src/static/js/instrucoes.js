let instrucoes = document.querySelector(".container-instrucoes");

if (instrucoes) {
    document.onreadystatechange = () => {
        if (document.readyState == "complete") {
            instrucoes.classList.add("show");
        }
    };
}

function aceitoInstrucoes() {
    instrucoes.classList.remove("show");

    startTimer();
    timer.start();
}
