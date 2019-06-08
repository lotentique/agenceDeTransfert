@extends('layouts.base')

@section('content')


<div class="carte" style="margin-top: -20px;">
  @map([
       'lat' => '19.117963' ,
       'lng' => '-11.351122' ,
       'zoom' => '6' ,
       'markers' => [[
           'title' => 'gg',
           'lat' => '18.715698' ,
           'lng' => '-11.646685' ,

       ]],


  ])
</div>    
@endsection