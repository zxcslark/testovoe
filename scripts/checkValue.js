
function validate(){
    let name = document.forms["feedback"]["name"].value;
    let email = document.forms["feedback"]["email"].value;

    if(name.trim().length == 0 || email.trim().length == 0) {
        alert('Пожалуйста, заполните все поля');
        return false;
    }
}