@extends('layouts.profile')

@section('title', 'Leaderboard - Kisah Roleplay')

@section('content')
    <main class="landing-main">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card bg-dark text-white border-0 shadow-lg">
                        <div class="card-header bg-gradient text-center">
                            <h2 class="mb-0 text-white">🏆 LEADERBOARD</h2>
                        </div>
                        <div class="card-body">
                            <p class="text-center">Leaderboard content will be displayed here.</p>
                            <!-- Add your leaderboard content here -->
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
