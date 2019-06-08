@extends('layouts.base')
@section('content')

<div class="NL">
  <div class="panel " style="background-color:rgba(0, 0, 0, 0.26);border:none;">
        <div class="panel-heading" style="border-bottom:4px solid Slateblue; background-image: -webkit-linear-gradient(50deg, black 0%, gray 100%);"><h4 style="font-family:  times new roman;text-transform: uppercase;color: white;">IMPORTER</h4></div>
        <div class="panel-body">
		    <div class="gauche">
                <form class="form-horizontal" method="post" action="{{ route('im') }}" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Selectionner le Ficher:') }}</label>
				    <input type="hidden" name="_token" value="{{CSRF_Token()}}">
				    <div class="col-md-6"> 
				    <input type="file" name="file" ><br>
				     </div>
                    </div>
				    <input type="submit" value="importer" class="btn cf btn-success" style="margin-top: 5px;">
			    </form>
			    

			    <!--@if(count($errors) >0)
			    <div class="alert alert-danger">
			      <ul>
			        @foreach($errors->all() as $error)
			        <li>{{ $error }}</li>
			        @endforeach
			      </ul>
			    </div>
			    @endif-->
			</div>
			<!--<div class="droite">
			    
			</div>-->
       </div>
    </div>
</div>
@endsection
