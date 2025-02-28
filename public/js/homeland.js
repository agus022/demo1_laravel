$(document).ready(function() {
    $("#btnSendContactAgentMessage").click((event) => {
        event.preventDefault();//que cancele la informacion enviada, para recuperar la informacion antes de enviarla
        //alert("Form submitted successfully!");

        //AJAX REQUEST
        const formData = {
            "name": $("#name").val(),
            "email": $("#email").val(),
            "phone": $("#phone").val(),
            "message": $("#message").val()
            //"porperty_id": $("#porperty_id").val()
        };
        $.ajax({
            type:"post",
            url:"/api/contact_agent",
            data: formData,
            success:(response)=>{
                $("#formContactAgent").trigger("reset");
                alert("Form submitted successfully!");
                $("#successAlert").removeClass("d-none");
                setTimeout(() => {
                    $("#successAlert").addClass("d-none");
                }, 5000);
            },
            error:(errors)=>{
                console.error(errors);
            }
        });
    });

    let table = new DataTable("#tblProperties1");
    new DataTable('#tblProperties2', {
        ajax: 'api/properties/datatables',
        columns: [
            { data: 'address' },
            { data: 'price' },
            { data: 'list_type.name' },
            { data: 'offert_type' },
            { data: 'city.name' },
        ]
    });
});
