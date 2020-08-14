<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@extends('master')

@section('content')
  <!-- <h2>Create New Student</h2> -->

  <div class="card">
    <div class="card-header">
      Create New Student
    </div>
    <div class="card-body">

  <form class="form-horizontal" id="userInfo" action="{{route('store')}}" method="post" enctype="multipart/form-data" data-parsley-validate>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
@endif

  @if (Session::has('success'))
    <div class="alert alert-success">
      <p>{{ Session::get('success') }}</p>
    </div>
   @endif 


    {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" required>
    
  </div>

  <div class="form-group">
    <label for="phone">Phone No.</label>
    <input data-parsley-type="number" class="form-control" name="phone" id="phone" maxlength="11" required>
    
  </div>

  <div class="form-group">
    <label for="fname">Father's Name</label>
    <input type="text" class="form-control" name="fname" id="fname"  maxlength="50" required>
    
  </div>

  <div class="form-group">
    <label for="mname">Mother's Name</label>
    <input type="text" class="form-control" name="mname" id="fname"  maxlength="50" required>
    
  </div>

  <!-- <div class="form-group">
    <label for="degree">Education Level</label>
    <input type="text" class="form-control" name="degree" id="degree" required>
    
  </div> -->
<div class="form-group">
  <label for="degree">Education Level</label>
  <div class="input-group">
    
  <select class="custom-select" id="inputGroupSelect04" name="degree_id" aria-label="Example select with button addon"  required>   <!-- onChange="checkOption(this)" -->
    <option value="A">Choose Degree</option>
    @foreach ($degree_masters as $degree_master)
    <!-- <option selected>Choose Degree</option> -->
    <option value="{{$degree_master->id}}">{{$degree_master->degree_name}}</option>
    <!-- <option value="2">O LEVEL</option>
    <option value="3">A LEVEL</option> -->
    @endforeach
  </select>
  <div class="input-group-append">
    <!-- <div class="form-group"> -->
    <label for="point">Result(Point)</label> 
    <input data-parsley-type="number" class="form-control" name="point" id="point" disabled required>
    
  <!-- </div> -->
  <!-- <button type="button" name="add" id="add" class="btn btn-success btn-sm add">+</button> -->
      <!-- </tr> -->
    <!-- <button class="btn btn-outline-secondary" type="button">Button</button> --> 

   </div>  
</div>

<button type="button" name="add" id="add" class="btn btn-success btn-sm add">+</button>

</div>


<script type="text/javascript">
  
  $(document).ready(function(){

 $('#add').click(function(){

  // Create clone of <div class='input-form'>
  var newel = $('.input-group:last').clone(true);

  // Add after last <div class='input-form'>
  $(newel).insertAfter(".input-group:last");
 });

});

  var form = document.getElementById('userInfo'), 
    degree_id = form.elements.degree_id;

    degree_id.onchange = function () {
    var form = this.form;
    if (this.selectedIndex === 1 || this.selectedIndex === 2|| this.selectedIndex === 3|| this.selectedIndex === 4|| this.selectedIndex === 5|| this.selectedIndex === 6|| this.selectedIndex === 7|| this.selectedIndex === 8) {
        form.elements.point.disabled = false;
    } else {
        form.elements.point.disabled = true;
    }
};
</script>





<!-- <script type="text/javascript">
        function checkOption(obj) {
            var input = document.getElementById("point");
            input.disabled = obj.value == "A";
        }
    </script> -->

  

  <div class="form-group">
    <label for="student_image">Student Image</label>
    <div class="row">
      <div class="col-md-4">
        <input type="file" class="form-control" name="student_image[]" id="student_image" >
      </div>
      <div class="col-md-4">
        <input type="file" class="form-control" name="student_image[]" id="student_image" >
      </div>
      <div class="col-md-4">
        <input type="file" class="form-control" name="student_image[]" id="student_image" >
      </div>
      <div class="col-md-4">
        <input type="file" class="form-control" name="student_image[]" id="student_image" >
      </div>
      <div class="col-md-4">
        <input type="file" class="form-control" name="student_image[]" id="student_image" >
      </div>
    </div>
    
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>

</form>

<!-- <script>  
        function enable_disable() { 
            $("point").prop('disabled', false); 
        } 
</script> -->
</div>
</div>

@endsection



    