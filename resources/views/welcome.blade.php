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
                {{-- <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="email" name="email" id="email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                        <label for="email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                            address</label>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="first_name" id="first_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="first_name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                                name</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="last_name" id="last_name"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="last_name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last
                                name</label>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form> --}}
                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1 class="text-lg">Import data from .csv file</h1>
                    <div class="w-1/2 p-5 mt-4">
                        <input type="file" name="csvFile"
                            class="file-input file-input-bordered file-input-primary w-full max-w-xs" />
                    </div>
                    @if (session('success'))
                        {{-- <h1 class="text-mg text-green-500">{{session('success')}}</h1> --}}
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

            <!-- Table -->
            {{-- <div class="w-1/2 p-5">
                <h1 class="text-2xl font-bold mb-5">Entries</h1>
                <div class="scrollable border">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">First Name</th>
                                <th class="px-4 py-2">Last Name</th>
                                <th class="px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $entry)
                                <tr>
                                    <td class="border px-4 py-2">{{ $entry->id }}</td>
                                    <td class="border px-4 py-2">{{ $entry->email }}</td>
                                    <td class="border px-4 py-2">{{ $entry->first_name }}</td>
                                    <td class="border px-4 py-2">{{ $entry->last_name }}</td>
                                    <td class="border px-4 py-2">{{ $entry->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> --}}
        </div>
    </div>
</body>

</html>
