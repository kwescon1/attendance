// $('#btnremove').click(function(e) {
//     console.log("Welcome Home");
// })

document.getElementById("btnremove").onclick = getRemove;

function getRemove(){

    var id = document.getElementById("course_id").value;
    console.log(id);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                url: '/testdelete/'+ id,
                dataType : 'json',
                type: 'POST',
                contentType: false,
                processData: false,
                data: {},
                success: function()
                {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                }
            });
         
        }
      })
}