@extends('layout.admin')
@section('title','Admin | Profile')
@section('content')
<div class="skillPageDiv d-none">
	<div class="skilladdButtonDiv">
		<button id="skillButton"><i class="fas fa-add"></i>Add Skill</button>
	</div>
	<table id="skillDataTable" class="table table-bordered table-hover table-striped">
		<thead>
			<th>SR</th>
			<th>Name</th>
			<th>Point</th>
			<th>Date</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
		<tbody id="skillTbody">
			
		</tbody>
	</table>
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



<!-- Skill Add Post Modal Show -->
<div class="modal  ml-auto fade" id="skillAddModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h4>Skill Add Post</h4>
      </div>
       <div class="modal-body text-center">
          <div class="form-group skillAddPost">
            <input type="text" id="akillName" placeholder="Skill Point Name" class="form-control">
            <br>
            <input type="number" id="skillNum" class="form-control" placeholder="Skill Ponit Number">
          </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="skilladdpostbtn" type="button" class="btn btn-primary">Add</button>
      </div>
     </div>
   </div>
 </div>


 <!-- Skill data Edit modal -->
<div class="modal  ml-auto fade" id="skillEditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h4>Skill Data Show</h4>
        <div class="skillEditDib text-center">
            <div class="showId">
              <h3 id="skillId"></h3>
            </div>
          </div>
      </div>
       <div class="modal-body text-center">
          <div class="form-group d-none skillEditData">
            <input type="text" id="updateName" placeholder="Skill Name" class="form-control">
            <br>
         	 <input type="number" id="updatenum" class="form-control" placeholder="Skill Ponit Number">
          </div>
          	<img class="detailsLoader" src="{{asset('img/Spinner.gif')}}">
           <h3 class="skillNothing d-none">Nothing About Data</h3>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="skillUpdateBtn" type="button" class="btn btn-primary">Update</button>
      </div>
     </div>
   </div>
 </div>


<!-- About Delete Modal Show -->
<div class="modal  ml-auto fade" id="skillDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h4>Are Want Skill Data ?</h4>
      </div>
       <div class="modal-body text-center">
          <div class="form-group skillDelete">
           <div id="aboutDeleteDiv">
             <h3 class="SkillDeleteId"></h3>
           </div>
          </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="skillDeleteBtn" type="button" class="btn btn-primary">Delete</button>
      </div>
     </div>
   </div>
 </div>
@endsection

@section('script')

<script type="text/javascript">
	
getSkill();
var spenner = "<span class='spinner-border text-primary spinner-border-sm' role='status' aria-hidden='true'></span> Loading...";
function getSkill() {
	var url = '/admin/getskill';
	axios.get(url)
	.then(function(response) {
		if (response.status == 200) {
			$('.skillPageDiv').removeClass('d-none');
			$('#loader').addClass('d-none');

			$('#skillDataTable').DataTable().destroy();
           $('#skillTbody').empty();

			var skillJsonData = response.data;
			$.each(skillJsonData,function(i) {
				var id = "<td>"+skillJsonData[i].id+"</td>";
				var name = "<td>"+skillJsonData[i].name+"</td>";
          		 var num = "<td>"+skillJsonData[i].point+"</td>";
          		 var date = "<td>"+skillJsonData[i].date+"</td>";
          		 var edit = "<td class='editTd'><a class='tda skillEdit' data-id='"+skillJsonData[i].id+"'>Edit</a></td>";
          		 var deleted = "<td class='deleteTd'><a class='tda skillDelete' data-id='"+skillJsonData[i].id+"'>Delete</a></td>";
          		 $('<tr>').html(id+name+num+date+edit+deleted).appendTo('#skillTbody');
			})

			$('.skillEdit').click(function() {
				var id = $(this).data('id');
				 updateShow(id);
				$('#skillEditModal').modal('show');
			});

			$('.skillDelete').click(function() {
				var id = $(this).data('id');
				$('.SkillDeleteId').html(id);
				$('#skillDeleteModal').modal('show');
			})

			$('#skillDataTable').DataTable();
           $('.datatablees_length').addClass('bs-select');


		} else {
			$('#visitnothingImgRow').removeClass('d-none');
			$('#loader').addClass('d-none');
		}

	})
	.catch(function(error) {
		$('#visitnothingImgRow').removeClass('d-none');
		$('#loader').addClass('d-none');
	})
}




$('#skillButton').click(function() {
	$('#skillAddModal').modal('show');
})

$('#skilladdpostbtn').click(function() {
	$('#skilladdpostbtn').html(spenner);
	var name = $('#akillName').val();
	var num = $('#skillNum').val();
	 addSkill(name,num);

});
function addSkill(name,num) {
	var url = '/admin/addskill';
	var data = {name:name,num:num};

	axios.post(url,data)
	.then(function(response) {
		if (response.status == 200) {
			$('#skilladdpostbtn').html('Add Success');
			setTimeout(function() {
				$('#skilladdpostbtn').html('Add');
			},3000);
			$('#skillAddModal').modal('hide');
			toastr.success('Skill Point Add Success');
			getSkill();
		} else {
			$('#skilladdpostbtn').html('Add Faild');
			setTimeout(function() {
				$('#skilladdpostbtn').html('Add');
			},3000);
			$('#skillAddModal').modal('hide');
			toastr.success('Skill Point Add Faild');
			getSkill();
		}
	})
	.catch(function(error) {
		$('#skilladdpostbtn').html('Add Faild');
		setTimeout(function() {
			$('#skilladdpostbtn').html('Add');
		},3000);
		$('#skillAddModal').modal('hide');
		toastr.success('Skill Point Add Faild');
		getSkill();
	})

}

//update show data for js code
function updateShow(id) {
	var url = '/admin/skillUpdateShow';
	var data = {showid:id};

	axios.post(url,data)
	.then(function(response) {
		if (response.status == 200) {
			$('.skillEditData').removeClass('d-none');
			$('.detailsLoader').addClass('d-none');
			var updateShow = response.data;
			$('#skillId').html(updateShow[0].id);
			$('#updateName').val(updateShow[0].name);
			$('#updatenum').val(updateShow[0].point);
			
			
		} else {
			$('.skillNothing').removeClass('d-none');
			$('.detailsLoader').addClass('d-none');
		}
	})
	.catch(function(error) {
		$('.skillNothing').removeClass('d-none');
		$('.detailsLoader').addClass('d-none');
	})



}

$('#skillUpdateBtn').click(function() {
	$('#skillUpdateBtn').html(spenner);

	var updateId =    $('#skillId').html();
	var updateName =  $('#updateName').val();
	var updatePoint = $('#updatenum').val();

	skillUpdate(updateId,updateName,updatePoint)
});
function skillUpdate(updateId,updateName,updatePoint) {
	var url = '/admin/skillUpdate';
	var data = {Upid:updateId,UpName:updateName,UpPoint:updatePoint};

	axios.post(url,data)
	.then(function(response) {
		if (response.status == 200) {
			$('#skillUpdateBtn').html('Update Success');
			setTimeout(function() {
				$('#skillUpdateBtn').html('Update');
			},3000);
			$('#skillEditModal').modal('hide');
			toastr.success('Your Skill Update Success');
			getSkill();
		} else {
			$('#skillUpdateBtn').html('Update Faild');
			setTimeout(function() {
				$('#skillUpdateBtn').html('Update');
			},3000);
			$('#skillEditModal').modal('hide');
			toastr.success('Your Skill Update Faild');
			getSkill();
		}
	})
	.catch(function(error) {
		$('#skillUpdateBtn').html('Update Faild');
		setTimeout(function() {
			$('#skillUpdateBtn').html('Update');
		},3000);
		$('#skillEditModal').modal('hide');
		toastr.success('Your Skill Update Faild');
		getSkill();
	})
}

//skill data delete for js code

$('#skillDeleteBtn').click(function() {
	$('#skillDeleteBtn').html(spenner);

	var id = $('.SkillDeleteId').html();

	var url = '/admin/skillDelete';
	var data = {id:id};

	axios.post(url,data)
	.then(function(response) {
		if (response.status == 200) {
			$('#skillDeleteBtn').html('Delete Success');
			setTimeout(function() {
				$('#skillDeleteBtn').html('Delete');
			},3000);
			$('#skillDeleteModal').modal('hide');
			toastr.success('Your Skill Delete Success');
			getSkill();
		} else {
			$('#skillDeleteBtn').html('Delete Faild');
			setTimeout(function() {
				$('#skillDeleteBtn').html('Delete');
			},3000);
			$('#skillDeleteModal').modal('hide');
			toastr.success('Your Skill Delete Faild');
			getSkill();
		}
	})
	.catch(function(error) {
		$('#skillDeleteBtn').html('Delete Faild');
		setTimeout(function() {
			$('#skillDeleteBtn').html('Delete');
		},3000);
		$('#skillDeleteModal').modal('hide');
		toastr.success('Your Skill Delete Faild');
		getSkill();
	})

})
			
</script>

@endsection