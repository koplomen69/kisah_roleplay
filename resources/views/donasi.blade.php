@extends('layouts.profile')

@section('title', 'Donasi - Kisah Roleplay')

@section('content')
    <main class="landing-main">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card bg-dark text-white border-0 shadow-lg">
                        <div class="card-header bg-gradient text-center">
                            <h2 class="mb-0 text-white">💝 DONASI</h2>
                        </div>
                        <div class="card-body">
                            <p class="text-center">Donation information will be displayed here.</p>
                            <!-- Add your donation content here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        .bg-gradient {
            background: linear-gradient(135deg, #98194A 0%, #D77CA8 100%);
        }
    </style>
@endsection
