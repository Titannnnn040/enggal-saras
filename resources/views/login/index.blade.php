@extends('layouts/login')
@section('login')
    <div class="wave1">
        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#C7C8CC" fill-opacity="1" d="M0,32L24,64C48,96,96,160,144,165.3C192,171,240,117,288,122.7C336,128,384,192,432,202.7C480,213,528,171,576,154.7C624,139,672,149,720,144C768,139,816,117,864,101.3C912,85,960,75,1008,101.3C1056,128,1104,192,1152,192C1200,192,1248,128,1296,90.7C1344,53,1392,43,1416,37.3L1440,32L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z"></path></svg> --}}
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#CF4238" fill-opacity="1" d="M0,96L20,90.7C40,85,80,75,120,90.7C160,107,200,149,240,144C280,139,320,85,360,96C400,107,440,181,480,224C520,267,560,277,600,256C640,235,680,181,720,149.3C760,117,800,107,840,106.7C880,107,920,117,960,117.3C1000,117,1040,107,1080,90.7C1120,75,1160,53,1200,74.7C1240,96,1280,160,1320,170.7C1360,181,1400,139,1420,117.3L1440,96L1440,320L1420,320C1400,320,1360,320,1320,320C1280,320,1240,320,1200,320C1160,320,1120,320,1080,320C1040,320,1000,320,960,320C920,320,880,320,840,320C800,320,760,320,720,320C680,320,640,320,600,320C560,320,520,320,480,320C440,320,400,320,360,320C320,320,280,320,240,320C200,320,160,320,120,320C80,320,40,320,20,320L0,320Z"></path></svg>
    </div>
    <div class="container">
        {{-- to show a notif error if login failed --}}
        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
        </div>
        @endif 
        <div class="login_box">
            <div class="left">
                <div class="contact">
                    <form action="/login" method="POST">
                        @csrf
                        <h1>LOGIN</h1>
                        
                        <input name="username" class="form-control @error('username') is-invalid @enderror" type="text" placeholder="USERNAME" value="{{ old('username') }}" required>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        
                        <div class="password-wrapper">
                            <input name="password" class="form-control password-input @error('password') is-invalid @enderror" type="password" placeholder="PASSWORD" required>
                            <i class="show-hide-password bi bi-eye-fill" style=""></i>
                        </div>
                        
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <button class="submit" id="login">Login</button>
                        <!-- Add your other form elements and buttons here -->
                    </form>
                    
                </div>
            </div> 
            <div class="right">
                <div class="right-text">
                    <h2>ENGGAL SARAS MHCC</h2>
                </div>
            </div>
        </div>

    </div>
    <div class="wave2">
        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#74b70a" fill-opacity="1" d="M0,32L24,64C48,96,96,160,144,165.3C192,171,240,117,288,122.7C336,128,384,192,432,202.7C480,213,528,171,576,154.7C624,139,672,149,720,144C768,139,816,117,864,101.3C912,85,960,75,1008,101.3C1056,128,1104,192,1152,192C1200,192,1248,128,1296,90.7C1344,53,1392,43,1416,37.3L1440,32L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z"></path></svg> --}}
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#4CAF50" fill-opacity="1" d="M0,160L20,181.3C40,203,80,245,120,224C160,203,200,117,240,96C280,75,320,117,360,144C400,171,440,181,480,170.7C520,160,560,128,600,101.3C640,75,680,53,720,74.7C760,96,800,160,840,192C880,224,920,224,960,208C1000,192,1040,160,1080,170.7C1120,181,1160,235,1200,224C1240,213,1280,139,1320,106.7C1360,75,1400,85,1420,90.7L1440,96L1440,320L1420,320C1400,320,1360,320,1320,320C1280,320,1240,320,1200,320C1160,320,1120,320,1080,320C1040,320,1000,320,960,320C920,320,880,320,840,320C800,320,760,320,720,320C680,320,640,320,600,320C560,320,520,320,480,320C440,320,400,320,360,320C320,320,280,320,240,320C200,320,160,320,120,320C80,320,40,320,20,320L0,320Z"></path></svg>
    </div>


<script>
document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.querySelector('.password-input');
        const showHideIcon = document.querySelector('.show-hide-password');

        showHideIcon.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    });
</script>
@endsection
