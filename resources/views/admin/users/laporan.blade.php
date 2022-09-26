@extends('layouts.app')


@section('content')

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('cetak-user') }}" class="d-block mb-3 btn btn-primary">Cetak Admin pdf</a>
                <a href="{{ route('excel-cetak-user') }}" class="d-block mb-3 btn btn-primary">Cetak Admin excel</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Waktu pendaftaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Waktu pendaftaran</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user )

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                {{-- <td>
                                    <img class="img-fluid" style="width: 100px" src="{{ asset('storage/' . $post->image) }}" alt="">
                                </td> --}}
                                <td>{{ $user->created_at->format('Y/m/d') }}</td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{ route('admin.show', $user->id) }}" class="btn btn-success">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <form action="{{ route('admin.destroy', $user->id) }}" class="p-0  ms-0" method="post">
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
