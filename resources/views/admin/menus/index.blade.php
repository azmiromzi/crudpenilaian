@extends('layouts.app')


@section('content')

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Menu Makanan</h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('menus.create') }}" class="d-block mb-3 btn btn-primary">Create Post</a>
                <div class="table-responsive">
                    <table class="table " id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Name Menu</th>
                                <th>Desc</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>menus</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Number</th>
                                <th>Name Menu</th>
                                <th>Desc</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>menus</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($menus as $menu )

                            <tr class="flex items-center">
                                <td>{{ $loop->iteration }}</td>
                                <td >{{ $menu->name }}</td>
                                <td>{!! $menu->desc !!}</td>
                                <td class="">
                                    <img class="img-fluid" style="width: 100px" src="{{ asset('storage/' . $menu->image) }}" alt="">
                                </td>
                                <td>{{ $menu->category->name }}</td>
                                <td>{{ $menu->price }}</td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning text-decoration-none">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{ route('menus.show', $menu->id) }}" class="btn btn-success text-decoration-none">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <form action="{{ route('menus.destroy', $menu->id) }}" class="p-0  ms-0" method="post">
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
