window.addEventListener('load', function(){

    //Show Password
    let inputPassword = document.getElementById('password');
    let btnShowPass = document.getElementById('show_password');
    let toggle = true;
    
    btnShowPass.addEventListener('click', function(){
        if(toggle){
            inputPassword.setAttribute('type', 'text');     
            toggle = false;
        }else{
            inputPassword.setAttribute('type', 'password');     
            toggle = true;
        }
    });




});