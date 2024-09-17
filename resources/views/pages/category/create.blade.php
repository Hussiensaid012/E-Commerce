@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Add New Category
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Add New Category
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

                <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">

                        <div class="col">
                            <label for="name">Name categories</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                    </div>
                    <br>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="image">Image category : <span class="text-danger">*</span></label>
                                <input type="file" accept="application/image" name="image">
                            </div>
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
@endsection
