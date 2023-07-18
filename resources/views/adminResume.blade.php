@extends('layout.admin')
@section('title','Admin | Profile')
@section('content')
<div class="resumePageDiv d-none">
	<div class="resumeaddButton">
		<button id="resumeAddButtonId"><i class="fas fa-add"></i>Resume Add</button>
	</div>
	<div class="resumeTableDiv">
		<table id="resumeDataTable" class="table table-bordered table-hover table-striped">
			<thead class="text-center">
				<th>Year</th>
				<th>Exam</th>
				<th>Institute</th>
				<th>Result Year</th>
				<th>Title</th>
				<th>Result</th>
				<th>Edit</th>
        <th>Delete</th>
			</thead>
			<tbody id="resumeTableTbody" class="text-center">
				
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

<div class="row mt-5 d-none" id="resumeNothing">
  <div class="col-12 text-center">
    <img src="{{asset('img/nothing.webp')}}">
  </div>
</div> 


<!-- add resume html code start form here -->
<div class="modal  ml-auto fade" id="resumeaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h4>Resume Add Modal</h4>
      </div>
       <div class="modal-body text-center">
          <div class="form-group resumeaddpost">
            <input type="text" id="Ryear" placeholder="Year" class="form-control">
            <br>
            <input type="text" id="RexamName" placeholder="Exam Name" class="form-control">
           	<br>
           	<input type="text" id="RInstitute" placeholder="Institute Name" class="form-control">
           	<br>
           	<input type="number" id="RresultYear" placeholder="Result Year" class="form-control">
           	<br>
           	<input type="text" id="RexamTitle" placeholder="Exam Title" class="form-control">
            <br>
            <input type="number" id="Rresult" placeholder="Enter Result" class="form-control">
          </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="resumeAddBtn" type="button" class="btn btn-primary">Add</button>
      </div>
     </div>
   </div>
 </div>

<!-- show resume data html code start form here -->
<div class="modal  ml-auto fade" id="resumeEditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h4>Are You Went Resume Data Edit?</h4>
        <div class="resumeEditDiv text-center">
            <div class="showId">
              <h3 id="resumeId"></h3>
            </div>
          </div>
      </div>
       <div class="modal-body text-center">
          <div class="form-group d-none resumeEditData">
            <input type="text" id="EditYear" placeholder="About Name" class="form-control">
            <br>
            <input type="text" id="EditExamName" placeholder="Resume Exam Name" class="form-control">
            <br>
            <input type="text" id="EditIstitute" placeholder="Resume Institute Name" class="form-control">
            <br>
            <input type="number" id="EditResultYear" placeholder="Resume Result Year" class="form-control">
            <br>
            <textarea type="text" id="EditExamTitle" placeholder="Resume Exam Title" class="form-control"></textarea>
            <br>
             <input type="number" id="EditResult" placeholder="Resume Exam Result" class="form-control">
          </div>
          <img class="detailsLoader" src="{{asset('img/Spinner.gif')}}">
           <h3 class="resumeNothing d-none">Nothing About Data</h3>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="resumeEditbtn" type="button" class="btn btn-primary">Update</button>
      </div>
     </div>
   </div>
 </div>

<!-- Resume Data Delete html code start form here -->
<div class="modal  ml-auto fade" id="resumeDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h4>Are Want Resume Data Delete?</h4>
      </div>
       <div class="modal-body text-center">
          <div class="form-group aboutDelete">
          <div class="showId">
              <h3 id="resumeDeleteId"></h3>
            </div>                                  
          </div>                
         <!--  <img class="detailsLoader" src="{{asset('img/Spinner.gif')}}">
           <h3 class="aboutDeleteNothing d-none">Nothing Resume Delete Data</h3> -->
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="resumeDeleteBtn" type="button" class="btn btn-primary">Delete</button>
      </div>
     </div>
   </div>
 </div>



@endsection
@section('script')
<script type="text/javascript">
	getResume();


  var spenner = "<div class='spinner-border text-warning' role='status'></div>";

$('#resumeAddButtonId').on('click',function() {
  $('#resumeaddmodal').modal('show');
})


function getResume() {
  var url = '/admin/getResume';
  axios.get(url)
  .then(function(response) {
    if (response.status == 200) {
      $('.resumePageDiv').removeClass('d-none');
      $('#loader').addClass('d-none');

      $('#resumeDataTable').DataTable().destroy();

      $('#resumeTableTbody').empty();

      var resumeData = response.data;

      $.each(resumeData,function(i){
        var year = "<td>"+resumeData[i].year+"</td>";
        var examName = "<td>"+resumeData[i].examName+"</td>";
        var institute = "<td>"+resumeData[i].instituteName+"</td>";
         var resultYear = "<td>"+resumeData[i].resultYear+"</td>";
        var title = "<td>"+resumeData[i].examTitle+"</td>";
        var result = "<td>"+resumeData[i].result+"</td>";
        var edit = "<td class='editTd'><a class='tda EditId'data-id='"+resumeData[i].id+"'>Edit</a></td>";
        var deleted = "<td class='deleteTd'><a class='tda DeleteId' data-id='"+resumeData[i].id+"'>Delete</a></td>";
        
        $('<tr>').html(year+examName+institute+resultYear+title+result+edit+deleted).appendTo('#resumeTableTbody');
      })

      $('.EditId').click(function() {             
        var id = $(this).data('id');
        $('#resumeId').html(id);
        resumeDataShow(id);
        $('#resumeEditModal').modal('show');
      })
      $('.DeleteId').click(function() {
        var id = $(this).data('id');
        $('#resumeDeleteId').html(id);
        $('#resumeDeleteModal').modal('show');
      })

      $('#resumeDataTable').DataTable();
       $('.datatablees_length').addClass('bs-select');

    } else {
      $('#resumeNothing').removeClass('d-none');
      $('#loader').addClass('d-none');
    }
  })
  .catch(function(error) {
    $('#resumeNothing').removeClass('d-none');
      $('#loader').addClass('d-none');
  })

}

$('#resumeAddBtn').on('click',function() {
  var year = $('#Ryear').val();
  var examName = $('#RexamName').val();
  var institute = $('#RInstitute').val();
  var resultYear = $('#RresultYear').val();
  var examTitle = $('#RexamTitle').val();
  var result = $('#Rresult').val();

  ResumeAdd(year,examName,institute,resultYear,examTitle,result);
  
})

function ResumeAdd(year,examName,institute,resultYear,examTitle,result) {
  var url = '/admin/addResume';
  
  if (year.length == false) {
    toastr.warning('Enter Resume Year');
  }else if(examName.length == false) {
    toastr.warning('Resume Exam Name');
  }else if(institute.length == false) {
    toastr.warning('Resume Institute Name');
  }else if(resultYear.length == false) {
    toastr.warning('Resume Result Year');
  }else if(examTitle.length == false) {
    toastr.warning('Resume Exam Title');
  }else if(result.length == false){
    toastr.warning('Your Exam Result');
  }else{

    $('#resumeAddBtn').html(spenner);
    var data = {year:year,examName:examName,Institute:institute,resultYear:resultYear,examTitle:examTitle,result:result};

    axios.post(url,data)
    .then(function(response) {
      $('#resumeAddBtn').html('Add');
      if (response.status == 200) {
        $('#resumeaddmodal').modal('hide');
        toastr.success('Resume Data Add Success');
        getResume();
      } else {
        $('#resumeaddmodal').modal('hide');
        toastr.error('Resume Data Add Faild');
        getResume();
      }
    })
    .catch(function(error) {
      $('#resumeAddBtn').html('Add');
       $('#resumeaddmodal').modal('hide');
        toastr.error('Resume Data Add Faild');
        getResume();
    })

    
  }

}

//resume data show for js code start form here
function resumeDataShow(id) {
  var url = '/admin/resumeDataShow';
  var data = {id:id};

  axios.post(url,data)
    .then(function(response) {
      if (response.status == 200) {
        $('.resumeEditData').removeClass('d-none');
        $('.detailsLoader').addClass('d-none');
        var detailsData = response.data;
        $('#EditYear').val(detailsData[0].year);
        $('#EditExamName').val(detailsData[0].examName);
        $('#EditIstitute').val(detailsData[0].instituteName);
        $('#EditResultYear').val(detailsData[0].resultYear);
        $('#EditExamTitle').val(detailsData[0].examTitle);
        $('#EditResult').val(detailsData[0].result);
        
      } else {
        $('.resumeNothing').removeClass('d-none');
        $('.detailsLoader').addClass('d-none');
      }
    })
    .catch(function(error) {
      $('.resumeNothing').removeClass('d-none');
        $('.detailsLoader').addClass('d-none');
    })
}
//resume data show for js code end form here

//resume data update
$('#resumeEditbtn').on('click',function() {
  var url = '/admin/resumeUpdate';
  $('#resumeEditbtn').html(spenner);

  var id = $('#resumeId').html();
  var yr = $('#EditYear').val();
  var en = $('#EditExamName').val();
  var i =  $('#EditIstitute').val();
  var ry =  $('#EditResultYear').val();
  var et =  $('#EditExamTitle').val();
  var r =  $('#EditResult').val();
  var data = {id:id,yr:yr,en:en,i:i,ry:ry,et:et,r:r};
   axios.post(url,data)
    .then(function(response) {
      if (response.status == 200) {
        $('#resumeEditbtn').html('Update');
        setTimeout(()=>{
          $('#resumeEditbtn').html('Update');
        })
        $('#resumeEditModal').modal('hide');
        toastr.success('Data Update Success');
        getResume();
      } else {
        $('#resumeEditbtn').html('Update');
        setTimeout(()=>{
          $('#resumeEditbtn').html('Update');
        })
        $('#resumeEditModal').modal('hide');
        toastr.warning('Data Update Faild');
        getResume();
      }
    })
    .catch(function(error) {
      $('#resumeEditbtn').html('Update');
        setTimeout(()=>{
          $('#resumeEditbtn').html('Update');
        })
      $('#resumeEditModal').modal('hide');
        toastr.warning('Data Update Faild');
        getResume();
    })

})

//resume delete for js code 

$('#resumeDeleteBtn').on('click',function() {
  $('#resumeDeleteBtn').html(spenner);

  var id = $('#resumeDeleteId').html();
  var url = '/admin/resumeDelete';
  var data = {id:id};

  axios.post(url,data)
  .then(function(response) {
    $('#resumeDeleteBtn').html('Delete');
    if (response.status == 200 && response.data == 1) {
      toastr.success('Resume Data Deleteed Success'); 
      $('#resumeDeleteModal').modal('hide');
      getResume();
    } else {
       $('#resumeDeleteBtn').html('Delete');
       toastr.success('Resume Data Deleteed Faild'); 
      $('#resumeDeleteModal').modal('hide');
      getResume();
    }   
  })
  .catch(function(error) {
     $('#resumeDeleteBtn').html('Delete');
      toastr.success('Resume Data Deleteed Faild'); 
      $('#resumeDeleteModal').modal('hide');
      getResume();
  })
})

</script>
@endsection