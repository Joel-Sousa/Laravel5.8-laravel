<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Editar cliente</h3>
    <form action="{{route('clientes.update', $data['id'])}}" method='post'>
        @csrf
        @method('put')
        <input type='text' name='id' value="{{$data['id']}}" readonly/><br>
        <input type='text' name='nome' value="{{$data['nome']}}" /><br>
        <input type='submit' value='Editar' />
    </form>
</body>
</html>