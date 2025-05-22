<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather Dashboard</title>
    <style>
        .row {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .column {
            width: 30%;
            padding: 20px;
            background-color: #f3f3f3;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Weather for 3 Cities</h1>
    <div class="row">
        @foreach ($weatherData as $weather)
            <div class="column">
                <h2>{{ $weather['city'] }}</h2>
                <p><strong>Temperature:</strong> {{ $weather['temperature'] }} °C</p>
                <p><strong>Description:</strong> {{ $weather['description'] }}</p>
                <p><strong>Humidity:</strong> {{ $weather['humidity'] }}%</p>
            </div>
        @endforeach
    </div>
</body>
</html>
