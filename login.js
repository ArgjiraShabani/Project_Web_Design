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










































