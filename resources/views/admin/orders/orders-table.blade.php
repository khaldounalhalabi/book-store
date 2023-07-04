@extends('admin.layout')
@section('content')
    <section class="section profile" dir="rtl">
        <div class="card">
            <div class="card-body">
                <div class="card-header card-title">
                    <h1 style="font-family: 'Segoe UI',sans-serif ; ">الطلبات</h1>
                </div>
                <div class="card-header">
                    <h5 class="col-md-4">الإجمالي : {{$total}}</h5>
                    <h5 class="col-md-4">إجمالي الأسعار : {{$totalPrices}}</h5>
                    <h5 class="col-md-4">إجمالي كلف الشحن : {{$totalShipping}}</h5>
                </div>
                <table class="table table-striped table-bordered pt-2 table-responsive w-auto h-auto m-auto"
                       id="table"
                       dir="rtl">
                    <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">السعر الإجمالي</th>
                        <th class="text-center">تكلفة الشحن</th>
                        <th class="text-center">رقم الطلب</th>
                        <th class="text-center">الحالة</th>
                        <th class="text-center">التاريخ</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                </table>
                <style>
                    table.dataTable td {
                        text-align: center;
                    }

                    table.dataTable th {
                        text-align: center;
                    }
                </style>
            </div>
        </div>
        <script type="module">
            $(document).ready(function () {
                let table;
                $(function () {
                    table = $('#table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{{ route("admin.order.data") }}',
                        dom: 'Blfrtip',
                        buttons: [
                            {
                                extend: 'excel',
                                className: 'btn btn-primary mt-2 mb-2',
                                charset: 'UTF-8',
                                direction: 'rtl',// for RTL support
                                init: function (api, node, config) {
                                    $(node).removeClass('btn-secondary')
                                }
                            },
                            {
                                text: 'إضافة طلب',
                                action: function (e, dt, node, config) {
                                    window.location.href = '{{route('admin.orders.create')}}';
                                },
                                className: 'btn-primary mt-2 mb-2',
                                init: function (api, node, config) {
                                    $(node).removeClass('btn-secondary')
                                }
                            }
                        ],
                        lengthMenu: [
                            [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"],
                        ],
                        columns: [
                            {'data': 'id', orderable: true},
                            {"data": 'total_price', orderable: true, searchable: true},
                            {"data": 'shipping_cost', orderable: true, searchable: true},
                            {"data": 'order_number', orderable: true, searchable: true},
                            {"data": 'status', searchable: true, orderable: true},
                            {"data": 'created_at', orderable: true, searchable: true},
                            {"data": 'action', searchable: true, orderable: true},
                        ]
                    }).on('init.dt', function () {
                        const lengthMenu = $('#table_length');
                        const tableFilter = $('#table_filter');
                        lengthMenu.add(tableFilter).wrapAll('<div class="row"></div>');
                        tableFilter.wrap('<div class="col-md-6"></div>')
                        lengthMenu.wrap('<div class="col-md-6"></div>')
                    });

                    table.on('click', '.remove-item-from-table-btn', function () {
                        let $this = $(this);
                        let url = $this.data('deleteurl');
                        Swal.fire({
                            title: 'هل تريد حذف هذا الطلب ؟ ',
                            showDenyButton: true,
                            confirmButtonText: 'نعم',
                            confirmButtonColor: '#0d6efd',
                            denyButtonText: `لا`,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                                    }
                                });
                                $.ajax({
                                    "method": "DELETE",
                                    "url": url,
                                    success: function () {
                                        $this.parent().parent().parent().parent().remove();
                                    }
                                });
                                Swal.fire('Deleted!', '', 'success')
                            }
                        })
                    });
                });
            });
        </script>
    </section>
@endsection
