
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>HOLLMAN :: LOGIN</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/floating-labels/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <style>
        :root {
        --input-padding-x: .75rem;
        --input-padding-y: .75rem;
        }
        * {
        box-sizing : content-box;
      }

        html,
        body {
        height: 100%;
        }

        body {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-align: center;
        -ms-flex-pack: center;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
        background-image: url('fondo.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        color: #fff;
        box-sizing: content-box;
        }

        .form-signin {
        width: 100%;
        max-width: 420px;
        padding: 15px;
        margin: 0 auto;
        }

        .form-label-group {
        position: relative;
        margin-bottom: 1rem;
        }

        .form-label-group > input,
        .form-label-group > label {
        padding: var(--input-padding-y) var(--input-padding-x);
        }

        .form-label-group > label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0; /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
        }

        .form-label-group input::-webkit-input-placeholder {
        color: transparent;
        }

        .form-label-group input:-ms-input-placeholder {
        color: transparent;
        }

        .form-label-group input::-ms-input-placeholder {
        color: transparent;
        }

        .form-label-group input::-moz-placeholder {
        color: transparent;
        }

        .form-label-group input::placeholder {
        color: transparent;
        }

        .form-label-group input:not(:placeholder-shown) {
        padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
        padding-bottom: calc(var(--input-padding-y) / 3);
        }

        .form-label-group input:not(:placeholder-shown) ~ label {
        padding-top: calc(var(--input-padding-y) / 3);
        padding-bottom: calc(var(--input-padding-y) / 3);
        font-size: 12px;
        color: #777;
        }

        .btn-primary {
            color: #fff;
            background-color: #001237;
            border-color: #001237;
        }
        
        .btn-primary:hover {
            color: #fff;
            background-color: #00062e;
            border-color: #00062e;
        }

        .m {
          position: absolute;
    top: 20px;
    right: 51px;
    font-size: 10px;
        }

        .container {
          width: 100%;
          padding-right: 50px;
          padding-left: 0px;
          margin-right: 50px;
          margin-left: auto;
      }
    </style>
</head>

  <body>
    <main>
        @yield('content')
    </main>
    
    
  </body>
</html>
