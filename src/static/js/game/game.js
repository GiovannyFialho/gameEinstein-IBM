const formGame = document.getElementById("form-game");

let minutes = document.getElementById("minutes");
let seconds = document.getElementById("seconds");

let min = 1;
let se = 0;
let initialCondition = true;
let myVar = "";

/**
 * Timer
 */

let timer = {
    initialValue: 0,
    startTime: Date.now(),
    start: () => {
        setInterval(function () {
            timer.initialValue = Date.now() - timer.startTime;
        }, 1);
    },
    stop: () => {
        return timer.initialValue;
    },
};

if (formGame) {
    /**
     * Cronometro jogo
     */

    function startTimer() {
        if (initialCondition === true) {
            myVar = setInterval(myTimer, 1000);
        }

        initialCondition = false;
    }

    function myTimer() {
        se += 1;
        seconds.innerHTML = `0${se}`;

        if (se > 9) {
            seconds.innerHTML = se;
            if (se === 60) {
                seconds.innerHTML = `00`;
                se = 00;

                addMinute();
            }
        }
    }

    function addMinute() {
        minutes.innerHTML = `0${min}`;
        if (min > 9) {
            minutes.innerHTML = min;

            if (min === 60) {
                minutes.innerHTML = `00`;
                se = 00;
            }
        }
        min = min + 1;
    }

    function stopTimer() {
        clearInterval(myVar);

        initialCondition = true;
    }

    function euDesisto() {
        stopTimer();

        fetch(`${location.origin}/usuarios/registrarParticipacao`, {
            method: "GET",
        })
            .then((response) => {
                return response.json();
            })
            .then((response) => {
                return response;
            })
            .catch((error) => {
                console.log(`error -> ${error}`);
            });

        popupInfo.parentElement.classList.add("show");
        popupInfo.innerHTML = `
            <h3 class="success">Que pena! Você desistiu.</h3>
            <p>Mas obrigado pela participação e <a href="/" class="link-padrao">Volte para o evento.</a></p>
        `;

        setTimeout(() => {
            location.href = "/usuarios/logout";
        }, 5000);
    }

    if (document.querySelector(".container-instrucoes")) {
        function aceitoInstrucoes() {
            if (document.querySelector(".container-instrucoes").classList.contains("show")) {
                document.querySelector(".container-instrucoes").classList.remove("show");

                startTimer();

                timer.start();
            }
        }

        document.onreadystatechange = () => {
            if (document.readyState == "complete") {
                document.querySelector(".container-instrucoes").classList.add("show");
                document.body.classList.add("noScroll");
            }
        };
    }

    let pontos = 0;
    let respostas = [];
    let popupInfo = document.querySelector(".popup-info");
    let gabarito = [
        {
            quem: "Mineira",
            veioAprender: "GRC",
            perfil: "Estagiária",
            trabalhaCom: "Automação",
            empresa: "Empresa C",
        },
        {
            quem: "Paraense",
            veioAprender: "LGPD",
            perfil: "Analista",
            trabalhaCom: "Inteligência Artificial",
            empresa: "Empresa B",
        },
        {
            quem: "Catarinense",
            veioAprender: "Open Source",
            perfil: "Diretora",
            trabalhaCom: "Segurança",
            empresa: "Empresa D",
        },
        {
            quem: "Baiana",
            veioAprender: "Machine Learning",
            perfil: "Gerente",
            trabalhaCom: "Infraestrutura",
            empresa: "Empresa E",
        },
        {
            quem: "Goiana",
            veioAprender: "Solução Híbrida",
            perfil: "Coordenadora",
            trabalhaCom: "Data",
            empresa: "Empresa A",
        },
    ];

    let coluna1 = {};
    document.getElementById("quem1").addEventListener("change", (event) => {
        coluna1.quem = event.target.value;

        if (event.target.value == "Mineira" && document.getElementById("trabalhaCom1").value == "Automação") {
            document.getElementById("isMineiraCargo").checked = true;
        }
    });
    document.getElementById("veioAprender1").addEventListener("change", (event) => {
        coluna1.veioAprender = event.target.value;

        if (event.target.value == "GRC") {
            document.getElementById("isGRC").checked = true;
        }

        if (event.target.value == "GRC" && document.getElementById("quem2").value == "Paraense") {
            document.getElementById("isParaense").checked = true;
        }
    });
    document.getElementById("perfil1").addEventListener("change", (event) => {
        coluna1.perfil = event.target.value;

        if (event.target.value == "Estagiária" && document.getElementById("trabalhaCom2").value == "Inteligência Artificial") {
            document.getElementById("isEstagiaria").checked = true;
        }
    });
    document.getElementById("trabalhaCom1").addEventListener("change", (event) => {
        coluna1.trabalhaCom = event.target.value;

        if (event.target.value == "Automação" && document.getElementById("quem1").value == "Mineira") {
            document.getElementById("isMineiraCargo").checked = true;
        }
    });
    document.getElementById("empresa1").addEventListener("change", (event) => {
        coluna1.empresa = event.target.value;

        if (event.target.value == "Empresa C" && document.getElementById("trabalhaCom2").value == "Inteligência Artificial") {
            document.getElementById("isInteligenciaArtificial").checked = true;
        }
    });

    let coluna2 = {};
    document.getElementById("quem2").addEventListener("change", (event) => {
        coluna2.quem = event.target.value;

        if (event.target.value == "Paraense" && document.getElementById("veioAprender1").value == "GRC") {
            document.getElementById("isParaense").checked = true;
        }
    });
    document.getElementById("veioAprender2").addEventListener("change", (event) => {
        coluna2.veioAprender = event.target.value;

        if (event.target.value == "LGPD" && document.getElementById("perfil2").value == "Analista") {
            document.getElementById("isLGPD").checked = true;
        }
    });
    document.getElementById("perfil2").addEventListener("change", (event) => {
        coluna2.perfil = event.target.value;

        if (event.target.value == "Analista" && document.getElementById("veioAprender2").value == "LGPD") {
            document.getElementById("isLGPD").checked = true;
        }
    });
    document.getElementById("trabalhaCom2").addEventListener("change", (event) => {
        coluna2.trabalhaCom = event.target.value;

        if (event.target.value == "Inteligência Artificial" && document.getElementById("empresa1").value == "Empresa C") {
            document.getElementById("isInteligenciaArtificial").checked = true;
        }

        if (event.target.value == "Inteligência Artificial" && document.getElementById("perfil1").value == "Estagiária") {
            document.getElementById("isEstagiaria").checked = true;
        }
    });
    document.getElementById("empresa2").addEventListener("change", (event) => {
        coluna2.empresa = event.target.value;

        if (event.target.value == "Empresa B") {
            document.getElementById("isEmpresaB").checked = true;
        }
    });

    let coluna3 = {};
    document.getElementById("quem3").addEventListener("change", (event) => {
        coluna3.quem = event.target.value;
    });
    document.getElementById("veioAprender3").addEventListener("change", (event) => {
        coluna3.veioAprender = event.target.value;

        if (event.target.value == "Open Source") {
            document.getElementById("isOpenSource").checked = true;
        }
    });
    document.getElementById("perfil3").addEventListener("change", (event) => {
        coluna3.perfil = event.target.value;

        if (event.target.value == "Diretora") {
            document.getElementById("isDiretora").checked = true;
        }
    });
    document.getElementById("trabalhaCom3").addEventListener("change", (event) => {
        coluna3.trabalhaCom = event.target.value;

        if (event.target.value == "Segurança" && document.getElementById("empresa3").value == "Empresa D") {
            document.getElementById("isSeguranca").checked = true;
        }
    });
    document.getElementById("empresa3").addEventListener("change", (event) => {
        coluna3.empresa = event.target.value;

        if (event.target.value == "Empresa D" && document.getElementById("trabalhaCom3").value == "Segurança") {
            document.getElementById("isSeguranca").checked = true;
        }
    });

    let coluna4 = {};
    document.getElementById("quem4").addEventListener("change", (event) => {
        coluna4.quem = event.target.value;

        if (event.target.value == "Baiana" && document.getElementById("quem5").value == "Goiana") {
            document.getElementById("isBaiana").checked = true;
        }

        if (event.target.value == "Baiana" && document.getElementById("perfil4").value == "Gerente") {
            document.getElementById("isBaianaCargo").checked = true;
        }
    });
    document.getElementById("veioAprender4").addEventListener("change", (event) => {
        coluna4.veioAprender = event.target.value;

        if (event.target.value == "Machine Learning" && document.getElementById("trabalhaCom4").value == "Infraestrutura") {
            document.getElementById("isMachineLearging").checked = true;
        }
    });
    document.getElementById("perfil4").addEventListener("change", (event) => {
        coluna4.perfil = event.target.value;

        if (event.target.value == "Gerente" && document.getElementById("quem4").value == "Baiana") {
            document.getElementById("isBaianaCargo").checked = true;
        }
    });
    document.getElementById("trabalhaCom4").addEventListener("change", (event) => {
        coluna4.trabalhaCom = event.target.value;

        if (event.target.value == "Infraestrutura" && document.getElementById("veioAprender4").value == "Machine Learning") {
            document.getElementById("isMachineLearging").checked = true;
        }
    });
    document.getElementById("empresa4").addEventListener("change", (event) => {
        coluna4.empresa = event.target.value;
    });

    let coluna5 = {};
    document.getElementById("quem5").addEventListener("change", (event) => {
        coluna5.quem = event.target.value;

        if (event.target.value == "Goiana" && document.getElementById("quem4").value == "Baiana") {
            document.getElementById("isBaiana").checked = true;
        }
    });
    document.getElementById("veioAprender5").addEventListener("change", (event) => {
        coluna5.veioAprender = event.target.value;

        if (event.target.value == "Solução Híbrida" && document.getElementById("empresa5").value == "Empresa A") {
            document.getElementById("isSolucaoHibrida").checked = true;
        }
    });
    document.getElementById("perfil5").addEventListener("change", (event) => {
        coluna5.perfil = event.target.value;
    });
    document.getElementById("trabalhaCom5").addEventListener("change", (event) => {
        coluna5.trabalhaCom = event.target.value;

        if (event.target.value == "Data") {
            document.getElementById("isData").checked = true;
        }
    });
    document.getElementById("empresa5").addEventListener("change", (event) => {
        coluna5.empresa = event.target.value;

        if (event.target.value == "Empresa A" && document.getElementById("veioAprender5").value == "Solução Híbrida") {
            document.getElementById("isSolucaoHibrida").checked = true;
        }
    });

    formGame.addEventListener("submit", function (event) {
        event.preventDefault();

        window.scrollTo(0, 0);
        window.document.body.classList.add("noScroll");

        respostas.push(coluna1, coluna2, coluna3, coluna4, coluna5);

        respostas.forEach((resposta, index) => {
            if (resposta.quem == gabarito[index].quem) {
                pontos += 1;
            }

            if (resposta.veioAprender == gabarito[index].veioAprender) {
                pontos += 1;
            }

            if (resposta.perfil == gabarito[index].perfil) {
                pontos += 1;
            }

            if (resposta.trabalhaCom == gabarito[index].trabalhaCom) {
                pontos += 1;
            }

            if (resposta.empresa == gabarito[index].empresa) {
                pontos += 1;
            }

            if (pontos <= 0) {
                pontos = 0;
            }
        });

        const formData = new FormData();
        formData.append("score", pontos);
        formData.append("gametime", timer.stop());

        stopTimer();

        fetch(`${location.origin}/game/salvar`, {
            method: "POST",
            body: formData,
        })
            .then((response) => {
                return response.json();
            })
            .then(async () => {
                const data = await fetch(`${location.origin}/usuarios/registrarParticipacao`);
                await data.json();

                popupInfo.parentElement.classList.add("show");
                popupInfo.innerHTML = `
                    <h3>Parabéns! Você conseguiu.</h3>
                    <a href="/usuarios/logout" class="link-padrao mb">Confira o ranking</a>
                    <a href="/" class="link-padrao mb">Volte para o evento</a>
                `;

                setTimeout(() => {
                    location.href = `/usuarios/logout`;
                }, 5000);
            })
            .catch(() => {
                popupInfo.parentElement.classList.add("show");
                popupInfo.innerHTML = `
                    <h3>Erro de serviço</h3>
                    <p>Estamos com problemas internos, por favor, tente mais tarde.</p>
                    <div class="button-container center">
                        <a href="/">
                            Ok
                        </a>
                    </div>
                `;

                setTimeout(() => {
                    location.href = "/";
                }, 5000);
            });
    });
}
