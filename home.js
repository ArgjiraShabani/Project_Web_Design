const sInput = document.getElementById("sInput");
const sButton = document.getElementById("sButton");
const lButton = document.getElementById("lButton");


sButton.addEventListener("click", function(event) {
  
  if (sInput.value.trim() === "") {
    alert("Please enter a search term.");
    event.preventDefault(); 
  } else {
   
    alert("Searching for: " + sInput.value);
  }
});


lButton.addEventListener("click", function(event) {
  
  const isLoggedIn = false;

  if (!isLoggedIn) {
    alert("You need to log in first.");
    event.preventDefault(); 
  } else {
    alert("Redirecting to login page...");
  }
});