@extends('layouts.master.master')

@section('container')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <p class="fs-5"> Buat Kelas Baru </p>
            </div>
        </div>
        <div class="card-body">
            <form action="/master_classes/{{ $post[0]->id }}" method="post">
            @method('patch')
            @csrf
            <label class="form-label" for="class"> Nama Kelas</label>
            <input class="form-control @error('class')
                is-invalid
            @enderror" type="text" name="class" id="class" placeholder="Kelas" value="{{ $post[0]->class }}">
            @error('class')
                <div class="invalid-feedback">
                    <p> {{ $message }} </p>
                </div>
            @enderror
            <div class="d-grid gap-2">
                <button onclick="return confirm('Are you sure you want to submit this data?')" class="btn btn-primary d-block my-3"> <i class="bi bi-database-fill-add"></i> Submit Your Data! </button>
            </div>
            
            </form>
        </div>
    </div>
@endsection