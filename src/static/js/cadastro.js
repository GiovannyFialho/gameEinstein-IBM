let formCadastro = document.getElementById("form-cadastro");

if (formCadastro) {
    formCadastro.addEventListener("submit", (event) => {
        event.preventDefault();

        window.scrollTo(0, 0);
        window.document.body.classList.add("noScroll");

        let popupInfo = document.querySelector(".popup-info");

        let formData = new FormData();
        formData.append("name", document.getElementById("name").value);
        formData.append("email", document.getElementById("email").value);
        formData.append("password", document.getElementById("password").value);

        fetch(`${location.origin}/usuarios/cadastrar`, {
            method: "POST",
            body: formData,
        })
            .then((response) => {
                return response.json();
            })
            .then((response) => {
                let buttonOk;

                if (response.success == true) {
                    buttonOk = `
                        <a href="/game/login">
                            Ok
                        </a>
                    `;
                } else {
                    buttonOk = `
                        <button onclick="successFalse()">Ok</button>
                    `;
                }

                popupInfo.parentElement.classList.add("show");
                popupInfo.innerHTML = `
                    <h3>${response.title}</h3>
                    <p>${response.message}</p>
                    <div class="button-container center">
                        ${buttonOk}
                    </div>
                `;

                setTimeout(() => {
                    if (response.success == true) {
                        location.href = `/game/login`;
                    } else {
                        successFalse();
                    }
                }, 5000);
            })
            .catch(() => {
                popupInfo.parentElement.classList.add("show");
                popupInfo.innerHTML = `
                    <h3 class="error">Erro de serviço</h3>
                    <p>Estamos com problemas internos, por favor, tente mais tarde.</p>
                    <div class="button-container center">
                        <a href="/">
                            Ok
                        </a>
                    </div>
                `;

                setTimeout(() => {
                    location.href = `/`;
                }, 5000);
            });
    });
}
