@extends('layouts.baseAgent')

@section('content')
<div class="clearfix"></div>
@if(count($errors) >0)
	@foreach($errors->all() as $error)
	<div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss='alert'>X</button>
        <strong>{{ $error }}</strong>
    </div>
	@endforeach
@endif

@if(isset($messgae))
	@foreach($messgae->all() as $m)
	<div class="alert alert-Success alert-block">
        <button type="button" class="close" data-dismiss='alert'>X</button>
        <strong>{{ $m }}</strong>
    </div>
	@endforeach
@endif

<div class="row m-t-25">
	<div class="col-sm-6 col-lg-3">
		<div class="overview-item overview-item--c1">
			<div class="overview__inner">
				<div class="overview-box clearfix">
					<div class="icon">
						<i class="fas fa-exchange-alt"></i>
					</div><br>
					<div class="text">
						<h2>{{ $nbrtrans }}</h2>
						<span>Transfer</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="overview-item overview-item--c2">
			<div class="overview__inner">
				<div class="overview-box clearfix">
					<div class="icon">
						<i class="zmdi zmdi-money-box"></i><i class="zmdi zmdi-long-arrow-up"></i>
					</div><br>
					<div class="text">
						<h2>{{ $nbrretrais }}</h2>
						<span>Retrais</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="overview-item overview-item--c3">
			<div class="overview__inner">
				<div class="overview-box clearfix">
					<div class="icon">
						<i class="fas fa-arrow-left"></i>
						<span style="color:white; font-weight: 700; font-size: 19px;">{{$transrecu}}</span>
					</div><br>
					<div class="text">
						<p style="color:white; font-weight: 700; font-size: 19px;">{{$somme}} UM</p>
						<span>transfert recus</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-lg-3">
		<div class="overview-item overview-item--c4">
			<div class="overview__inner">
				<div class="overview-box clearfix">
					<div class="icon">
						<i class="zmdi zmdi-money"></i>
					</div><br>
					<div class="text">
						<p style="color:white; font-weight: 700; font-size: 19px;">{{$caisse}} UM</p>
						<span>Caisse</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection