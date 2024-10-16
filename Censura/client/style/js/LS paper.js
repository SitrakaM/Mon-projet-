const wrapper = document.querySelector(".wrapper");
const SignUpLink = document.querySelector(".signUp-link");
const SignInLink = document.querySelector(".signIn-link");

    SignUpLink.addEventListener ("click", () => {
        wrapper.classList.add("animate-signIn");
        wrapper.classList.remove("animate-signUp");
    });

    SignInLink.addEventListener ("click" , () => {
        wrapper.classList.add("animate-signUp");
        wrapper.classList.remove("animate-signIn");
    });