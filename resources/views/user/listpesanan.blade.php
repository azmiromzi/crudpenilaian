@extends("layouts.appuser")

@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Pesanan Kamu</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Pesanan kamu</li>
            </ol>
        </nav>
    </div>
</div>


<div class="list-group">
    @foreach ($lists as $list )

    <div class="container">

        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active mb-2">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{ $list->menu->name }}</h5>
            <hr>
            <small >{{ $list->status->name }}</small>
          </div>
          <p class="mb-1  ms-1" style="font-style: italic">{{ $list->desc }}</p>
        </a>
    </div>
    @endforeach


</div>


@endsection

