<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Practice</title>

    <style>
        .scrollable {
            display: block;
            max-height: 400px;
            overflow-y: auto;
        }

        th {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            background: rgb(18, 16, 16);
            z-index: 1;
        }
    </style>
</head>

<body>
    <div class="container mx-auto mt-10">
        <div class="flex">
            {{-- fake name and method --}}
            <div class="w-1/2 p-5">
                <h1 class="text-2xl font-bold mb-5">Entries</h1>
                <div class="scrollable border">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Text</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 10; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ fake()->name() }}</td>
                                    <td>{{ fake()->unique()->safeEmail() }}</td>
                                    <td>{{ fake()->text() }}</td>
                                    <td>{{ now() }}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
