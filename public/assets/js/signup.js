const form = document.getElementById("form");
const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");

form.addEventListener("submit", (e) => {
  e.preventDefault();

  let inputName = e.target.elements.name.value;
  let inputEmail = e.target.elements.email.value;
  let inputPassword = e.target.elements.password.value;

  const nameError = document.querySelector("#name-error");
  const emailError = document.querySelector("#email-error");
  const passwordError = document.querySelector("#password-error");

  const emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/i;
  const nameRegex = /^[A-Za-z]+$/;
  const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

  // Réinitialiser les messages d'erreur
  nameError.classList.add("d-none");
  emailError.classList.add("d-none");
  passwordError.classList.add("d-none");

  // Valider les champs et afficher les erreurs si nécessaire
  
  if (!nameRegex.test(inputName)) {
    nameError.classList.remove("d-none");
  }

  if (!emailRegex.test(inputEmail)) {
    emailError.classList.remove("d-none");
  }

  if (!passwordRegex.test(inputPassword)) {
    passwordError.classList.remove("d-none");
  }
});