@extends('layouts.app')

@section('content')

<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Edit Book !') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($toEdit as $dt)
                    <form class="row g-3" enctype="multipart/form-data" method="POST" action="{{ route('update', $dt->id) }}" value="PUT">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <label for="bookName" class="form-label">Nama Buku:</label>
                            <input type="text" class="form-control" name ="bookName"id="bookName" value="{{ ($dt->name) }}">
                        </div>
                        <div class="col-md-3">
                            <label for="tahunT" class="form-label">Tahun Terbit : </label>
                            <input type="number" class="form-control" name="tahunT" id="tahunT" value="{{ ($dt->year) }}">
                        </div>
                        <div class="col-md-3">
                            <label for="author" class="form-label">Author : </label>
                            <input type="text" class="form-control" name="author" id="author" value="{{ ($dt->author) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="publishers" class="form-label">Publisher : </label>
                            <input type="text" class="form-control" name="publishers" id="publishers" value="{{ ($dt->publisher) }}">
                        </div>
                        <div class="col-md-3">
                            <label for="pageCount" class="form-label">Page Count :</label>
                            <input type="number" class="form-control" name="pageCount" id="pageCount" value="{{ ($dt->pageCount) }}">
                        </div>
                        <div class="col-md-3">
                            <label for="ReadPage" class="form-label">Read Page :</label>
                            <input type="number" class="form-control" name="ReadPage" id="ReadPage"value="{{ ($dt->readPage) }}">
                        </div>
                        <div class="col-12">
                            <label for="Summary" class="form-label">Summary :</label>
                            <textarea class="form-control" name="Summary" id="Summary">{{ ($dt->summary) }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="images" class="form-label">Book Image :</label>
                            <input type="file" class="form-group" name="images">
                            <br>
                            <img src="{{ asset('Uploads/'.$dt->images) }}" width="30%"/>
                            <br>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
