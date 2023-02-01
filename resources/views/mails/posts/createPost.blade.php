<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background-color: rgb(74, 128, 214);
            color: white;
        }
    </style>
</head>
<body>
    <h1>Bravo hai creato il post: {{ $post->title }}</h1>
    <p>Il testo è: {{ $post->body }} </p>
    <p>Categorie: {{ $post->category->name }} </p>
    <ul>
        @foreach ($post->tags as $elem)
            <li> {{$elem->name}} </li>
        @endforeach
    </ul>
</body>
</html>
