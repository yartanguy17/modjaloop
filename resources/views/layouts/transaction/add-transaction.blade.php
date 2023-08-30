@extends('theme.master-theme')
@section('title')
    Utilisateurs
@endsection

@section('style')
     
@endsection

@section('content')
<div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Transaction</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-6">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    <form class="mr-3 position-relative">
                                       <div class="form-group mb-0">
                                          <input type="search" class="form-control" id="exampleInputSearch" placeholder="Rechercher ..." aria-controls="user-list-table">
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                 <div class="user-list-files d-flex float-right">
                                 <a class="iq-bg-primary" href="#" data-toggle="modal" data-target="#add-user-view">
                                       Ajouter
                                     </a>
                                     <a class="iq-bg-primary" href="javascript:void();" >
                                       Print
                                     </a>
                                    <a class="iq-bg-primary" href="javascript:void();">
                                       Excel
                                     </a>
                                     <a class="iq-bg-primary" href="javascript:void();">
                                       Pdf
                                     </a>
                                   </div>
                              </div>
                           </div>
                           <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Expediteur</th>
                                    <th>Destinantaire</th>
                                    <th>Solde</th>
                                    <th>Date</th>
                                    <th>Etat</th>
                                    <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $transaction->code}}</td>
                                        <td>{{ $transaction->senderAccount->num_account}}</td>
                                        <td>{{ $transaction->receiverAccount->num_account }}</td>
                                        <td>{{ $transaction->amount }}</td>
                                        
                                        <td>{{ $transaction->created_at }}</td>
                                        <td>
                                        @if($transaction->dfsp_v==0 ) En-entente @else Bouclé @endif
                                        </td>
                                
                                        <div class="flex align-items-center list-user-action">
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add" href="#"><i class="ri-user-add-line"></i></a>
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach
                             </tbody>
                           </table>
                        </div>
                           <div class="row justify-content-between mt-3">
                              <div id="user-list-page-info" class="col-md-6">
                                 <span>Showing 1 to 5 of 5 entries</span>
                              </div>
                              <div class="col-md-6">
                                 <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end mb-0">
                                       <li class="page-item disabled">
                                          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                       </li>
                                       <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                       <li class="page-item"><a class="page-link" href="#">2</a></li>
                                       <li class="page-item"><a class="page-link" href="#">3</a></li>
                                       <li class="page-item">
                                          <a class="page-link" href="#">Next</a>
                                       </li>
                                    </ul>
                                 </nav>
                              </div>
                           </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>


    
    <div class="modal fade" id="add-user-view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouveille Transaction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('app.transaction.save') }}" method="POST"> 
                   
                <div class="row">

                        <div class="col-6">
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input type="text" class="form-control" value="{{rand(6500,8999)}}-{{rand(9000,9999)}}" readonly name="code">
                                    </div>
                        </div>
                  
                        <div class="col-6">
                            <div class="form-group">
                              <label>Expediteur</label>
                              <select name="account_sender_id" class="form-control">
                                 @foreach($accounts as $account)
                                    <option value="{{$account->id}}">{{$account->num_account}}</option>
                                 @endforeach
                               </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                              <label>Destinataire</label>
                              <select name="account_receiver_id" class="form-control">
                                 @foreach($accounts as $account)
                                    <option value="{{$account->id}}">{{$account->num_account}}</option>
                                 @endforeach
                               </select>
                            </div>
                        </div>

                  
                        <div class="col-6">
                            <div class="form-group">
                                <label>Montant</label>
                                <input type="number" class="form-control" name="amount">
                            </div>
                        </div>

                       
                    </div>

                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
            @csrf()
                </form>
            </div>
            
            </div>
        </div>
    </div>
@endsection

@section('js')


@endsection