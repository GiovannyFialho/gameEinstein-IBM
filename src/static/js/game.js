const formGame = document.getElementById("form-game");

if (formGame) {
    let response = [];

    let casa1 = {};
    document.getElementById("cores1").addEventListener("change", (event) => {
        casa1.cor = event.target.value;
    });
    document
        .getElementById("nacionalidades1")
        .addEventListener("change", (event) => {
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
    document
        .getElementById("nacionalidades2")
        .addEventListener("change", (event) => {
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
    document
        .getElementById("nacionalidades3")
        .addEventListener("change", (event) => {
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
    document
        .getElementById("nacionalidades4")
        .addEventListener("change", (event) => {
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
    document
        .getElementById("nacionalidades5")
        .addEventListener("change", (event) => {
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

    formGame.addEventListener("submit", (event) => {
        event.preventDefault();

        response.push(casa1, casa2, casa3, casa4, casa5);

        console.log(response);
    });
}
