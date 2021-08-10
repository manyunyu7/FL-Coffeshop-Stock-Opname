@extends('template')

@section('page-heading')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manajemen User</h3>
                    <p class="text-subtitle text-muted">Edit Karyawan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/staff/manage')}}">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                <h4 class="card-title">Edit User</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('user/update') }}" method="post">
                    <input type="hidden" name="id" value="{{$users->id}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Nama User</label>
                                <input type="text" name="user_name" required class="form-control"
                                    value="{{ old('user_name', $users->name) }}" required id="basicInput"
                                    placeholder="Nama Lengkap User">
                            </div>

                            <div class="form-group">
                                <label for="basicInput">Email</label>
                                <input type="email" name="user_email" required class="form-control"
                                    value="{{ old('user_email', $users->email) }}" id=" basicInput"
                                    placeholder="Email User">
                            </div>

                            <div class="form-group">
                                <label for="basicInput">Kontak User</label>
                                <input type="text" name="user_contact" class="form-control"
                                    value="{{ old('user_contact', $users->contact) }}" placeholder="Kontak User">
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="basicInput">Password</label>
                                <input type="password" name="user_password" class="form-control" id="basicInput"
                                    placeholder="Password">
                                <small class="form-text text-muted">Isi Jika Ingin Mereset Password User</small>
                            </div>

                            <div class="form-group">
                                <label for="">Role User</label>
                                <select class="form-control form-select" required name="user_role" id="">
                                    <option>Pilih User Role</option>
                                    <option {{($users->role==1) ? 'selected' : ''}}  value="1">Admin</option>
                                    <option {{($users->role==2) ? 'selected' : ''}} value="2">Karyawan</option>
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

    <!-- Modal -->
    <div class="modal fade" id="destroy-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
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
