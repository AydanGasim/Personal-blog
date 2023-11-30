const _token = $('meta[name="csrf-token"]').attr('content');



const deleteService = async (id)=>{
    swal({
        title:  "Warning!",
        text: "Do you want to delete?",
        icon: "warning",
        buttons: ["Cancel","Delete"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                location.href = `/services/service-delete/${id}`;
            } else {
                swal("Cancelled");
            }
        });
}

const editService = async (id) => {
    $.ajax({
        type: "POST",
        url: "/services/service-view",
        data: {
            _token,
            id,
        },
        success: async function (data) {
            console.log(data);
            if (data.status) {
                const myModal = new bootstrap.Modal(document.getElementById('view'));
                document.getElementById("id").value = data.service.id;

                document.getElementById("name").value = data.service.title;
                document.getElementById("old_image").value = data.service.image;

                document.getElementById("current_image").innerHTML = `<img src="../../${data.service.image}" width="100%";  />`;
                document.getElementById("description").value = data.service.description;
                document.getElementById("status").value= data.service.status;



                myModal.show();
            } else {
                alert("Error... Not found");
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
