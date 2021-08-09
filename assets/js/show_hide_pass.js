let show_hide = document.querySelector("#show_hide_pass")
let password_input = document.querySelector('#password')
let confirm_password_unput = document.querySelector('#confirm_passord')

show_hide.addEventListener("change", ()=>{
    if (show_hide.checked){
        password_input.type = 'text'; 
        confirm_password_unput.type = 'text'
    }else{
        password_input.type = 'password'
        confirm_password_unput.type = 'password' 
    }
})