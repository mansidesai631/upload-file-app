@extends('index')
@section('title', 'Files')
@section('content')
<div class="container mt-5">
    <h2>File Information</h2>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">File Name</th>
                 <th scope="col">Upload Time</th>
            </tr>
        <tbody>
             <tr>
                <td>{{ $file->filename }}</td>
                <td>{{ $file->created_at }}</td>
            </tr>
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
