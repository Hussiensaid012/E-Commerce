@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Edit Costomer
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Edit Costomer
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

                <form method="post" action="{{ route('costomer.update',$costomer->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $costomer->name }}" class="form-control">
                            <input type="hidden" name="id" value="{{ $costomer->id }}">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ $costomer->email }}" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" value="{{ $costomer->phone }}" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="addres">Addres</label>
                            <input type="text" name="adders" value="{{ $costomer->adders }}" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">password</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                <input type="password" id="password" class="form-control" name="password" value="{{ $costomer->password }}">
                            </p><br><br>
                            <input type="checkbox" class="form-check-input" onclick="myFunction()"
                                id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">اظهار كلمة المرور</label>
                        </div>
                    </div>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit">Next</button>
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
