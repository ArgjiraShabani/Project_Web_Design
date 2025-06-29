
function searchButtonClicked() {
  const searchTerm = document.getElementById('sInput').value.trim(); // Get the search input value
  if (searchTerm === "") {
    alert("You have not written anything to search for.Please write something!");
  
}

}
function searchButtonClickedd() {
  const people = document.getElementById('sFlight').value; // Get the search input value
  const roundtrip=document.getElementById("roundtrip").value;
  const des=document.getElementById("des").value;
  const dep=document.getElementById("dep").value;
  if (people === 0 || roundtrip==="" || des==="" || dep==="" ) {
    alert("Please fill all fields!");
  
}

}