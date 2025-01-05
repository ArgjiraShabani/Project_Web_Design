

function searchButtonClicked() {
  const searchTerm = document.getElementById('sInput').value.trim(); // Get the search input value
  if (searchTerm === "") {
    alert("You have not written anything to search for.Please write something!");
  
  }
}

var slider_img = document.querySelector('.slider-img');
var images = ['gettyimages-1089728672-scaled.jpg','lake-como-MOSTBEAUTIFUL0921-cb08f3beff1041e4beefc67b5e956b23.jpg', 'amazing-places-to-see-before-you-die-coverimage.jpg'];
var i = 0;

function prev(){
	if(i <= 0) i = images.length;	
	i--;
	return setImg();			 
}

function next(){
	if(i >= images.length-1) i = -1;
	i++;
	return setImg();			 
}

function setImg(){
	return slider_img.setAttribute('src', ""+images[i]);

}