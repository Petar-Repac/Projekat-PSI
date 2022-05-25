/* Autor: Vukašin Stepanović */

"use strict";

window.xfetch = (function () {
    const csrfToken = document
        .querySelector('meta[name="_token"]')
        .getAttribute("content");

    if (!csrfToken) {
        throw new Error("CSRF token is missing on page.");
    }

    function xfetch(method, endpoint, body) {
        return fetch(endpoint, {
            method,
            ...(body ? { body: JSON.stringify(body) } : {}),
            credentials: "include",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-Token": csrfToken,
                "X-Sender": "xfetch",
            },
        }).then((res) => {
            if (res.ok) {
                return res.json();
            } else if (res.status === 405) {
                // Method Not Allowed; user was banned in the middle of action
                location.replace("/login?banned");
                throw new Error(res.statusText);
            } else {
                throw new Error(res.statusText);
            }
        });
    }

    const methods = [
        "GET",
        "HEAD",
        "POST",
        "PUT",
        "DELETE",
        "PATCH",
        "OPTIONS",
    ];

    return methods.reduce((acc, method) => {
        acc[method.toLowerCase()] = xfetch.bind(null, method);
        return acc;
    }, {});
})();
