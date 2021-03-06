@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'artist',
])

@section('content')
    <div class="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="mb-0">{{ __('Artist Management') }}</h3>
                                </div>
                                <div class="col-md-4 text-right">
                                    <a href="{{ url('/admin/artist') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="{{ url('/admin/update_artist') }}" autocomplete="off">
                                @csrf
                                <input type="hidden" name="user_type" value="artist">
                                <h6 class="heading-small text-muted mb-4">{{ __('Artist information') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('First Name') }}</label>
                                        <input type="text" name="first_name" id="input-name" class="form-control form-control-alternative{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{ old('first_name') }}" required autofocus>

                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Last Name') }}</label>
                                        <input type="text" name="last_name" id="input-name" class="form-control form-control-alternative{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}" required autofocus>

                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-city">{{ __('City') }}</label>
                                        <input type="text" name="city" id="input-city" class="form-control form-control-alternative{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="{{ __('City') }}" value="{{ old('city') }}">

                                        @if ($errors->has('city'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-state">{{ __('State') }}</label>
                                        <input type="text" name="state" id="input-state" class="form-control form-control-alternative{{ $errors->has('state') ? ' is-invalid' : '' }}" placeholder="{{ __('State') }}" value="{{ old('state') }}">

                                        @if ($errors->has('state'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('state') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-country">{{ __('Country') }}</label>
                                        <input type="text" name="country" id="input-country" class="form-control form-control-alternative{{ $errors->has('country') ? ' is-invalid' : '' }}" placeholder="{{ __('Country') }}" value="{{ old('country') }}">

                                        @if ($errors->has('country'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('postal_code') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-postal_code">{{ __('Postal Code') }}</label>
                                        <input type="text" name="postal_code" id="input-postal_code" class="form-control form-control-alternative{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" placeholder="{{ __('Postal Code') }}" value="{{ old('postal_code') }}">

                                        @if ($errors->has('postal_code'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('postal_code') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('postal_code') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-postal_code">{{ __('Biography') }}</label>
                                        <textarea class="form-control" rows="3" name="biography">{{old('biography')}}</textarea>
                                    </div>
                                    <div class="col-md-12 p-0">
                                         <label class="form-control-label" for="input-postal_code">{{ __('Profile Image') }}</label>
                                        <div class="picture-container">
                                            <div class="picture">
                                                <input class="form-control" type="file" id="wizard-picture" name="media_url">
                                            </div>
                                        </div>
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