@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card box-sh">
                <div class="card-header bg-dark text-light "><b>Dashboard</b></div>
                <div class="card-body">
                    {{-- @include('layouts.flash') --}}
                    <x-alert/>
                    <form action="/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name='image'>
                        <input type="submit" value="upload" >
                    </form>
               
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
