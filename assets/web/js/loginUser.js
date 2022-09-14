const green = true

const submit = document.querySelector(".submit");
submit.addEventListener('click', () => {
    const lightOrDark = green === true ? "#C1E6C5" : "#7AC382";
    document.documentElement.style.setProperty('--color-main-white', lightOrDark);
});