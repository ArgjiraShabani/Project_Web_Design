
function searchButtonClicked() {
  const searchTerm = document.getElementById('sInput').value.trim();
  if (searchTerm === "") {
    alert("You have not written anything to search for.Please write something!");
  }
}

