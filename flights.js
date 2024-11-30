
function searchButtonClicked() {
  const searchTerm = document.getElementById('sInput').value.trim(); // Get the search input value
  if (searchTerm === "") {
    alert("Please enter a search term.");
  
}

}
function searchButtonClicked() {
  const people = document.getElementById('sFlight').value; // Get the search input value
  const roundtrip=document.getElementById("roundtrip").value;
  const des=document.getElementById("des").value;
  const dep=document.getElementById("dep").value;
  if (people === 0 || roundtrip==="" || des==="" || dep==="" ) {
    alert("Please fill all fields!");
  
}

}