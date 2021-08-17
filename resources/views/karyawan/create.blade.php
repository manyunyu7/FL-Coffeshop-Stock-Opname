@extends('template')

@section('page-heading')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manajemen User</h3>
                    <p class="text-subtitle text-muted">Tambah Karyawan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/staff/manage')}}">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
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

@endsection
