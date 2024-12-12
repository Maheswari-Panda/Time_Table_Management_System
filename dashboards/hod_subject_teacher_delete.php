
<script>
     $(document).ready(function (){
        // Use event delegation to attach the event handler to dynamically loaded content
        $(document).on('click', '.subject-teacher-delete-btn', function (e) {
          e.preventDefault();

          var delete_id = $(this).closest("tr").find('.delete-id-value').val();
          console.log(delete_id);

          swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this subject-teacher",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                  $.ajax({
                    type: "POST",
                    url: "hod_subject_teacher_code.php",
                    data:{
                      "delete_btn_set":1,
                      "delete_id": delete_id,
                    },
                    success: function (responses){
                      swal("subject-teacher Deleted Successfully!", {
                        icon: "success",
                      })
                      .then((result) => {
                        // Reload the DataTable without refreshing the entire page
                        location.reload();  // You can also use table.draw() if using AJAX in DataTables
                      });
                    }
                  })
              }
          });
        });
      });

    </script>
