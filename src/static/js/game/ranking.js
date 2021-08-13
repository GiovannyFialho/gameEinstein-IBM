let tabelaPontuacao = document.querySelector(".container-tabela-pontuacao");

if (tabelaPontuacao) {
    const createTr = async () => {
        const response = await fetch(`${location.origin}/game/getRanking`);
        const items = await response.json();

        items.data.forEach((linha) => {
            var min = Math.floor(linha.gametime/60);
            var sec = linha.gametime%60;
            min = min.toString().padStart(2, 0);
            sec = sec.toString().padStart(2, 0);
            document.getElementById("tbody").innerHTML += `
                <tr>
                    <td>${linha.idUser}</td>
                    <td>${linha.score}</td>
                    <td>${min}:${sec}</td>
                </tr>
            `;
        });
    };

    createTr();
}
