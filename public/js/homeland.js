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

    new DataTable('#tblProperties2', {
        ajax: '/api/properties/datatables',
        columns: [
            { data: 'address' },
            { data: 'price' },
            { data: 'list_type.name' },
            { data: 'offert_type' },
            { data: 'city.name' },
        ]
    });

    //CONVERTIR A LA TABLA DE DATA
    //let table = new DataTable("#tblProperties1");

    $('#genero').select2({
        width: '100%',
        placeholder: "Select Gender",
        allowClear: true
    });

    // Inicializa DataTables con AJAX y soporte de filtro dinámico
    let table = new DataTable('#tblEmployees1', {
        ajax: {
            url: 'http://localhost:3000/api/v1/employees_gender',
            data: function (d) {
                d.gender = $("#genero").val(); // Envía el género seleccionado
            }
        },
        columns: [
            { data: 'id' },
            { data: 'first_name' },
            { data: 'email' },
            { data: 'gender' },
            { data: 'department' },
            { data: 'salary' },
        ]
    });

    // Cuando cambia el select de género, actualiza la tabla
    $("#genero").change(function() {
        table.ajax.reload();
    });


    // $("#btnGetEmployeesUsingFetch").click((event) => {
    //     new DataTable('#tblEmployees1', {
    //         ajax: {
    //             url: 'http://localhost:3000/api/v1/employees/',
    //         },
    //         columns: [
    //             { data: 'id' },
    //             { data: 'first_name'},
    //             { data: 'email' },
    //             { data: 'gender' },
    //             { data: 'department' },
    //             { data: 'salary' },
    //         ],
    //         paging: true,
    //         searching: true,
    //         ordering: true,
    //         responsive: true
    //     });

    // });

    // $('#list-types').select2({
    //     ajax: {
    //         url: '/api/properties',
    //         dataType: 'json',
    //         delay: 250,
    //         processResults: function (data) {
    //             return {
    //                 results: data.map(item=>({
    //                     id: item.list_type.id,
    //                     text:item.list_type.name
    //                 }))
    //             };
    //         },
    //         cache: true
    //     },
    //     allowClear: true,

    // });

});
