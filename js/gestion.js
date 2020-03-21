let formFielsPass = document.getElementById('password');
let formFielsPass1 = document.getElementById('password1');
let formRegistration = document.getElementById('formWithPassword');

let buttonCookie = document.getElementById('button-cookie');
let blockCookie = document.getElementById('info-cookie');

if(document.getElementById('button-cookie')){
    buttonCookie.addEventListener('click', () =>{
        blockCookie.style.display = "none";
        document.cookie = 'info-cookie = YES ; path=/'
    })

}else if(document.getElementById('password')){
    addListerner();
    stopSent();
}

function addListerner(){
    formFielsPass1.addEventListener('input', password, false)
}


function password(){
    if(formFielsPass.value !== formFielsPass1.value){
        formFielsPass.classList.remove('is-valid');
        formFielsPass1.classList.remove('is-valid');
        formFielsPass.classList.add('is-invalid');
        formFielsPass1.classList.add('is-invalid');
    }else{
        formFielsPass.classList.remove('is-invalid');
        formFielsPass1.classList.remove('is-invalid');
        formFielsPass.classList.add('is-valid');
        formFielsPass1.classList.add('is-valid');
    }
    formFielsPass1.removeEventListener('change', password, false);
    addListerner();
}

function stopSent(){
    formRegistration.addEventListener('submit', checkSubmit, {once:true});
}

function checkSubmit(e){
    if(formFielsPass.value !== formFielsPass1.value) {
        e.preventDefault();
        removeSent();
        stopSent();
    }
}

function removeSent(){
    formRegistration.removeEventListener('submit', checkSubmit, {once: true});
}





