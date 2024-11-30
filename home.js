

function searchButtonClicked() {
  const searchTerm = document.getElementById('sInput').value.trim(); // Get the search input value
  if (searchTerm === "") {
    alert("Please enter a search term.");
  } else {
    alert("Searching for: " + searchTerm);
    // Optionally, you can perform an action such as redirecting to a search results page:
    // window.location.href = "searchResults.html?query=" + encodeURIComponent(searchTerm);
  }
}

// JavaScript function for the Login button click
function loginButtonClicked() {
  // Display a message or perform any login action
  alert("Login button clicked!");
  // You can add more logic for the login process or redirect to the login page
  // Example: window.location.href = "login.html";
}