@extends('admin.layout')
@section('content')
    <section class="section profile">
        <div class="card">
            <div class="card-body">
                <div class="card-header card-title">Manage Books
                    <a href="{{route('admin.books.create')}}" class="btn btn-primary float-end">
                        <i class="bi bi-file-earmark-plus"></i>
                    </a>
                </div>
                <table class="table table-striped table-bordered pt-2" style="width:100%;margin: -2%;" id="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Is Original</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Price</th>
                        <th>Action</th>
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
                        ajax: '{{ route("admin.books.table") }}',
                        columns: [
                            {'data': 'id', orderable: false},
                            {"data": 'name', orderable: false},
                            {"data": 'is_original' , orderable: false},
                            {"data": 'author_name', orderable: false},
                            {"data": 'publisher', searchable: true, orderable: false},
                            {"data": 'price', orderable: false},
                            {"data": 'action', searchable: false, orderable: false},
                        ]
                    });

                    table.on('click', '.remove-item-from-table-btn', function () {
                        let $this = $(this);
                        let url = $this.data('deleteurl');
                        Swal.fire({
                            title: 'Do you want to delete this item?',
                            showDenyButton: true,
                            confirmButtonText: 'Yes',
                            confirmButtonColor: '#0d6efd',
                            denyButtonText: `No`,
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
                                        $this.parent().parent().parent().remove();
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
