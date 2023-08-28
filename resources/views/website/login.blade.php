@extends('layouts/website')

@section('content')

<section class="login-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <form method="post" action="{{ route('login') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="p-5 border">
                            <div class="form-group">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="********">
                            </div>
                            <div class="form-group">
                                <a href="{{ route('sign-up') }}">Create Account</a>
                                <button type="submit" class="btn float-right">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
