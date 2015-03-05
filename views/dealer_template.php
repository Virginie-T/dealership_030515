<html>
<head>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
    <title>Find a Car</title>
</head>
<body>
    <div class='container'>
        <h1>Find a Car!</h1>
        <form action='/dealer'>
            <div class='form-group'>
                <label for='user_price'>Enter Maximum Price:</label>
                <input id='user_price' name='user_price' class='form-control' type='number'>
            </div>
            <div class='form-group'>
                <label for='user_mileage'>Enter Maximum Mileage:</label>
                <input id='user_mileage' name='user_mileage' class='form-control' type='number'>
            </div>
            <button type='submit' class='btn-success'>Submit</button>
        </form>
    </div>
</body>
</html>
