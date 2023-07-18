@extends('layout.admin')
@section('title','Admin | About')
@section('content')
 <div class="aboutPageDiv d-none">
  <div class="aboutAddPost">
    <button class="aboutAddPostButton"><i class="fas fa-add"></i>Add Work</button>
  </div>
  <div class="aboutTableDiv">
    <table id="aboutDataTable" class="table table-bordered table-hover table-striped">
      <thead class="text-center">
        <th>Name</th>
        <th>Name Title</th>
        <th>Photo</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
      </thead>
      <tbody id="aboutTableTbody" class="text-center">
        
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

<!-- About data Edit modal -->
<div class="modal  ml-auto fade" id="aboutEditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h4>About Data Show</h4>
        <div class="aboutEditDib text-center">
            <h4 id="aboutEditText"></h4>
            <div class="aboutShowid">
              <h3 id="aboutId"></h3>
            </div>
          </div>
      </div>
       <div class="modal-body text-center">
          <div class="form-group d-none aboutEditData">
            
            <input type="text" id="aboutName" placeholder="About Name" class="form-control">
            <br>
            <textarea id="aboutNameTitle" class="form-control" placeholder="About Update Title"> </textarea>
            <br>
            <input type="file" id="aboutNewimg" class="form-control">
            <br>
            <img src="" id="AboutdetailsImg">
          </div>
          <img class="detailsLoader" src="{{asset('img/Spinner.gif')}}">
           <h3 class="aboutNothing d-none">Nothing About Data</h3>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="aboutUpdateBtn" type="button" class="btn btn-primary">Update</button>
      </div>
     </div>
   </div>
 </div>

<!-- About Add Post Modal Show -->
<div class="modal  ml-auto fade" id="aboutAddModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h4>About Add Post</h4>
      </div>
       <div class="modal-body text-center">
          <div class="form-group aboutAddPost">
            
            <input type="text" id="aboutAddName" placeholder="About Name" class="form-control">
            <br>
            <textarea id="aboutAddtitle" class="form-control" placeholder="About Add Title"></textarea>
            <br>
            <input type="file" id="aboutAddImg" class="form-control" accept="image/*">
            <br>
            <img src="{{asset('storage/download.jpg')}}" id="aboutAddImgPreview">
          </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="aboutAddPostBtn" type="button" class="btn btn-primary">Add</button>
      </div>
     </div>
   </div>
 </div>

<!-- About Delete Modal Show -->
<div class="modal  ml-auto fade" id="aboutDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
        <h4>Are Want About Data And Image Delete</h4>
      </div>
       <div class="modal-body text-center">
          <div class="form-group d-none aboutDelete">
           <div id="aboutDeleteDiv">
             <h3 class="aboutDeleteId"></h3>
           </div>
            <img src="" id="aboutDeleteImg">
          </div>
          <img class="detailsLoader" src="{{asset('img/Spinner.gif')}}">
           <h3 class="aboutDeleteNothing d-none">Nothing About Delete Data</h3>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">No</button>
         <button id="aboutDeleteBtn" type="button" class="btn btn-primary">Delete</button>
      </div>
     </div>
   </div>
 </div>

@endsection

@section('script')
  <script type="text/javascript">
    getAboutdata();



var spenner = "<div class='spinner-border text-warning' role='status'></div>";
function getAboutdata() {
      var url = '/admin/getabout';
      axios.get(url)
      .then(function(response) {
        if (response.status == 200) {
          $('.aboutPageDiv').removeClass('d-none');
          $('#loader').addClass('d-none');

          $('#aboutDataTable').DataTable().destroy();
          $('#aboutTableTbody').empty();

          var aboutData = response.data;
          $.each(aboutData,function(i) {
           var name = "<td>"+aboutData[i].name+"</td>";
           var nameTitle = "<td>"+aboutData[i].nameTitle+"</td>";
           var img =  "<td><img class='abouttdimg' src='"+aboutData[i].img+"'></td>";
           var date = "<td>"+aboutData[i].date+"</td>";
           var edit = "<td class='editTd'><a class='tda aboutEdit' data-id='"+aboutData[i].id+"'>Edit</a></td>";
           var deleted = "<td class='deleteTd'><a class='tda aboutDelete' data-id='"+aboutData[i].id+"'>Delete</a></td>";
           
           $('<tr>').html(name+nameTitle+img+date+edit+deleted).appendTo('#aboutTableTbody');
          })

          $('.aboutEdit').click(function() {
            var id = $(this).data('id');
            aboutEdit(id);
            $('#aboutEditModal').modal('show');
          });

          $('.aboutDelete').click(function() {
            var id = $(this).data('id');
            aboutDeleteShow(id);
            $('#aboutDeleteModal').modal('show');
          })


           $('#aboutDataTable').DataTable();
           $('.datatablees_length').addClass('bs-select');

        } else {
          $('#visitnothingImgRow').removeClass('d-none');
          $('#loader').addClass('d-none');
        }

      })
      .catch(function(error){
        $('#visitnothingImgRow').removeClass('d-none');
          $('#loader').addClass('d-none');
      })
    }

//about add post for js code

$(document).ready(()=>{
  $('#aboutAddImg').change(function(){
    const file = this.files[0];
    if (file){
      let reader = new FileReader();
      reader.onload = function(event){
        console.log(event.target.result);
        $('#aboutAddImgPreview').attr('src', event.target.result);
      }
      reader.readAsDataURL(file);
    }
  });
});

$('.aboutAddPostButton').on('click',function() {
  $('#aboutAddModal').modal('show');
})

$('#aboutAddPostBtn').on('click',function() {

  var name = $('#aboutAddName').val();
  var title = $('#aboutAddtitle').val();
  var img = $('#aboutAddImg').prop('files')[0];

  var url = '/admin/addAbout';
  
  if (name.length == false) {
    toastr.warning('About Post Name');
  } else if (title.length == false) {
    toastr.warning('About Post Title');
  }else{
    $('#aboutAddPostBtn').html(spenner);
    
    var formdata = new FormData();

    formdata.append('name',name);
    formdata.append('title',title);
    formdata.append('img',img);

    axios.post(url,formdata)
    .then(function(response) {
      $('#aboutAddPostBtn').html('Add Success');
      setTimeout(()=>{
        $('#aboutAddPostBtn').html('Add');
      });
      toastr.success('About Post Add Success');
      $('#aboutAddModal').modal('hide');
      getAboutdata();
      
    })
    .catch(function(error) {
      $('#aboutAddPostBtn').html('Add Faild');
      setTimeout(()=>{
        $('#aboutAddPostBtn').html('Add');
      });
      toastr.error('About Post Add Faild');
      $('#aboutAddModal').modal('hide');
      getAboutdata();
    })
    
  }


})




$(document).ready(()=>{
  $('#aboutNewimg').change(function(){
    const file = this.files[0];
    if (file){
      let reader = new FileReader();
      reader.onload = function(event){
        console.log(event.target.result);
        $('#AboutdetailsImg').attr('src', event.target.result);
      }
      reader.readAsDataURL(file);
    }
  });
});

// about data show
function aboutEdit(id) {
   var url = '/admin/aboutDataShow';
   var data = {id:id};

   axios.post(url,data)
   .then(function(response) {
    if (response.status == 200) {
      $('.aboutEditData').removeClass('d-none');
      $('.detailsLoader').addClass('d-none');

      var aboutDetailsData = response.data;
      $('#aboutId').html(aboutDetailsData[0].id)
      $('#aboutName').val(aboutDetailsData[0].name);
      $('#aboutNameTitle').val(aboutDetailsData[0].nameTitle);
      $('#AboutdetailsImg').attr('src',aboutDetailsData[0].img);


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

//about data update

$('#aboutUpdateBtn').on('click',function() {
  
    $('#aboutUpdateBtn').html(spenner);

  var id = $('#aboutId').html();
  var name = $('#aboutName').val();
  var title = $('#aboutNameTitle').val();
  var NewImg = $('#aboutNewimg').prop('files')[0];
  var oldImg = $('#AboutdetailsImg').attr('src');
  
  var formdata = new FormData();

   formdata.append('id',id);
   formdata.append('name',name);
   formdata.append('title',title);
   formdata.append('NewImg',NewImg);
   formdata.append('oldImg',oldImg);

   var url = '/admin/aboutUpdate';

   axios.post(url,formdata)
   .then(function(response) {
    if (response.status == 200) {
      $('#aboutUpdateBtn').html('Update');
      setTimeout(()=>{
        $('#aboutUpdateBtn').html('Update');
      });
      $('#aboutEditModal').modal('hide');
      toastr.success('About Data Update Success');
      getAboutdata();
    } else {
      $('#aboutUpdateBtn').html('Update');
      setTimeout(()=>{
        $('#aboutUpdateBtn').html('Update');
      });
      $('#aboutEditModal').modal('hide');
      toastr.error('About Data Update Faild');
      getAboutdata();
    }
   })
   .catch(function(error) {
    $('#aboutUpdateBtn').html('Update');
    setTimeout(()=>{
      $('#aboutUpdateBtn').html('Update');
    });
    $('#aboutEditModal').modal('hide');
    toastr.error('About Data Update Faild');
    getAboutdata();
   })
  
})

// about delete for js code
function aboutDeleteShow(id) {
  var url = '/admin/aboutDeleteShow';
  var data = {id:id};

  axios.post(url,data)
  .then(function(response) {
    if (response.status ==200) {
      $('.aboutDelete').removeClass('d-none');
      $('.detailsLoader').addClass('d-none');
      
      var aboutDeleteShow = response.data;
      $('.aboutDeleteId').html(aboutDeleteShow[0].id);
      $('#aboutDeleteImg').attr('src',aboutDeleteShow[0].img);
    }else{
      $('.aboutDeleteNothing').removeClass('d-none');
      $('.detailsLoader').addClass('d-none');
    }
  })
  .catch(function(error) {
    $('.aboutDeleteNothing').removeClass('d-none');
    $('.detailsLoader').addClass('d-none');
  })
}

$('#aboutDeleteBtn').click(function() {
  $('#aboutDeleteBtn').html(spenner);
  var id = $('.aboutDeleteId').html();
  var imgPath = $('#aboutDeleteImg').attr('src');

  var url = '/admin/aboutDelete';
  var formdata = new FormData();

  formdata.append('id',id);
  formdata.append('imgPath',imgPath);

  axios.post(url,formdata)
   .then(function(response) {
    if (response.status == 200) {
      setTimeout(()=>{
        $('#aboutDeleteBtn').html('Delete');
      });
      $('#aboutDeleteModal').modal('hide');
      toastr.success('About Data Delete Success');
      getAboutdata();
    } else {
      setTimeout(()=>{
        $('#aboutDeleteBtn').html('Update');
      });
      $('#aboutDeleteModal').modal('hide');
      toastr.error('About Data Delete Faild');
      getAboutdata();
    }
   })
   .catch(function(error) {
    setTimeout(()=>{
      $('#aboutDeleteBtn').html('Update');
    });
    $('#aboutDeleteModal').modal('hide');
    toastr.error('About Data Delete Faild');
    getAboutdata();
   })


  
})

    
  </script>
@endsection