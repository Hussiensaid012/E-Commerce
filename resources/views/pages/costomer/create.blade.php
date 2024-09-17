@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Create Costomer New
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Create Costomer New
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('costomer.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">password</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                <input type="password" id="password" class="form-control" name="password">
                            </p><br><br>
                            <input type="checkbox" class="form-check-input" onclick="myFunction()" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">اظهار كلمة المرور</label>
                        </div>
                    </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Next</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endsection
