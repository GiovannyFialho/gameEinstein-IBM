let ranking = document.querySelector(".ranking-container");

if (ranking) {
    const createTable = async () => {
        const response = await fetch(`${location.origin}/game/getRanking`);
        const items = await response.json();

        items.data.forEach((item, index) => {
            document.getElementById(`ranking`).innerHTML += `
                <div class="ranking-container-item">
                    <p>${index}</p>
                    <p>${item.idUser}</p>
                </div>
            `;
        });
    };

    createTable();
}
