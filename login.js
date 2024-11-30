function getRegisterFormErrors(event) {
   
    event.preventDefault();

   
    const name = document.getElementById("name");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const password2 = document.getElementById("password2");
    const errorMessage = document.getElementById("error-message");

    let errors = [];

   
    errorMessage.innerHTML = '';
    errorMessage.style.display = 'none';  
    

    
    if (name.value.trim() === '') {
        errors.push('Name is required.');
        name.classList.add('error');
    } else {
        name.classList.remove('error');
    }

    
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (email.value.trim() === '') {
        errors.push('Email is required.');
        email.classList.add('error');
    } else if (!emailPattern.test(email.value)) {
        errors.push('Please enter a valid email address.');
        email.classList.add('error');
    } else {
        email.classList.remove('error');
    }

   
    if (password.value.trim() === '') {
        errors.push('Password is required.');
        password.classList.add('error');
    } else if (password.value.length < 8) {
        errors.push('Password must be at least 8 characters.');
        password.classList.add('error');
    } else {
        password.classList.remove('error');
    }

   
    if (password2.value.trim() === '') {
        errors.push('Please confirm your password.');
        password2.classList.add('error');
    } else if (password.value !== password2.value) {
        errors.push('Passwords do not match.');
        password2.classList.add('error');
    } else {
        password2.classList.remove('error');
    }

   
    if (errors.length > 0) {
        errorMessage.innerHTML = errors.join('<br>');
        errorMessage.style.display = 'block'; 
        return false;  
    }
    document.getElementById("form").submit(); 
    

    return true; 
}


function getLogInFormErrors(event) {
    
    event.preventDefault();

 
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const errorMessage = document.getElementById("error-message");

    let errors = [];

  
    errorMessage.innerHTML = '';
    errorMessage.style.display = 'none'; 
    

    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (email.value.trim() === '') {
        errors.push('Email is required.');
        email.classList.add('error');
    } else if (!emailPattern.test(email.value)) {
        errors.push('Please enter a valid email address.');
        email.classList.add('error');
    } else {
        email.classList.remove('error');
    }

    
    if (password.value.trim() === '') {
        errors.push('Password is required.');
        password.classList.add('error');
    } else if (password.value.length < 8) {
        errors.push('Password must be at least 8 characters.');
        password.classList.add('error');
    } 
    else {
        password.classList.remove('error');
    }

   
    if (errors.length > 0) {
        errorMessage.innerHTML = errors.join('<br>');
        errorMessage.style.display = 'block'; 
        return false;  
    }

    
    document.getElementById("form").submit(); 
    return true;
}

















/*const form =document.getElementById('form');
const username=document.getElementById('name');
const email=document.getElementById('email');
const password=document.getElementById('password');
const password2=document.getElementById('password2');
const error_message=document.getElementById('error-message');
form.addEventListener('submit',(e)=>{
e.preventDefault()

   let errors =[]

   if(username){
    errors= getRegisterFormErrors(username.value,email.value,password.value,password2.value);
   }
   else{
    errors= getLogInFormErrors(email.value,password.value);
   }
   if(errors.length>0){
    e.preventDefault()
    error_message.innerText=errors.join(". ");
   } else{
    form.submit();
   }
});

function getRegisterFormErrors(name,email,password,password2){
    let errors=[];

    if(name==='' || name==null){
        errors.push('Name is required');
        username.parentElement.classList.add('incorrect');
    }
    if(email==='' || email==null){
        errors.push('Email is required');
        email.parentElement.classList.add('incorrect');
    }
    if(password==='' || password==null){
        errors.push('Password is required');
        password.parentElement.classList.add('incorrect');
    }
    if(password.length<8){
        errors.push('Password must have at least 8 characters');
        password.parentElement.classList.add('incorrect');
    }
    if(password !== password2){
        errors.push('Password does not match');
        password.parentElement.classList.add('incorrect');
        password2.parentElement.classList.add('incorrect');

    }

    return errors;
  
}
function getLogInFormErrors(email,password){
    let errors=[];

    if(email==='' || email==null){
        errors.push('Email is required');
        email.parentElement.classList.add('incorrect');
    }
    if(password==='' || password==null){
        errors.push('Password is required');
        password.parentElement.classList.add('incorrect');
    }

    return errors;
}

const allInputs=[username,email,password,password2].filter(input => input!=null)

allInputs.forEach(input =>{
    input.addEventListener('input',() => {
        if(input.parentElement.classList.contains('incorrect')){
            input.parentElement.classList.remove('incorrect')
            error_message.innerText='';
        }
    });
});
*/


























