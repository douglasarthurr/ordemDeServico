<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cad</title>
</head>
<body>
  {{-- bootsrap --}}
  <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  {{-- bootsrap --}}


  

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Nome</label>
          <div class="col-sm-10">
              <input id="name" name="name" type="text" class="form-control" placeholder="Nome" required>
          </div>
      </div>
  
      <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
              <input type="email" name="email" class="form-control" id="email" placeholder="email@exemplo.com" required>
          </div>
      </div>
  
      <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Senha</label>
          <div class="col-sm-10">
              <input type="password" name="password" class="form-control" id="password" placeholder="Senha" required>
          </div>
      </div>
  
      <div class="form-group row">
          <label for="password_confirmation" class="col-sm-2 col-form-label">Confirme a Senha</label>
          <div class="col-sm-10">
              <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirme a Senha" required>
          </div>
      </div>
  
      <button class="btn btn-primary" type="submit">Enviar</button>
  </form>
  

      
      
</body>
</html>