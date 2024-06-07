function validarPassword(password){
    const decimal = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

    if(password.value.match(decimal)){
        alert("La contraseña es segura.")
    }else{
        alert("La contraseña debe contener al menos 8 carácteres, una minúscula, mayúscula, un número y un carácter especial")
    }
}