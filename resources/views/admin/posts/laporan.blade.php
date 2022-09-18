@extends('layouts.app')


@section('content')

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->


        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <a href="{{ route('cetak-post') }}" class="d-block mb-3 btn btn-primary">cetak laporan post</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Waktu Post</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Waktu Post</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($posts as $post )

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <img class="img-fluid" style="width: 100px" src="{{ asset('storage/' . $post->image) }}" alt="">
                                </td>
                                <td>{{ $post->created_at->format('Y/m/d') }}</td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" class="p-0  ms-0" method="post">
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
