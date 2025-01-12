
function searchButtonClicked() {
    const searchTerm = document.getElementById('sInput').value.trim(); // Get the search input value
    if (searchTerm === "") {
      alert("You have not written anything to search for.Please write something!");
    
    }
  }

function contactForm(){
  const first_name = document.getElementById('firstname');
  const last_name = document.getElementById('lastname');
  const email = document.getElementById('email');
  const phone_number = document.getElementById('number');
  const message = document.getElementById('message');

  let errors=[]

  errorMessage.innerHTML = '';
  errorMessage.style.display = 'none'; 

  if(first_name.value.trim()==""){
    errors.push("First name is required!");
    first_name.classList.add('error');
    

  }else{
    first_name.classList.remove('error');
  }
  if(last_name.value.trim()==""){
    errors.push("Last name is required!");
    last_name.classList.add('error');
    

  }else{
    last_name.classList.remove('error');
  }
  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  if(email.value.trim()==""){
    errors.push("Email is required!");
    email.classList.add('error');
  }else if(!emailPattern.test(email.value)){
    errors.push('Please enter a valid email address.');
    email.classList.add('error');

  }else{
    email.classList.remove('error');
  }
  if(phone_number.value.trim()==""){
    errors.push("Phone number is required!");
    phone_number.classList.add('error');
    

  }else{
    phone_number.classList.remove('error');
  }
  if(message.value.trim()==""){
    errors.push("Please write your message!");
    phomessagene_number.classList.add('error');
    

  }else{
    message.classList.remove('error');
  }
  

}