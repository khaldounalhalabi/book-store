@extends('admin.layout')
@section('content')
    <section class="section profile" dir="rtl">
        <div class="card">
            <div class="card-body">
                <div class="card-header card-title">
                    <h1 style="font-family: 'Segoe UI',sans-serif ; ">البريد الوارد من الموقع</h1>
                </div>
            </div>
            <table class="table table-striped table-bordered pt-2 table-responsive  w-auto h-auto m-auto"
                   id="table"
                   dir="rtl">
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">الاسم</th>
                    <th class="text-center">البريد الالكتروني</th>
                    <th class="text-center">التاريخ</th>
                    <th class="text-center">الحالة</th>
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
        <script type="module">
            $(document).ready(function () {
                let table;
                $(function () {
                    table = $('#table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{{ route("admin.email.data") }}',
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
                            }
                        ],
                        lengthMenu: [
                            [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"],
                        ],
                        columns: [
                            {'data': 'id', orderable: true},
                            {"data": 'name', orderable: true, searchable: true},
                            {"data": 'email', orderable: true, searchable: true},
                            {"data": 'created_at', searchable: true, orderable: true},
                            {
                                "data": 'read_at', orderable: true, searchable: true, render: function (data) {
                                    if (data) {
                                        return "<div class='text-success'>Read at" + data + "</div>";
                                    } else {
                                        return "<div class='text-danger'>Unread</div>";
                                    }
                                }
                            },
                            {"data": 'action'},
                        ]
                    }).on('init.dt', function () {
                        const lengthMenu = $('#table_length');
                        const tableFilter = $('#table_filter');
                        lengthMenu.add(tableFilter).wrapAll('<div class="row"></div>');
                        tableFilter.wrap('<div class="col-md-6"></div>')
                        lengthMenu.wrap('<div class="col-md-6"></div>')
                    });
                });
            });
        </script>
    </section>
@endsection
