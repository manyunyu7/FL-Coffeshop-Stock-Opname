@extends('template')

@section('page-heading')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manajemen User</h3>
                    <p class="text-subtitle text-muted">Gunakan Menu Ini untuk melakukan manajemen user</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-content')
    <section class="section">
        @include('components.message')
    </section>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah User Baru</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('user/store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Nama User</label>
                                <input type="text" name="user_name" required class="form-control"
                                    value="{{ old('user_name') }}" required id="basicInput"
                                    placeholder="Nama Lengkap User">
                            </div>

                            <div class="form-group">
                                <label for="basicInput">Email</label>
                                <input type="email" name="user_email" required class="form-control"
                                    value="{{ old('user_email') }}" id=" basicInput" placeholder="Email User">
                            </div>

                            <div class="form-group">
                                <label for="basicInput">Kontak User</label>
                                <input type="text" name="user_contact" class="form-control"
                                    value="{{ old('user_contact') }}" placeholder="Kontak User">
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="basicInput">Password</label>
                                <input type="password" name="user_password" required class="form-control" id="basicInput"
                                    placeholder="Password">
                            </div>

                            <div class="form-group">
                                <label for="">Role User</label>
                                <select class="form-control form-select" required name="user_role" id="">
                                    <option>Pilih User Role</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Staff</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </section>

    <!-- Input Style start -->
    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Manage Data User</h4>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                <div class="dataTable-container">
                                    <table class="table table-striped dataTable-table" id="table_data">
                                        <thead>
                                            <tr>
                                                <th data-sortable="">No</th>
                                                <th data-sortable="">Nama</th>
                                                <th data-sortable="">Email</th>
                                                <th data-sortable="">Kontak</th>
                                                <th data-sortable="">Dibuat</th>
                                                <th data-sortable="">Edit</th>
                                                <th data-sortable="">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->contact }}</td>
                                                    <td>{{ $user->created_at }}</td>
                                                    <td>
                                                        <button id="{{ $user->id }}"  data-toggle="modal" type="button"
                                                            class="btn btn-primary btn-delete">Hapus
                                                            User</button>
                                                    </td>
                                                    <td>
                                                        <a href="{{url('admin/user/'.$user->id.'/edit')}}">
                                                            <button id="{{ $user->id }}"  type="button"
                                                          class="btn btn-primary">Edit User</button>
                                                        </a>
                                                      
                                                    </td>
                                                </tr>
                                            @empty

                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="destroy-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel120">
                        Anda Yaking Ingin Menghapus Data Karyawan Ini ?
                    </h5>
                    <button type="button" class="close hide-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Data Karyawan terkait akan dihapus. 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary hide-modal" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class=" d-sm-block">Close</span>
                    </button>

                    <a class="btn-destroy" href="">
                        <button type="button" class="btn btn-danger ml-1 hide-modal " data-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class=" d-sm-block">Hapus Karyawan</span>
                        </button>
                    </a>
                
                </div>
            </div>
        </div>
    </div>


@endsection


@push('script')
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4-4.1.1/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/r-2.2.7/sb-1.0.1/sp-1.2.2/datatables.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js">
    </script>

    <script>
        $('body').on("click", ".btn-delete", function() {
            var id = $(this).attr("id")
            $(".btn-destroy").attr("href", window.location.origin + "/karyawan/" + id + "/delete")
            $("#destroy-modal").modal("show")
        });
    </script>

    <script type="text/javascript">
        $(function() {
            var table = $('#table_data').DataTable({
                processing: true,
                serverSide: false,
                columnDefs: [{
                    orderable: true,
                    targets: 0
                }],
                dom: 'T<"clear">lfrtip<"bottom"B>',
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                buttons: [
                    'copyHtml5',
                    {
                        extend: 'excelHtml5',
                        title: 'Data Export {{ \Carbon\Carbon::now()->year }}'
                    },
                    'csvHtml5',
                ],
            });




        });

        $('body').on("click", ".btn-delete", function() {
            var id = $(this).attr("id")
            $(".btn-destroy").attr("href", window.location.origin + "/user/" + id + "/delete")
            $("#destroy-modal").modal("show")
        });
    </script>


@endpush
