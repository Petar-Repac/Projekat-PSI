/* Autor: Vukašin Stepanović */

"use strict";

(function userProfile() {
    let prevStatus = null;

    function setEditing(editing) {
        DOM.status.display.classList.toggle("hidden", editing);
        DOM.status.edit.classList.toggle("hidden", editing);
        DOM.status.form.classList.toggle("hidden", !editing);
    }

    const DOM = {
        status: {
            display: document.querySelector(".status-display"),
            form: document.querySelector("form.status"),
            edit: document.querySelector(".js-edit-status"),
        },

        admin: {
            panel: document.querySelector(".admin-panel"),
            ban: document.querySelector(".js-ban"),
        },
    };

    function updateStatus(status) {
        DOM.status.display.textContent = status ?? "No status.";
    }

    function updateBanButton(banned) {
        DOM.admin.ban.textContent = banned ? "Unban" : "Ban";
    }

    function initStatusEdit() {
        DOM.status.edit.addEventListener("click", () => {
            setEditing(true);
            prevStatus = __user.status;
        });

        DOM.status.form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const status = new FormData(e.target).get("status") || null;

            if (status == prevStatus) {
                setEditing(false);
                return;
            }

            const result = await API.updateStatus(__user.username, status);

            __user.status = result.value;
            updateStatus(__user.status);
            setEditing(false);
        });
    }

    function initAdminPanel() {
        DOM.admin.ban.addEventListener("click", async () => {
            const result = await API.updateIsBanned(
                __user.username,
                !__user.isBanned
            );
            __user.isBanned = result.value;
            updateBanButton(__user.isBanned);
        });

        updateBanButton(__user.isBanned);
        DOM.admin.panel.classList.remove("invisible");
    }

    function init() {
        if (DOM.status.form) {
            initStatusEdit();
        }
        if (DOM.admin.panel) {
            initAdminPanel();
        }
    }

    updateStatus(__user.status);
    DOM.status.display.classList.remove("invisible");
    init();
})();
