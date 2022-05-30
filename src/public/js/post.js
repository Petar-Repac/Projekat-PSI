/* Autor: Vukašin Stepanović */

"use strict";

(function main() {
    const DOM = {
        lock: document.querySelector(".js-lock"),
    };

    function redrawLocked(value) {
        DOM.lock.textContent = value ? "Otključaj" : "Zaključaj";
    }

    function initLock() {
        DOM.lock.addEventListener("click", async () => {
            const result = await API.setPostLocked(__post.id, !__post.isLocked);

            __post.isLocked = result.value;
            redrawLocked(result.value);
        });

        redrawLocked(__post.isLocked);
    }

    function init() {
        if (DOM.lock) {
            initLock();
        }
    }

    init();
})();
