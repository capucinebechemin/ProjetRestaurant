<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Création d'un plat</title>
</head>
<body>
    <h1>Création d'un plat</h1>

    <form method="POST" action="{{ route('restaurateur.store') }}">

        @csrf

        <label for="nom">Nom du plat</label><br>
        <input id="nom" type="text" name="nom">
        <br><br>
        <label for="prix">Prix du plat</label><br>
        <input id="prix" type="number" name="prix">
        <br><br>
        <label for="photo">Photo</label><br>
        <input id="photo" type="file" name="photo" accept="image/png, image/jpeg">
        <input id="id_restaurateur" type="hidden" name="id_restaurateur" value="{{$resto->id}}">
        <p>{{$resto->id}}</p>
        <br><br>


        <input type="submit">
    </form>

</body>
</html>