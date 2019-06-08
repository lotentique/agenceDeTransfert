@extends('layouts.base')

@section('content')
<div class="row">
        <div class="col-sm-6 col-lg-3" >
            <div class="card bg-c-blue order-card" >
                <div class="card-block">
                    <h2><i class="fa fa-arrow-down f-left"></i><i class="fa fa-money f-left"></i><span class="tx">{{ $sommeCaiss }} UM</span></h2>
                    <h4 class="m-b-0">Somme Actuel des caisse</h4>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h2><i class="fa fa-arrow-up f-left"></i><span>{{ $sommeRetrai }} UM</span></h2>
                    <h4 class="m-b-0">Somme des retrais non effectue</h4>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h2><i class="fa fa-credit-card f-left"></i><span>{{ $capital }} UM</span></h2>
                    <h4 class="m-b-0">Capital</h4>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h2><i class="fa fa-money f-left"></i><span>{{ $gain }} UM</span></h2>
                    <h4 class="m-b-0">gain journalie</h4>
                </div>
            </div>
        </div>
	</div>
    <div class="row Status" style="background-color: #f2f2f2;" >
        <div class="col-sm-12">
        {!! $stats->container() !!}
        </div>
        {!! $stats->script() !!}
        </div>
    
        <div style="width: 100%;text-align: left;">
             <h4 >Point de transfert le plus actif <span class="PMact" >Point de transfert le plus actif</span></h4>

            <div class="row">
 
            <div class="col-sm-4">

            {!! $statsPA->container() !!}
            </div>

            {!! $statsPA->script() !!}
           
              <h4 class="PMact2">Point de transfert le moins actif</h4>
           
            <div class="col-sm-4">
         
            {!! $statsPMA->container() !!}
            </div>
            {!! $statsPMA->script() !!}
            </div>
       </div>
    

</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endsection

