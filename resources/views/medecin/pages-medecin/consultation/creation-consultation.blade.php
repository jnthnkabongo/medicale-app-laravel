@extends('medecin.layouts-medecin.entete-medecin')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4 mt-5">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Formulaire de Consultation Médicale</h1>
            </div>
            <div class="col-auto">
                <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('index-consultation') }}" type="submit" class="btn app-btn-primary">Liste Consultations</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mb-4">
        </div>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="app-card app-card-settings shadow-sm p-4 ">

                    <div class="app-card-body">
                        <form class="settings-form"  action="{{ route('admin_personnel_creation') }}" method="POST" >
                           @csrf
                            <div class="row">
                                <div class="col-6 col-md-6 mt-3">
                                    <h4>Informations Personnels</h4>
                                    <hr class="mb-4">
                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Code patient</label>
                                        <input type="text" class="form-control" id="code_patient" name="code_patient" value="{{ Str::upper($item->code_patient) }}" readonly>
                                        @error("code_patient")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Nom Patient</label>
                                        <input type="text" class="form-control" name="nom" value="{{ str::upper($item->nom) }}" readonly>
                                        @error("nom")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">E-mail Patient</label>
                                        <input type="text" class="form-control" name="email" value="{{ $item->email }}" readonly>
                                        @error("email")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Date de Naissance</label>
                                        <input type="text" class="form-control" name="datenais" value="{{ $item->datenais }}" readonly>
                                        @error("datenais")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Note Patient</label>
                                        <input type="text" class="form-control" name="note" value="{{ Str::upper($item->note) }}" readonly>
                                        @error("note")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 mt-3">
                                    <h4>Antécédents Médicaux</h4>
                                    <hr class="mb-4">
                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Nom utilisateur</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                        @error("name")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">E-mail utilisateur</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        @error("email")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 mt-3">
                                    <h4>Motif de Consultation</h4>
                                    <hr class="mb-4">
                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Nom utilisateur</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                        @error("name")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">E-mail utilisateur</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        @error("email")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Mot de passe utilisateur</label>
                                        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                        @error("password")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Rôle utilisateur</label>
                                        <select class="form-control" name="roles_id" id="">
                                            <option value="">Choisissez un rôle utilisateur</option>

                                        </select>
                                        @error("roles_id")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <input type="text" class="form-control" name="plainte_id" value="" hidden>
                                    </div>
                                </div> <div class="col-6 col-md-6 mt-3">
                                    <h4>Examen Physique</h4>
                                    <hr class="mb-4">
                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Nom utilisateur</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                        @error("name")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">E-mail utilisateur</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        @error("email")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Mot de passe utilisateur</label>
                                        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                        @error("password")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Rôle utilisateur</label>
                                        <select class="form-control" name="roles_id" id="">
                                            <option value="">Choisissez un rôle utilisateur</option>

                                        </select>
                                        @error("roles_id")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <input type="text" class="form-control" name="plainte_id" value="" hidden>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 mt-3">
                                    <h4>Diagnostic Préliminaire</h4>
                                    <hr class="mb-4">
                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Nom utilisateur</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                        @error("name")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">E-mail utilisateur</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        @error("email")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Mot de passe utilisateur</label>
                                        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                        @error("password")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Rôle utilisateur</label>
                                        <select class="form-control" name="roles_id" id="">
                                            <option value="">Choisissez un rôle utilisateur</option>

                                        </select>
                                        @error("roles_id")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <input type="text" class="form-control" name="plainte_id" value="" hidden>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 mt-3">
                                    <h4>Récommandations</h4>
                                    <hr class="mb-4">
                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Nom utilisateur</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                        @error("name")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">E-mail utilisateur</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        @error("email")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Mot de passe utilisateur</label>
                                        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                        @error("password")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <label for="setting-input-2" class="form-label">Rôle utilisateur</label>
                                        <select class="form-control" name="roles_id" id="">
                                            <option value="">Choisissez un rôle utilisateur</option>

                                        </select>
                                        @error("roles_id")
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <input type="text" class="form-control" name="plainte_id" value="" hidden>
                                    </div>
                                </div>

                            </div>



                            <button type="submit" class="btn app-btn-primary mt-3 w-100" >Enregistrer </button>
                        </form>
                        @if(Session::has('message'))
                            <script>
                                swal("message", "{{ Session::get('message') }}", 'success', {
                                    showConfirmButton: false,
                                    title: '',
                                    timer: 1500
                                    //button:true,
                                    //button: "OK"
                                });
                            </script>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
