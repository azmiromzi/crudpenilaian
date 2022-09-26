@extends('layouts.app')


@section('content')

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->


        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <a href="{{ route('cetak-post') }}" class="d-block mb-3 btn btn-primary">cetak laporan post</a>
                <a href="{{ route('excel-cetak-post') }}" class="d-block mb-3 btn btn-primary">cetak laporan post excel</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>image</th>
                                <th>waktu</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Number</th>
                                <th>Title</th>
                                <th>image</th>
                                <th>waktu</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($posts as $post )

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <img class="img-fluid" style="width: 100px" src="{{ asset('storage/' . $post->image) }}" alt="">
                                </td>
                                <td>{{ $post->created_at->format('Y/m/d') }}</td>
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
