let formCadastro = document.getElementById("form-cadastro");

if (formCadastro) {
    formCadastro.addEventListener("submit", (event) => {
        event.preventDefault();

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
                popupInfo.parentElement.classList.add("show");
                popupInfo.innerHTML = `
                    <h3 class="${response.success == true ? `success` : `error`}">${response.title}</h3>
                    <p>${response.message}</p>
                    <div class="button-container center">
                        <a href="${response.success == true ? `/game/login` : `/`}" class="${response.success == true ? `success` : `error`}">
                            Ok
                        </a>
                    </div>
                `;

                setTimeout(() => {
                    if (response.success == true) {
                        location.href = "/game/login";
                    } else {
                        location.reload();
                    }
                }, 5000);
            })
            .catch(() => {
                popupInfo.parentElement.classList.add("show");
                popupInfo.innerHTML = `
                    <h3 class="error">Erros de serviço</h3>
                    <p>Estamos com problemas internos, por favor, tente mais tarde.</p>
                    <div class="button-container center">
                        <a href="/" class="error">
                            Ok
                        </a>
                    </div>
                `;

                setTimeout(() => {
                    location.reload();
                }, 5000);
            });
    });
}