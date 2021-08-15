if (document.getElementById("menu-hamburguer")) {
    document.getElementById("menu-hamburguer").addEventListener("click", (event) => {
        if (event.target.checked == true) {
            document.querySelector(".menu-container-items").classList.add("open");
            event.target.checked = false;

            document.body.classList.add("menuIsOpen");
        } else {
            document.body.classList.remove("menuIsOpen");
        }
    });
}

if (document.getElementById("close-menu-hamburguer")) {
    document.getElementById("close-menu-hamburguer").addEventListener("click", (event) => {
        if (event.target.checked == false) {
            document.querySelector(".menu-container-items").classList.remove("open");
            event.target.checked = true;
        }
    });
}

if (document.getElementById("contain-sider-bar")) {
    document.getElementById("contain-sider-bar").addEventListener("click", (event) => {
        if (event.target.classList.value.match(/open/)) {
            event.target.classList.remove("open");
            document.body.classList.remove("menuIsOpen");
        }
    });
}
