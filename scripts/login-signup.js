const loginForm = document.querySelector('.form-login');
const signUpForm = document.querySelector('.form-signup');
const loginBtn = document.querySelector('#login');
const signUpBtn = document.querySelector('#signup');
const titleLogin = document.querySelector('.login');
const titleSignUp = document.querySelector('.signup');

const url = location.href;
const query = new URL(url);
const params = query.searchParams.get("signup");
// console.log(params);

if(params !== null){
    loginForm.style.marginLeft = '-50%';
    titleLogin.style.marginLeft = '-50%';
}

signUpBtn.onclick = () => {
    loginForm.style.marginLeft = '-50%';
    titleLogin.style.marginLeft = '-50%';
    return false;
}

loginBtn.onclick = () => {
    loginForm.style.marginLeft = '0%';
    titleLogin.style.marginLeft = '0%';
    return false;
}

