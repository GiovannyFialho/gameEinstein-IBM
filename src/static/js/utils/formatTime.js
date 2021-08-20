const formatTime = (gameTime) => {
    if (Math.floor(gameTime / 60000) <= 0) {
        let seconds = Math.floor(gameTime / 1000);
        let milliseconds = gameTime - seconds * 1000;

        if (seconds == 0) {
            seconds = `0${0}`;
        }

        return `00:${seconds}:${milliseconds}`;
    } else {
        let minutes = Math.floor(gameTime / 60000);
        let seconds = gameTime - minutes * 60;
        let milliseconds = gameTime - seconds * 1000;

        return `${minutes}:${seconds}:${milliseconds}`;
    }
};
