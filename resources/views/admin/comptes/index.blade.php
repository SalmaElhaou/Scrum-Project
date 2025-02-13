@extends('layouts.app')

@section('title', 'Accounts List')

@section('content')

    <div class="pagetitle">
        <h1>Accounts List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Accounts List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

   <!-- <div class="container-fluid">-->
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="text-center flex-grow-1">Account List</h2>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <input type="text" id="searchInput" class="form-control w-50" placeholder="Search by name or ID...">
                <a href="{{ route('admin.personnes') }}" class="btn btn-primary ml-2">Add Account</a>
            </div>
        
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Login</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comptes as $index => $account)
                        @if($account->login != auth()->user()->name)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $account->login }}</td>
                                <td>{{ $account->role }}</td>
                                <td>
                                    <span class="{{ $account->enabled ? 'text-success' : 'text-danger' }}">
                                        {{ $account->enabled ? 'Active' : 'Disabled' }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#changeRoleModal"
                                            data-id="{{ $account->id }}" data-role="{{ $account->role }}">
                                        Change Role
                                    </button>
        
                                    <form action="{{ route('comptes.toggleStatus', $account->id) }}" method="POST" style="display: inline;">

                                        @csrf
                                        <button type="submit" class="btn btn-secondary btn-sm">
                                            {{ $account->enabled ? 'Disable' : 'Enable' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="modal fade" id="changeRoleModal" tabindex="-1" aria-labelledby="changeRoleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title me-auto">Change Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="changeRoleForm" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" id="accountId" name="id">
                            
                            <label for="role">Select a role:</label>
                            <select id="role" name="role" class="form-control">
                                <option value="SCRUM_MASTER">SCRUM_MASTER</option>
                                <option value="PRODUCT_OWNER">PRODUCT_OWNER</option>
                                <option value="TEAM_MEMBER">TEAM_MEMBER</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#searchInput").on("input", function () {
                    var searchValue = $(this).val().toLowerCase();
                    $("tbody tr").each(function () {
                        var login = $(this).find("td:nth-child(2)").text().toLowerCase();
                        var role = $(this).find("td:nth-child(3)").text().toLowerCase();
                        
                        if (login.includes(searchValue) || role.includes(searchValue)) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                });
            });
        
            $('#changeRoleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var accountId = button.data('id');
                var currentRole = button.data('role');
        
                var modal = $(this);
                modal.find('#accountId').val(accountId);
                modal.find('#role').val(currentRole);
                
                modal.find('#changeRoleForm').attr('action', '/comptes/' + accountId + '/update-role');
            });
        
            $("form").on("submit", function (event) {
                var action = $(this).attr("action");
                if (action.includes("toggle-enabled")) {
                    return confirm("Do you really want to change the account status?");
                }
            });
        </script>
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

         @if(session('message'))
         <script>
             Swal.fire({
                 title: 'Alerte',
                 text: '{{ session('message') }}',
                 icon: 'warning',
                 confirmButtonText: 'OK'
             });
         </script>
       @endif
        
        
    
@endsection
