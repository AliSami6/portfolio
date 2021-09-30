// For Courses Table
function getCoursesData() {
    axios.post('/getCoursesData')
        .then(function(response) {
            if (response.status == 200) {

                $('#mainDivCourse').removeClass('d-none');
                $('#loaderDivCourse').addClass('d-none');
                $('#courseDataTable').DataTable().destroy();

                $('#course_table').empty();
                var dataJSON = response.data;

                $.each(dataJSON, function(i, item) {
                    $('<tr>').html(
                        "<td>" + dataJSON[i].course_name + "</td>" +
                        "<td>" + dataJSON[i].course_fee + "</td>" +
                        "<td>" + dataJSON[i].course_totalclass + "</td>" +
                        "<td>" + dataJSON[i].course_totalenroll + "</td>" +
                        "<td><a  class='courseEditBtn'  data-id=" + dataJSON[i].id + "><i class='fas fa-edit'></i></a></td>" +
                        "<td><a  class='courseDeleteBtn' data-id=" + dataJSON[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#course_table');
                });

                // Courses Table Delete Icon Click
                $('.courseDeleteBtn').click(function() {
                    var id = $(this).data('id');
                    $('#CourseDeleteId').html(id);
                    $('#deleteCourseModal').modal('show');
                })


                // Courses Table Edit Icon Click
                $('.courseEditBtn').click(function() {
                    var id = $(this).data('id');
                    CourseUpdateDetails(id);
                    $('#courseEditId').html(id);
                    $('#updateCourseModal').modal('show');

                })

                $('#courseDataTable').DataTable({
                    "order": false
                });
                $('.dataTables_length').addClass('bs-select');

            } else {

                $('#loaderDivCourse').addClass('d-none');
                $('#WrongDivCourse').removeClass('d-none');
            }

        }).catch(function(error) {

            $('#loaderDivCourse').addClass('d-none');
            $('#WrongDivCourse').removeClass('d-none');
        });

}


// Course Add New btn Click


$('#addNewCourseBtnId').click(function() {
    $('#addCourseModal').modal('show');
});


// Courses Add Modal Save Btn
$('#CourseAddConfirmBtn').click(function() {
    var CourseName = $('#CourseNameId').val();
    var CourseDes = $('#CourseDesId').val();
    var CourseFee = $('#CourseFeeId').val();
    var CourseEnroll = $('#CourseEnrollId').val();
    var CourseClass = $('#CourseClassId').val();
    var CourseLink = $('#CourseLinkId').val();
    var CourseImg = $('#CourseImgId').val();

    CourseAdd(CourseName, CourseDes, CourseFee, CourseEnroll, CourseClass, CourseLink, CourseImg);
})


// Course Add Method

function CourseAdd(CourseName, CourseDes, CourseFee, CourseEnroll, CourseClass, CourseLink, CourseImg) {

    if (CourseName.length == 0) {
        toastr.error('Course Name is Empty !');
    } else if (CourseDes.length == 0) {
        toastr.error('Course Description is Empty !');
    } else if (CourseFee.length == 0) {
        toastr.error('Course Fee is Empty !');
    } else if (CourseEnroll.length == 0) {
        toastr.error('Course Enroll is Empty !');
    } else if (CourseClass.length == 0) {
        toastr.error('Course Class is Empty !');
    } else if (CourseLink.length == 0) {
        toastr.error('Course Link is Empty !');
    } else if (CourseImg.length == 0) {
        toastr.error('Course Image is Empty !');
    } else {
        $('#CourseAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
        axios.post('/CoursesAdd', {
                course_name: CourseName,
                course_des: CourseDes,
                course_fee: CourseFee,
                course_totalenroll: CourseEnroll,
                course_totalclass: CourseClass,
                course_link: CourseLink,
                course_img: CourseImg,

            })
            .then(function(response) {
                $('#CourseAddConfirmBtn').html("Save");

                if (response.status == 200) {

                    if (response.data == 1) {
                        $('#addCourseModal').modal('hide');
                        toastr.success('Add Success');
                        getCoursesData();
                    } else {
                        $('#addCourseModal').modal('hide');
                        toastr.error('Add Fail');
                        getCoursesData();
                    }
                } else {
                    $('#addCourseModal').modal('hide');
                    toastr.error('Something Went Wrong !');
                }

            })
            .catch(function(error) {
                $('#addCourseModal').modal('hide');
                toastr.error('Something Went Wrong !');
            });

    }

}

// Course Delete Confirm 
$('#CourseDeleteConfirmBtn').click(function() {
    var id = $('#CourseDeleteId').html();
    CourseDelete(id);
})


// Course Delete
function CourseDelete(deleteID) {
    $('#CourseDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....

    axios.post('/CoursesDelete', {
            id: deleteID
        })
        .then(function(response) {
            $('#CourseDeleteConfirmBtn').html("Yes");
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#deleteCourseModal').modal('hide');
                    toastr.success('Delete Success');
                    getCoursesData();
                } else {
                    $('#deleteCourseModal').modal('hide');
                    toastr.error('Delete Fail');
                    getCoursesData();
                }

            } else {
                $('#deleteCourseModal').modal('hide');
                toastr.error('Something Went Wrong !');
            }

        })
        .catch(function(error) {
            $('#deleteCourseModal').modal('hide');
            toastr.error('Something Went Wrong !');
        });

}



// Course Update

function CourseUpdateDetails(detailsID) {
    axios.post('/CoursesDetails', {
            id: detailsID
        })
        .then(function(response) {

            if (response.status == 200) {
                $('#courseEditForm').removeClass('d-none');
                $('#courseEditLoader').addClass('d-none');
                var jsonData = response.data;
                $('#CourseNameUpdateId').val(jsonData[0].course_name);
                $('#CourseDesUpdateId').val(jsonData[0].course_des);
                $('#CourseFeeUpdateId').val(jsonData[0].course_fee);
                $('#CourseEnrollUpdateId').val(jsonData[0].course_totalenroll);
                $('#CourseClassUpdateId').val(jsonData[0].course_totalclass);
                $('#CourseLinkUpdateId').val(jsonData[0].course_link);
                $('#CourseImgUpdateId').val(jsonData[0].course_img);
            } else {
                $('#courseEditLoader').addClass('d-none');
                $('#courseEditWrong').removeClass('d-none');
            }
        })
        .catch(function(error) {
            $('#courseEditLoader').addClass('d-none');
            $('#courseEditWrong').removeClass('d-none');
        });

}

$('#CourseUpdateConfirmBtn').click(function() {
    var courseID = $('#courseEditId').html();
    var courseName = $('#CourseNameUpdateId').val();
    var courseDes = $('#CourseDesUpdateId').val();
    var courseFee = $('#CourseFeeUpdateId').val();
    var courseEnroll = $('#CourseEnrollUpdateId').val();
    var courseClass = $('#CourseClassUpdateId').val();
    var courseLink = $('#CourseLinkUpdateId').val();
    var courseImg = $('#CourseImgUpdateId').val();
    CourseUpdate(courseID, courseName, courseDes, courseFee, courseEnroll, courseClass, courseLink, courseImg);
})

function CourseUpdate(courseID, courseName, courseDes, courseFee, courseEnroll, courseClass, courseLink, courseImg) {

    if (courseName.length == 0) {
        toastr.error('Course Name is Empty !');
    } else if (courseDes.length == 0) {
        toastr.error('Course Description is Empty !');
    } else if (courseFee.length == 0) {
        toastr.error('Course Fee is Empty !');
    } else if (courseEnroll.length == 0) {
        toastr.error('Course Enroll is Empty !');
    } else if (courseClass.length == 0) {
        toastr.error('Course Class is Empty !');
    } else if (courseLink.length == 0) {
        toastr.error('Course Link is Empty !');
    } else if (courseImg.length == 0) {
        toastr.error('Course Image is Empty !');
    } else {
        $('#CourseUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>") //Animation....
        axios.post('/CoursesUpdate', {
                id: courseID,
                course_name: courseName,
                course_des: courseDes,
                course_fee: courseFee,
                course_totalenroll: courseEnroll,
                course_totalclass: courseClass,
                course_link: courseLink,
                course_img: courseImg,
            })
            .then(function(response) {
                $('#CourseUpdateConfirmBtn').html("Save");
                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#updateCourseModal').modal('hide');
                        toastr.success('Update Success');
                        getCoursesData();
                    } else {
                        $('#updateCourseModal').modal('hide');
                        toastr.error('Update Fail');
                        getCoursesData();
                    }
                } else {
                    $('#updateCourseModal').modal('hide');
                    toastr.error('Something Went Wrong !');
                }
            })
            .catch(function(error) {
                $('#updateCourseModal').modal('hide');
                toastr.error('Something Went Wrong !');
            });

    }
}


