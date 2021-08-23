if (location.href == `${location.origin}/game`) {
    function getOrientation() {
        var orientation = window.innerWidth > window.innerHeight ? "landscape" : "portrait";
        return orientation;
    }

    window.onresize = function () {
        if (getOrientation() == "portrait") {
            document.querySelector(".orientation").style.display = "flex";

            if (document.body.classList.contains("noScroll") == false) {
                document.body.classList.add("noScroll");
            }
        }

        if (getOrientation() == "landscape") {
            document.querySelector(".orientation").style.display = "none";

            if (document.body.classList.contains("noScroll")) {
                document.body.classList.remove("noScroll");
            }
        }
    };

    window.onload = function () {
        if (getOrientation() == "portrait") {
            document.querySelector(".orientation").style.display = "flex";

            if (document.body.classList.contains("noScroll") == false) {
                document.body.classList.add("noScroll");
            }
        }

        if (getOrientation() == "landscape") {
            document.querySelector(".orientation").style.display = "none";

            if (document.body.classList.contains("noScroll")) {
                document.body.classList.remove("noScroll");
            }
        }
    };
}
