@extends('layouts.master.master')

@section('container')
<div class="row my-3">
    <div class="col-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p>{{ session('success') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="col-7">
        
    </div>
        <div class="col-1">
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a href="/master_status/create" class="btn btn-primary"> <i class="bi bi-file-earmark-plus-fill"></i></a>
                <a href="/master_status/export" class="btn btn-success"> <i class="bi bi-file-earmark-spreadsheet"></i> </a>
            </div>
        </div>
    </div>


<table class="table table-sm table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Status</th>
            <th>Tanggal Dibuat</th>
            <th>Tanggal DiUpdate</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td> {{ $loop->iteration }} </td>
                <td> {{ $post->class }} </td>
                <td> {{ $post->created_at }} | {{ $post->created_at->diffForHumans() }} </td>
                <td> {{ $post->updated_at }} | {{ $post->updated_at->diffForHumans() }} </td>
                <td>
                    {{-- <a href="/master_classes/{{ $post->id }}" class="badge bg-info border-0"> <i class="bi bi-eye"></i></a> --}}
                    <a href="/master_status/{{ $post->id }}/edit" class="bg-warning badge border-0"> <i class="bi bi-pencil-square"></i></a>
                    <form class="d-inline" action="/master_status/{{ $post->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-danger badge border-0" onclick="return confirm('Are you sure you want to delete this item?')"> <i class="bi bi-calendar2-x"></i> </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


{{ $posts->links() }}
@endsection