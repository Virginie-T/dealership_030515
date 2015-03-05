<html>
<head>
    <title>Car Search Results</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Here are your matching cars:</h1>
        <ul>
        {% for car in matching_cars %}
            <li>{{ car.getYear }}
            {{ car.getMakeModel }}.
            ${{ car.getPrice }}.
            {{ car.getMiles }} miles.</li>
        {% endfor %}
        </ul>
        <p><a href="/">Home</a></p>
    </div>
</body>
</html>
