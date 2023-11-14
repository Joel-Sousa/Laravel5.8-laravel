<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Seja bem vindo(a) {{$data['nome']}}</h4>
    <p>Voce acabou de acessar o sistema utilizando seu email: {{$data['email']}}</p>
    <p>Data/hora: {{$data['dataHora']}}</p>
    <p>Clique no link para confirmar seu email de registro:</p>
    <a href="{{$data['link']}}">Clique aqui!</a>
    
</body>
</html>