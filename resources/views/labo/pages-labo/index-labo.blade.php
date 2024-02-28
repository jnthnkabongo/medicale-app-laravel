@extends('labo.layouts-labo.entete-labo')
@section('content')
    <div class="app-wrapper ">
        <div class="app-content pt-3 p-md-3 p-lg-4 bg-gray">
            <div class="container-xl mt-5">

                <h1 class="app-page-title mt-5">Dashboard</h1>
                <hr class="mb-4">
                <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                    <div class="inner">
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="row gx-5 gy-3">
                                <div class="col-12 col-lg-12">
                                    <h3 class="mb-3">Bienvenu(e), {{Str::upper( \Illuminate\Support\Facades\Auth::user()->roles->intitule )}} {{Str::upper( \Illuminate\Support\Facades\Auth::user()->name )}} </h3>
                                    <div>Vivez simplement avec Gestion Médicale. Une application fait sur mésure pour la gestion de votre établisement Médicale.</div>
                                </div><!--//col-->

                            </div><!--//row-->
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><!--//app-card-body-->

                    </div><!--//inner-->
                </div><!--//app-card-->

                <div class="row g-4 mb-4">
                    <div class="col-6 col-lg-6">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Total Examen du jour</h4>
                                <div class="stats-figure">2</div>
                                <div class="stats-meta text-success">
                                </div>
                            </div><!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div><!--//app-card-->
                    </div><!--//col-->

                    <div class="col-6 col-lg-6">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Nombre Total des Examens</h4>
                                <div class="stats-figure">3</div>
                                <div class="stats-meta text-success">
                                </div>
                            </div><!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-6 col-lg-6">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Total Résultat du jour</h4>
                                <div class="stats-figure">4</div>
                                <div class="stats-meta text-success">
                                </div>
                            </div><!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-6 col-lg-6">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Total Résultat</h4>
                                <div class="stats-figure">3</div>
                                <div class="stats-meta text-success">
                                </div>
                            </div><!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div><!--//app-card-->
                    </div><!--//col-->
                </div>

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
                                                <th class="cell">Adresse</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td class="cell"></td>
                                                    <td class="cell"></td>
                                                    <td class="cell"></td>
                                                    <td class="cell"></td>
                                                    <td class="cell"></td>
                                                    <td class="cell"></td>
                                                    <td class="cell"></td>

                                                </tr>

                                                <tr>
                                                    <td class="cell" colspan="12">
                                                        <div class="" style="text-align: center">Aucune patient enregistré</div>
                                                    </td>
                                                </tr>


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
