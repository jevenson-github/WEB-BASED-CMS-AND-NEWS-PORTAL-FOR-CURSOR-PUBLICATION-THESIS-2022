// SIGN IN PAGE //

let signinSubmit = document.getElementById("signinSubmit");
let signInForm = document.getElementById("signInForm");
let signUpForm = document.getElementById("signUpForm");
let signUpLink = document.getElementById("signUpLink");
let goBacktoSignIn = document.getElementById("goBacktoSignIn");
let triggerElement = document.getElementById("triggerElement");
let signIn_unmatchedCredentials = document.getElementById("signIn_unmatchedCredentials");

signUpLink.onclick = function () {
  signInForm.classList.add("hidden");
  signUpForm.classList.remove("hidden");
};

goBacktoSignIn.onclick = function () {
  signInForm.classList.remove("hidden");
  signUpForm.classList.add("hidden");
};

triggerElement.onclick = function () {
  signIn_unmatchedCredentials.classList.add("hidden");
}