let formLogin = document.getElementById("form-login");

if (formLogin) {
    formLogin.addEventListener("submit", (event) => {
        event.preventDefault();

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
                console.log(response);
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
