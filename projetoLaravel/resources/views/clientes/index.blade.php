<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>{{$titulo ?? "sem titulo"}}</h3>

<a href="{{route('clientes.create')}}">Novo cliente</a>
<br>
<br>
{{Illuminate\Foundation\Application::VERSION}}
{{--  <form action="{{route('clientes.pesquisar', 0)}}"  method="get">
    @csrf
    <input type='text' name='pesquisa' />
    <input type='submit' value='Pesquisa' />
</form>  --}}
<br>
<br>

@if(count($data) > 0)
    <table border='' width=300 >
        {{--  {{dd($data)}}  --}}
        <tr>
            <td>Info</td>
            <td>Nome</td>
            <td>Editar</td>
            <td>Excluir</td>
        </tr>
        @foreach($data as $c)
            <tr>
                <td><a href="{{route('clientes.show', $c['id'])}}">Info</a></td>
                <td>{{$c['nome'] ?? 'sem dado'}}</td>
                <td><a href="{{route('clientes.edit', $c['id'])}}">Editar</a></td>
                <td>
                    <form action="{{route('clientes.destroy', $c['id'])}}" method='post'>
                        @csrf
                        @method('delete')
                        {{--  <input type='text' name='id' value="{{$c['id']}}" />  --}}
                        <input type='submit' value='deletar' />
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    @else
     <h3>Nao existe usuarios cadastrados</h3>

     @endif

     @empty($data)

     <h3>Nao existe usuarios cadastrados</h3>
    @endempty
</body>
</html>
