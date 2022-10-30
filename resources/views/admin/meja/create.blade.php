@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">

	    <div class="col-md-8 col-md-offset-2">

    		<h1>Create Meja</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    		<form action="{{ route('mejas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
    		    <div class="form-group">
    		        <label for="title">nama meja<span class="require">*</span></label>
    		        <input type="text" class="form-control" name="nama_meja" />
    		    </div>
                <div class="form-group">
                    <label for="status_meja">Status Meja :</label> <br>
                <div class="form-check form-check-inline">
                    <label for="status_meja">
                        <input type="radio" name="status_meja" value="Kosong" id="status_meja" >KOSONG
                        <input type="radio" name="status_meja" value="Penuh" id="status_meja" >PENUH
                    </label>
                    </div>
            </div>

    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary">
    		            Create Meja
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
