@extends('users.layouts.entete-users')
@section('content')
    <div>

    </div>
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4 mt-5">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Creation Rendez-vous</h1>
                </div>
                <div class="col-auto">
                     <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <a href="{{ route('liste-patient') }}" type="submit" class="btn app-btn-primary">Liste rendez-vous</a>
                            </div>
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-1"></div>
                <div class="col-12 col-md-10 mt-3">
                    <div class="app-card app-card-settings shadow-sm p-4 ">

                        <div class="app-card-body">
                            <form class="settings-form"  action="" method="GET" >
                                @csrf
                                <div class="row g-2">
                                    <div class="col-md-9">
                                         <label for="setting-input-2" class="form-label">Code Patient </label>
                                        <input type="password" class="form-control" id="inputPassword2" >
                                    </div>
                                    <div class="col-md-3 pt-2">
                                        <label for="setting-input-2" class="form-label"> </label>
                                        <button type="submit" class="btn app-btn-primary mb-3 w-100">Trouver Patient</button>
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <label for="setting-input-2" class="form-label">Patient </label>
                                    <input type="text" class="form-control" name="patient" value="">
                                    @error("patient")
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label for="setting-input-2" class="form-label">Date Rendez-vous </label>
                                    <input type="date" class="form-control" id="nom" name="date_rdv"  value=""/>
                                    @error("date_rdv")
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label for="setting-input-2" class="form-label">Spécialité Médecin</label>
                                    <select class="form-control" name="specialite" id="" >
                                        <option class="form-control" value="">Choisir la spécialité</option>
                                        @foreach ($liste_specialites as $specialites)
                                            <option value="{{ $specialites->id_spec }}">{{ Str::upper($specialites->intitule_spec) }}</option>
                                        @endforeach
                                    </select>
                                    @error("specialite")
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="setting-input-2" class="form-label">Docteur</label>
                                    <input type="text" class="form-control" name="docteur" value="">
                                    @error("docteur")
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="setting-input-2" class="form-label">Choisissez Docteur</label>
                                    <select class="form-control" name="docteur" id="" >
                                        <option class="form-control" value="">Choisir le docteur</option>
                                        @foreach ($liste_docteurs as $docteur)
                                            <option value="{{ $docteur->id }}">{{ Str::upper($docteur->name) }}</option>
                                        @endforeach
                                    </select>
                                    @error("docteur")
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn app-btn-primary mt-3 w-100" >Enregistrer </button>
                            </form>
                            @if(Session::has('message'))
                                <script>
                                    swal("Message", "{{ Session::get('message') }}", 'success', {
                                        button:true,
                                        button: "OK"
                                    });
                                </script>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-1"></div>
            </div>
        </div>
    </div>
@endsection
