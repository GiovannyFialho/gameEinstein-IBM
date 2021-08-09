if (document.getElementById("contain-sider-bar")) {
    document
        .getElementById("contain-sider-bar")
        .addEventListener("click", (event) => {
            if (event.target.classList.value.match(/open/)) {
                event.target.classList.remove("open");
                document.body.classList.remove("menuIsOpen");
            }
        });
}
