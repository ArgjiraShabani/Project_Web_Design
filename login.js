
const form =document.getElementById('form');
const username=document.getElementById('name');
const email=document.getElementById('email');
const password=document.getElementById('password');
const password2=document.getElementById('password2');
const error_message=document.getElementById('error-message');
form.addEventListener('submit',(e)=>{
   // e.preventDefault()

   let errors =[]

   if(username){
    errors= getRegisterFormErrors(username.value,email.value,password.value,password2.value)
   }
   else{
    errors= getLogInFormErrors(email.value,password.value)
   }
   if(errors.length>0){
    e.preventDefault()
    error_message.innerText=errors.join(". ")
   }
})

function getRegisterFormErrors(name,email,password,password2){
    let error=[]

    if(name==='' || name==null){
        errors.push('Name is required')
        username.parentElement.classList.add('incorrect')
    }
    if(email==='' || email==null){
        errors.push('Email is required')
        email.parentElement.classList.add('incorrect')
    }
    if(password==='' || password==null){
        errors.push('Password is required')
        password.parentElement.classList.add('incorrect')
    }

    return errors;
  
}




























/*const form =document.getElementById('form');
const username=document.getElementById('name');
const email=document.getElementById('email');
const password=document.getElementById('password');
const password2=document.getElementById('password2');

form.addEventListener('submit', e=> {
    e.preventDefault();

    validateInputs();
});
const setError =(element,message) => {
    const inputBox = element.parentElement;
    const errorDisplay = inputBox.querySelector('.error');
    errorDisplay.innerText=message;
    inputBox.classList.add('error');
    inputBox.classList.remove('success');

}
const setSuccess = element =>{
    const inputBox=element.parentElement;
    const errorDisplay=inputBox.querySelector('.error');

    errorDisplay.innerText='';
    inputBox.classList.add('success');
    inputBox.classList.remove('error');
}
const isValidEmail = email => {
   const re =s =  /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
   return re.test(String(email).toLowerCase());

}

const validateInputs =() => {
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    
    if(usernameValue===''){
        setError(username,'Username is required')
    }
    else{
        setSuccess(username);

    }
   
    if(emailValue === ''){
        setError(email,'Email is required')

    }else if(!isValidEmail(emailValue)){
        setError(email,'Provide a valid email address');
    }else{
        setSuccess(email);
    }
    if(passwordValue === ''){
        setError(password,'Password is required');

    }else if(passwordValue.length <8){
        setError(password,'Password must be at least 8 characters.');
    }else{
        setSuccess(password);

    }
    if(password2Value === ''){
        setError(password2,'Please confirm your password');

    }else if(password2Value!==passwordValue){
        setError(password2,"Password doesn't match");
    }else{
        setSuccess(password2);
    }




    

    
};*/