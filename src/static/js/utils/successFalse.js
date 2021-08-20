function successFalse() {
    let popupInfo = document.querySelector(".popup-info");

    if (popupInfo.parentElement.classList.contains("show")) {
        return popupInfo.parentElement.classList.remove("show");
    }
}
