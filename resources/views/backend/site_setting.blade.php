@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'site_setting',
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
                                    <h3 class="mb-0">{{ __('Site Setting') }}</h3>
                                </div>
                                
                            </div>
                        </div>
                        <div class="message-alert-top">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ url('/admin/update_site_setting') }}" autocomplete="off">
                                @csrf
                                <input type="hidden" name="id" value="@if(!empty($setting)){{$setting->id}} @endif">
                                <h6 class="heading-small text-muted mb-4">{{ __('Add Site Setting') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('mail_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Email Id') }}</label>
                                        <input type="email" name="mail_id" id="input-name" class="form-control form-control-alternative{{ $errors->has('mail_id') ? ' is-invalid' : '' }}" placeholder="{{ __('Email ID') }}" value="@if(!empty($setting)){{ $setting->mail_id }} @endif" required autofocus>

                                        @if ($errors->has('mail_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mail_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                     <div class="form-group{{ $errors->has('commission_persentage') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Payment Commission') }}</label>
                                        <input type="text" name="commission_persentage" id="input-name" class="form-control form-control-alternative{{ $errors->has('commission_persentage') ? ' is-invalid' : '' }}" placeholder="{{ __('Payment Commission') }}" value="@if(!empty($setting)){{ $setting->commission_persentage }} @endif" required autofocus>

                                        @if ($errors->has('commission_persentage'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('commission_persentage') }}</strong>
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