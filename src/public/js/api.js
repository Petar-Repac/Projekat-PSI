/* Autor: Vukašin Stepanović */

"use strict";

const API = (function () {
    function updateStatus(username, status) {
        return xfetch.patch(`/user/${username}`, {
            key: "status",
            value: status,
        });
    }

    return {
        updateStatus,
    };
})();
