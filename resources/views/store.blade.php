<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/store">Store</a>
                </li>

            </ul>
        </div>
    </div>
</nav>





<div class="container mt-4">
    @if(session("success"))
        <div class="alert alert-success" role="alert">
            {{ session("success") }}
        </div>
    @elseif(session("failed"))
        <div class="alert alert-danger" role="alert">
            {{ session("failed") }}
        </div>
    @endif

    <h2>Store</h2>

    <div class="row mt-4">
        <div class="card">
            <div class="card-header">
                Invoice Module
            </div>
            <div class="card-body">
                <h5 class="card-title">Invoice module download</h5>
                <p>Official</p>
                <form action="/download" method="POST">
                    @csrf
                    <input type="hidden" name="package" value="feriwnarta/invoice-module:dev-main">
                    <input type="hidden" name="module-name" value="Invoice">
                    <button type="submit" class="btn btn-primary">Download</button>
                </form>
            </div>
        </div>


        <div class="card mt-2">
            <div class="card-header">
                Invoice Module
            </div>
            <div class="card-body">
                <h5 class="card-title">Warehouse module download</h5>
                <p>Official</p>
                <form action="/download" method="POST">
                    @csrf
                    <input type="hidden" name="package" value="feriwnarta/post-module:dev-main">
                    <input type="hidden" name="module-name" value="Post">
                    <button type="submit" class="btn btn-primary">Download</button>
                </form>
            </div>
        </div>
    </div>
</div>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
