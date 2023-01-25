<?php
use Carbon\Carbon;
?>

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
    <div class="col-4">
        <form action="?times=365&search=" class="d-flex my-2 my-lg-0" method="GET">
            <input class="form-control me-sm-2" name="search" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <div class="col-4">
        <form action="?" method="get">
            <div class=" input-group mb-3">
                <select class="form-select form-select" name="times" id="times">
                    <option value="{{ $times }}"> Currently Selected: {{ $times }} Days </option>
                    <option value="365">1 Year recently</option>
                    <option value="240">8 Month recently</option>
                    <option value="120">4 Month recently</option>
                    <option value="60">2 Month recently</option>
                    <option value="30">1 Month recently</option>
                    <option value="7">7 Days recently</option>
                    <option value="1">1 Days recently</option>
                </select> 
                <button class="btn btn-primary"> <i class="bi bi-funnel"></i> </button>
                <a href="#" class="btn btn-success"> <i class="bi bi-file-earmark-spreadsheet"></i> </a>
            </div>
        </form>      
    </div>
    <div class="col-1">
        
    </div>
    <div class="col-1">
       
    </div>
</div>


<table class="table table-sm table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Kelas</th>
            <th>Status</th>
            <th>Absen pada</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <?php 
        
            $post_created_at = Carbon::parse($post->created_at);
        ?>
            <tr>
                <td> {{ $loop->iteration }}</td>
                <td> {{ $post->name }} </td>
                <td> {{ $post->class }} </td>
                <td> {{ $post->status }} </td>
                <td> {{ $post_created_at->diffForHumans() }}</td>
                <td>
                    {{-- <a href="/dashboard/{{ $post->groupID }}" class="badge bg-info border-0"> <i class="bi bi-eye"></i></a> --}}
                    {{-- <a href="/dashboard/{{ $post->id }}/edit" class="bg-warning badge border-0"> <i class="bi bi-pencil-square"></i></a> --}}
                    {{-- <form class="d-inline" action="/dashboard/{{ $post->groupID }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-danger badge border-0" onclick="return confirm('Are you sure you want to delete this item?')"> <i class="bi bi-calendar2-x"></i> </button>
                    </form> --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $posts->links() }}
@endsection