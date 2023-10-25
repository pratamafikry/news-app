@extends('auth.layout.main')
@section('container')
<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            
                                <a class="text-center" href="index.html"> <h4>Rosella</h4></a>
    
                            <form action="/register" method="post" class="mt-5 mb-5 login-input">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control"  placeholder="Name" name="name" id="name" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control"  placeholder="Username" name="username" id="username" required>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control"  placeholder="Email" name="email" id="email" required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <button class="btn login-form__btn submit w-100">Sign in</button>
                            </form>
                                <p class="mt-5 login-form__footer">Have account <a href="page-login.html" class="text-primary">Sign Up </a> now</p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection