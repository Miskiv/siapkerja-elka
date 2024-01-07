@extends('layouts.app')
@section('title', 'Home')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-2">
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>

<!-- Content Row -->
<div class="row justify-content-md-center">
    <div class="col-lg-8 mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if (Auth::user()->roles()->first()->name == 'Admin')
                    <h6 class="m-0 font-weight-bold text-primary">Welcome Admin !</h6> 
                @else
                    <h6 class="m-0 font-weight-bold text-primary">Welcome {{ head(explode(' ', Auth::user()->name)) }} !</h6>
                @endif
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-2 mb-4" style="width: 20rem;"
                        src="{{ asset('assets/bootstrap/img/undraw_posting_photo.svg') }}" alt="...">
                </div>
                <p>Add some quality, svg illustrations to your project courtesy of, a
                    constantly updated collection of beautiful svg images that you can use
                    completely free and without attribution!</p>
                <a target="_blank" rel="nofollow" href="https://instagram.com/danialicahyadi">Browse for more &rarr;</a>
            </div>
        </div>

    </div>
</div>
@stop
@push('js')
@endpush
