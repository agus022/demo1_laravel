$(document).ready(function() {
    $("#btnSendContactAgentMessage").click((event) => {
        event.preventDefault();//que cancele la informacion enviada, para recuperar la informacion antes de enviarla
        //alert("Form submitted successfully!");
        //ajax request
        const formData = {
            "name": $("#name").val(),
            "email": $("#email").val(),
            "phone": $("#phone").val(),
            "message": $("#message").val()
        };
        $.ajax({
            url:"/api/contact_agent",
            type:"POST",
            dataType: "json",
            headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
            data: JSON.stringify(formData),
            success:(response)=>{
                console.log(">>>>>>>>> Éxito <<<<<<<<<", response);
                $("#formContactAgentMessage").trigger("reset");
                $("#successAlert").removeClass("d-none");
                setTimeout(() => {
                    $("#successAlert").addClass("d-none");
                }, 5000);
            },
            error:(errors)=>{
                console.log(errors);
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
