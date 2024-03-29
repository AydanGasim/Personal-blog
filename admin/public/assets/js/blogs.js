const _token = $('meta[name="csrf-token"]').attr('content');

const deleteCategory = async (id)=> {
    swal({
        title: "Warning!",
        text: "Do you want to delete?",
        icon: "warning",
        buttons: ["Cancel", "Delete"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                location.href = `/blog/category-delete/${id}`;
            } else {
                swal("Cancelled");
            }
        });
}

const editCategory = async (id) => {
    $.ajax({
        type: "POST",
        url: "/blog/category-view",
        data: {
            _token,
            id,
        },
        success: async function (data) {
            console.log(data);
            if (data.status) {
                const myModal = new bootstrap.Modal(document.getElementById('view'));

                document.getElementById("title").value= data.category.title;
                document.getElementById("id").value= data.category.id;
                document.getElementById("status").value= data.category.status;
                document.getElementById("old_image").value= data.category.image;


                myModal.show();
            } else {
                alert("Error... Category not found");
            }
        },
        error: function () {
            alert('Error... 5011');
        },
        beforeSend: function () {
            //$('#loader').removeClass('display-none')
        },
        complete: function () {
            ///$('#loader').addClass('display-none');
        },
    })
}

const deleteBlog = async (id)=>{
    swal({
        title:  "Warning!",
        text: "Do you want to delete?",
        icon: "warning",
        buttons: ["Cancel","Delete"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                location.href = `/blog/blog-delete/${id}`;
            } else {
                swal("Cancelled");
            }
        });
}







