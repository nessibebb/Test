<nav class="navbar navbar-expand-lg navbar-light bg-light bg-light">
  <a class="navbar-brand" href="#">Gestion de Bouras</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="{{ url('/index')}}">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="{{ url('/create')}}">Create Voiture   </a>
      <a class="nav-item nav-link active" href="{{ url('/listeClient')}}">liste Client  </a>
      <a class="nav-item nav-link active" href="{{ url('/createclient')}}">Create Client   </a>
      <a class="nav-item nav-link active" href="{{ url('/indexvente')}}">Liste de ventes  </a>
     <button class=" btn-sm btn-danger"> <a class="nav-item nav-link active" href="{{ url('/deconnect')}}">Dconnecté</a></button>
    </div>
  </div>
  
</nav>