
//fetch department
console.log("Form-handler.js is connected");
$(document).ready(function () {

    // Trigger conflict check when any dropdown is changed
    $('#day, #time_slot, #teacher, #location, #batch, #division').change(function() {
        // Get selected values from the dropdowns
        const day_id = $('#day').val();
        const time_slot_id = $('#time_slot').val();
        const teacher_id = $('#teacher').val();
        const location_id = $('#location').val(); 
        const batch_id = $('#batch').val();
        const division_id = $('#division').val();// New location field

        // Clear previous conflict messages and reset form control styles
        $('#day_conflict_message').html("");
        $('#time_slot_conflict_message').html("");
        $('#teacher_conflict_message').html("");
        $('#location_conflict_message').html("");
        $('#day').removeClass('is-invalid');
        $('#time_slot').removeClass('is-invalid');
        $('#teacher').removeClass('is-invalid');
        $('#location').removeClass('is-invalid');
        $('#batch_conflict_message').html('');
        $('#division_conflict_message').html('');
        $('#batch').removeClass('is-invalid');
        $('#division').removeClass('is-invalid');

        if (day_id && time_slot_id && teacher_id && location_id) {
            // AJAX request to check for conflicts (location conflict included)
            $.ajax({
                url: '../conflicts/conflictCheck.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    day_id: day_id,
                    duration_id: time_slot_id,
                    teacher_id: teacher_id,
                    location_id: location_id
                },
                success: function(response) {
                    // Handle teacher conflict
                    if (response.teacher_conflict) {
                        $('#teacher').addClass('is-invalid');
                        $('#teacher_conflict_message').html(
                            `<div class="alert alert-danger mt-2">${response.teacher_message}</div>`
                        );
                    } else {
                        $('#teacher').removeClass('is-invalid');
                        $('#teacher_conflict_message').html('');
                    }
            
                    // Handle location conflict
                    if (response.location_conflict) {
                        $('#location').addClass('is-invalid');
                        $('#location_conflict_message').html(
                            `<div class="alert alert-danger mt-2">${response.location_message}</div>`
                        );
                    } else {
                        $('#location').removeClass('is-invalid');
                        $('#location_conflict_message').html('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("An error occurred: " + xhr.responseText);
                }
            });
            
        }

        if (day_id && time_slot_id && (batch_id || division_id)) {
            // AJAX request to check for conflicts
            $.ajax({
                url: '../conflicts/conflictCheck.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    day_id: day_id,
                    duration_id: time_slot_id,
                    batch_id: batch_id,
                    division_id: division_id,
                },
                success: function (response) {
                        // Add the invalid batch and show conflict messages
                        if (response.batch_conflict) {
                            $('#batch').addClass('is-invalid');
                            $('#batch_conflict_message').html(
                                `<div class="alert alert-danger mt-2">${response.batch_message}</div>`
                            );
                        } else {
                            console.log("no conflict");
                            $('#batch').removeClass('is-invalid');
                            $('#batch_conflict_message').html('');
                        }
                
                        // Handle division conflict
                        if (response.division_conflict) {
                            $('#division').addClass('is-invalid');
                            $('#division_conflict_message').html(
                                `<div class="alert alert-danger mt-2">${response.division_message}</div>`
                            );
                        } else {
                            $('#division').removeClass('is-invalid');
                            $('#division_conflict_message').html('');
                        }
                    
                },
                error: function (xhr, status, error) {
                    console.error("An error occurred: " + error);
                },
            });
        }
    });

    

    $('#faculty').change(function () {
        console.log("inside faculty on change function");
        var facultyId = $(this).val();
        if (facultyId) {
            
            console.log(facultyId);
            $.ajax({
                url: '../fetch/fetch_departments.php',
                type: 'POST',
                data: {
                    faculty_id: facultyId
                },
                dataType: 'json',
                success: function (response) {
                    var $departmentSelect = $('#department');
                    $departmentSelect.empty();
                    $departmentSelect.append('<option selected value="">--Choose Department--</option>');
                    $.each(response, function (index, department) {
                        $departmentSelect.append('<option value="' + department.Department_Id + '">' + department.Department_Name + '</option>');
                    });


                    var $tdepartmentSelect = $('#teacher_department');
                    $tdepartmentSelect.empty();
                    $tdepartmentSelect.append('<option selected value="">--Choose Department--</option>');
                    $.each(response, function (index, department) {
                        $tdepartmentSelect.append('<option value="' + department.Department_Id + '">' + department.Department_Name + '</option>');
                    });
                },
                error: function () {
                    alert('Could not fetch departments. Please try again.');
                }
            });
        } else {
            $('#department').empty().append('<option selected value="">--Choose Department--</option>');
        }
    });

    
//fetch Program type
$('#department').change(function () {
    var departmentId = $(this).val();
    // var departmentId = $(this).val();
    if (departmentId) {
        $.ajax({
            url: '../fetch/fetch_program_types.php',
            type: 'POST',
            data: {
                department_id: departmentId
            },
            dataType: 'json',
            success: function (response) {
                var $programTypeSelect = $('#program-type');
                $programTypeSelect.empty();
                $programTypeSelect.append('<option selected value="">--Choose Program Type--</option>');
                $.each(response, function (index, programType) {
                    $programTypeSelect.append('<option value="' + programType.Program_Type + '">' + programType.Program_Type + '</option>');
                });
            },
            error: function () {
                alert('Could not fetch program types. Please try again.');
            }
        });
    } else {
        $('#program-type').empty().append('<option selected value="">--Choose Program Type--</option>');
    }
});


//fetch Program
$('#program-type').change(function () {
    var departmentId = $('#department').val();
    var programType = $(this).val();
    if (departmentId && programType) {
        $.ajax({
            url: '../fetch/fetch_programs.php',
            type: 'POST',
            data: {
                department_id: departmentId,
                program_type: programType
            },
            dataType: 'json',
            success: function (response) {
                var $programSelect = $('#program');
                $programSelect.empty();
                $programSelect.append('<option selected value="">--Choose Program--</option>');
                $.each(response, function (index, program) {
                    $programSelect.append('<option value="' + program.Program_Id + '">' + program.Program_Name + '</option>');
                });
            },
            error: function () {
                alert('Could not fetch programs. Please try again.');
            }
        });
    } else {
        $('#program').empty().append('<option selected value="">--Choose Program--</option>');
    }
});

//fetch semester Year
$('#program').change(function () {
    var programId = $(this).val();
    if (programId) {
        $.ajax({
            url: '../fetch/fetch_semesters.php',
            type: 'POST',
            data: {
                program_id: programId
            },
            dataType: 'json',
            success: function (response) {
                var $semesterSelect = $('#semester_year');
                $semesterSelect.empty();
                $semesterSelect.append('<option selected value="">--Choose Semester/Year--</option>');
                $.each(response, function (index, semester) {
                    $semesterSelect.append('<option value="' + semester.Semester_Id + '">' + semester.Semester_Code + '</option>');
                });
            },
            error: function () {
                alert('Could not fetch semesters. Please try again.');
            }
        });
    } else {
        $('#semester_year').empty().append('<option selected value="">--Choose Semester/Year--</option>');
    }
});

// fetch divisions based on semester_id
$('#semester_year').change(function () {
    var semesterId = $(this).val();
    if (semesterId) {
        $.ajax({
            url: '../fetch/fetch_divisions.php', // PHP file to fetch divisions
            type: 'POST',
            data: {
                semester_id: semesterId
            },
            dataType: 'json',
            success: function (response) {
                var $divisionSelect = $('#division');
                $divisionSelect.empty();
                $divisionSelect.append('<option selected value="">--Choose Division--</option>');
                $.each(response, function (index, division) {
                    $divisionSelect.append('<option value="' + division.Division_Id + '">' + division.Division_Name + '</option>');
                });
            },
            error: function () {
                alert('Could not fetch divisions. Please try again.');
            }
        });
    } else {
        $('#division').empty().append('<option selected value="">--Choose Division--</option>');
    }
});

$('#division').change(function () {
    var divisionId = $(this).val();
    if (divisionId) {
        $.ajax({
            url: '../fetch/fetch_batches.php', // PHP file to fetch divisions
            type: 'POST',
            data: {
                division_id: divisionId
            },
            dataType: 'json',
            success: function (response) {
                var $batchSelect = $('#batch');
                $batchSelect.empty();
                $batchSelect.append('<option selected value="">--Choose Batch--</option>');
                $.each(response, function (index, batch) {
                    $batchSelect.append('<option value="' + batch.Batch_Id + '">' + batch.Batch_Name + '</option>');
                });
            },
            error: function () {
                alert('Could not fetch batches. Please try again.');
            }
        });
    } else {
        $('#batch').empty().append('<option selected value="">--Choose Batch--</option>');
    }
});



// Event listener for department change (if a new department is selected later)
$('#teacher_department').change(function () {
    var tdepartmentId = $(this).val();
    if (tdepartmentId) {
        fetchTeachers(tdepartmentId);  // Fetch teachers based on the newly selected department
    } else {
        $('#teacher').empty().append('<option selected value="">--Choose Teacher--</option>');
    }
});

// Function to fetch teachers based on department ID
function fetchTeachers(tdepartmentId) {
    $.ajax({
        url: '../fetch/fetch_teachers.php',
        type: 'POST',
        data: {
            tdepartment_id: tdepartmentId
        },
        dataType: 'json',
        success: function (response) {
            var $teacherSelect = $('#teacher');
            $teacherSelect.empty();
            $teacherSelect.append('<option selected value="">--Choose Teacher--</option>');
            $.each(response, function (index, teacher) {
                $teacherSelect.append('<option value="' + teacher.Teacher_Id + '">' + teacher.Teacher_Name + '</option>');
            });
        },
        error: function () {
            alert('Could not fetch teachers. Please try again.');
        }
    });
}




});
