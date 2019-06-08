@extends('layouts.base')

@section('content')

<div class="UT">
<div class="row">

	<div class="col-xs-4 UTO UTO1" >
		<button>
			<span class="glyphicon glyphicon-user"></span>
			<h5 >AGENTS <i id="nbragent">: {{$nagent}}</i></h5>
		</button>	
	</div>

	<div class="col-xs-4 UTO UTO2" >		
		<button >
			<span class="glyphicon glyphicon-user"></span>
			<span class="glyphicon glyphicon-pencil"></span>
			<h5>ADMIN <i id="nbradmin">: {{$nadmin}}</i></h5>
		</button>		
	</div>

	<div class="col-xs-4 UTO UTO3">
		<button >
			<span class="glyphicon glyphicon-user"></span>
			<span class="glyphicon glyphicon-eye-open"></span>
			<h5>BCM <i id="nbrbcm">: {{$nbcm}}</i></h5>
		</button>		
	</div>
	
</div>

</div>


<div class="FormAjout">
	@include('admin.Utilisateurs.FormAjout')
</div>
<div class="FormModif">
	@include('admin.Utilisateurs.FormModif')
</div>

{{ csrf_field() }}
<div id="res"></div>

@endsection
