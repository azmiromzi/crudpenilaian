@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">

	    <div class="col-md-8 col-md-offset-2">

    		<h1>show Admin</h1>

    		<form action="" method="POST" enctype="multipart/form-data">
                @csrf
    		    <div class="form-group">
    		        <label for="title">name <span class="require">*</span></label>
    		        <input type="text" class="form-control" value="{{ $admin->name }}" name="name" disabled/>
    		    </div>
    		    <div class="form-group">
    		        <label for="title">email <span class="require">*</span></label>
    		        <input type="email" class="form-control" name="email" value="{{ $admin->email }}" disabled/>
    		    </div>



    		    {{-- <div class="form-group">
    		        <button type="submit" class="btn btn-primary">
    		            Create Admin
    		        </button>
    		        <button class="btn btn-default">
    		            Cancel
    		        </button>
    		    </div> --}}

    		</form>
		</div>

	</div>
</div>


@endsection
