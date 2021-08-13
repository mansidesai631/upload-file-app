@extends('index')
@section('title', 'Files')
@section('content')
<div class="container mt-5">
    <h2>Your Files</h2>
    <table class="table mt-3">
        <tbody>
            @foreach($files as $file)
            <tr>
                <td><a href="/getFileInfo/{{ $file['code'] }}">{{ asset($file['code']) }}</td>
                <td><a href="/delete/{{ $file['code'] }}" class="btn btn-sm btn-success">Delete</a></td>
                <td><a href="/download/{{ $file['code'] }}" class="btn btn-sm btn-success">Download</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if(!empty(Session::get('success')))
        <div class="alert alert-success"> {{ Session::get('success') }}</div>
    @endif
    @if(!empty(Session::get('error')))
        <div class="alert alert-danger"> {{ Session::get('error') }}</div>
    @endif
</div>
@endsection
