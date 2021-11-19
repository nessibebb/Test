<div class="card-group">
  <div class="card">
    <img class="card-img-top" src="{{asset('client/'.$client->image)}}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">infromation du CLient</h5>
      <h6>nom : {{$client->nom}}</h6>
      <h6>prenom : {{$client->prenom}}</h6>
      <h6>Credi : {{$client->solde}}</h6>
      <h6>telephone : {{$client->telephone}}</h6>
      <br>
      <a href="{{ url('/editclient/'.$client->id) }}" class="btn btn-sm btn-warning" >Edit</a> 
           <a href="{{ url('/destroyclient/'.$client->id) }}"class="btn btn-sm btn-danger" >Delete</a>
    </div>
  </div>