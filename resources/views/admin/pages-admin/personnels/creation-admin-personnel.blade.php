@extends('admin.layouts-admin.entete-admin')
@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4 mt-5">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Créer Utilisateur</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <a href="{{ route('admin_personels-index') }}" type="submit" class="btn app-btn-primary">Liste Utilisateur</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
            </div>
            <div class="row">
                <div class="col-12 col-md-1"></div>
                <div class="col-12 col-md-10 mt-3">
                    <div class="app-card app-card-settings shadow-sm p-4 ">

                        <div class="app-card-body">
                            <form class="settings-form"  action="{{ route('admin_personnel_creation') }}" method="POST" >
                                @csrf
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
                                        @foreach ($liste_roles as $item)
                                            <option value="{{ $item->id }}">{{ Str::upper($item->intitule) }}</option>
                                        @endforeach
                                    </select>
                                    @error("roles_id")
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <input type="text" class="form-control" name="plainte_id" value="" hidden>
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
                <div class="col-12 col-md-1"></div>
            </div>
        </div>
    </div>
@endsection
