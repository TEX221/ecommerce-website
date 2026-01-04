/**
 * @type {HTMLFormElement}
 */
const signupForm = document.getElementById("signup-form");
/**@type {HTMLFormElement} */
const loginForm = document.getElementById("login-form");
const signupError = document.getElementById("signup-error");
const loginError = document.getElementById("login-error");

signupForm.onsubmit = async (e) => {
  e.preventDefault();
  const signupFormData = new FormData(signupForm);
  signupError.classList.remove("d-none");
  if (signupFormData.get("password") !== signupFormData.get("confirmation")) {
    signupError.innerText = "Erreur les mot de passes ne correspondent pas !";
    return;
  }
  try {
    const res = await fetch(`/projet/utils/signup.php`, {
      method: "POST",
      body: signupFormData,
      credentials: "include",
    });
    const data = await res.json();
    console.log(data);

    if (data) {
      signupError.innerText = data.message;
      if (data.success) {
        signupError.classList.remove("text-danger");
        signupError.classList.add("text-success");
      }
    } else {
      throw new Error("data is null !");
    }
  } catch (err) {
    signupError.innerText = "Erreur problème de connexion !";
    console.error(err);
  }
};

loginForm.onsubmit = async (e) => {
  e.preventDefault();
  const loginFormData = new FormData(loginForm);

  loginError.classList.remove("d-none");
  try {
    const res = await fetch(`/projet/utils/login.php`, {
      method: "POST",
      body: loginFormData,
      credentials: "include",
    });
    const data = await res.json();
    console.log(data);

    if (data) {
      loginError.innerText = data.message;
      if (data.success) {
        loginError.classList.remove("text-danger");
        loginError.classList.add("text-success");
        setTimeout(() => {
          window.location.href = "/projet";
        }, 2500);
      }
    } else {
      throw new Error("Data is null !");
    }
  } catch (err) {
    loginError.innerText = "Erreur problème de connexion !";
    console.error(err);
  }
};
