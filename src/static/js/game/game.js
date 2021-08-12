const formGame = document.getElementById("form-game");

if (formGame) {
    let pontos = 0;
    let respostas = [];
    let popupInfo = document.querySelector(".popup-info");
    let gabarito = [
        {
            cor: "Azul",
            nacionalidade: "Norueguês",
            bebida: "Água",
            cigarro: "Dunhill",
            animal: "Peixes",
        },
        {
            cor: "Amarelo",
            nacionalidade: "Sueco",
            bebida: "Café",
            cigarro: "Bluemaster",
            animal: "Cavalos",
        },
        {
            cor: "Branco",
            nacionalidade: "Dinamarquês",
            bebida: "Leite",
            cigarro: "Blends",
            animal: "Gatos",
        },
        {
            cor: "Vermelho",
            nacionalidade: "Alemão",
            bebida: "Cerveja",
            cigarro: "Prince",
            animal: "Pássaros",
        },
        {
            cor: "Verde",
            nacionalidade: "Inglês",
            bebida: "Chá",
            cigarro: "Pall Mall",
            animal: "Cachorros",
        },
    ];

    let casa1 = {};
    document.getElementById("cores1").addEventListener("change", (event) => {
        casa1.cor = event.target.value;
    });
    document.getElementById("nacionalidades1").addEventListener("change", (event) => {
        casa1.nacionalidade = event.target.value;
    });
    document.getElementById("bebidas1").addEventListener("change", (event) => {
        casa1.bebida = event.target.value;
    });
    document.getElementById("cigarros1").addEventListener("change", (event) => {
        casa1.cigarro = event.target.value;
    });
    document.getElementById("animais1").addEventListener("change", (event) => {
        casa1.animal = event.target.value;
    });

    let casa2 = {};
    document.getElementById("cores2").addEventListener("change", (event) => {
        casa2.cor = event.target.value;
    });
    document.getElementById("nacionalidades2").addEventListener("change", (event) => {
        casa2.nacionalidade = event.target.value;
    });
    document.getElementById("bebidas2").addEventListener("change", (event) => {
        casa2.bebida = event.target.value;
    });
    document.getElementById("cigarros2").addEventListener("change", (event) => {
        casa2.cigarro = event.target.value;
    });
    document.getElementById("animais2").addEventListener("change", (event) => {
        casa2.animal = event.target.value;
    });

    let casa3 = {};
    document.getElementById("cores3").addEventListener("change", (event) => {
        casa3.cor = event.target.value;
    });
    document.getElementById("nacionalidades3").addEventListener("change", (event) => {
        casa3.nacionalidade = event.target.value;
    });
    document.getElementById("bebidas3").addEventListener("change", (event) => {
        casa3.bebida = event.target.value;
    });
    document.getElementById("cigarros3").addEventListener("change", (event) => {
        casa3.cigarro = event.target.value;
    });
    document.getElementById("animais3").addEventListener("change", (event) => {
        casa3.animal = event.target.value;
    });

    let casa4 = {};
    document.getElementById("cores4").addEventListener("change", (event) => {
        casa4.cor = event.target.value;
    });
    document.getElementById("nacionalidades4").addEventListener("change", (event) => {
        casa4.nacionalidade = event.target.value;
    });
    document.getElementById("bebidas4").addEventListener("change", (event) => {
        casa4.bebida = event.target.value;
    });
    document.getElementById("cigarros4").addEventListener("change", (event) => {
        casa4.cigarro = event.target.value;
    });
    document.getElementById("animais4").addEventListener("change", (event) => {
        casa4.animal = event.target.value;
    });

    let casa5 = {};
    document.getElementById("cores5").addEventListener("change", (event) => {
        casa5.cor = event.target.value;
    });
    document.getElementById("nacionalidades5").addEventListener("change", (event) => {
        casa5.nacionalidade = event.target.value;
    });
    document.getElementById("bebidas5").addEventListener("change", (event) => {
        casa5.bebida = event.target.value;
    });
    document.getElementById("cigarros5").addEventListener("change", (event) => {
        casa5.cigarro = event.target.value;
    });
    document.getElementById("animais5").addEventListener("change", (event) => {
        casa5.animal = event.target.value;
    });

    formGame.addEventListener("submit", function (event) {
        event.preventDefault();

        respostas.push(casa1, casa2, casa3, casa4, casa5);

        respostas.forEach((resposta, index) => {
            if (resposta.cor == gabarito[index].cor) {
                pontos += 1;
            } else {
                pontos += -1;
            }

            if (resposta.nacionalidade == gabarito[index].nacionalidade) {
                pontos += 1;
            } else {
                pontos += -1;
            }

            if (resposta.bebida == gabarito[index].bebida) {
                pontos += 1;
            } else {
                pontos += -1;
            }

            if (resposta.cigarro == gabarito[index].cigarro) {
                pontos += 1;
            } else {
                pontos += -1;
            }

            if (resposta.animal == gabarito[index].animal) {
                pontos += 1;
            } else {
                pontos += -1;
            }

            if (pontos < 0) {
                pontos = 0;
            }
        });

        const formData = new FormData();
        formData.append("idUser", 1);
        formData.append("score", pontos);
        formData.append("gametime", new Date().getTime());

        fetch(`http://localhost/game/salvar`, {
            method: "POST",
            body: formData,
        })
            .then((response) => {
                return response.json();
            })
            .then((response) => {
                popupInfo.parentElement.classList.add("show");
                popupInfo.innerHTML = `
                    <h3>${response.title}</h3>
                    <p>${response.text}</p>
                `;

                setTimeout(() => {
                    location.href = "/game/ranking";
                }, 3000);
            })
            .catch((error) => {
                popupInfo.parentElement.classList.add("show");
                popupInfo.innerHTML = `
                    <h3>Erros de serviço</h3>
                    <p>Estamos com problemas internos, por favor, tente mais tarde.</p>
                `;

                setTimeout(() => {
                    location.href = "/";
                }, 3000);
            });

        respostas = [];
        casa1 = {};
        casa2 = {};
        casa3 = {};
        casa4 = {};
        casa5 = {};
    });

    const createTr = () => {
        console.log("teste");
    };
}
