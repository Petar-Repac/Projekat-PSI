// Autor: Vukašin Stepanović
"use strict";

(function main() {
  const Role = {
    guest: "guest",
    user: "user",
    mod: "mod",
    admin: "admin",
  };

  function user(username, password, role, meta) {
    return { username, password, role, meta };
  }

  const Storage = {
    get(key, fallback = null) {
      const val = sessionStorage.getItem(key);
      return val === null ? fallback : JSON.parse(val);
    },

    set(key, value) {
      sessionStorage.setItem(key, JSON.stringify(value));
    },

    remove(key) {
      sessionStorage.removeItem(key);
    },
  };

  const defaultUsers = [
    user("User", "user", Role.user),
    user("Mod", "mod", Role.mod),
    user("Admin", "admin", Role.admin),
    user("Banned", "banned", Role.user, { banned: true }),
  ];

  const users = Storage.get("users", defaultUsers);

  const Auth = {
    getLoggedInUser() {
      return Storage.get("user");
    },

    register(username, password) {
      if (
        users.find(x => x.username.toLowerCase() === username.toLowerCase())
      ) {
        return null;
      }

      const newUser = user(username, password, Role.user);
      users.push(newUser);
      Storage.set("users", users);
      Auth.logIn(username, password);
      return newUser;
    },

    logIn(username, password) {
      const user = users.find(
        x => x.username.toLowerCase() === username.toLowerCase(),
      );
      if (!user || user.password !== password) {
        return null;
      }

      if (!user.meta?.banned) {
        Storage.set("user", user);
      }

      return user;
    },

    logOut() {
      Storage.remove("user");
    },
  };

  function getBans(role) {
    switch (role) {
      case Role.user:
        return [Role.guest, Role.mod, Role.admin];
      case Role.mod:
        return [Role.guest, Role.admin];
      case Role.admin:
        return [Role.guest];
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

    if (user) {
      document
        .querySelectorAll("._username")
        .forEach(x => (x.textContent = user.username));
    }
  }

  window.Auth = Auth;
  init();

  window.addEventListener("click", e => {
    const user = Auth.getLoggedInUser();
    if (
      !user &&
      e.target.closest(
        ".button.like, .button.dislike, .button.comment, .js-forbid-guest",
      )
    ) {
      alert("Morate se prijaviti kako biste mogli to da uradite!");
      e.preventDefault();
    }
  });
})();
