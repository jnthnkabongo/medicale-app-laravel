@extends('admin.layouts-admin.entete-admin')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4 mt-5">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title">Modification de l'utilisateur</h1>
            </div>
            <div class="col-auto">
                <div class="page-utilities">
                   <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                       <div class="col-auto">
                           <a href="{{ route('admin_personels-index') }}" type="submit" class="btn app-btn-primary">Liste Personnel</a>
                       </div>
                   </div>
               </div>
           </div>
            <hr class="mb-4">
            <div class="row g-4 settings-section">
                <div class="col-12 col-md-1"></div>
                <div class="col-12 col-md-10">
                    <div class="app-card app-card-settings shadow-sm p-4">
                        <div class="app-card-body">
                            <form class="settings-form" action="{{ route('admin_personnel_modifications', $admin_personnel) }}" method="GET">
                                @csrf
                                <div class="mb-3">
                                    <label for="setting-input-1" class="form-label">Identifiant<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                          <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                          <circle cx="8" cy="4.5" r="1"/>
                                    </svg></span></label>
                                    <input type="text" class="form-control" id="setting-input-1" name="" value="{{ $admin_personnel->id }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-2" class="form-label">Nom Utilisateur</label>
                                    <input type="text" class="form-control" id="setting-input-2" name="name" value="{{ $admin_personnel->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-3" class="form-label">Email Utilisateur</label>
                                    <input type="email" class="form-control" id="setting-input-3" name="email" value="{{ $admin_personnel->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="setting-input-3" class="form-label">Mot de passe Utilisateur</label>
                                    <input type="text" class="form-control" id="setting-input-3" name="password" value="{{ $admin_personnel->password }}">
                                </div>
                                <div class="mb-3">
                                    <select class="form-control" name="roles_id" id="">
                                        <option value="{{ $admin_personnel->roles_id }}">{{ Str::upper($admin_personnel->roles->intitule) }}</option>
                                        @foreach ($role_select as $item)
                                            <option value="{{ $item->id }}">{{ Str::upper($item->intitule) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn app-btn-primary w-100" >Modifier</button>
                            </form>
                        </div>
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
</div>
@endsection
