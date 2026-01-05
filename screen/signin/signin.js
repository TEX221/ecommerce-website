/**
 * @type {HTMLFormElement}
 */
const signupForm = document.getElementById("signup-form");
/**@type {HTMLFormElement} */
const loginForm = document.getElementById("login-form");
const signupError = document.getElementById("signup-error");
const loginError = document.getElementById("login-error");

const login = async (e, loginFormData) => {
  e.preventDefault();

  loginError.classList.remove("d-none");
  try {
    const res = await fetch(`/ecommerce-website/utils/login.php`, {
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
          window.location.href = "/ecommerce-website/";
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

const signUp = async (e) => {
  e.preventDefault();
  const signupFormData = new FormData(signupForm);
  signupError.classList.remove("d-none");
  if (signupFormData.get("password") !== signupFormData.get("confirmation")) {
    signupError.innerText = "Erreur les mot de passes ne correspondent pas !";
    return;
  }
  try {
    const res = await fetch(`/ecommerce-website/utils/signup.php`, {
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
        setTimeout(() => {
          let loginFormData = new FormData();
          loginFormData.append("email", signupFormData.get("email"));
          loginFormData.append("password", signupFormData.get("password"));
          login(e, loginFormData);
        }, 2500);
      }
    } else {
      throw new Error("data is null !");
    }
  } catch (err) {
    signupError.innerText = "Erreur problème de connexion !";
    console.error(err);
  }
};

loginForm.onsubmit = (e) => login(e, new FormData(loginForm));
signupForm.onsubmit = signUp;
