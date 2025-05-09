document.addEventListener("turbo:load", () => {
    const toggle = document.getElementById("theme-switch");
    const theme = getCookie("theme");

    if (theme === "dark") {
        document.body.classList.add("dark-mode");
        toggle.checked = true;
    } else {
        document.body.classList.remove("dark-mode");
    }

    toggle.addEventListener("change", () => {
        if (toggle.checked) {
            document.body.classList.add("dark-mode");
            setCookie("theme", "dark", 30);
        } else {
            document.body.classList.remove("dark-mode");
            setCookie("theme", "light", 30);
        }
    });

    function setCookie(name, value, days) {
        const d = new Date();
        d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = `${name}=${value}; expires=${d.toUTCString()}; path=/`;
    }

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }
});