import { Controller } from '@hotwired/stimulus'

export default class extends Controller {
    connect() {
        const theme = this.getCookie('theme');
        if (theme === 'dark') {
            document.body.classList.add('dark-mode');
            this.element.checked = true;
        } else {
            document.body.classList.remove('dark-mode');
            this.element.checked = false;
        }
    }

    toggleDarkMode() {
        if (this.element.checked) {
            document.body.classList.add('dark-mode');
            this.setCookie('theme', 'dark', 30);
        } else {
            document.body.classList.remove('dark-mode');
            this.setCookie('theme', 'light', 30);
        }
    }

    setCookie(name, value, days) {
        const d = new Date();
        d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = `${name}=${value}; expires=${d.toUTCString()}; path=/`;
    }

    getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }
}
