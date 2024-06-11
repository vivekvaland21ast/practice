<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin-bottom: 60px;
            /* Height of the footer */
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px;
            /* Height of the footer */
            background-color: #f5f5f5;
        }

        p.card-text {
            margin-top: -10px;
        }
    </style>
</head>

<body>
    {{-- @php
        echo '<pre>';
        print_r($weatherData);
    @endphp --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Weather App</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5 mb-4">Weather Application</h1>
        <div class="input-group mb-3">
            <form action="{{ route('weather.form') }}" method="post" class="form-inline">
                @csrf
                <div class="d-flex">
                    <div class="form-group">
                        <select class="form-select" name="city" id="city">
                            <option value="-1">-- Select City --</option>
                            <option value="Nadiad">Nadiad</option>
                            <option value="Ahmedabad">Ahmedabad</option>
                        </select>
                    </div>
                    <button style="margin-left: 20px;" class="btn btn-primary">Search</button>
                </div>
            </form>

        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            {{-- <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Looks Like</h5>
                        <br>
                        <b>--</b>
                    </div>
                </div>
            </div> --}}
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Location Details</h5>
                        <br>
                        <p class="card-text">Country: <b>{{ $weatherData['sys']['country'] }}</b></p>
                        <p class="card-text">Name: <b>{{ $weatherData['name'] }}</b></p>
                        <p class="card-text">Latitude: <b>{{ $weatherData['coord']['lat'] }}</b></p>
                        <p class="card-text">Longitude: <b>{{ $weatherData['coord']['lon'] }}</b></p>
                        <p class="card-text">Sunrise: <b>{{ $weatherData['sys']['sunrise'] }}</b></p>
                        <p class="card-text">Sunset: <b>{{ $weatherData['sys']['sunset'] }}</b></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Temperature &deg; C | &deg; F</h5>
                        <br>
                        <p class="card-text">Temp: <b>{{ $weatherData['main']['temp'] }}</b></p>
                        <p class="card-text">Min Temp: <b>{{ $weatherData['main']['temp_min'] }}</b></p>
                        <p class="card-text">Max Temp: <b>{{ $weatherData['main']['temp_max'] }}</b></p>
                        <p class="card-text">Feels Like: <b>{{ $weatherData['main']['feels_like'] }}</b></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Precipitation &percnt;</h5>
                        <br>
                        <p class="card-text">Humidity: <b>{{ $weatherData['main']['humidity'] }}</b></p>
                        <p class="card-text">Pressure: <b>{{ $weatherData['main']['pressure'] }}</b></p>
                        {{-- <p class="card-text">Sea Level: <b>{{ $weatherData['main']['sea_level'] }}</b></p> --}}
                        {{-- <p class="card-text">Ground Level: <b>{{ $weatherData['main']['grnd_level'] }}</b></p> --}}
                        <p class="card-text">Visibility: <b>{{ $weatherData['visibility'] }}</b></p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Wind m/h</h5>
                        <br>
                        <p class="card-text">Speed: <b>{{ $weatherData['wind']['speed'] }}</b></p>
                        <p class="card-text">Degree: <b>{{ $weatherData['wind']['deg'] }}</b></p>
                        <p class="card-text">Gust: <b>{{ $weatherData['wind']['gust'] }}</b></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br><br>
    {{-- <footer class="footer">
        <div class="container">
            <span class="text-muted">© 2024 Weather App. All rights reserved.</span>
        </div>
    </footer> --}}
</body>

</html>
