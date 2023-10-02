const container = document.querySelector('.container')
const btnSignIn = document.querySelector('.btnSign-in')
const btnSignUp = document.querySelector('.btnSign-up')

btnSignIn.addEventListener('click', () => {
    container.classList.add('active')
})

btnSignUp.addEventListener('click', () => {
    container.classList.remove('active')
})

const passwordFields = document.querySelectorAll('input[type="password"]');
const eyeIcons = document.querySelectorAll('.uil-eye-slash');

// Loop through each eye icon and add a click event listener
eyeIcons.forEach(icon => {
  icon.addEventListener('click', () => {
    // Toggle the eye icons
    icon.classList.toggle('uil-eye');
    icon.classList.toggle('uil-eye-slash');


    // Toggle the password visibility
    const passwordField = icon.previousElementSibling;
    if (passwordField.type === 'password') {
      passwordField.type = 'text';
    } else {
      passwordField.type = 'password';
    }
  });
});


