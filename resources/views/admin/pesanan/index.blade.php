@extends('layouts.app')


@section('content')

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                {{-- <a href="{{ route('admin.create') }}" class="d-block mb-3 btn btn-primary">Create Admin</a> --}}
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Nama Menu</th>
                                <th>Nama Pemesan</th>
                                <th>Status Pembelian</th>
                                <th>Waktu pendaftaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Number</th>
                                <th>Nama Menu</th>
                                <th>Nama Pemesan</th>
                                <th>Status Pembelian</th>
                                <th>Waktu pendaftaran</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($pesanans as $pesanan )

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pesanan->menu->name }}</td>
                                <td>{{ $pesanan->user->name }}</td>
                                <td>{{ $pesanan->status->name }}</td>
                                {{-- <td>
                                    <img class="img-fluid" style="width: 100px" src="{{ asset('storage/' . $post->image) }}" alt="">
                                </td> --}}
                                <td>{{ $pesanan->created_at->format('Y/m/d') }}</td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{ route('pesanans.edit', $pesanan->id) }}" class="btn btn-success">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('pesanans.destroy', $pesanan->id) }}" class="p-0  ms-0" method="post">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger ">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection
