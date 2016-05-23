
console.log('je suis la');
$(document).ready(function() {

	var isOpenMessage = 0;
	
	$("#messageProfil").click(function(event) {
		
		if(isOpenMessage == 0){
			$('#butMessage2').fadeIn();
			isOpenMessage = 1;
		} else {
			$('#butMessage2').fadeOut();
			isOpenMessage = 0;
		}

		
	}); 


}) 
