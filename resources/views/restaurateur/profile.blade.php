<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Gestion du profile</title>
</head>
<body>
    <h1>Gestion du profile</h1>


<form method="POST" action="{{ route('restaurateur.update') }}">

@csrf
@method('PUT')

<label for="nom">Nom du restaurant</label><br>
<input id="nom" type="text" name="nom" value="{{$resto->nom_restaurant}}">
<br><br>
<label for="logo">Logo</label><br>
<input id="logo" type="file" name="logo" accept="image/png, image/jpeg" value="{{$resto->logo}}">
<br><br>
<label for="mail">Adresse mail de contact</label><br>
<input id="mail" type="text" name="mail" value="{{$resto->adresse_mail_contact}}">
<br><br>
<label for="adresse">Adresse</label><br>
<input id="adresse" type="text" name="adresse" value="{{$resto->adresse}}">
<br><br>
<input type="submit">
</form>

   
</body>
</html>
