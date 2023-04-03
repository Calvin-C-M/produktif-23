const toggle_password_visibility = (inputId, togglerId) => {
    const inputBox = document.querySelector(`#${inputId}`)
    const toggler = document.querySelector(`#${togglerId}`)
    if(inputBox.type == "password") {
        inputBox.type = "text"
        toggler.classList.remove("bi-eye-fill")
        toggler.classList.add('bi-eye-slash-fill')
    } else {
        inputBox.type = "password"
        toggler.classList.remove('bi-eye-slash-fill')
        toggler.classList.add("bi-eye-fill")
    }
}