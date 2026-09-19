<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaundryKu — {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        .work-step {
            width: 40px;
            height: 40px;
            background-color: #0d6efd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer-cenah {
            background:
                linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, #0b2b38 100%),
                linear-gradient(90deg, #2193b0 0%, #6dd5ed 100%);
            background-blend-mode: multiply;
            color: #ffffff;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('partials.header')

    <div class="flex-fill">

        {{ $slot }}
    </div>
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
