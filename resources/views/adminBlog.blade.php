@extends('layout.admin')
@section('title','Admin | Profile')
@section('content')
<div class="blogPageDiv d-none">
	<div class="blogAdd">
		<button id="AddBlogId"><i class="fas fa-add"></i>Add Blog</button>
	</div>
	<div class="blogTableDiv">
		<table id="BlogDataTable" class="table table-bordered table-hover table-striped">
			<thead class="text-center">
				<th>Sr</th>
				<th>Name</th>
				<th>Photo</th>
				<th>Date</th>
				<th>Edit</th>
        <th>Delete</th>
			</thead>
			<tbody id="blogTableTbody" class="text-center">
				
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

<!-- add Blog html code start form here -->
<div class="modal  ml-auto fade" id="blogaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h4>Blog Add Modal</h4>
      </div>
       <div class="modal-body text-center">
          <div class="form-group blogaddpost">
            <input type="text" id="Blogname" placeholder="Blog Name" class="form-control">
            <br>
            <input type="file" id="BlogImg" class="form-control">
            <br>
            <img src="{{asset('storage/download.jpg')}}" id="BlogPreviewImg" style="width: 130px;height: 130px;">
          </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="BlogAddBtn" type="button" class="btn btn-primary">Add</button>
      </div>
     </div>
   </div>
 </div>


 <!-- About data Edit modal -->
<div class="modal  ml-auto fade" id="blogEditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h4>Blog Data Show</h4>
        <div class="blogEditDib text-center">
            <div class="showId">
              <h3 id="blogId"></h3>
            </div>
          </div>
      </div>
       <div class="modal-body text-center">
          <div class="form-group d-none blogEditData">
            <input type="text" id="blogName" placeholder="About Name" class="form-control">
            <br>
            <input type="file" id="blogNewimg" class="form-control">
            <br>
            <img src="" id="blogOldPath">
          </div>
          <img class="detailsLoader" src="{{asset('img/Spinner.gif')}}">
           <h3 class="aboutNothing d-none">Nothing About Data</h3>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="blogUpdateBtn" type="button" class="btn btn-primary">Update</button>
      </div>
     </div>
   </div>
 </div>


<!-- Blog Delete Modal Show -->
<div class="modal  ml-auto fade" id="blogDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h4>Are Want Blog Data And Image Delete</h4>
      </div>
       <div class="modal-body text-center">
          <div class="form-group aboutDelete">
           <div class="showId">
             <h3 class="blogdeleteId"></h3>
           </div>
           <br>
            <img src="" id="BlogDeleteImg">
          </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="blogDeleteBtn" type="button" class="btn btn-primary">Delete</button>
      </div>
     </div>
   </div>
 </div>
@endsection

@section('script')
  <script type="text/javascript">
      var spenner = "<div class='spinner-border text-warning' role='status'></div>";
        getBlog();
        function getBlog() {
          var url = '/admin/getBlog';
            axios.get(url)
            .then(function (response) {
              if (response.status == 200) {
                $('.blogPageDiv').removeClass('d-none');
                 $('#loader').addClass('d-none');

                  $('#BlogDataTable').DataTable().destroy();

                $('#blogTableTbody').empty();

                var getBlog = response.data;
                $.each(getBlog,function(i) {
                  var id = "<td>"+getBlog[i].id+"</td>";
                  var name = "<td>"+getBlog[i].name+"</td>";
                   var img = "<td><img class='BlogImg' src='"+getBlog[i].img+"'></td>";
                   var date = "<td>"+getBlog[i].date+"</td>";
                  var edit = "<td class='editTd'><a class='tda BlogEdit' data-id='"+getBlog[i].id+"'>Edit</a></td>";
                  var deleted = "<td class='deleteTd'><a class='tda BlogDelete' data-id='"+getBlog[i].id+"' data-img='"+getBlog[i].img+"'>Delete</a></td>";
                  $('<tr>').html(id+name+img+date+edit+deleted).appendTo('#blogTableTbody');
                })
                $('.BlogEdit').click(function() {
                  var id = $(this).data('id');
                  blogShowData(id);
                  $('#blogEditModal').modal('show');
                })

                $('.BlogDelete').click(function() {
                  var id = $(this).data('id');
                  var img = $(this).data('img');
                  $('.blogdeleteId').html(id);
                  $('#BlogDeleteImg').attr('src',img);
                  $('#blogDeleteModal').modal('show');

                })


                  $('#BlogDataTable').DataTable();
                   $('.datatablees_length').addClass('bs-select');


              } else {
                 $('#resumeNothing').removeClass('d-none');
                 $('#loader').addClass('d-none');
              }
              
            })
            .catch(function (error) {
               $('#resumeNothing').removeClass('d-none');
                 $('#loader').addClass('d-none');
            });
        }


        $(document).ready(()=>{
          $('#BlogImg').change(function(){
            const file = this.files[0];
            if (file){
              let reader = new FileReader();
              reader.onload = function(event){
                console.log(event.target.result);
                $('#BlogPreviewImg').attr('src', event.target.result);
              }
              reader.readAsDataURL(file);
            }
          });
        });


        $('#AddBlogId').on('click',function() {
          $('#blogaddmodal').modal('show');
        })

        $('#BlogAddBtn').click(function(event) {
          var name = $('#Blogname').val();
          var img = $('#BlogImg').prop('files')[0];

           addBlog(name,img);
        })

        function addBlog(name,img) {
         
          if (name.length == false) {
            toastr.error('Please Your Blog Name');
          } else{
            $('#BlogAddBtn').html(spenner);
            var url = '/admin/AddBlog';
            var formData = new FormData();
            formData.append('name',name);
            formData.append('img',img);

            axios.post(url,formData)
            .then(function (response) {
               $('#BlogAddBtn').html('Add Success');
              if (response.status == 200) {
                setTimeout(()=>{
                   $('#BlogAddBtn').html('Add');
                })
                toastr.success('Blog Data Add Success');
                $('#blogaddmodal').modal('hide');
                getBlog();
              } else {
                $('#BlogAddBtn').html('Add Faild');
                setTimeout(()=>{
                   $('#BlogAddBtn').html('Add');
                })
                toastr.success('Blog Data Add Faild');
                $('#blogaddmodal').modal('hide');
                getBlog();
              }
            })
            .catch(function (error) {
              $('#BlogAddBtn').html('Add Faild');
                setTimeout(()=>{
                   $('#BlogAddBtn').html('Add');
                })
                toastr.success('Blog Data Add Faild');
                $('#blogaddmodal').modal('hide');
                getBlog();
            });

          }
        }


        $(document).ready(()=>{
          $('#blogNewimg').change(function(){
            const file = this.files[0];
            if (file){
              let reader = new FileReader();
              reader.onload = function(event){
                console.log(event.target.result);
                $('#blogOldPath').attr('src', event.target.result);
              }
              reader.readAsDataURL(file);
            }
          });
        });


        function blogShowData(id) {
          var url = '/admin/BlogEditShow';
          var data = {id:id};

           axios.post(url,data)
             .then(function(response) {
              if (response.status == 200) {
                $('.blogEditData').removeClass('d-none');
                $('.detailsLoader').addClass('d-none');

                var blogDetailsData = response.data;
                $('#blogId').html(blogDetailsData[0].id)
                $('#blogName').val(blogDetailsData[0].name);
                $('#blogOldPath').attr('src',blogDetailsData[0].img);

              } else {
                $('.aboutNothing').removeClass('d-none');
                $('.detailsLoader').addClass('d-none');
              }
             })
             .catch(function(error) {
              $('.aboutNothing').removeClass('d-none');
              $('.detailsLoader').addClass('d-none');
             })
        }

        $('#blogUpdateBtn').on('click',function() {
            

               var id = $('#blogId').html()
                var name = $('#blogName').val();
                var NewImg = $('#blogNewimg').prop('files')[0];
               var OldImg = $('#blogOldPath').attr('src');

               blogUpdate(id,name,NewImg,OldImg);
        });  

        function blogUpdate(id,name,NewImg,OldImg) {
          $('#blogUpdateBtn').html(spenner);
            var formData = new FormData();

            formData.append('id',id);
             formData.append('Name',name);
             formData.append('NewImg',NewImg);
            formData.append('oldImg',OldImg);
            
            var updateurl = '/admin/BlogUpdate';
             axios.post(updateurl,formData)
           .then(function(response) {
            if (response.status == 200) {
                $('#blogUpdateBtn').html('Update');
                setTimeout(()=>{
                  $('#blogUpdateBtn').html('Update');
                });
                $('#blogEditModal').modal('hide');
                toastr.success('Blog Data Update Success');
               getBlog();
            } else {
                
                setTimeout(()=>{
                  $('#blogUpdateBtn').html('Update');
                });
                $('#blogEditModal').modal('hide');
                toastr.error('Blog Data Update Faild');
                getBlog();
            }
           })
           .catch(function(error) {
              $('#blogUpdateBtn').html('Update Faild');
              setTimeout(()=>{
                $('#blogUpdateBtn').html('Update');
              });
               $('#blogEditModal').modal('hide');
              toastr.error('Blog Data Update Faild');
              getBlog();
           })
        }

        $('#blogDeleteBtn').click(function() {
          $('#blogDeleteBtn').html(spenner);

          var id = $('.blogdeleteId').html();
          var img = $('#BlogDeleteImg').attr('src');
           BlogDelete(id,img);

        })

        function BlogDelete(id,img) {
          $('#blogDeleteBtn').html(spenner);
          var url = '/admin/BlogDelete';
          var data = {id:id,imgPath:img};



            axios.post(url,data)
            .then(function (response) {
               $('#blogDeleteBtn').html('Delete Success');
              if (response.status == 200) {
                setTimeout(()=>{
                   $('#blogDeleteBtn').html('Delete');
                })
                toastr.success('Blog Data Delete Success');
                $('#blogDeleteModal').modal('hide');
                getBlog();
              } else {
                $('#blogDeleteBtn').html('Delete Faild');
                setTimeout(()=>{
                   $('#blogDeleteBtn').html('Add');
                })
                toastr.success('Blog Data Add Faild');
                $('#blogDeleteModal').modal('hide');
                getBlog();
              }
            })
            .catch(function (error) {
              $('#blogDeleteBtn').html('Delete Faild');
                setTimeout(()=>{
                   $('#blogDeleteBtn').html('Add');
                })
                toastr.success('Blog Data Add Faild');
                $('#blogDeleteModal').modal('hide');
                getBlog();
            });

        }



  </script>
@endsection