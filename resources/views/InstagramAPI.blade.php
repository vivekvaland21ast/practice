<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Application</title>
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
    @php
        // echo '<pre>';
        // print_r($userData);
    @endphp
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">User Details</a>
        </div>
    </nav><br>

    <div class="container">
        {{-- <h1 class="mt-5 mb-4">Weather Application</h1> --}}
        <div class="input-group mb-3">
            <form action="{{ route('instagram.form') }}" method="post" class="form-inline">
                @csrf
                <div class="d-flex">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" id="user" name="user" placeholder="Username"
                            aria-label="Username" aria-describedby="basic-addon1">
                        <button class="btn btn-primary" type="button">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Instagram Details</h5>
                        <br>
                        {{-- <img class="rounded-circle" alt="Profile_image"
                            src="{{ $userData['data']['hd_profile_pic_url_info']['url'] }}" /><br><br> --}}
                        <p class="card-text">Username: <b>{{ $userData['data']['username'] }}</b></p>
                        <p class="card-text">Post: <b>{{ $userData['data']['media_count'] }}</b></p>
                        <p class="card-text">Followers: <b>{{ $userData['data']['follower_count'] }}</b></p>
                        <p class="card-text">Biography: <b>{{ $userData['data']['biography'] }}</b></p>
                        {{-- <p class="card-text">Sunset: <b>{{ $userData['data']['contact_phone_number'] }}</b></p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>

</body>

</html>
