/* Autor: Vukašin Stepanović */

"use strict";

window.showDialog = function showDialog(message) {
    console.log({ message });

    if (typeof message === "object" && message !== null) {
        const title = message.title ?? "Obaveštenje";
        const content = message.content;
        const type = message.type ?? "success";
        return Swal.fire(title, content, type);
    }
    return Promise.resolve();
};
