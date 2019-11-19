@extends('layouts.app', [
    'class' => '',
    'elementActive' => ''
])
@section('content')
    <div class="content">
       
        <div class="row">
            <div class="col-md-12 text-center">
            <div class="message-alert-top">
                @if(Session::has('success_message'))
                <div><div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success_message') !!}</em></div></div>
                @endif
                @if(Session::has('error_message'))
                <div><div class="alert alert-danger"><em> {!! session('error_message') !!}</em></div></div>
                @endif
            </div>
                <form data-toggle="validator" class="col-md-12" action="{{ url('category/save_category') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Add Category') }}</h5>
                            
                        <div class="col-12 text-right">
                           <a href="{{ url('category') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __(' Category Name') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="" required>
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


