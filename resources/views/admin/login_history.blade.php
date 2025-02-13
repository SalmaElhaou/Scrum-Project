@extends('layouts.app')

@section('title', 'list of authenticated accounts')

@section('content')

    <div class="pagetitle">
        <h1>list of authenticated accounts</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">list of authenticated accounts</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-center flex-grow-1">Login History</h2>
        </div>
    
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Account Login</th>
                    <th>IP Address</th>
                    <th>Login Date & Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loginHistories as $history)
                    <tr>
                        <td>{{ $history->compte->login }}</td>
                        <td>{{ $history->ip_address }}</td>
                        <td>{{ $history->login_time }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection    