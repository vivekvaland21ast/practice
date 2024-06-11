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
            <!-- Form -->
            <div class="w-1/2 p-5">
                {{-- CSV file input --}}
                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1 class="text-lg">Import data from .csv file</h1>
                    <div class="w-1/2 p-5 mt-4">
                        <input type="file" name="csvFile"
                            class="file-input file-input-bordered file-input-primary w-full max-w-xs" />
                    </div>
                    @if (session('success'))
                        <h1 class="text-mg text-green-500">{{session('success')}}</h1>
                        <script>
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 4000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                }
                            });
                            Toast.fire({
                                icon: "info",
                                title: "Your file will be imported in few seconds"
                            });
                        </script>
                    @endif
                    <div class="w-1/2 p-5">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Import</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>
