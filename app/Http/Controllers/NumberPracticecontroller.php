<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class NumberPracticecontroller extends Controller
{
    public function index()
    {
        //abbreviate
        // $number = 1500;
        // $abbreviated = Str::abbreviate($number);
        // // Output
        // return $abbreviated; // '1.5K'

        // clamp
        // $number = 10;
        // $clamped = Str::clamp($number, 1, 5);
        // Output
        // return $clamped; // 5


        // useLocale
        // Str::useLocale('fr_FR');
        // Output
        // echo Str::currency(1234.56); // '1 234,56 €'

        // app_path
        // $appPath = app_path();
        // Output
        // return $appPath; // '/path/to/your/project/app' //D:\Laravel\practice\app

        // controller path
        // $controllerPath = app_path('Http/Controllers');
        // Output
        // return $controllerPath; // '/path/to/your/project/app/Http/Controllers' //D:\Laravel\practice\app\Http/Controllers

        // base_path
        // $basePath = base_path();
        //  Output 
        // return $basePath; // '/path/to/your/project' //D:\Laravel\practice

        // base_path with spicified file or directory
        // $vendorPath = base_path('vendor');
        // Output
        // return $vendorPath; // '/path/to/your/project/vendor' //D:\Laravel\practice\vendor

        // config_path
        // $configPath = config_path();
        //  Output
        // return $configPath; // '/path/to/your/project/config' //D:\Laravel\practice\config

        // config_path database_path
        // $databaseConfigPath = config_path('database.php');
        // // Output
        // return $databaseConfigPath; // '/path/to/your/project/config/database.php' //D:\Laravel\practice\config\database.php

        // database_path
        // $databasePath = database_path();
        // // Output
        // return $databasePath; // '/path/to/your/project/database' //D:\Laravel\practice\database

        // database_path database_path
        // $migrationsPath = database_path('migrations');
        // // Output
        // return $migrationsPath; // '/path/to/your/project/database/migrations' //D:\Laravel\practice\database\migrations

        // storage_path
        // $storagePath = storage_path();
        // // Output
        // return $storagePath; // '/path/to/your/project/storage' //D:\Laravel\practice\storage

        // resource_path
        // $resourcePath = resource_path();
        // // Output
        // return $resourcePath; // '/path/to/your/project/resources' //D:\Laravel\practice\resources

        // public_path
        // $publicPath = public_path();
        // // Output
        // return $publicPath; // '/path/to/your/project/public' //D:\Laravel\practice\public

        // lang_path
        // $langPath = lang_path();
        // // Output
        // return $langPath; // '/path/to/your/project/lang' //D:\Laravel\practice\lang

        // mixPath
        // $mixPath = mix('js/app.js');
        // // Output
        // echo $mixPath; // '/js/app.js?id=1234567890'

        // action
        // $url = action([NumberPracticecontroller::class, 'index']);
        // // Output
        // return $url; // 'http://127.0.0.1:8000'

        // abort
        // abort(404, 'Page not found');

        //abort_if
        // abort_if(!Auth::user(), 403);

        // Gets the available container instance.
        // $app = app();
        // return $app;

        //Gets the auth instance or a specific guard instance.
        // $auth = auth();
        // return $auth;

        // view all traits
        // $traits = class_uses_recursive(Profiles::class);
        // // Output
        // echo "<pre>";
        // print_r($traits); // Outputs an array of traits used by the App\User class
        // echo "</pre>";

        //// cookie
        // $value = cookie('name');
        //// Output
        // echo $value; // 'value'

        //once Executes a callback once.
        // once(function () {
        //     echo 'This will only run once';
        // });

        // value
        // $value = value(function () {
        //     return 'Hello, world!';
        // });
        // // Output
        // echo $value; // 'Hello, world!'

        //carbon date
        // $now = Carbon::now();
        // echo $now;

        // Get the current date and time
        $now = Carbon::now();
        echo $now . "<br>"; // Output: 2024-06-04 15:30:00

        // Create a Carbon instance from a specific date and time
        $date = Carbon::create(2024, 6, 4, 15, 30, 0);
        echo $date . "<br>"; // Output: 2024-06-04 15:30:00

        // Add days to the current date
        $newDate = $now->addDays(10);
        echo $newDate . "<br>"; // Output: 2024-06-14 15:30:00

        // Subtract months from the current date
        $previousDate = $now->subMonths(2);
        echo $previousDate . "<br>"; // Output: 2024-04-04 15:30:00

    }
}
