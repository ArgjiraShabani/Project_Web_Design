
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
    if(password.length<8){
        errors.push('Password must have at least 8 characters')
        password.parentElement.classList.add('incorrect')
    }
    if(password !== password2){
        errors.push('Password does not match')
        password.parentElement.classList.add('incorrect')
        password2.parentElement.classList.add('incorrect')

    }

    return errors;
  
}
function getLogInFormErrors(email,password){
    let errors=[]

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

const allInputs=[username,email,password,password2].filter(input => input!=null)

allInputs.forEach(input =>{
    input.addEventListener('input',() => {
        if(input.parentElement.classList.contains('incorrect')){
            input.parentElement.classList.remove('incorrect')
            error_message.innerText=''
        }
    })
})



























