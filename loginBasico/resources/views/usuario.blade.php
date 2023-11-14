
@auth
<h4>Esta logado!</h4>
<p>{{Auth::user()->name}}</p>
<p>{{Auth::user()->email}}</p>
<p>{{Auth::user()->id}}</p>
@endauth

@guest
    <h4>Nao esta logado</h4>
@endguest