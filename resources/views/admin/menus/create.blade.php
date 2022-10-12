@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">

	    <div class="col-md-8 col-md-offset-2">

    		<h1>Create New Menu</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    		<form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
    		    <div class="form-group">
    		        <label for="title">Name Menu <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="name" />
    		    </div>
    		    <div class="form-group">
    		        <label for="title">Price <span class="require">*</span></label>
    		        <input type="number" class="form-control" name="price" />
    		    </div>
    		    <div class="form-group">
    		        <label for="title">Image <span class="require">*</span></label>
    		        <input type="file" class="form-control" name="image" />
    		    </div>
                <select class="form-select" name="category_id" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    @foreach ($categories as $category )
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                  </select>
    		    <div class="form-group">
    		        <label for="description">Description</label>
                    <input id="desc" type="hidden" name="desc" name="content">
                    <trix-editor input="desc"></trix-editor>
    		    </div>

    		    <div class="form-group">
    		        <p><span class="require">*</span> - required fields</p>
    		    </div>

    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary">
    		            Create
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
