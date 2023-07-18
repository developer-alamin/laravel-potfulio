
$('#headerImgId').click(function() {
    $('#HeaderImgModal').modal('show');
})

$('#adminProfileId').click(function() {
   $('#HeaderImgModal').modal('show');
});

getProfileImg();
function getProfileImg() {
	var url = '/admin/getProfileImg';

	axios.get(url)
	.then(function(response) {
		if (response.status == 200) {
			$('.adminProfileName').removeClass('d-none');
			$('.userImg').removeClass('d-none');
			$('.ProfileLoader').addClass('d-none');

			var adminShow = response.data;
			$('.adminProfileName').html(adminShow[0].name);
			$('#headerImgId').attr('src',adminShow[0].photo);
			
			
		} else {
			$('.profileNithing').removeClass('d-none');
			$('.ProfileLoader').addClass('d-none');
		}
	})
	.catch(function(error) {
		$('.profileNithing').removeClass('d-none');
		$('.ProfileLoader').addClass('d-none');
	})

}
