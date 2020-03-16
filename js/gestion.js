let formFielsPass = document.getElementById('password');
let formFielsPass1 = document.getElementById('password1');

let buttonCookie = document.getElementById('button-cookie');
let blockCookie = document.getElementById('info-cookie');

if(document.getElementById('button-cookie')){
    buttonCookie.addEventListener('click', () =>{
        blockCookie.style.display = "none";
        document.cookie = 'info-cookie = YES ; path=/'
    })

}else if(document.getElementById('password')){
    addListerner();
}



function addListerner(){
    formFielsPass1.addEventListener('change', password, false)
}


function password(){
    if(formFielsPass.value !== formFielsPass1.value){
        formFielsPass.classList.add('is-invalid');
        formFielsPass1.classList.add('is-invalid');
    }else{
        formFielsPass.classList.add('is-valid');
        formFielsPass1.classList.add('is-valid');
    }
    formFielsPass1.removeEventListener('change', password, false);
    addListerner();

}






