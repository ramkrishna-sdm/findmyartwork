@extends('layouts.frontend.artist.app')
@section('content')
    <div class="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Your Artworks') }}</h3>
                                </div>
                            </div>
                        </div>
                        
                        <div class="message-alert-top">
                            @if(Session::has('success_message'))
                            <div><div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success_message') !!}</em></div></div>
                            @endif
                            @if(Session::has('error_message'))
                            <div><div class="alert alert-danger"><em> {!! session('error_message') !!}</em></div></div>
                            @endif
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($artworks as $key => $artwork)

                                                <tr>
                                                    <td><a href="{{url('/artist/edit_artwork')}}/{{$artwork->id}}"><img src="{{$artwork->artwork_images[0]->media_url}}" class="show_slider" height="50px" width="100px" data-artwork-id="{{$artwork->id}}" data-toggle="modal" data-target="#myModal"></a></td>
                                                    <td>{{$artwork->title}}</td>
                                                    
                                                    <td class="text-right">
                                                        <a href="{{url('/artist/view_artwork')}}/{{$artwork->id}}" class="btn btn-danger btn-link btn-sm view view_artwork" title="View artwork"><i class="fa fa-eye"></i></a>
                                                        <a href="{{url('/artist/change_artwork_status')}}/{{$artwork->id}}/{{$artwork->is_publised}}/artworks/{{$artwork->user_id}}" class="btn btn-danger btn-link btn-sm change_artwork_status" title="@if($artwork->is_publised == 'publish') Click to Un-Publish @else Click to Publish @endif"><i class="fa fa-power-off"></i></a>
                                                        <a href="{{url('/artist/delete_artwork')}}/{{$artwork->id}}" class="btn btn-danger btn-link btn-sm remove delete_artwork" title="Delete"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div><!-- end content-->
                                </div><!--  end card  -->
                            </div> <!-- end col-md-12 -->
                        </div> <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
