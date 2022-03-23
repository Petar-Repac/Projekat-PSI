// Autor: Vukašin Stepanović
"use strict";

(function main() {
  const Role = {
    user: "user",
    mod: "mod",
    admin: "admin",
  };

  function user(username, password, role) {
    return { username, password, role };
  }

  const users = [
    user("User", "123", Role.user),
    user("Mod", "456", Role.mod),
    user("Admin", "789", Role.admin),
  ];

  const Auth = {
    getLoggedInUser() {
      const user = sessionStorage.getItem("user");
      return user && JSON.parse(user);
    },

    register(username) {
      const user = users.find(x => x.username === username);
      return !user;
    },

    logIn(username, password) {
      const user = users.find(x => x.username === username);
      if (!user || user.password !== password) {
        return false;
      }

      sessionStorage.setItem("user", JSON.stringify(user));
      return true;
    },

    logOut() {
      sessionStorage.removeItem("user");
    },
  };

  function getBans(role) {
    switch (role) {
      case Role.user:
        return [Role.mod, Role.admin];
      case Role.mod:
        return [Role.admin];
      case Role.admin:
        return [];
      default:
        return [Role.user, Role.mod, Role.admin];
    }
  }

  function init() {
    const user = Auth.getLoggedInUser();

    const banStyle = document.createElement("style");
    banStyle.textContent = getBans(user && user.role)
      .map(role => `.${role} { display: none; }`)
      .join("\n");

    document.head.appendChild(banStyle);
  }

  window.Auth = Auth;
  init();
})();
