@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">

	    <div class="col-md-8 col-md-offset-2">

    		<h1>Edit Meja</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    		<form action="{{ route('mejas.update', $meja->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    		    <div class="form-group">
    		        <label for="title">nama meja<span class="require">*</span></label>
    		        <input type="text" class="form-control" name="nama_meja" value="{{ $meja->nama_meja }}"/>
    		    </div>
                <div class="form-group">
                    <label for="status_meja">Status Meja :</label> <br>
                <div class="form-check form-check-inline">
                    <label for="status_meja">
                        <input type="radio" name="status_meja" value="Kosong" id="status_meja" {{ $meja->status_meja == 'Kosong' ? 'checked' : '' }} >KOSONG
                        <input type="radio" name="status_meja" value="Penuh" id="status_meja" {{ $meja->status_meja == 'Penuh' ? 'checked' : '' }}>PENUH
                    </label>
                    </div>
            </div>

    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary">
    		            Edit Meja
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
