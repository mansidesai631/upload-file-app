@extends('layouts.app')

@section('content')
<div class="container text-center my-5">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Upload your Files</h4>
                <a href="/uploadFile" class="btn btn-primary">Upload File</a>
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">All your files</h4>
                <a href="/getMyFiles" class="btn btn-primary">My Files</a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
