@extends('layout.admin')
 @section('title','Admin | Visitor') 
 @section('content') 
 <div class="visiTorPage" id="visiTorPage">
  <div class="tableTableDiv mt-3 visitorTable">
    <table id="VisitTable" class="table table-bordered table-hover table-striped">
      <thead class="bg-warning">
        <tr>
          <th>Sr</th>
          <th>IP</th>
          <th>Date & Time</th>
        </tr>
      </thead>
      <tbody id="visitorTableBody">
        
      </tbody>
    </table>
  </div>
</div>

<!-- loader html for code start form here -->
<div class="row p-5" id="visitLoader">
  <div class="col-12 text-center">
    <img src="{{asset('img/Spinner.gif')}}">
  </div>
</div>
<div class="row d-none mt-5 " id="visitnothingImgRow">
  <div class="col-12 text-center nothingImgRow">
    <img src="{{asset('img/nothing.webp')}}">
  </div>
</div> 
<!-- loader html for code end form here -->

@endsection 
@section('script') 
<script type="text/javascript">
  visitGetData();

   var visitSpenner = "<div class='spinner-border text-warning' role='status'></div>";
   function visitGetData() {
     var url = '/admin/getvisitor';
     axios.get(url)
     .then(function(response) {
      if (response.status == 200) {
          $('#visiTorPage').removeClass('d-none');
          $('#visitLoader').addClass('d-none');
          
           var visitJsonData = response.data;
           $.each(visitJsonData,function(i) {
            var id = "<td>"+visitJsonData[i].id+"</td>";
            var visit = "<td>"+visitJsonData[i].visitor+"</td>";
            var date = "<td>"+visitJsonData[i].date+"</td>";
             $('<tr>').html(id+visit+date).appendTo('#visitorTableBody')
           });

           $('#VisitTable').DataTable();
           $('.datatablees_length').addClass('bs-select');
      } else {
          $('#visitLoader').addClass('d-none');
          $('#visitnothingImgRow').removeClass('d-none');
          
      }
     })
     .catch(function (error) {
         $('#visitLoader').addClass('d-none');
          $('#visitnothingImgRow').removeClass('d-none');
      });
   }
</script> 
@endsection