@extends('admin.layouts-admin.entete-admin')
@section('content')
<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4 mt-5">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Liste Personnels</h1>
            </div>
            <div class="col-auto">
                <form action="{{ route('admin_personnel_recherche') }}" method="GET" class="table-search-form row gx-1 align-items-center">
                    @csrf
                    <div class="col-auto">
                        <a type="submit" href="{{ route('admin_personels-index') }}" class="btn app-btn-primary">Actualiser</a>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="search-orders" name="rechercher_utilisateur" class="form-control form-control-md search-orders " placeholder="Rechercher un utilisateur...">
                        @error('rechercher_patients')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn app-btn-primary">Rechercher</button>
                    </div>
                </form>
            </div>
            <div class="col-auto">
                 <div class="page-utilities">
                    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('admin_personnel_creations') }}" type="submit" class="btn app-btn-primary">Créer Utilisateur</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mb-4">
    </div>
</div>

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xxl">

            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Tous </a>
            </nav>

            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">N</th>
                                            <th class="cell">Nom</th>
                                            <th class="cell">E-mail</th>
                                            <th class="cell">Mot de passe </th>
                                            <th class="cell">Roles</th>
                                            <th class="cell">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($admin_liste_personnel as $admin_personnel)
                                            <tr>
                                                <td class="cell">{{ ($admin_liste_personnel->perPage() * ($admin_liste_personnel->currentPage() - 1 ))+ $loop->iteration }}</td>
                                                <td class="cell"><span class="truncate">{{ Str::upper($admin_personnel->name) }}</span></td>
                                                <td class="cell">{{ $admin_personnel->email }}</td>
                                                <td class="cell"><span class="truncate">{{ $admin_personnel->password }}</span></td>
                                                <td class="cell">{{ Str::upper($admin_personnel->roles->intitule) }}</td>
                                                <td class="cell">
                                                    <a class="btn btn-sm" href="{{ route( 'admin_personnel-modification', $admin_personnel->id) }}"><i class="fa-solid fa-edit fa-1x"></i></a>
                                                    <a class="btn btn-sm" href=""><i class="fa-solid fa-eye fa-1x"></i></a>
                                                    <a class="btn btn-sm" href="{{ route('admin_personnel_suppression', $admin_personnel->id) }}"><i class="fa-solid fa-trash fa-1x"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="cell" colspan="12">
                                                    <div class="" style="text-align: center">Aucun utilisateur trouvé</div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <nav class="app-pagination">
                        <ul class="pagination justify-content-center">
                            {{ $admin_liste_personnel->links() }}
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
