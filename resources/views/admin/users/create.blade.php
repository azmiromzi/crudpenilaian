@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">

	    <div class="col-md-8 col-md-offset-2">

    		<h1>Create Admin</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    		<form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
    		    <div class="form-group">
    		        <label for="title">name <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="name" />
    		    </div>
    		    <div class="form-group">
    		        <label for="title">email <span class="require">*</span></label>
    		        <input type="email" class="form-control" name="email" />
    		    </div>

    		    <div class="form-group">
    		        <label for="description">password</label>
    		        <input type="password" name="password" class="form-control">
    		    </div>

    		    <div class="form-group">
    		        <label for="description">password confirmation</label>
    		        <input type="password" name="password_confirmation" class="form-control">
    		    </div>

    		    <div class="form-group">
    		        <p><span class="require">*</span> - required fields</p>
    		    </div>

    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary">
    		            Create Admin
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
