@extends('layouts.app', [
    'class' => '',
    'elementActive' => ''
])
@section('content')
    <div class="content">
       
        <div class="row">
            <div class="col-md-12 text-center">
                <form data-toggle="validator" class="col-md-12" action="{{ url('category/save_category') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Add Category') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __(' Category Name') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ auth()->user()->name }}" required>
                                    </div>
                                        <span class="invalid-feedback" style="display: block;" role="alert"></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


