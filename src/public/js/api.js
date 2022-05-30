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

    function setPostLocked(postId, value) {
        return xfetch.patch(`/posts/${postId}`, {
            value,
        });
    }

    function triggerSelection() {
        return xfetch.post(`/trigger-selection`).catch((e) => {
            console.dir(e);
        });
    }

    return {
        updateStatus,
        updateIsBanned,
        updateRole,
        triggerSelection,
        setPostLocked,
    };
})();
