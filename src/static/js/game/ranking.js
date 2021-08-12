let tabelaPontuacao = document.querySelector(".container-tabela-pontuacao");

if (tabelaPontuacao) {
    const createTr = async () => {
        const response = await fetch(`http://localhost/game/getRanking`);
        const items = await response.json();

        items.data.forEach((linha) => {
            document.getElementById("tbody").innerHTML += `
                <tr>
                    <td>${linha.idUser}</td>
                    <td>${linha.score}</td>
                    <td>${linha.gametime}</td>
                </tr>
            `;
        });
    };

    createTr();
}
