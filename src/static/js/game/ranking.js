let ranking = document.querySelector(".ranking-container");

if (ranking) {
    const createTable = async () => {
        const response = await fetch(`${location.origin}/game/getRanking`, {
            cache: "no-cache",
        });
        const items = await response.json();

        if (items && items.data) {
            items.data.forEach((item, index) => {
                document.getElementById(`ranking`).innerHTML += `
                    <div class="ranking-container-item">
                        <p>${index + 1}</p>
                        <p>${item.name}</p>
                        <p>${formatTime(item.gametime)}</p>
                    </div>
                `;
            });
        } else {
            ranking.classList.add("no-points");

            document.getElementById(`ranking`).innerHTML += `
                <div class="ranking-msg">
                    <p>Pontuação indisponível no momento :(</p>
                </div>
            `;
        }
    };

    createTable();
}
