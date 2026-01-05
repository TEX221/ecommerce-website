/**@type {HTMLFormElement} */
const editProfileForm = document.getElementById("edit-profile-form");
/**@type {HTMLParagraphElement} */
const message = document.getElementById("message");

/**@param {SubmitEvent} e */
const editProfile = async (e) => {
  e.preventDefault();
  const formData = new FormData(editProfileForm);
  message.classList.remove("d-none");
  if (formData.get("password") !== formData.get("confirmation")) {
    message.innerText = "Les deux mot de passes ne correspondent pas !";
    message.classList.remove("text-success");
    message.classList.add("text-danger");
    return;
  }
  try {
    const res = await fetch("/ecommerce-website/utils/updateClient.php", {
      method: "POST",
      body: formData,
      credentials: "include",
    });
    if (!res.ok) {
      throw new Error("Probleme de connexion");
    }
    const data = await res.json();
    console.table(data);

    if (data) {
      message.innerText = data.message;
      if (data.success) {
        message.classList.remove("text-danger");
        message.classList.add("text-success");
        setTimeout(() => {
          window.location.reload();
        }, 2000);
      }
    }
  } catch (err) {
    message.innerText = "Erreur probleme de connexion !";
    message.classList.remove("text-success");
    message.classList.add("text-danger");
    console.error(err);
  }
};

editProfileForm.onsubmit = editProfile;
