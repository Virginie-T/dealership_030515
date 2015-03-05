<html>
<head>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
    <title>Find a Car</title>
</head>
<body>
    <div class='container'>

        <h1> Create a new car</h1>
        <form action='/create_car' method='post'>
            <div class='form-group'>
                <label for='year'>Enter vehicle year</label>
                <input id="year" name="year" type="number" class='form-control'>
            </div>
            <div class='form-group'>
                <label for='make_model'>Enter vehicle make and model</label>
                <input id="make_model" name="make_model" type="text" class='form-control'>
            </div>
            <div class='form-group'>
                <label for='price'>Enter vehicle price</label>
                <input id="price" name="price" type="number" class='form-control'>
            </div>
            <div class='form-group'>
                <label for='miles'>Enter vehicle miles</label>
                <input id="miles" name="miles" type="number" class='form-control'>
            </div>
            <div class='form-group'>
                <label for='image'>Enter vehicle image</label>
                <input id="image" name="image" type="text" class='form-control'>
            </div>
            <button type='submit' class='btn btn-success'>Submit</button>
        </form>

        <h1> Search for a car</h1>
        <form action='/search_result' method='post'>
            <div class='form-group'>
                <label for='user_price'>Enter Maximum Price:</label>
                <input id='user_price' name='user_price' class='form-control' type='number'>
            </div>
            <div class='form-group'>
                <label for='user_miles'>Enter Maximum Mileage:</label>
                <input id='user_miles' name='user_miles' class='form-control' type='number'>
            </div>
            <button type='submit' class='btn btn-success'>Submit</button>
        </form>

        <form action="/delete_all" method="post">
            <div class='form-group'>
                <button class="btn btn-danger" type="submit">Delete All</button>
            </div>
        </form>

        {% if cars is not empty  %}
        <h2>Car List</h2>
        <ul>
            {% for car in cars %}
                <li><img src={{ car.getImage }}></li>
                <li>{{ car.getYear}} {{ car.getMakeModel}}.  ${{ car.getPrice}}. {{ car.getMiles}} miles.</li>
            {% endfor %}
        </ul>
        {% endif %}

    </div>
</body>
</html>
