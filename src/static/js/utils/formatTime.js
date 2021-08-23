function formatTime(gameTime) {
    let initialTime = Math.floor(gameTime / 1000);

    let min = Math.floor(initialTime / 60);
    let sec = initialTime % 60;
    let mili = gameTime % 1000;

    min = min.toString().padStart(2, 0);
    sec = sec.toString().padStart(2, 0);
    mili = mili.toString().padStart(2, 0);

    return `${min}:${sec}:${mili}`;
}
