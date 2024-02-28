@extends('medecin.layouts-medecin.entete-medecin')
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
                                </div>

                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-4 col-lg-4">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Total Consultation du Jour</h4>
                                <div class="stats-figure">2</div>
                                <div class="stats-meta text-success">
                                </div>
                            </div>
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                    </div>

                    <div class="col-4 col-lg-4">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Total Rendez-vous du Jour</h4>
                                <div class="stats-figure">3</div>
                                <div class="stats-meta text-success">
                                </div>
                            </div>
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                    </div>
                    <div class="col-4 col-lg-4">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Total Ordonnance du Jour</h4>
                                <div class="stats-figure">4</div>
                                <div class="stats-meta text-success">
                                </div>
                            </div>
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                    </div>
                    <div class="col-4 col-lg-4">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Total Consultations</h4>
                                <div class="stats-figure">3</div>
                                <div class="stats-meta text-success">
                                </div>
                            </div>
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                    </div>
                    <div class="col-4 col-lg-4">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Total Rendez-vous</h4>
                                <div class="stats-figure">3</div>
                                <div class="stats-meta text-success">
                                </div>
                            </div>
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                    </div>
                    <div class="col-4 col-lg-4">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Total Ordonnances</h4>
                                <div class="stats-figure">3</div>
                                <div class="stats-meta text-success">
                                </div>
                            </div>
                            <a class="app-card-link-mask" href="#"></a>
                        </div>
                    </div>
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
                                </div>

                            </div>
                        </div>
                        <nav class="app-pagination">
                            <ul class="pagination justify-content-center">

                            </ul>
                        </nav>
                        @if(Session::has('message'))
                            <script>
                                swal("Message", "{{ Session::get('message') }}", 'danger', {
                                    button:true,
                                    button: "OK"
                                });
                            </script>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
