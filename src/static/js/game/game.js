const formGame = document.getElementById("form-game");

if (formGame) {
    /**
     * Cronometro jogo
     */

    let minutes = document.getElementById("minutes");
    let seconds = document.getElementById("seconds");

    let min = 1;
    let se = 0;
    let initialCondition = true;
    let myVar;
    let segundos = 0;

    let startTimer = function () {
        if (initialCondition === true) {
            myVar = setInterval(myTimer, 1000);
        }

        initialCondition = false;
    };

    startTimer();

    function myTimer() {
        se = se + 1;
        segundos++;
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

        popupInfo.parentElement.classList.add("show");
        popupInfo.innerHTML = `
            <h3 class="success">Que pena! Você desistiu.</h3>
            <p>Mas obrigado pela participação e <a href="/" class="link-padrao">Volte para o evento.</a></p>
        `;

        setTimeout(() => {
            location.href = "/";
        }, 5000);
    }

    let pontos = 0;
    let respostas = [];
    let popupInfo = document.querySelector(".popup-info");
    let gabarito = [
        {
            quem: "Mineira",
            veioAprender: "GRC",
            perfil: "Diretora",
            trabalhaCom: "Automação",
            empresa: "Empresa C",
        },
        {
            quem: "Paraense",
            veioAprender: "LGPD",
            perfil: "Analísta",
            trabalhaCom: "Inteligência artificial",
            empresa: "Empresa B",
        },
        {
            quem: "Catarinense",
            veioAprender: "Open Source",
            perfil: "Estagiária",
            trabalhaCom: "Segurança",
            empresa: "Empresa D",
        },
        {
            quem: "Baiano",
            veioAprender: "Machine Learing",
            perfil: "Gerente",
            trabalhaCom: "Infraestrutura",
            empresa: "Empresa E",
        },
        {
            quem: "Goiana",
            veioAprender: "Solução Híbrida",
            perfil: "Coordenador",
            trabalhaCom: "Data",
            empresa: "Empresa A",
        },
    ];

    let coluna1 = {};
    document.getElementById("quem1").addEventListener("change", (event) => {
        coluna1.quem = event.target.value;

        if (event.target.value == "Mineira") {
            document.getElementById("isParaense").checked = true;
        }
    });
    document.getElementById("veioAprender1").addEventListener("change", (event) => {
        coluna1.veioAprender = event.target.value;

        if (event.target.value == "GRC") {
            document.getElementById("isGRC").checked = true;
        }
    });
    document.getElementById("perfil1").addEventListener("change", (event) => {
        coluna1.perfil = event.target.value;

        if (event.target.value == "Estagiária") {
            document.getElementById("isEstagiaria").checked = true;
        }
    });
    document.getElementById("trabalhaCom1").addEventListener("change", (event) => {
        coluna1.trabalhaCom = event.target.value;

        if (event.target.value == "Automação") {
            document.getElementById("isMineiraCargo").checked = true;
        }
    });
    document.getElementById("empresa1").addEventListener("change", (event) => {
        coluna1.empresa = event.target.value;
    });

    let coluna2 = {};
    document.getElementById("quem2").addEventListener("change", (event) => {
        coluna2.quem = event.target.value;

        if (event.target.value == "Paraense") {
            document.getElementById("isLGPD").checked = true;
        }
    });
    document.getElementById("veioAprender2").addEventListener("change", (event) => {
        coluna2.veioAprender = event.target.value;
    });
    document.getElementById("perfil2").addEventListener("change", (event) => {
        coluna2.perfil = event.target.value;
    });
    document.getElementById("trabalhaCom2").addEventListener("change", (event) => {
        coluna2.trabalhaCom = event.target.value;

        if (event.target.value == "Inteligência Artificial") {
            document.getElementById("isInteligenciaArtificial").checked = true;
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

        if (event.target.value == "Catarinense") {
            document.getElementById("isOpenSource").checked = true;
        }
    });
    document.getElementById("veioAprender3").addEventListener("change", (event) => {
        coluna3.veioAprender = event.target.value;
    });
    document.getElementById("perfil3").addEventListener("change", (event) => {
        coluna3.perfil = event.target.value;

        if (event.target.value == "Diretora") {
            document.getElementById("isDiretora").checked = true;
        }
    });
    document.getElementById("trabalhaCom3").addEventListener("change", (event) => {
        coluna3.trabalhaCom = event.target.value;

        if (event.target.value == "Segurança") {
            document.getElementById("isSeguranca").checked = true;
        }
    });
    document.getElementById("empresa3").addEventListener("change", (event) => {
        coluna3.empresa = event.target.value;
    });

    let coluna4 = {};
    document.getElementById("quem4").addEventListener("change", (event) => {
        coluna4.quem = event.target.value;

        if (event.target.value == "Baiana") {
            document.getElementById("isBaiana").checked = true;
        }
    });
    document.getElementById("veioAprender4").addEventListener("change", (event) => {
        coluna4.veioAprender = event.target.value;

        if (event.target.value == "Machine Learning") {
            document.getElementById("isMachineLearging").checked = true;
        }
    });
    document.getElementById("perfil4").addEventListener("change", (event) => {
        coluna4.perfil = event.target.value;

        if (event.target.value == "Gerente") {
            document.getElementById("isBaianaCargo").checked = true;
        }
    });
    document.getElementById("trabalhaCom4").addEventListener("change", (event) => {
        coluna4.trabalhaCom = event.target.value;
    });
    document.getElementById("empresa4").addEventListener("change", (event) => {
        coluna4.empresa = event.target.value;
    });

    let coluna5 = {};
    document.getElementById("quem5").addEventListener("change", (event) => {
        coluna5.quem = event.target.value;

        if (event.target.value == "Goiana") {
            document.getElementById("isSolucaoHibrida").checked = true;
        }
    });
    document.getElementById("veioAprender5").addEventListener("change", (event) => {
        coluna5.veioAprender = event.target.value;
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
    });

    formGame.addEventListener("submit", function (event) {
        event.preventDefault();

        window.scrollTo(0, 0);
        window.document.body.classList.add("noScroll");

        respostas.push(coluna1, coluna2, coluna3, coluna4, coluna5);

        respostas.forEach((resposta, index) => {
            if (resposta.quem == gabarito[index].quem) {
                pontos += 1;
            } else {
                pontos += -1;
            }

            if (resposta.veioAprender == gabarito[index].veioAprender) {
                pontos += 1;
            } else {
                pontos += -1;
            }

            if (resposta.perfil == gabarito[index].perfil) {
                pontos += 1;
            } else {
                pontos += -1;
            }

            if (resposta.trabalhaCom == gabarito[index].trabalhaCom) {
                pontos += 1;
            } else {
                pontos += -1;
            }

            if (resposta.empresa == gabarito[index].empresa) {
                pontos += 1;
            } else {
                pontos += -1;
            }

            if (pontos < 0) {
                pontos = 0;
            }
        });

        stopTimer();

        const formData = new FormData();
        formData.append("score", pontos);
        formData.append("gametime", segundos);

        fetch(`${location.origin}/game/salvar`, {
            method: "POST",
            body: formData,
        })
            .then((response) => {
                return response.json();
            })
            .then(() => {
                popupInfo.parentElement.classList.add("show");
                popupInfo.innerHTML = `
                    <h3 class="success">Parabéns! Você conseguiu.</h3>
                    <a href="/game/ranking" class="link-padrao mb">Confira o ranking</a>
                    <a href="/" class="link-padrao mb">Volte para o evento</a>
                `;

                setTimeout(() => {
                    location.href = `/game/ranking`;
                }, 5000);
            })
            .catch(() => {
                popupInfo.parentElement.classList.add("show");
                popupInfo.innerHTML = `
                    <h3 class="error">Erro de serviço</h3>
                    <p>Estamos com problemas internos, por favor, tente mais tarde.</p>
                    <div class="button-container center">
                        <a href="/" class="error">
                            Ok
                        </a>
                    </div>
                `;

                setTimeout(() => {
                    location.href = "/";
                }, 5000);
            });

        respostas = [];
        coluna1 = {};
        coluna2 = {};
        coluna3 = {};
        coluna4 = {};
        coluna5 = {};
    });
}
