
const passwordInputs = document.querySelectorAll('.password_inputs');
const showPasswordBtns = document.querySelectorAll('.showPasswordBtn');

showPasswordBtns.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        if (passwordInputs[index].type === 'password') {
            passwordInputs[index].type = 'text';
            btn.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
        } else {
            passwordInputs[index].type = 'password';
            btn.innerHTML = '<i class="fa-solid fa-eye"></i>';
        }
    });
});

function showSignUpModal() {
    document.querySelector('.login_modal').style.display = 'none';
    document.querySelector('.sign_up_modal').style.display = 'block';
}

function showLoginModal() {
    document.querySelector('.sign_up_modal').style.display = 'none';
    document.querySelector('.login_modal').style.display = 'block';
}

