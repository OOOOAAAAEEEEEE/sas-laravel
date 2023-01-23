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
        {{-- <form action="/dashboard" method="post">
            @csrf
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <button type="submit" class="btn btn-primary"> <i class="bi bi-file-earmark-plus"></i> </button>
        </form> --}}
            <a href="#" class="btn btn-success"> <i class="bi bi-file-earmark-spreadsheet"></i> </a>
    </div>
</div>


<table class="table table-sm table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Kelas</th>
            <th>Tanggal Dibuat</th>
            <th>Tanggal DiUpdate</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->masterClass }}</td>
                <td> {{ $post->created_at }}</td>
                <td> {{ $post->updated_at }}</td>
                <td>
                    <a href="/dashboard/{{ $post->groupID }}" class="badge bg-info border-0"> <i class="bi bi-eye"></i></a>
                    {{-- <a href="/dashboard/{{ $post->id }}/edit" class="bg-warning badge border-0"> <i class="bi bi-pencil-square"></i></a> --}}
                    <form class="d-inline" action="/dashboard/{{ $post->groupID }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-danger badge border-0" onclick="return confirm('Are you sure you want to delete this item?')"> <i class="bi bi-calendar2-x"></i> </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection