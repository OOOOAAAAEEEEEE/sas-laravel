<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>TPS Project | Login</title>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col-md-11 mb-3">
                <img class="img-fluid" style="width: 100%" src="/imgInternal/asset/login/teamUpLogin.png" alt="unDraw Team Up">

                <h3 class="mb-3 text-center">Sign In</h3>

                <form action="/login" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email')
                            is-invalid
                        @enderror" name="email" id="email" placeholder="1" value="{{ old('email') }}">
                        <label for="email"> Your Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control @error('password')
                            is-invalid
                        @enderror" name="password" id="password" placeholder="1">
                        <label for="password">Your Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary mt-3 mb-3 d-md-block" type="submit"> <i class="bi bi-arrow-return-right"></i> Sign In </button>
                        @if (session()->has('failed'))
                            <div class="d-md-block">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" role="img"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                    <div class="text-center fs-3">
                                        {{ session('failed') }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            </div> 
                        @endif

                        @if (session()->has('success'))
                            <div class="d-md-block">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" role="img"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                    <div class="text-center fs-3">
                                        {{ session('success') }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            </div> 
                        @endif
                    </div>
                    <small>
                        Not registered yet? <a class="text-decoration-none" href="/register"> Register </a>
                    </small>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" 
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>