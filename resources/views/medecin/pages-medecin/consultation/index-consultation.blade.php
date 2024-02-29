@extends('medecin.layouts-medecin.entete-medecin')
@section('content')
    <div class="app-wrapper ">
        <div class="app-content pt-3 p-md-3 p-lg-4 bg-gray">
            <div class="container-xl mt-5">

                <h1 class="app-page-title mt-5">Liste Consultations</h1>
                <hr class="mb-4">

                <div class="tab-content" id="orders-table-tab-content">
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">N</th>
                                                <th class="cell">Code Patient</th>
                                                <th class="cell">Nom</th>
                                                <th class="cell">E-mail</th>
                                                <th class="cell">Contact</th>
                                                <th class="cell">Date de naissance</th>
                                                <th class="cell">Note</th>
                                                <th class="cell">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($patients_consultation as $item)
                                                <tr>
                                                    <td class="cell"></td>
                                                    <td class="cell">{{ Str::upper($item->code_patient) }}</td>
                                                    <td class="cell">{{ Str::upper($item->nom) }}</td>
                                                    <td class="cell">{{ $item->email }}</td>
                                                    <td class="cell">{{ $item->contact }}</td>
                                                    <td class="cell">{{ $item->datenais }}</td>
                                                    <td class="cell">{{ Str::upper($item->note) }}</td>
                                                    <td class="cell">
                                                        <a class="btn btn-sm" href=""><i class="fa-solid fa-edit fa-1x"></i></a>
                                                        <a class="btn btn-sm" href=""><i class="fa-solid fa-eye fa-1x"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="cell" colspan="12">
                                                        <div class="" style="text-align: center">Aucune patient enregistré pour la consultation</div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div><!--//table-responsive-->

                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                        <nav class="app-pagination">
                            <ul class="pagination justify-content-center">

                            </ul>
                        </nav><!--//app-pagination-->
                        @if(Session::has('message'))
                            <script>
                                swal("Message", "{{ Session::get('message') }}", 'danger', {
                                    button:true,
                                    button: "OK"
                                });
                            </script>
                        @endif
                    </div><!--//tab-pane-->
                </div><!--//tab-content-->

            </div><!--//container-fluid-->
        </div>
    </div>
@endsection
