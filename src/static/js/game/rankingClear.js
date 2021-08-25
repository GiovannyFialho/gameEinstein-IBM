let rankingClear = document.querySelector(".rankingClear-container");

if (rankingClear) {
    const createTable = async () => {
        const response = await fetch(`${location.origin}/game/getRanking/true`, {
            cache: "no-cache",
        });
        const items = await response.json();

        if (items && items.data) {
            items.data.forEach((item, index) => {
                document.getElementById(`ranking`).innerHTML += `
                    <div class="ranking-container-item">
                        <p>${index + 1}</p>
                        <p>${item.name}</p>
                        <p>${item.email}</p>
                        <p>${item.score}</p>
                        <p>${formatTime(item.gametime)}</p>
                    </div>
                `;
            });
        } else {
            rankingClear.classList.add("no-points");

            document.getElementById(`ranking`).innerHTML += `
                <div class="ranking-msg">
                    <p>Pontuação indisponível no momento :(</p>
                </div>
            `;
        }
    };

    createTable();
}
