<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Controle de Estoque</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5164/5164023.png" type="image/x-icon">
    <!-- Estilos Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
        }

        header {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
        }

        .nav-link {
            color: white !important;
            font-weight: bold;
        }

        .nav-link:hover {
            color: #ffc107 !important;
        }

        .inicio h1 {
            color: #007bff;
            font-family: 'Montserrat', sans-serif;
        }

        footer {
            background-color: #343a40;
            color: #ced4da;
            padding: 10px 0;
            text-align: center;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
        }

        .img-fullscreen {
            width: 100%;
            height: auto;
            display: block;
            margin: 20px auto;
        }
    </style>
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid p-0">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom bg-dark">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/" class="nav-link active" aria-current="page"><i
                            class="bi bi-house"></i> Início</a></li>
                @auth
                    <li class="nav-item"><a href="{{ route('itens.index') }}" class="nav-link"><i
                                class="bi bi-box"></i> Itens</a></li>
                    <li class="nav-item"><a href="{{ route('movimentacoes.index') }}" class="nav-link"><i
                                class="bi bi-arrow-left-right"></i> Movimentações</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link"><i
                                    class="bi bi-box-arrow-right"></i> Sair</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a href="{{ route('login.form') }}" class="nav-link"><i
                                class="bi bi-box-arrow-in-right"></i> Login</a></li>
                    <li class="nav-item"><a href="{{ route('register.form') }}" class="nav-link"><i
                                class="bi bi-person-plus"></i> Cadastrar</a></li>
                @endauth
            </ul>
        </header>

        <main class="inicio">
            <div class="bg-light p-4 mb-4 rounded text-center">
                <h1>Bem-vindo ao Sistema de Controle de Estoque</h1>
                <p class="lead">Gerencie seus produtos de forma eficiente.</p>
                <a href="{{ route('itens.index') }}" class="btn btn-custom"><i class="bi bi-box"></i>
                    Começar</a>
            </div>

            <img src="https://static.independent.co.uk/2023/06/21/14/Worldwide%20Logistics%20Group_Header%20Image_iStock-1370066038.jpg"
                alt="Controle de Estoque" class="img-fluid img-fullscreen">
        </main>

        <footer>
            <p>&copy; 2024 Paulo Junior & Jessé Vitorino</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>
