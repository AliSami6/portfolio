$(document).ready(function () {
$('#VisitorDt').DataTable();
$('.dataTables_length').addClass('bs-select');
});


function getServiceData(){
	axios.post('/getServiceData')
  .then(function (response) {
  	if (response.status == 200){

  		$('#mainDiv').removeClass('d-none');
        $('#loaderDiv').addClass('d-none');

  		var dataJSON=response.data;
	    console.log(dataJSON)
	    $.each(dataJSON, function(i, item) {
	    $('<tr>').html(
	      "<td>" + dataJSON[i].service_name +"</td>"+
	      "<td>" + dataJSON[i].service_des +"</td>"+
	      "<td>" + dataJSON[i].service_img +"</td>"+
	      "<td><a href=''><i class='fas fa-edit'></i></a></td>"+
	      "<td><a data-toggle='modal' data-target='#deleteModal'><i class='fas fa-trash-alt'></i></a></td>"
	      ).appendTo('#servicetable');
	   });
  	}else{

  		$('#loaderDiv').addClass('d-none');
        $('#WrongDiv').removeClass('d-none');
  	}
	    

}).catch(function (error) {
	
  $('#loaderDiv').addClass('d-none');
  $('#WrongDiv').removeClass('d-none');
});

}