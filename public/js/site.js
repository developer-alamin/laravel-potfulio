
//sitebar image for js code
getSiteImg();
function getSiteImg() {
	var url = '/getHomeImg';

	axios.get(url)
	.then(function(response) {
		$('.navImgDiv').removeClass('d-none');
		$('.loader').addClass('d-none');


		if (response.status == 200) {
			var data = response.data;
			$('#HomeNavberImg').attr('src',data[0].photo);
			$('#AdminName').html(data[0].name);
			
		} else {
			$('.nothingImg').removeClass('d-none');
			$('.loader').addClass('d-none');
		}
	})
	.catch(function(error) {
		$('.nothingImg').removeClass('d-none');
		$('.loader').addClass('d-none');
	})
}


