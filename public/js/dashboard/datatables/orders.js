"use strict";

// Class definition
let KTDatatable = function () {

    // Shared variables
    let table;
    let datatable;
    let filter;

    // Private functions
    let initDatatable = function () {
        datatable = $("#kt_datatable").DataTable({
            orderable: false,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[4, 'desc']], // display records number and ordering type
            stateSave: false,
            select: {
                style: 'os',
                selector: 'td:first-child',
                className: 'row-selected'
            },
            ajax: {
                data: function () {
                    let datatable = $('#kt_datatable');
                    let info = datatable.DataTable().page.info();

                    if ( ordersPerPage )
                        info.length = ordersPerPage;

                    datatable.DataTable().ajax.url(`/orders?page=${info.page + 1}&per_page=${info.length}`);
                }
            },
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'address.phone'},
                {data: 'total_price'},
                {data: 'status', name: 'status'},
                {data: 'created_at', name: 'created_at'},
                {data: 'admin.name'},
                {data: 'opened_at'},
                {data: null},
            ],
            columnDefs: [
                {
                    targets: -2,
                    render : data =>  data ?? "<h1>-</h1>"
                },
                {
                    targets: -3,
                    render : data =>  data ?? "<h1>-</h1>"
                },
                {
                    targets: -1,
                    data: null,
                    render: function (data, type, row) {

                        return `   <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="/orders/${ row.id }" class="menu-link px-3 d-flex justify-content-center" >
                                       <span>  <i class="fa fa-eye text-black-50"></i> </span>
                                    </a>

                                </div>
                                <!--end::Menu item-->`;
                    },
                },
                {
                    targets: 3,
                    orderable: false,
                    render: (data, type, row) => data + currency
                },
                {
                    targets: 4,
                    orderable: false,
                    render: (data, type, row) => {

                        const statuses = {
                            'placed': {
                                'title': translate('Placed'),
                                'class': 'primary'
                            },
                            'processing': {
                                'title': translate('Processing'),
                                'class': 'warning'
                            },
                            'on_delivery': {
                                'title': translate('On Delivery'),
                                'class': 'danger'
                            },
                            'delivered': {
                                'title': translate('Delivered'),
                                'class': 'success'
                            },
                        };

                        return `<div class="badge badge-${ statuses[ data ]['class'] } text-white" > ${ statuses[ data ]['title'] } </div>`;

                    }
                },
            ],

        });

        table = datatable.$;

        datatable.on('draw', function () {
            handleDeleteRows();
            KTMenu.createInstances();
        });
    }

    // general search in datatable
    let handleSearchDatatable = () => {

        $('#general-search-inp').keyup( function () {
            datatable.search( $(this).val() ).draw();
        });

    }

    // Filter Datatable
    let handleFilterDatatable = () => {

        $('.filter-datatable-inp').each( (index , element) =>  {

            $(element).change( function () {

                let columnIndex = $(this).data('filter-index'); // index of the searching column

                datatable.column(columnIndex).search( $(this).val()).draw();
            });

        })
    }

    // Delete record
    let handleDeleteRows = () => {

        $('.delete-row').click(function () {

            let rowId = $(this).data('row-id');
            let type  = $(this).data('type');

            deleteAlert(type).then(function (result) {

                if (result.value) {

                    loadingAlert(translate('deleting now ...'));

                    $.ajax({
                        method: 'delete',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: '/orders/' + rowId,
                        success: () => {

                            setTimeout( () => {

                                successAlert(`${translate('You have deleted the') + ' ' + type + ' ' + translate('successfully !')} `)
                                    .then(function () {
                                        datatable.draw();
                                    });

                            } , 1000)



                        },
                        error: (err) => {

                            if (err.hasOwnProperty('responseJSON')) {
                                if (err.responseJSON.hasOwnProperty('message')) {
                                    errorAlert(err.responseJSON.message);
                                }
                            }
                        }
                    });


                } else if (result.dismiss === 'cancel') {

                    errorAlert( translate('was not deleted !') )

                }
            });
        })
    }




    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            handleFilterDatatable();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatable.init();
});
