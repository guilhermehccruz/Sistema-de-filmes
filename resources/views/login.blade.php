<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-circle fa-5x text-primary"></i>
                        </div>
                        <h3 class="text-center mb-4">Login</h3>
                        @if(isset($error))
                        <div class="alert alert-danger">{{ $error }}</div>
                        @endif
                        <form class="login-form" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" placeholder="Usuário" name="login"
                                    required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" class="form-control rounded-left" placeholder="Senha"
                                    name="password" required>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="custom-control custom-checkbox mr-auto">
                                    <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                    <label for="remember"
                                        class="checkbox-wrap checkbox-primary custom-control-label">Lembrar de mim
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="form-control btn btn-primary rounded submit px-3">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>