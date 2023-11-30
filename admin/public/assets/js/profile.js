const _token = $('meta[name="csrf-token"]').attr('content');


// const checkPass = async (pass) => {
//     $.ajax({
//         type: "POST",
//         url: "/myProfile/list-view",
//         data: {
//             _token,
//             pass,
//         },
//         success: async function (res) {
//
//             console.log(pass);
//         },
//         error: function () {
//             alert('Error... 5011');
//         },
//         beforeSend: function () {
//             //$('#loader').removeClass('display-none')
//         },
//         complete: function () {
//             ///$('#loader').addClass('display-none');
//         },
//     })
// }
