@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'artists'
])
<script type="text/javascript">

</script>
@section('content')
    <div class="content">
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Artists') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <!-- <a href="{{ url('add_artist') }}" class="btn btn-sm btn-primary">{{ __('Add Artist') }}</a> -->
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
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>City</th>
                                                    <th>Country</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($artists as $key => $artist)
                                                <tr>
                                                    <td>{{$artist->first_name}}</td>
                                                    <td>{{$artist->last_name}}</td>
                                                    <td>{{$artist->email}}</td>
                                                    <td>{{$artist->city}}</td>
                                                    <td>{{$artist->country}}</td>
                                                    <td class="text-right">
                                                        <a href="{{url('edit_artist')}}/{{$artist->id}}" class="btn btn-warning btn-link btn-sm edit" title="Edit"><i class="fa fa-edit"></i></a>
                                                        <a href="{{url('delete_artist')}}/{{$artist->id}}" class="btn btn-danger btn-link btn-sm remove delete_artist" title="Delete"><i class="fa fa-times"></i></a>
                                                        <a href="{{url('change_artist_status')}}/{{$artist->id}}/{{$artist->is_active}}" class="btn btn-danger btn-link btn-sm change_artist_status" title="@if($artist->is_active == 'yes') Deactivate @else Activate @endif"><i class="fa fa-power-off"></i></a>
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