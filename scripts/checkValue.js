
function validate(){
    let name = document.forms["feedback"]["name"].value;
    let email = document.forms["feedback"]["email"].value;

    if(name.trim().length || email.trim().length) {
        alert('Пожалуйста, заполните все поля');
        return false;
    }
}