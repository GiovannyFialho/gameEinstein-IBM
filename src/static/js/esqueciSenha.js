let esqueciMinhaSenha = document.getElementById("form-esqueciMinhaSenha");

if (esqueciMinhaSenha) {
    let popupInfo = document.querySelector(".popup-info");

    esqueciMinhaSenha.addEventListener("submit", (event) => {
        event.preventDefault();

        let formData = new FormData();
        formData.append("email", document.getElementById("email").value);

        fetch(`${location.origin}/usuarios/emailEsqueciMinhaSenha`, {
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
                            <a href="/">Ok</a>
                        </div>
                    `;

                    setTimeout(() => {
                        location.href = "/";
                    }, 5000);
                } else {
                    popupInfo.parentElement.classList.add("show");
                    popupInfo.innerHTML = `
                        <h3 class="error">${response.title}</h3>
                        <p>${response.message}</p>
                        <div class="button-container center">
                            <a href="/">Ok</a>
                        </div>
                    `;

                    setTimeout(() => {
                        location.href = "/";
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
