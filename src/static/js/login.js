let formLogin = document.getElementById("form-login");

if (formLogin) {
    formLogin.addEventListener("submit", (event) => {
        event.preventDefault();

        window.scrollTo(0, 0);
        window.document.body.classList.add("noScroll");

        let popupInfo = document.querySelector(".popup-info");

        let formData = new FormData();
        formData.append("email", document.getElementById("email").value);
        formData.append("password", document.getElementById("password").value);

        fetch(`${location.origin}/usuarios/logar`, {
            method: "POST",
            body: formData,
        })
            .then((response) => {
                return response.json();
            })
            .then((response) => {
                if (response.success == true) {
                    location.href = `/game`;
                } else {
                    let buttonOk;

                    if (response.message == "Seu usuário já participou do desafio. Você só pode participar do desafio 1 vez!") {
                        buttonOk = `
                            <a href="/">
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
                        <h3 class="error">${response.title}</h3>
                        <p>${response.message}</p>
                        <div class="button-container center">
                            ${buttonOk}
                        </div>
                    `;

                    setTimeout(() => {
                        if (response.message == "Seu usuário já participou do desafio. Você só pode participar do desafio 1 vez!") {
                            location.href = "/";
                        } else {
                            successFalse();
                        }
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
                    location.reload();
                }, 5000);
            });
    });
}
