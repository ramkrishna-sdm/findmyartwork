@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'aboutus',
])

@section('content')
    <div class="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('About Us') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ url('update_aboutus') }}" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="pl-lg-4">
                                   <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Title') }}</label>
                                        <input type="text" name="title" id="input-name" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title') }}" required autofocus>

                                        @if ($errors->has('title'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                   	</div>
                                   	
                                   	<div class="form-group{{ $errors->has('des_first') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
										<textarea name="des_first" id="des_first" cols="30" rows="10"></textarea>

                                        @if ($errors->has('des_first'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('des_first') }}</strong>
                                            </span>
                                        @endif
                                   	</div>
                                   	<div class="form-group{{ $errors->has('second_img_url') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Image Upload') }}</label>
										 <input type="file" name="first_img_url">

                                        @if ($errors->has('first_img_url'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_img_url') }}</strong>
                                            </span>
                                        @endif
                                   	</div>
                                   	<div class="form-group{{ $errors->has('des_second') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
										<textarea name="des_second" id="des_second" cols="30" rows="10"></textarea>

                                        @if ($errors->has('des_second'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('des_second') }}</strong>
                                            </span>
                                        @endif
                                   	</div>
                                   	<div class="form-group{{ $errors->has('second_img_url') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Image Upload') }}</label>
										 <input class="form-control form-control-alternative" type="file" name="second_img_url"/>

                                        @if ($errors->has('second_img_url'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('second_img_url') }}</strong>
                                            </span>
                                        @endif
                                   	</div>
                                   	<div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Slug') }}</label>
                                        <input type="text" name="slug" id="input-name" class="form-control form-control-alternative{{ $errors->has('slug') ? ' is-invalid' : '' }}" placeholder="{{ __('Slug') }}" value="{{ old('slug') }}" required autofocus>

                                        @if ($errors->has('slug'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('slug') }}</strong>
                                            </span>
                                        @endif
                                   	</div>
                                    
                                   
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection