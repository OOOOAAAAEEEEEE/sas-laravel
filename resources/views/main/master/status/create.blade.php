@extends('layouts.master.master')

@section('container')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <p class="fs-5"> Buat Kelas Baru </p>
            </div>
        </div>
        <div class="card-body">
            <form action="/master_status" method="post">
            @csrf
            <label class="form-label" for="status"> Nama Status</label>
            <input class="form-control @error('status')
                is-invalid
            @enderror" type="text" name="status" id="status" placeholder="Status" autofocus>
            @error('status')
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