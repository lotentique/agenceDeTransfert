@extends('layouts.base')

@section('content')
<div class="listtitre" style="width: 100%;margin-left: 0;">
    <h3>Transactions  <a href="{{ route('listeTransfert') }}" class="btn btn-primary"><i class="fa fa-export"></i> exporter</a></h3>

    </div>
    <div class="scroll" style="box-shadow: 1px 0px 0px 2px gray;width: 100%;">
    <table class="table table-striped table-bordered tbD" id="PTable">
        <thead>
            <tr>
                <th>Transaction numero</th>
                <th>Effectuee par</th>
                <th>Point de transfert</th>
                <th>Ville</th>
                <th>date d'envois</th>
                <th>date de recuperation</th>
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
                
                @if (!empty($row->date_recuperation))
                <td>{{$row->date_recuperation}}</td>
                @else
                <td><strong>.... / .. / ..   .. : .. : ..</strong></td>
                @endif
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

@endsection