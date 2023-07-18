@extends('layout.admin')
@section('title','Admin | Profile')
@section('content')
<div class="potfulioPageDiv d-none">
	<div class="potfulioAdd">
		<button id="potfulioAddButton"><i class="fas fa-add"></i>Add Potfulio</button>
	</div>
	<div class="potfulioTableDiv">
		<table id="potfulioDataTable" class="table table-bordered table-hover table-striped">
			<thead>
				<th>Sr</th>
				<th>Name</th>
				<th>Category</th>
				<th>Technology</th>
				<th>Photo</th>
				<th>Edit</th>
				<th>Delete</th>
			</thead>
			<tbody id="potfulioTableTbody">
				
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

<div class="row mt-5 d-none" id="Nothing">
  <div class="col-12 text-center">
    <img src="{{asset('img/nothing.webp')}}">
  </div>
</div> 

<!-- About Add Post Modal Show -->
<div class="modal  ml-auto fade" id="potfulioAddModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h4>Potfulio Add Post</h4>
      </div>
       <div class="modal-body text-center">
          <div class="form-group potfulioAddPost">
            <input type="text" id="name" placeholder="Potfulio Name" class="form-control">
            <br>
            <input type="text" id="category" placeholder="Potfulio Category" class="form-control">
            <br>
              <input type="text" id="technology" placeholder="Potfulio Technology" class="form-control">
            <br>
            <input type="file" id="img" class="form-control" accept="image/*">
            <br>
            <img src="{{asset('storage/download.jpg')}}" id="potfulioPreviewImg">
          </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="potfulioAddBtnId" type="button" class="btn btn-primary">Add</button>
      </div>
     </div>
   </div>
 </div>

<!-- Potfulio data Edit modal -->
<div class="modal  ml-auto fade" id="potfulioEditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h4>Potfulio Data Show</h4>
        <div class="potfulioEditDiv text-center">
            <h4 id="potfulioEditText"></h4>
            <div class="showId">
              <h3 id="potfulioId"></h3>
            </div>
          </div>
      </div>
       <div class="modal-body text-center">
          <div class="form-group d-none potfulioEditDiv">
	           <input type="text" id="Upname" placeholder="Potfulio Name" class="form-control">
	            <br>
	            <input type="text" id="Upcategory" placeholder="Potfulio Category" class="form-control">
	            <br>
	              <input type="text" id="Uptechnology" placeholder="Potfulio Technology" class="form-control">
	            <br>
	            <input type="file" id="Upimg" class="form-control" accept="image/*">
	            <br>
	            <img src="{{asset('storage/download.jpg')}}" id="potfulioDetailsImg">
          </div>

          <div class="detailsLoader">
          	<span class='spinner-border text-warning spinner-border-sm detailsSpenner' role='status' aria-hidden='true'></span> Loading...
          </div>
           <h3 class="Nothing d-none">Nothing About Data</h3>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="potfulioUpdateBtn" type="button" class="btn btn-primary">Update</button>
      </div>
     </div>
   </div>
 </div>


 <!-- About Delete Modal Show -->
<div class="modal  ml-auto fade" id="potfulioDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h4>Are Want Potfulio Data And Image Delete</h4>
      </div>
       <div class="modal-body text-center">
          <div class="form-group aboutDelete">
           <div id="ShowDiv">
             <h3 class="potfulioDeleteId"></h3>
           </div>
            <img src="" id="potfulioDeleteImg">
          </div>
          <img class="detailsLoader d-none" src="{{asset('img/Spinner.gif')}}">
           <h3 class="potfulioDeleteNothing d-none">Nothing About Delete Data</h3>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="potfulioDeleteBtn" type="button" class="btn btn-primary">Delete</button>
      </div>
     </div>
   </div>
 </div>



@endsection

@section('script')
<script type="text/javascript">
  
  
var spenner = "<span class='spinner-border text-warning spinner-border-sm' role='status' aria-hidden='true'></span> Loading...";

    getPotfulio();
    function getPotfulio() {
      var url = '/admin/getPotfulio';
       axios.get(url)
          .then(function (response) {
            if (response.status == 200) {
              $('.potfulioPageDiv').removeClass('d-none');
               $('#loader').addClass('d-none');
                $('#potfulioDataTable').DataTable().destroy();
                $('#potfulioTableTbody').empty();


              var getPotfulio = response.data;
              $.each(getPotfulio,function(i) {
                var id = "<td>"+getPotfulio[i].id+"</td>";
                var name = "<td>"+getPotfulio[i].name+"</td>";
                var cat = "<td>"+getPotfulio[i].category+"</td>";
                var tec = "<td>"+getPotfulio[i].technology+"</td>";
                var img = "<td class='potfulio'><img src='"+getPotfulio[i].img+"'></td>";
                var edit = "<td class='editTd'><a class='tda EditId' data-id='"+getPotfulio[i].id+"'>Edit</a></td>";
                var deleted = "<td class='deleteTd'><a class='tda DeleteId' data-id='"+getPotfulio[i].id+"' data-img='"+getPotfulio[i].img+"'>Delete</a></td>";
                
                $('<tr>').html(id+name+cat+tec+img+edit+deleted).appendTo('#potfulioTableTbody');
              })

              $('.EditId').click(function() {
                var id = $(this).data('id');
                UpdateShowData(id);
                $('#potfulioEditModal').modal('show');
              })

              $('.DeleteId').click(function() {
                var id = $(this).data('id');
                var img = $(this).data('img');
                $('.potfulioDeleteId').html(id);
                $('#potfulioDeleteImg').attr('src',img);
                $('#potfulioDeleteModal').modal('show');
              })

                $('#potfulioDataTable').DataTable();
                $('.datatablees_length').addClass('bs-select');

            } else {
               $('#Nothing').removeClass('d-none');
               $('#loader').addClass('d-none');
            }
            
          })
          .catch(function (error) {
              $('#Nothing').removeClass('d-none');
               $('#loader').addClass('d-none');
          });
    }

    $(document).ready(()=>{
      $('#img').change(function(){
        const file = this.files[0];
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('#potfulioPreviewImg').attr('src',event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
    });


    $('#potfulioAddButton').click(function() {
      $('#potfulioAddModal').modal('show');
    })

    $('#potfulioAddBtnId').click(function() {
        var name = $('#name').val();
        var cat = $('#category').val();
        var tec = $('#technology').val();
        var img = $('#img').prop('files')[0];
        addPotfulio(name,cat,tec,img); 
    });
    function addPotfulio(name,cat,tec,img) {

      if (name.length == false) {
        toastr.error('Please Potfulio Name');
      } else if (cat.length == false) {
        toastr.error('Please Potfulio Category');
      } else if (tec.length == false) {
        toastr.error('Please Potfulio Technology');
      } else{
        $('#potfulioAddBtnId').html(spenner);

        var url = '/admin/addPotfulio';
        var formdata = new FormData();
        formdata.append('name',name);
        formdata.append('cat',cat);
        formdata.append('tec',tec);
        formdata.append('img',img);


         axios.post(url,formdata)
        .then(function(response) {
          $('#potfulioAddBtnId').html('Add Success');
          setTimeout(()=>{
            $('#potfulioAddBtnId').html('Add');
          });
          toastr.success('Potfulio Post Add Success');
          $('#potfulioAddModal').modal('hide');
          getPotfulio();
          
        })
        .catch(function(error) {
          $('#potfulioAddBtnId').html('Add Faild');
          setTimeout(()=>{
            $('#potfulioAddBtnId').html('Add');
          });
          toastr.success('Potfulio Post Add Faild');
          $('#potfulioAddModal').modal('hide');
          getPotfulio();
        });
      }
    }

    function UpdateShowData(id) {
      var url = '/admin/potfulioUpShow';
      var data = {id:id};

      axios.post(url,data)
      .then(function(response) {
        if (response.status == 200) {
          $('.potfulioEditDiv').removeClass('d-none');
          $('.detailsLoader').addClass('d-none');
          var jsonShowData = response.data;

          $('#potfulioId').html(jsonShowData[0].id);
           $('#Upname').val(jsonShowData[0].name);
           $('#Upcategory').val(jsonShowData[0].category);
           $('#Uptechnology').val(jsonShowData[0].technology);
          $('#potfulioDetailsImg').attr('src',jsonShowData[0].img);
        

        } else {
           $('.Nothing').removeClass('d-none');
           $('.detailsLoader').addClass('d-none');
        }

      })
      .catch(function(error) {
          $('.Nothing').removeClass('d-none');
          $('.detailsLoader').addClass('d-none');
      })
    }

    $('#potfulioUpdateBtn').click(function() {
      $('#potfulioUpdateBtn').html(spenner);

         var Upid   =  $('#potfulioId').html();
         var Upname =  $('#Upname').val();
         var Upcat  =  $('#Upcategory').val();
         var Uptec  =  $('#Uptechnology').val();
         var NewImg =  $('#Upimg').prop('files')[0];
         var oldImg =  $('#potfulioDetailsImg').attr('src');
        
          var url = '/admin/potfulioUpdate';

          var data = new FormData();

          data.append('Upid',Upid);
          data.append('Upname',Upname);
          data.append('Upcat',Upcat);
          data.append('Uptec',Uptec);
          data.append('NewImg',NewImg);
          data.append('oldImg',oldImg);


             axios.post(url,data)
             .then(function(response) {
              if (response.status == 200) {
                $('#potfulioUpdateBtn').html('Update Success');
                setTimeout(()=>{
                  $('#potfulioUpdateBtn').html('Update');
                });
                $('#potfulioEditModal').modal('hide');
                toastr.success('Potfulio Data Update Success');
                getPotfulio();
              } else {
                 $('#potfulioUpdateBtn').html('Update Faild');
                setTimeout(()=>{
                  $('#potfulioUpdateBtn').html('Update');
                });
                $('#potfulioEditModal').modal('hide');
                toastr.success('Potfulio Data Update Faild');
                getPotfulio();
              }
             })
             .catch(function(error) {
                $('#potfulioUpdateBtn').html('Update Faild');
                setTimeout(()=>{
                  $('#potfulioUpdateBtn').html('Update');
                });
                $('#potfulioEditModal').modal('hide');
                toastr.success('Potfulio Data Update Faild');
                getPotfulio();
             })
    })

    $('#potfulioDeleteBtn').click(function() {
      $('#potfulioDeleteBtn').html(spenner);
      var id = $('.potfulioDeleteId').html();
      var ImgPath = $('#potfulioDeleteImg').attr('src');
      potfulioDelete(id,ImgPath);
    })
    function potfulioDelete(id,ImgPath) {
      var url = '/admin/potfulioDelete';
      var formdata = new FormData();

      formdata.append('id',id);
      formdata.append('ImgPath',ImgPath);

      axios.post(url,formdata)
       .then(function(response) {
          $('#potfulioDeleteBtn').html('Update Success');
           setTimeout(()=>{
            $('#potfulioDeleteBtn').html('Update');
          });
          $('#potfulioDeleteModal').modal('hide');
          toastr.success('Potfulio Data Delete Success');
          getPotfulio();
       })
       .catch(function(error) {
          $('#potfulioDeleteBtn').html('Update Faild');
          setTimeout(()=>{
            $('#potfulioDeleteBtn').html('Update');
          });
          $('#potfulioDeleteModal').modal('hide');
          toastr.error('Potfulio Data Delete Faild');
          getPotfulio();
       })

      
    }
</script>
@endsection
