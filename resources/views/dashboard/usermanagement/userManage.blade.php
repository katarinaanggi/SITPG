@extends('layouts.main')

@section('page')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>User Management</h3>
                <p class="text-subtitle text-muted">Mengelola akun user atau operator kabupaten/kota.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Management</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar User</h4>
            </div>
            <div class="card-body">
                <a class="btn" href="{{ route('admin.add_user') }}">+Add New User</a><br /><br />
                <table class="table table-inverse table-responsive table-hover" id="userTable">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Cabdin</th>
                            <th>Kab/Kota</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>    
@endsection

@section('datatable')
    <script>
        $(document).ready( function () {
            $('#userTable').DataTable(
                {
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('admin.data_user') !!}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'phone', name: 'phone' },
                        { data: 'cabdin', name: 'cabdin' },
                        { data: 'kota', name: 'kota' },
                        { data: 'action', name: 'action' }
                    ]
                }
            );
        } );
    </script>
@endsection