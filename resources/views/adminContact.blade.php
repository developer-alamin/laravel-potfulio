@extends('layout.admin')
@section('title','Admin | Contact')
@section('content')
<div class="contactPageDiv d-none">
	<div class="contactTableDiv">
		<table id="ContactTable" class="table table-bordered table-hover table-striped">
			<thead class="bg-warning">
				<th>Sr</th>
				<th>Name</th>
				<th>Email</th>
				<th>Subject</th>
				<th>Text</th>
				<th>Date</th>
				<th>Action</th>
			</thead>
			<tbody id="contactTableTbody">
				
			</tbody>
		</table>
	</div>
</div>

<div class="contactLoader text-center" >
	<img src="{{asset('img/Spinner.gif')}}">
</div>


<div class="col-12 d-none text-center nothingImgRow">
	<img src="{{asset('img/no.webp')}}">
</div>

<!-- Contact modal  -->
<div class="modal d-none ml-auto fade" id="ContactDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
     	<div class="modal-header">
     		<h5 class="modal-title" id="exampleModalLabel">Are You Want Contact Data Delete</h5>
     	</div>
       <div class="modal-body text-center">
   		 <div class="contactModalBody ">
   			<h3 class="" id="ContectText"></h3>
   		 </div>
   		 <img class="deleteSpenner d-none" src="{{asset('img/Spinner.gif')}}">
   		 <br>
   		 <img class="deleteNothibgResult d-none" style="width: 200px;height: 100px;" src="{{asset('img/no.webp')}}">
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="contactModalDelete" type="button" class="btn btn-danger">Delete</button>
      </div>
     </div>
   </div>
 </div>
 

@endsection

@section('script')
<script type="text/javascript">
	getContactFunc();
  
function getContactFunc() {
  var Url = '/admin/getContact';

  axios.get(Url)
  .then(function(response) {
    if (response.status == 200) {
      $('.contactPageDiv').removeClass('d-none');
      $('.contactLoader').addClass('d-none');

      $('#ContactTable').DataTable().destroy();

      $('#contactTableTbody').empty();
      var JsonData = response.data;
      $.each(JsonData,function(i) {
        var id = "<td>"+JsonData[i].id+"</td>";
        let name = "<td>"+JsonData[i].name+"</td>";
        let email = "<td>"+JsonData[i].email+"</td>";
        let sub = "<td>"+JsonData[i].sub+"</td>";
        let text = "<td>"+JsonData[i].text+"</td>";
        let date = "<td>"+JsonData[i].created_at+"</td>";
        let deleteId = "<td class='deleteTd'><a class='delete' data-id='"+JsonData[i].id+"'>Delete</a></td>";
        $('<tr>').html(id+name+email+sub+text+date+deleteId).appendTo('#contactTableTbody');
      });

        $('.delete').click(function() {
          $('#ContactDeleteModal').removeClass('d-none');
          $('.contactLoader').addClass('d-none');
          
          var id = $(this).data('id');
          $('#ContectText').html(id);
          $('#ContactDeleteModal').modal('show');
        })


        $('#ContactTable').DataTable();
        $('.datatablees_length').addClass('bs-select');

    } else {
      $('.contactLoader').addClass('d-none');
      $('.nothingImgRow').removeClass('d-none');

    }
  })
  .catch(function(error) {
    $('.contactLoader').addClass('d-none');
    $('.nothingImgRow').removeClass('d-none');
      
  })
}

$('#contactModalDelete').click(function() {
  var did = $('#ContectText').html();
    contactDelete(did);
})

function contactDelete(did) {
  var spenner = "<div class='spinner-border text-info' role='status'></div>";
  $('#contactModalDelete').html(spenner);

  var deleteUrl = '/admin/deleteContact';
  var deleteData = {id:did};

  axios.post(deleteUrl,deleteData)
  .then(function(response) {
    $('#contactModalDelete').html('Delete');
    if (response.status == 200 && response.data == 1) {
      $('#ContactDeleteModal').modal('hide');
      toastr.success('Your Data Delete');
      getContactFunc();
    } else {
      $('#contactModalDelete').html('Delete');
      $('#ContactDeleteModal').modal('hide');
      toastr.error('Data Not Delete');
      getContactFunc();
    }
  })
  .catch(function(error) {
    $('#contactModalDelete').html('Delete');
    $('#ContactDeleteModal').modal('hide');
      toastr.error('Data Not Delete');
      getContactFunc();
  })
}
</script>
@endsection