var bannerCount = 1;
var total = 5;

window.setInterval(function banner() {
	
	var image = document.getElementById('banner');
	
	if(bannerCount > total){
		bannerCount = 1;
		}
			
	image.src = "http://localhost/pearson/images/banner/banner"+ bannerCount +".png";
	
	bannerCount = bannerCount + 1;
	
	},3000);