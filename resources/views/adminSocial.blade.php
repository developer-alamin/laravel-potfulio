@extends('layout.admin')
@section('title','Admin | Social')
@section('content')

<div class="socialPageDiv d-none">
	<div class="socialAdd ">
		<button id="socialAddButton"><i class="fas fa-add mr-2"></i>Add Social</button>
	</div>
	<div class="socialTableDiv">
		<table id="DataTable" class="table table-bordered table-hover table-striped">
			<thead>
				<th>Sr</th>
				<th>Icon Name</th>
				<th>Icon</th>
				<th>Date</th>
				<th colspan="2">Action</th>
			</thead>
			<tbody id="socailTbody">
				
			</tbody>
		</table>
	</div>
</div>

<!-- loading code start form here -->
<div class="row p-5" id="loader">
  <div class="col-12 text-center">
    <img src="{{asset('img/Spinner.gif')}}">
  </div>
</div>
<div class="row mt-5 d-none" id="visitnothingImgRow">
  <div class="col-12 text-center nothingImgRow">
    <img src="{{asset('img/nothing.webp')}}">
  </div>
</div> 

<!-- social data Edit modal -->
<div class="modal  ml-auto fade" id="socialEditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
     	<div class="modal-header">
     		<h4>Social Data Show</h4>
     		<div class="socialEditId text-center">
       			<h4 id="socialEditText"></h4>
       		</div>
     	</div>
       <div class="modal-body text-center">
      		<div class="form-group d-none socailDetailsData">
      			<input type="text" id="editNameId" placeholder="Icon Name" class="form-control">
      			<br>
      			<input type="text" id="editlinkId" placeholder="Icon Link" class="form-control">
      		</div>
      		<img class="detailsLoader" src="{{asset('img/Spinner.gif')}}">
      		 <h3 class="nothingSocialDetails d-none">Nothing Social Data</h3>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="socialEditBtnId" type="button" class="btn btn-primary">Update</button>
      </div>
     </div>
   </div>
 </div>

<!-- social data delete modal -->
<div class="modal  ml-auto fade" id="socialDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
     	<div class="modal-header">
     		<h4>Are Your Want Social Data Delete</h4>
     	</div>
       <div class="modal-body text-center">
       		<div class="socialDeleteId">
       			<h4 id="socialDeleteText"></h4>
       		</div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="socialDeleteBtnId" type="button" class="btn btn-primary">Delete</button>
      </div>
     </div>
   </div>
 </div>

<!-- social add modal html start form here -->
<div class="modal  ml-auto fade" id="SocialDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
     	<div class="modal-header">
     		
     	</div>
       <div class="modal-body">
   			<div class="form-group">
   				<label>Icon Name:</label>
   				<input type="text" id="socialName" placeholder="Enter Your Icon Name" class="form-control">
   				<br>
   				<label>Icon Link:</label>
   				<input type="text" id="iconLink" placeholder="Enter Your Icon Link" class="form-control">
   			</div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="socialSubmitButtonId" type="button" class="btn btn-primary">Submit</button>
      </div>
     </div>
   </div>
 </div>
<!-- social add modal html end form here -->

@endsection

@section('script')

<script type="text/javascript">
	getSocialData();

function getSocialData() {
  var url = '/admin/getSocial';
  axios.get(url)
  .then(function(response) {
    if (response.status == 200) {
      $('.socialPageDiv').removeClass('d-none');
      $('#loader').addClass('d-none');

      $('#socailTbody').empty();

      var socialData = response.data;

      $.each(socialData,function(i){
        let socialid = "<td>"+socialData[i].id+"</td>";
        let socialName = "<td>"+socialData[i].name+"</td>";
        let socialIcon = "<td class='text-center'><i class='"+socialData[i].icon+"'></i></td>";
        let socialDate = "<td>"+socialData[i].date+"</td>";
        let edit = "<td class='editTd'><a class='tda EditId'data-id='"+socialData[i].id+"'>Edit</a></td>";
        let deleted = "<td class='deleteTd'><a class='tda DeleteId' data-id='"+socialData[i].id+"'>Delete</a></td>";
        
        $('<tr>').html(socialid+socialName+socialIcon+socialDate+edit+deleted).appendTo('#socailTbody');
      })

      $('.EditId').click(function() {             
        var id = $(this).data('id');
        $('#socialEditText').html(id);
        socialDataDetails(id);
        $('#socialEditModal').modal('show');
      })
      $('.DeleteId').click(function() {
        var id = $(this).data('id');
        $('#socialDeleteText').html(id);
        $('#socialDeleteModal').modal('show');
      })

    } else {
      $('.visitnothingImgRow').removeClass('d-none');
      $('#loader').addClass('d-none');
    }
  })
  .catch(function(error) {
    $('.visitnothingImgRow').removeClass('d-none');
    $('#loader').addClass('d-none');
  })
}



$('#socialAddButton').click(function() {
  $('#SocialDeleteModal').modal('show');
});

$('#socialSubmitButtonId').click(function() {
  var name = $('#socialName').val();
  var link = $('#iconLink').val();
  addSocial(name,link);
})

function addSocial(name,link){
  toastr.options.positionClass = 'toast-top-center';
  if (name.length == false) {
    toastr.warning('<b>please Icon Name</b>');
  } else if(link.length == false){
    toastr.warning('<b>please Icon Link</b>');
  }else{
    var spenner = "<div class='spinner-border text-warning' role='status'></div>";
     $('#socialSubmitButtonId').html(spenner);

    var socialUrl = '/admin/addSocial';
    var socialData = {name:name,link:link};

    axios.post(socialUrl,socialData)
    .then(function(response) {
      $('#socialSubmitButtonId').html('Submit');
      if (response.status == 200) {

        toastr.success('Your Icon Add Success');  
        $('#SocialDeleteModal').modal('hide');
        getSocialData();
      } else {
        toastr.warning('Your Icon Add Faild');  
        $('#SocialDeleteModal').modal('hide');
        getSocialData();
      }
    })
    .catch(function(error) {
      toastr.warning('Your Icon Add Faild');  
      $('#SocialDeleteModal').modal('hide');
      getSocialData();
    })
  }
}

// social delete for code

$('#socialDeleteBtnId').click(function() {
  var id = $('#socialDeleteText').html();
  socialDelete(id);
})

function socialDelete(id) {
  var spenner = "<div class='spinner-border text-warning' role='status'></div>";
  $('#socialDeleteBtnId').html(spenner);

  var url = '/admin/socialDelete';
  var deleteData = {id:id};
  axios.post(url,deleteData)
  .then(function(response) {
    $('#socialDeleteBtnId').html('Delete');
    if (response.status == 200 && response.data == 1) {
      toastr.success('Social Data Delete'); 
      $('#socialDeleteModal').modal('hide');
      getSocialData();
    } else {
      toastr.warning('Social Data Not Delete'); 
      $('#socialDeleteModal').modal('hide');
      getSocialData();
    }   
  })
  .catch(function(error) {
    toastr.warning('Social Data Not Delete'); 
    $('#socialDeleteModal').modal('hide');
    getSocialData();
  })
}

//social data show 
function socialDataDetails(detailsId) {
  var url = '/admin/socialDeltais';
  var data = {id:detailsId};
  axios.post(url,data)
  .then(function(response) {
    if (response.status == 200) {
      $('.socailDetailsData').removeClass('d-none');
      $('.detailsLoader').addClass('d-none');
      var detailsData = response.data;
      $('#editNameId').val(detailsData[0].name);
      $('#editlinkId').val(detailsData[0].icon);
      
    } else {
      $('.nothingSocialDetails').removeClass('d-none');
      $('.detailsLoader').addClass('d-none');
    }
  })
  .catch(function(error) {
    $('.detailsLoader').addClass('d-none');
    $('.nothingSocialDetails').removeClass('d-none');
  })


}

// social data update
$('#socialEditBtnId').click(function() {
  var id = $('#socialEditText').html();
  var name = $('#editNameId').val();
  var link = $('#editlinkId').val();
  socialUpdate(id,name,link)
})
function socialUpdate(id,name,link) {
  var spenner = "<div class='spinner-border text-warning' role='status'></div>";
  $('#socialEditBtnId').html(spenner);
  var url = '/admin/socialUpdate';
  var data = {id:id,name:name,link:link};

  axios.post(url,data)
  .then(function(response) {
    $('#socialEditBtnId').html('Update');
    if (response.status == 200) {
      $('#socialEditModal').modal('hide');
      toastr.success('Data Update Success');
      getSocialData();
    } else {
      $('#socialEditModal').modal('hide');
      toastr.warning('Data Update Faild');
      getSocialData();
    }
  })
  .catch(function(error) {
    $('#socialEditModal').modal('hide');
      toastr.warning('Data Update Faild');
      getSocialData();
  })

}
</script>


@endsection