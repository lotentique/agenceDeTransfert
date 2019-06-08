@extends('layouts.baseBcm')

@section('content')
<div class="row Status" style="background-color: #f2f2f2;" >
<div class="col-sm-12">
{!! $stats->container() !!}
</div>
{!! $stats->script() !!}
</div>

<div class="scroll" style="box-shadow: 1px 0px 0px 2px gray;width: 100%;margin-top: 20px;">
<table class="table table-striped table-bordered tbD" id="PTable">
        <thead>
            <tr>
                <th>Transaction numero</th>
                <th>Effectuee par</th>
                <th>Point de transfert</th>
                <th>Ville</th>
                <th>date d'envois</th>
                <th>Status</th>
                <th>tarif</th>
                <th>montant</th>
            </tr>
        </thead>
        <tbody>
            @if (count($Transfert))
            @foreach($Transfert as $row)
            <tr>

                <td>{{$row->id}}</td>
                 @if (count($Transfert))
                  @foreach($users as $row2)
                      @if ($row2->id==$row->effectue_par)
                      <td>{{$row2->login}}</td>
                      @endif
                  @endforeach
                    @foreach($Ptransfert as $row2)
                        @if ($row2->id==$row->id_pnt)
	                       <td>{{$row2->nom}}</td>
	                       @foreach($villes as $row3)
		                       @if ($row2->id_ville==$row3->id_ville)
		                        <td>{{$row3->nom}}
                                    @foreach($villes as $row4)
                                    @if ($row4->id_ville==$row->id_ville)
		                        	/{{$row4->nom}}
                                    @endif
                                    @endforeach
		                        </td>
		                        @endif
	                        @endforeach
                       @endif
                   @endforeach


                  @endif
                
                
                <td>{{$row->created_at}}</td>
                
                
                @if ($row->status==0)
                <td>en cours</td>
                @else
                <td>recuperer</td>
                @endif

                <td>{{$row->tarif}}</td>
                <td>{{$row->montant}}</td>
                 

            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
<div class="Status" style="width: 100%;text-align: left;">
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