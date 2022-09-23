@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">

	    <div class="col-md-8 col-md-offset-2">

    		<h1>Create Categories</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    		<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
    		    <div class="form-group">
    		        <label for="title">Category Name<span class="require">*</span></label>
    		        <input type="text" class="form-control" name="name" />
    		    </div>


    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary">
    		            Create Category
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
