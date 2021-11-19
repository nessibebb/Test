<div class="card mb-4">
  <img    src="{{asset('voiture/1616245046-png')}}" class="card-img-top"  >
  <div class="card-body">
    <h5 class="card-title">Liste de Voitures</h5>
    <p class="card-text"> tu peut avoire ici tout les information sue les voiture de nos BOURSA</p>
    <div class="row justify-content-center">
    @foreach($voitures as $voiture) 
    
    <section class="col-md-4"> 
    <div class="card  " style="width: 17rem;">
  <img style=" width :16rem ; height : 15rem;" src="{{ asset('voiture/'.$voiture->image)}}" class="card-img-top"  >
  <div class="card-body"> 
 
      <b> 
      {{ $voiture->nom}}
       Model   {{ $voiture->date_creation}} <br>
       Prix  : {{ $voiture->prix }}<br>
       Marke :{{$voiture->marke}}<br>
       nombre_de_km :{{$voiture->nombre_de_km}} <br>
      type de carburant :{{$voiture->type}}</b><br>
      <a href="{{ url('/clientinfo/'.$voiture->noProprietaire) }}" class="btn btn-sm btn-info" > 
        info Client </a></td>
         <a href="{{ url('/edit/'.$voiture->id) }}" class="btn btn-sm btn-warning" >Edit</a> 
           <a href="{{ url('/destroy/'.$voiture->id) }}"class="btn btn-sm btn-danger" >Delete</a><br><br>
           <a href="{{ url('/ajoutAchat/'.$voiture->id) }}"class="btn btn-lg btn-success" >Acheter</a>
    </div>
    </div>
    <br>
    </section>
    
    @endforeach
    </div>
  </div></div>
  
  
 
