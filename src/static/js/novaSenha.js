let novaSenha = document.getElementById("form-novaSenha");

if (novaSenha) {
    let popupInfo = document.querySelector(".popup-info");

    novaSenha.addEventListener("submit", (event) => {
        event.preventDefault();

        let emailUser = location.href.split("?email=")[1];

        let novaSenha = document.getElementById("novaSenha").value;
        let confirmNovaSenha = document.getElementById("confirmNovaSenha").value;

        if (novaSenha != confirmNovaSenha) {
            popupInfo.parentElement.classList.add("show");
            return (popupInfo.innerHTML = `
                <h3 class="error">Ops!</h3>
                <p>Por favor, digite as senhas iguais nos dois campos</p>
                <div class="button-container center">
                    <button onclick="successFalse()">Ok</button>
                </div>
            `);
        }

        let formData = new FormData();
        formData.append("email", emailUser);
        formData.append("password", novaSenha);

        fetch(`${location.origin}/usuarios/trocarSenha`, {
            method: "POST",
            body: formData,
        })
            .then((response) => {
                return response.json();
            })
            .then((response) => {
                if (response.success == true) {
                    popupInfo.parentElement.classList.add("show");
                    popupInfo.innerHTML = `
                        <h3 class="error">${response.title}</h3>
                        <p>${response.message}</p>
                        <div class="button-container center">
                            <a href="/game/login" class="error">
                                Ok
                            </a>
                        </div>
                    `;

                    setTimeout(() => {
                        location.href = "/game/login";
                    }, 5000);
                } else {
                    popupInfo.parentElement.classList.add("show");
                    popupInfo.innerHTML = `
                        <h3 class="error">${response.title}</h3>
                        <p>${response.message}</p>
                        <div class="button-container center">
                            <button onclick="successFalse()">Ok</button>
                        </div>
                    `;

                    setTimeout(() => {
                        location.reload();
                    }, 5000);
                }
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
    });
}
