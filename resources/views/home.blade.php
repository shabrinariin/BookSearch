@extends('layouts.app')

@section('content')
<style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>

<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                      <div class="row-g-15">
                        <h5>Tabel Data Buku</h5>
                        <div class="mx-auto pull-right">
                            <div class="">
                                <form action="{{ route('home') }}" method="GET" role="search">

                                    <div class="input-group">
                                        <span class="input-group-btn mr-1 ">
                                            <button class="btn btn-info" title="Search projects">
                                                <span class="fa fa-search"></span>
                                            </button>
                                        </span>
                                        <input type="text" class="form-control mr-2" name="term" placeholder="Search Books" id="term">
                                        <a href="{{ route('home') }}">
                                            <span class="input-group-btn">
                                                <button class="btn btn-danger" type="submit" title="Refresh page">
                                                <i class="fa fa-refresh"></i>
                                                </button>
                                            </span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br><br>
                        <table class="table table-hover">
                            <thead>
                                <td>Id</td>
                                <td>Nama Buku</td>
                                <td>Tahun Terbit</td>
                                <td>Publisher</td>
                                <td>Action</td>
                            </thead>
                            <tbody>
                            @foreach ($books as $books)
                            <tr>
                                <td>{{$books->id}}</td>
                                <td>{{$books->name}}</td>
                                <td>{{$books->year}}</td>
                                <td>{{$books->publisher}}</td>
                                <td>
                                    <a href="{{ route('detailsBook',[$books->id]) }}" class="btn btn-info" title="details"><i class="fa fa-info" ></i></a>
                                    <a href="{{ route('info',[$books->id]) }}" class="btn btn-warning" title="edit"><i class="fa fa-pencil" ></i></a>
                                    <form action="{{ route('deletebook',[$books->id])}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Are you sure to delete this book?')" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></button>
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
    </div>
</div>

@endsection