@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'payment_history'
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
                                    <h3 class="mb-0">{{ __('Payment History') }}</h3>
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
                                                    <th scope="col">{{ __('Artist') }}</th>
                                        <th scope="col">{{ __('Buyer') }}</th>
                                                    <th class="disabled-sorting text-right">Payment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($payment_history)>0)
                                                @foreach($payment_history as $key => $payment)
                                                <?php
                                                $json_info = json_decode($payment->artwork_info);
                                                //dd($json_info);
                                                ?>
                                                <tr>
                                                    <td>{{$json_info->artist->first_name}} {{$json_info->artist->last_name}}</td>
                                                    <td></td>
                                                    <td>${{$json_info->variants[0]->price}}</td>
                                                    
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div><!-- end content----->
                                </div><!--  end card  -->
                            </div> <!-- end col-md-12 -->
                        </div> <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection