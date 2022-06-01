/* Autori: Vukašin Stepanović & Petar Repac */

"use strict";

(function main() {

    //Autor: Vukašin Stepanović
    const DOM = {
        lock: document.querySelector(".js-lock"),
        comment: {
            text: document.querySelector(".js-comment-text"),
            submit: document.querySelector(".js-comment-submit"),
        },
    };

    function redrawLocked(value) {
        DOM.lock.textContent = value ? "Otključaj" : "Zaključaj";
        DOM.comment.text.disabled = value;
        DOM.comment.submit.disabled = value;
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

    //Autor: Petar Repac


})();
