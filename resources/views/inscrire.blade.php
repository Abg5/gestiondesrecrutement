<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
          </head>
    <body class="font-sans antialiased">
    <nav class="navbar bg-primary fixed-top">

  <div class="container-fluid">
  <a class="navbar-brand" href="{{ url('/') }}">
    <img src="{{ asset('images/uadb.png') }}" alt="Logo UADB" width="100" height="auto">
</a>
    <a class="navbar-brand" href="#">Site de recrutemnent de l'UADB</a>
     <a class="nav-link" href="{{route('welcome')}}"><strong>Acceuil</strong></a>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Compte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

    </div>
  </div>
</nav>
<div class="container d-flex justify-content-center align-items-center vh-100">
     <div class="d-flex justify-content-center align-items-center">
<div class="container text-center">
  <div class="row"><div class="mb-12">
<form class="row g-3">
<div class="col-md-4">
    <label for="validationServerUsername" class="form-label">email</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend3">@</span>
      <input type="text" class="form-control is-invalid" id="email" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>

    </div>
  </div>
  <div class="col-md-4">
    <label for="validationServer01" class="form-label">Nom</label>
    <input type="text" class="form-control is-invalid" id="nom"  required>

  </div>
  <div class="col-md-4">
    <label for="validationServer02" class="form-label">Prenom</label>
    <input type="text" class="form-control is-invalid" id="prenom"  required>

  </div>
  <div class="col-md-4">
    <label for="validationServer02" class="form-label">Numero telephone</label>
    <input type="number" class="form-control is-invalid" id="num phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>

  </div>
  <div class="col-md-4">
    <label for="validationServer02" class="form-label">Adresse</label>
    <input type="text" class="form-control is-invalid" id="adresse"  required>

  </div>
   <div class="col-md-4">
    <label for="validationServer02" class="form-label">Date De Naissance</label>
    <input type="date" class="form-control is-invalid" id="ddn"  required>

  </div>

  <div class="col-md-4">
    <label for="validationServer03" class="form-label">pays de naissance</label>
    <input type="text" class="form-control is-invalid" id="pays de naissance"  required>

  </div>
  <div class="col-md-4">
    <label for="validationServer04" class="form-label">lieu de naisance</label>
     <input type="text" class="form-control is-invalid" id="lieu de naissance"  required>

  </div>
  <div class="col-md-4">
    <label for="profil" class="form-label">Profil</label>
    <select class="form-select" id="profil" required>
      <option selected disabled value="">PER</option>
      <option>PATS</option>
    </select>

    </div>
     <div class="col-md-4">
    <label for="validationTooltip04" class="form-label">Mot de passe</label>
     <input type="password" class="form-control is-invalid" id="password"  required>

  </div>
   <div class="col-md-4">
    <label for="text" class="form-label"> Confimer le Mot de passe</label>
     <input type="password" class="form-control is-invalid" id="password"  required>

  </div>


  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>
</div>
</div> </div>
 </div>
  </div>
    </body>
</html>
