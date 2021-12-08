@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Agent Details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>OS</td>
                                <td>{{$clientDetails['os']}}</td>
                            </tr>
                            <tr>
                                <td>Device Name</td>
                                <td>{{$clientDetails['device']}}</td>
                            </tr>
                            <tr>
                                <td>Browser</td>
                                <td>{{$clientDetails['browser']}}</td>
                            </tr>
                            <tr>
                                <td>Language</td>
                                <td>{{$clientDetails['language']}}</td>
                            </tr>
                            <tr>
                                <td>Country Code</td>
                                <td>{{$userInfo->country_code}}</td>
                            </tr>
                            <tr>
                                <td>Country Name</td>
                                <td>{{$userInfo->country}}</td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>{{$userInfo->city}}</td>
                            </tr>
                            <tr>
                                <td>Postal Code</td>
                                <td>{{$userInfo->postal_code}}</td>
                            </tr>                            
                            <tr>
                                <td>IP Address</td>
                                <td>{{$userInfo->ip_address}}</td>
                            </tr>
                            <tr>
                                <td>Latitude</td>
                                <td>{{$userInfo->latitude}}</td>
                            </tr>
                            <tr>
                                <td>Longitude</td>
                                <td>{{$userInfo->longitude}}</td>
                            </tr>
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
