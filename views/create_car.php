<html>
<head>
    <title>Places You've Been</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>You created a new car listing</h1>
        <p>Year: {{ newcar.getYear }}</p>
        <p>Make and model: {{ newcar.getMakeModel }}</p>
        <p>Price: {{ newcar.getPrice }}</p>
        <p>Miles: {{ newcar.getMiles }}</p>
        <p><a href="/">Home</a></p>
    </div>
</body>
</html>
