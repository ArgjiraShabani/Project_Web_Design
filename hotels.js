
function searchButtonClicked() {
  const searchTerm = document.getElementById('sInput').value.trim(); // Get the search input value
  if (searchTerm === "") {
    alert("Please enter a search term.");
  }
}

