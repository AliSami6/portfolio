@extends('Layout.app')
@section('title','Service')
@section('content')
    
<div id="mainDiv" class="container d-none">
  <div class="row">
    <div class="col-md-12 p-5">
        <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm">Image</th>
              <th class="th-sm">Name</th>
              <th class="th-sm">Description</th>
              <th class="th-sm">Edit</th>
              <th class="th-sm">Delete</th>
            </tr>
          </thead>
          <tbody id="servicetable">
            
          </tbody>
        </table>
    </div>
  </div>
</div>



<div id="loaderDiv" class="container">
  <div class="row">
    <div class="col-md-12 text-center p-5">
        <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
    </div>
  </div>
</div>



<div id="WrongDiv" class="container d-none">
  <div class="row">
    <div class="col-md-12 text-center p-5">
      <h3>Something Went Wrong !</h3>
    </div>
  </div>
</div>



@endsection

@section('script')

<script type="text/javascript">
  
  getServiceData();
</script>

@endsection