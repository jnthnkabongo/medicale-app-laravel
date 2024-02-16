@extends('users.layouts.entete-users')
@section('content')
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
                        <form class="settings-form"  action="{{ route('creation_agenda') }}" method="POST" >
                            @csrf
                            <div class="mb-1">
                                <label for="setting-input-2" class="form-label"> Code Patient </label>
                                    <input type="text" class="form-control" name="code_patient" value="{{ Str::upper($patients->code_patient) }}"  readonly>
                                @error("code_patient")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                    <input type="text" class="form-control" name="patient_id" value="{{ Str::upper($patients->id) }}" >
                                @error("patient_id")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="setting-input-2" class="form-label">Patient </label>
                                    <input type="text" class="form-control" name="patient" value="{{ Str::upper($patients->nom) }}" readonly>
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
                                <select class="form-control" name="spec_id" id="" >
                                    <option class="form-control" value="">Choisir la spécialité</option>
                                    @foreach ($liste_specialites as $specialites)
                                        <option value="{{ $specialites->id_spec }}">{{ Str::upper($specialites->intitule_spec) }}</option>
                                    @endforeach
                                </select>
                                @error("spec_id")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="setting-input-2" class="form-label">Choisissez Docteur</label>
                                <select class="form-control" name="users_id" id="" >
                                    <option class="form-control" value="">Choisir le docteur</option>
                                    @foreach ($liste_docteurs as $docteur)
                                        <option value="{{ $docteur->id }}">{{ Str::upper($docteur->name) }}</option>
                                    @endforeach
                                </select>
                                @error("users_id")
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
