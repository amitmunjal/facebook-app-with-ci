// JavaScript Document
function friendClass() {
	
	this.fetchFriends = function(url, currentPageNo) {
			
		$.ajax({url      : url + '/' + currentPageNo, 
				type     : 'get',
				success  : function(jsonFormatData){
					
								var totalNoRows = jsonFormatData.length;
								var htmlContent = '';
								for(i=0; i<totalNoRows; i++) {
									htmlContent += '<img src="' + jsonFormatData[i]['pic_square'] + '" class="tooltip" title="'+jsonFormatData[i]['name']+'" />';
								}
								
								htmlContent += '<br />'; // single break b/w images and buttons
								
								if(currentPageNo >= 1) {
									htmlContent += '<button onclick="objFriend.fetchFriends(\''+url+'\','+(currentPageNo-1)+')"> Previous </button>';
								}
								
								if((totalNoRows == 28) || (currentPageNo == 0)) {
									htmlContent += '<button onclick="objFriend.fetchFriends(\''+url+'\','+(currentPageNo+1)+')"> Next </button>';
								}
								$('#friendsDiv').html(htmlContent);
								$(".tooltip").tipsy({ gravity: "s" }); //For dynamic generated images
						 }, 
				dataType : 'json'
			  });
	   
	}
}