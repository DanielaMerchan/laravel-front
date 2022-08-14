<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Facturas </title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="max-w-6xl mx-auto sm:px-6">
        <div class="mt-6 overflow-hidden px-6 py-4 shadow-md">
            {{-- <button onclick="registrar()"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button" data-modal-toggle="defaultModal">
                Nuevo
            </button> --}}
            <table id="listado">
                <thead>
                    <tr>
                        <th>Factura</th>
                        <th>Fecha</th>
                        <th>Emisor</th>
                        <th>Comprador</th>
                        <th>Valor antes de iva</th>
                        <th>IVA</th>
                        <th>Valor final</th>
                        <th>Items facturados</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Registrar una factura
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="defaultModal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <form method="POST" id="formulario">
                        @csrf
                        @method('post')
                        <div class="">
                            <label class="block font-medium text-sm text-gray-700">
                                Factura
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                id="nombre" type="text" name="nombre" id="id_factura" required="required">
                            <span class="text-red-500 text-sm error" id="factura_req"></span>
                        </div>
                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Fecha
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                id="fecha" type="text" name="fecha" id="fecha" required="required">
                            <span class="text-red-500 text-sm error" id="fecha_req"></span>
                        </div>
                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Emisor
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                id="emisor" type="text" name="required" id="emisor" required="required">
                            <span class="text-red-500 text-sm error" id="emisor_req"></span>
                        </div>
                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Comprador
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                id="comprador" type="text" name="comprador" id="comprador" required="required">
                            <span class="text-red-500 text-sm error" id="comprador_req"></span>
                        </div>
                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Valor antes de IVA
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                id="valor_antes_iva" type="text" name="valor_antes_iva" id="valor_antes_iva" required="required">
                            <span class="text-red-500 text-sm error" id="valor_antes_iva_req"></span>
                        </div>
                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700">
                                IVA
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                id="iva" type="text" name="iva" id="iva" required="required">
                            <span class="text-red-500 text-sm error" id="iva_req"></span>
                        </div>
                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Valor total a pagar
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                id="valor_a_pagar" type="text" name="valor_a_pagar" id="valor_a_pagar" required="required">
                            <span class="text-red-500 text-sm error" id="valor_a_pagar_req"></span>
                        </div>
                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700">
                                Items facturados
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                id="items_facturados" type="text" name="items_facturados" id="items_facturados" required="required">
                            <span class="text-red-500 text-sm error" id="items_facturados_req"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://cdn.tailwindcss.com/"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
<script>
    $('#listado').DataTable({
        responsive: true,
        "lengthMenu": [
            [10, 25, 50, 100, 500],
            [10, 25, 50, 100, 500]
        ],
      //   "lengthChange": false,
        "searching": false,
        "destroy": true,
        "serverSide": true,
        "order": [1, "asc"],
        "ajax": {
            "url": "http://127.0.0.1:80/api/facturapreliminar",
            "method": "GET",
            "dataType": "json"
        },
        "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'l><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
            "<'table-responsive scroll'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "stripeClasses": [],
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": '',
            "sSearchPlaceholder": "Buscar...",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "columns": [{
                "data": "id",
            },
            {
                "data": "fecha",
            },
            {
                "data": "emisor",
                orderable: false,
                "render": function(data, type, JsonResultRow, meta) {
                  return '<span class="text-green text-sm info" id="emisor-nit" > Nit: <br>'+JsonResultRow.emisor.nit+'</span>' +
                           '<br><span class="text-green text-sm info" id="emisor-name" > Nombre: <br>'+JsonResultRow.emisor.name+'</span>';
                }
            },
            {
                "data": "comprador",
                orderable: false,
                "render": function(data, type, JsonResultRow, meta) {
                  return '<span class="text-green text-sm info" id="comprador-nit" > Nit: <br>'+JsonResultRow.comprador.nit+'</span>' +
                           '<br><span class="text-green text-sm info" id="comprador-name" > Nombre: <br>'+JsonResultRow.comprador.name+'</span>';
                }
            },
            {
                "data": "valor_antes_iva",
            },
            {
                "data": "iva",
            },
            {
                "data": "valor_a_pagar",
            },
            {
                "data": "items_facturados",
                orderable: false,
                "render": function(data, type, JsonResultRow, meta) {
                  return JsonResultRow.items_facturados[0].cantidad+' - ' +JsonResultRow.items_facturados[0].descripcion+' <br>Total:' +JsonResultRow.items_facturados[0].valor_total+'</span>';
                }
            },
            {
                "data": "opciones",
                orderable: false,
                "render": function(data, type, JsonResultRow, meta) {
                    return `<a href="javascript:void(0);" onclick="eliminar('` + JsonResultRow.id + `');" class="bs-tooltip" title="Eliminar factura" data-toggle="tooltip" data-placement="top" data-original-title="Delete">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        </a>`
                }
            }
        ]
    });
    const eliminar = (id) => {
        axios.delete("http://127.0.0.1:80/api/factura" + id).
        then(function(response) {
            $("#listado").DataTable().ajax.reload();
            Swal.fire({
                title: 'Proceso de eliminación',
                text: response.data.message,
                icon: response.data.status,
                confirmButtonText: 'Aceptar'
            });
        }).catch(function(error) {
            console.log(error.response);
        });
    };
    const registrar = () => {
      $("#id").text('');
      $("#fecha").text('');
      $("#emisor").text('');
      $("#comprador").text('');
      $("#valor_antes_iva").text('');
      $("#iva").text('');
      $("#valor_a_pagar").text('');
    }
    $(document).on("submit", "#formulario", function(e) {
        e.preventDefault();
        $(".error").text('');
        $("#final").text('');
        var data = new FormData($('#formulario')[0]);
        $.ajax({
            url: "http://127.0.0.1:80/api/factura",
            type: 'POST',
            data: data,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status == 'success') {
                    $("#listado").DataTable().ajax.reload();
                    Swal.fire({
                        title: 'Proceso de registro',
                        text: 'Factura registrada exitosamente',
                        icon: response.status,
                        confirmButtonText: 'Cool'
                    });
                    $("#final").text(response.final);
                } else {
                    for (var [key, value] of Object.entries(response.message)) {
                        $("#" + key + "_err").text(value);
                    }
                }
            }
        });
    });
</script>

</html>
