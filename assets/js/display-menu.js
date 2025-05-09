window.addEventListener("beforeunload", () => {
    document.body.style.overflow = "auto";
});

document.addEventListener('turbo:load', () => {
    console.log("Coucou")
    const expandedMenu = document.getElementById("expanded-menu");
    const menuBtn = document.getElementById("menu");

    menuBtn.addEventListener("click", () => {
        expandedMenu.style.display = "flex";
        disableScrollY();
    })

    expandedMenu.addEventListener('click', () => {
        expandedMenu.style.display = "none";
        enableScrollY();
    })

    function disableScrollY() {
        document.querySelector('body').style.overflow = "hidden";
    }

    function enableScrollY() {
        document.querySelector('body').style.overflow = "visible";
    }
})