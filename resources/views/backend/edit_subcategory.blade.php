@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'subcategory',
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
                                    <h3 class="mb-0">{{ __('Add Subcategory') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ url('subcategory') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="{{ url('update_subcategory') }}" autocomplete="off">
                                @csrf
                                <input type="hidden" name="user_type" value="subcategory">
                                <input type="hidden" name="id" value="{{$subcategory->id}}">
                                <h6 class="heading-small text-muted mb-4">{{ __('Add Subcategory') }}</h6>
                                <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{$subcategory->name}}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Category') }}</label>
                                        <select class="form-control" name="category_id">
   
                                          <option value="">Select Category</option>
                                            
                                          @foreach ($categories as $key => $category)
                                            <option value="{{ $category->id }}" @if($category->id == $subcategory->category_id) selected @endif>{{ $category->name }}</option>
                                          @endforeach    
                                        </select>

                                        @if ($errors->has('category_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('category_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('media_url') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Image Upload') }}</label>
                                     <input class="form-control form-control-alternative" type="file" name="media_url"/>

                                    @if ($errors->has('media_url'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('media_url') }}</strong>
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