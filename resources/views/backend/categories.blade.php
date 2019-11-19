@extends('layouts.app', [
    'class' => '',
    'elementActive' => ''
])

@section('content')
    <div class="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Category') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ url('/category/add') }}" class="btn btn-sm btn-primary">{{ __('Add category') }}</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>

                        <div class="table-responsive">
                        <div class="message-alert-top">
                            @if(Session::has('success_message'))
                            <div><div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success_message') !!}</em></div></div>
                            @endif
                            @if(Session::has('error_message'))
                            <div><div class="alert alert-danger"><em> {!! session('error_message') !!}</em></div></div>
                            @endif
                        </div>
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th scope="col">{{ __('Creation Date') }}</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="nc-align-left-2 nc-icon"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        @if ($category->id != auth()->id())
                                                            <form action="{{ url('/category/destroy', $category) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                
                                                                <a class="dropdown-item" href="{{ url('/category/edit', $category) }}">{{ __('Edit') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                    {{ __('Delete') }}
                                                                </button>
                                                            </form>    
                                                        @else
                                                            <a class="dropdown-item" href="{{ url('/category/edit') }}">{{ __('Edit') }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <?php //dd('here')?>
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                              
                            </nav>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection