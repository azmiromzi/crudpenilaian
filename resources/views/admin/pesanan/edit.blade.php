@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">

	    <div class="col-md-8 col-md-offset-2">

    		<h1>Edit Status Pesanan</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    		<form action="{{ route('pesanans.update', $pesanan->id) }}" method="POST" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Nama Menu <span class="require">*</span></label>
                    <input type="text" class="form-control" name="menu_id" value="{{ $pesanan->menu->id }}"/>
                </div>
    		    <div class="form-group">
    		        <label for="title">Pesanan Tambahan <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="desc" value="{{ $pesanan->desc }}"/>
    		    </div>
    		        <input type="text" class="form-control" name="user_id" value="{{ $pesanan->user->id }}" hidden/>

    		    {{-- <div class="form-group">
    		        <label for="title">Status <span class="require">*</span></label>
    		        <input type="text" class="form-control"  value="{{ $pesanan->status->name }}"/>
    		    </div> --}}
                <select class="form-select" aria-label="Default select example" name="status_id">
                    <option selected>Open this select menu</option>
                    @foreach ($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>



    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary">
    		            Edit
    		        </button>
    		        <button class="btn btn-default">
    		            Cancel
    		        </button>
    		    </div>

    		</form>
		</div>

	</div>
</div>


@endsection
