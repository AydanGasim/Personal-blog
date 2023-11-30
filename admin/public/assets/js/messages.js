const _token = $('meta[name="csrf-token"]').attr('content');


const updateMessage = async (id) => {
    $.ajax({
        type: "POST",
        url: "/messages/message-view",
        data: {
            _token,
            id,
        },
        success: async function (data) {
            console.log(data);
            if (data.status) {
                const myModal = new bootstrap.Modal(document.getElementById('view'));

                document.getElementById("full_name").value= data.message.full_name;
                document.getElementById("id").value= data.message.id;
                document.getElementById("email").value= data.message.email;
                document.getElementById("reason").value= data.message.reason;
                document.getElementById("message").value= data.message.message;

                document.getElementById("status").value= data.message.status;


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
