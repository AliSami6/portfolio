
@extends('Layout.app')
@section('content')


<div id="mainDivContact" class="container  d-none">
	<div class="row">
		<div class="col-md-12 p-3">
		
			<table id="ContactDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
			  <thead>
			    <tr>
	  			  <th class="th-sm">Name</th>
                    <th class="th-sm">Mobile</th>
                    <th class="th-sm">Email</th>
                    <th class="th-sm">Message</th>
                    <th class="th-sm">Delete</th>
    			</tr>
			  </thead>
			  <tbody id="Contact_table">
					
			  </tbody>
			</table>
		</div>
	</div>
</div>



<div id="loaderDivContact" class="container">
	<div class="row">
		<div class="col-md-12 text-center p-5">
			<img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
		</div>
	</div>
</div>


<div id="WrongDivContact" class="container d-none">
	<div class="row">
		<div class="col-md-12 text-center p-5">
			<h3>Something Went Wrong !</h3>
		</div>
	</div>
</div>

  



<div class="modal fade" id="deleteContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body p-3 text-center">
        <h5 class="mt-4">Do You Want To Delete?</h5>
        <h5 id="ContactDeleteId" class="mt-4 d-none">   </h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
        <button  id="ContactDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
  
getContactData();

// For Contact Table
function getContactData() {
    axios.get('/getContactData')
        .then(function(response) {
            if (response.status == 200) {

                $('#mainDivContact').removeClass('d-none');
                $('#loaderDivContact').addClass('d-none');
                $('#ContactDataTable').DataTable().destroy();

                $('#Contact_table').empty();
                var dataJSON = response.data;

                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(
                        "<td>" + dataJSON[i].contact_name + "</td>" +
                        "<td>" + dataJSON[i].contact_mobile + "</td>" +
                        "<td>" + dataJSON[i].contact_email + "</td>" +
                        "<td>" + dataJSON[i].contact_msg + "</td>" +
                        "<td><a  class='ContactDeleteBtn' data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#Contact_table');
                });

                // Contact Table Delete Icon Click
                $('.ContactDeleteBtn').click(function() {
                    var id = $(this).data('id');
                    $('#ContactDeleteId').html(id);
                    $('#deleteContactModal').modal('show');
                })


               

                $('#ContactDataTable').DataTable({
                    "order": false
                });
                $('.dataTables_length').addClass('bs-select');

            } else {

                $('#loaderDivContact').addClass('d-none');
                $('#WrongDivContact').removeClass('d-none');
            }

        }).catch(function(error) {

            $('#loaderDivContact').addClass('d-none');
            $('#WrongDivContact').removeClass('d-none');
        });

}


// Course Delete Confirm 
$('#ContactDeleteConfirmBtn').click(function() {
    var id = $('#ContactDeleteId').html();
    ContactDelete(id);
})


// Course Delete
function ContactDelete(deleteID) {
    $('#ContactDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....

    axios.post('/ContactDelete', {
            id: deleteID
        })
        .then(function(response) {
            $('#ContactDeleteConfirmBtn').html("Yes");
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#deleteContactModal').modal('hide');
                    toastr.success('Delete Success');
                    getContactData();
                } else {
                    $('#deleteContactModal').modal('hide');
                    toastr.error('Delete Fail');
                    getContactData();
                }

            } else {
                $('#deleteContactModal').modal('hide');
                toastr.error('Something Went Wrong !');
            }

        })
        .catch(function(error) {
            $('#deleteContactModal').modal('hide');
            toastr.error('Something Went Wrong !');
        });

}


</script>

@endsection

