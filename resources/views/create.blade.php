@extends('layouts.app')

@section('content')

<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">{{ __('Create a new Book List !') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="row g-3" enctype="multipart/form-data" action="{{ route('addbook') }}" method="post">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                        <div class="col-md-6">
                            <label for="bookName" class="form-label">Nama Buku:</label>
                            <input type="text" class="form-control" name="bookName" id="bookName">
                        </div>
                        <div class="col-md-3">
                            <label for="tahunT" class="form-label">Tahun Terbit : </label>
                            <input type="number" class="form-control" name="tahunT"  id="tahunT">
                        </div>
                        <div class="col-md-3">
                            <label for="author" class="form-label">Author : </label>
                            <input type="text" class="form-control" name="author" id="author">
                        </div>
                        <div class="col-md-6">
                            <label for="publishers" class="form-label">Publisher : </label>
                            <input type="text" class="form-control" name="publishers" id="publishers" >
                        </div>
                        <div class="col-md-3">
                            <label for="pageCount" class="form-label">Page Count :</label>
                            <input type="number" class="form-control" name= "pageCount" id="pageCount">
                        </div>
                        <div class="col-md-3">
                            <label for="ReadPage" class="form-label">Read Page :</label>
                            <input type="number" class="form-control" name="ReadPage" id="ReadPage">
                        </div>
                        <div class="col-12">
                            <label for="Summary" class="form-label">Summary :</label>
                            <textarea class="form-control" name= "Summary" id="Summary"></textarea>
                            <br><br>
                        </div>
                        <div class="col-md-12">
                            <label for="images" class="form-label">Book Image :</label>
                            <input type="file" class="form-group" name="images">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Add Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
