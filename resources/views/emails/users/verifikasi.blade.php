<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Email</title>
</head>
<body>

Hi <strong>{{ $name }}</strong>,<br>
<p>Click Link<a href="{{ $activation_link }}">{{ $activation_link }}</a> to activate your account.</p>
<p>Note : Copy link if cannot click !</p>
<p style="color:red;">Gluven</p>
</body>
</html>