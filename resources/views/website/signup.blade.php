@extends('layouts/website')

@section('content')

@push('websiteCustomScripts')
<style>
    .alert {
        padding: 0;
    }
</style>
@endpush

<section class="login-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <form method="POST" action="{{ route('sign-up.store') }}">
                    @csrf
                    <div class="col-lg-12">
                        <div class="p-5 border">
                            <div class="form-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="username">
                                @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="phone">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="refarel_number" value="{{ old('refarel_number') }}" placeholder="Refarel number">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password confirmation" placeholder="confirm_password">
                                @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <span><input type="checkbox"> I agree for <a href="#">Terms of service</a></span>
                            </div>
                            <div class="form-group">
                                <a href="{{ route('login') }}">login Now</a>
                                <button type="submit" class="btn float-right">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
