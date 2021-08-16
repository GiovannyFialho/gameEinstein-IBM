let ranking = document.querySelector(".ranking-container");

if (ranking) {
    const createTable = async () => {
        const response = await fetch(`${location.origin}/game/getRanking`, {
            cache: "no-cache",
        });
        const items = await response.json();

        console.log(items);

        items.data.forEach((item, index) => {
            document.getElementById(`ranking`).innerHTML += `
                <div class="ranking-container-item">
                    <p>${index + 1}</p>
                    <p>${item.name}</p>
                </div>
            `;
        });
    };

    createTable();
}
