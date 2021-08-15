const formGame = document.getElementById("form-game");

if (formGame) {
    /**
     * Cronometro jogo

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
    */

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
    });
    document.getElementById("veioAprender1").addEventListener("change", (event) => {
        coluna1.veioAprender = event.target.value;
    });
    document.getElementById("perfil1").addEventListener("change", (event) => {
        coluna1.perfil = event.target.value;
    });
    document.getElementById("trabalhaCom1").addEventListener("change", (event) => {
        coluna1.trabalhaCom = event.target.value;
    });
    document.getElementById("empresa1").addEventListener("change", (event) => {
        coluna1.empresa = event.target.value;
    });

    let coluna2 = {};
    document.getElementById("quem2").addEventListener("change", (event) => {
        coluna2.quem = event.target.value;
    });
    document.getElementById("veioAprender2").addEventListener("change", (event) => {
        coluna2.veioAprender = event.target.value;
    });
    document.getElementById("perfil2").addEventListener("change", (event) => {
        coluna2.perfil = event.target.value;
    });
    document.getElementById("trabalhaCom2").addEventListener("change", (event) => {
        coluna2.trabalhaCom = event.target.value;
    });
    document.getElementById("empresa2").addEventListener("change", (event) => {
        coluna2.empresa = event.target.value;
    });

    let coluna3 = {};
    document.getElementById("quem3").addEventListener("change", (event) => {
        coluna3.quem = event.target.value;
    });
    document.getElementById("veioAprender3").addEventListener("change", (event) => {
        coluna3.veioAprender = event.target.value;
    });
    document.getElementById("perfil3").addEventListener("change", (event) => {
        coluna3.perfil = event.target.value;
    });
    document.getElementById("trabalhaCom3").addEventListener("change", (event) => {
        coluna3.trabalhaCom = event.target.value;
    });
    document.getElementById("empresa3").addEventListener("change", (event) => {
        coluna3.empresa = event.target.value;
    });

    let coluna4 = {};
    document.getElementById("quem4").addEventListener("change", (event) => {
        coluna4.quem = event.target.value;
    });
    document.getElementById("veioAprender4").addEventListener("change", (event) => {
        coluna4.veioAprender = event.target.value;
    });
    document.getElementById("perfil4").addEventListener("change", (event) => {
        coluna4.perfil = event.target.value;
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
    });
    document.getElementById("veioAprender5").addEventListener("change", (event) => {
        coluna5.veioAprender = event.target.value;
    });
    document.getElementById("perfil5").addEventListener("change", (event) => {
        coluna5.perfil = event.target.value;
    });
    document.getElementById("trabalhaCom5").addEventListener("change", (event) => {
        coluna5.trabalhaCom = event.target.value;
    });
    document.getElementById("empresa5").addEventListener("change", (event) => {
        coluna5.empresa = event.target.value;
    });

    formGame.addEventListener("submit", function (event) {
        event.preventDefault();

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
            .then((response) => {
                popupInfo.parentElement.classList.add("show");
                popupInfo.innerHTML = `
                    <h3 class="success">${response.title}</h3>
                    <p>${response.message}</p>
                    <div class="button-container center">
                        <a href="/game/ranking" class="success">
                            Ok
                        </a>
                    </div>
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
