@extends('layouts.app')

@section('title', 'KISAH ROLEPLAY | ROBLOX')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-container">
        <div class="hero-content">
            <div class="hero-text">
                <div class="hero-hashtag"># KISAHROLEPLAY</div>
                <h1 class="hero-title">
                    SELAMAT DATANG DI<br>
                    DUNIA GELAP
                </h1>
                <p class="hero-description">
                    BERGABUNGLAH DALAM PETUALANGAN ROLEPLAY TERBESAR DI INDONESIA.<br>
                    CIPTAKAN KARAKTER UNIKMU DAN JALANI KEHIDUPAN VIRTUAL YANG<br>
                    MENARIK BERSAMA RIBUAN PEMAIN LAINNYA.
                </p>
                <div class="hero-buttons">
                    <a href="#" class="btn btn-primary">JOIN DISCORD</a>
                    <a href="#" class="btn btn-secondary">MULAI BERMAIN</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="hero-logo">
                    <span class="hero-logo-text">KISAH</span>
                    <span class="hero-logo-subtext">ROLEPLAY</span>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-background-overlay"></div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="features-content">
            <h2 class="features-title">Kenapa Harus KISAH ROLEPLAY?</h2>
            <div class="features-text">
                <p>Di KISAH ROLEPLAY, kami menawarkan pengalaman yang lebih dari sekadar bermain. Kami menyediakan lingkungan yang mendukung kreativitas, eksplorasi, dan kolaborasi antar pemain.</p>
                
                <p>Dengan berbagai peran yang bisa Anda pilih, mulai dari polisi, dokter, hingga pengusaha, Anda dapat menciptakan cerita unik Anda sendiri.</p>
                
                <p>Nikmati dunia yang penuh interaksi dan tantangan, dengan komunitas yang ramah dan selalu siap membantu.</p>
                
                <p class="features-question">Apakah Anda siap untuk memulai petualangan?</p>
                
                <p>Jangan lewatkan kesempatan untuk menjadi bagian dari server Roblox terbaik di Indonesia!</p>
            </div>
            
            <div class="role-cards">
                <div class="role-card">
                    <div class="role-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Polisi</h3>
                    <p>Jaga keamanan kota dan tegakkan keadilan</p>
                </div>
                <div class="role-card">
                    <div class="role-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h3>Dokter</h3>
                    <p>Selamatkan nyawa dan rawat warga kota</p>
                </div>
                <div class="role-card">
                    <div class="role-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3>Pengusaha</h3>
                    <p>Bangun bisnis dan kembangkan ekonomi kota</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Community Section -->
<section class="community-section">
    <div class="container">
        <div class="community-content">
            <h2 class="community-title">Join our Discord server</h2>
            <p class="community-subtitle">Chat with other players, submit feedback, report bugs, and more!</p>
            <div class="community-stats">
                <div class="stat">
                    <span class="stat-number">45,892</span>
                    <span class="stat-label">other members today</span>
                </div>
            </div>
            <a href="#" class="btn btn-discord">
                <i class="fab fa-discord"></i>
                OPEN DISCORD
            </a>
        </div>
    </div>
</section>

<!-- City Visual Section -->
<section class="city-section">
    <div class="city-container">
        <div class="city-visual">
            <div class="neon-signs">
                <div class="neon-sign neon-pink">KISAH</div>
                <div class="neon-sign neon-cyan">ROLEPLAY</div>
                <div class="neon-sign neon-yellow">BOMTA</div>
                <div class="neon-sign neon-red">ANSERE</div>
            </div>
            <div class="city-background"></div>
        </div>
    </div>
</section>
@endsection
