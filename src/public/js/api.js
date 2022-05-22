/* Autor: Vukašin Stepanović */

"use strict";

const API = (function () {
    function updateStatus(username, status) {
        return xfetch.patch(`/user/${username}`, {
            key: "status",
            value: status,
        });
    }

    function updateIsBanned(username, isBanned) {
        return xfetch.patch(`/user/${username}`, {
            key: "isBanned",
            value: isBanned,
        });
    }

    function updateRole(username, role) {
        return xfetch.patch(`/user/${username}`, {
            key: "role",
            value: role,
        });
    }

    return {
        updateStatus,
        updateIsBanned,
        updateRole,
    };
})();