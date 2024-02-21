@extends('users.layouts.entete-users')
@section('content')
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4 mt-5">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Modifier patient</h1>
                </div>
                <div class="col-auto">
                     <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <a href="{{ route('liste-patient') }}" type="submit" class="btn app-btn-primary">Liste Patients</a>
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
                            <form class="settings-form"  action="{{ route('modifier-patients', $patients->id) }}" method="GET" >
                                @csrf
                                <div class="mb-1">
                                    <label for="setting-input-1" class="form-label">Code patient    <span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                      <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                      <circle cx="8" cy="4.5" r="1"/>
                                    </svg></span></label>
                                    <input type="text" style="text-transform: uppercase" class="form-control uppercase" name="code_patient" value="{{ $patients->code_patient }}"  readonly >

                                </div>
                                <div class="mb-1">
                                    <label for="setting-input-2" class="form-label">Nom patient</label>
                                    <input type="text" class="form-control" id="nom" name="nom"  value="{{ $patients->nom }}">
                                    @error("nom")
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label for="setting-input-2" class="form-label">E-mail utilisateur</label>
                                    <input type="email" class="form-control" name="email" value="{{ $patients->email }}">
                                    @error("email")
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="setting-input-2" class="form-label">Contact patient</label>
                                    <input type="number" class="form-control" name="contact" value="{{ $patients->contact}}">
                                    @error("contact")
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="setting-input-2" class="form-label">Date de naissance patient</label>
                                    <input type="date" class="form-control" name="datenais" value="{{ $patients->datenais}}">
                                    @error("datenais")
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="setting-input-2" class="form-label">Adresse patient</label>
                                    <input type="text" class="form-control" name="adresse" value="{{ $patients->adresse }}">
                                    @error("adresse")
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="setting-input-2" class="form-label">Note patient</label>
                                    <input type="text" class="form-control" name="note" value="{{ $patients->note }}">
                                    @error("note")
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn app-btn-primary mt-3 w-100" >Modifier </button>
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
