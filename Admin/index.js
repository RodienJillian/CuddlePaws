function togglePassword() {
    var passwordField = document.getElementById("password");
    var passwordIcon = document.getElementById("password-icon");
    
    if (passwordField.type === "password") {
        passwordField.type = "text";
        passwordIcon.src = "https://res.cloudinary.com/dpxfbom0j/image/upload/v1728356362/eye_ie4zen.png";
        passwordIcon.classList.add('rotated');
    } else {
        passwordField.type = "password";
        passwordIcon.src = "https://res.cloudinary.com/dpxfbom0j/image/upload/v1728356363/hidden_kg0z7u.png";
        passwordIcon.classList.remove('rotated');
    }
}

window.onload = function() {
    var passwordField = document.getElementById("password");
    var passwordIcon = document.getElementById("password-icon");

    passwordField.type = "password"; 
    passwordIcon.src = "https://res.cloudinary.com/dpxfbom0j/image/upload/v1728356363/hidden_kg0z7u.png"; 
};
