@extends('layouts.app')

@section('content')

<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Book Details!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="row g-3">
                        @foreach ($booksDTL as $deTailsB)
                        <div class="col-md-6">
                            <img src="{{ asset('Uploads/'.$deTailsB->images) }}" width="270px" height="370px" title="{{ $deTailsB->images }}"/>
                        </div>
                        <div class="col-md-6">
                            <H1>{{ ucfirst(trans($deTailsB->name)) }}</H1>
                            <p>{{ strtoupper($deTailsB->author) }}</p>
                        </div>
                        <div >
                        </div>
                        <div class="row g-1"><br><br></div>
                        <div class="col-md-12">

                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                     <a class="nav-link active" data-toggle="tab" href="#home">Summary</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu1">Details</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane container active" id="home">
                                    <label id="Summary">{{ $deTailsB->summary }}</label>
                                </div>
                                <div class="tab-pane container fade" id="menu1">
                                    <br>
                                    <label for="tahunT" class="form-label">Tahun Terbit  : {{ $deTailsB->year }}</label><br> 
                                    <label for="tahunT" class="form-label">Tahun Terbit  : {{ $deTailsB->year }}</label><br>
                                    <label for="publishers" class="form-label">Publisher      : {{ $deTailsB->publisher }}</label><BR>
                                    <label for="pageCount" class="form-label">Page Count : {{ $deTailsB->pageCount }}</label><br>
                                    <label for="ReadPage" class="form-label">Read Page      : {{ $deTailsB->readPage }}</label> <br>
                                </div>
                            </div>
                            <BR>
                            <a href="{{ route('home') }}" class="btn btn-warning" title="back"><i class="fa fa-arrow-left"></i></a>
                            <a href="{{ route('info',[$deTailsB->id]) }}" class="btn btn-primary" title="back"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{ route('deletebook',[$deTailsB->id]) }}" method="POST" class="d-inline">
                                 @csrf
                                 @method('delete')
                                 <button type="submit" onclick="return confirm('Are you sure to delete this book?')" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></button>
                            </form>
                        @endforeach                   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
     function openClick(){    
        $('#myTab a[href="#nav-profile"]').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
     }
</script>
@endsection
