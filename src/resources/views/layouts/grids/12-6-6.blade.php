@extends('web::layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-12">
    @yield('row')
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">

      @yield('left')

    </div>
    <div class="col-md-6">

      @yield('right')

    </div>
  </div>

@stop
