<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Number;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

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

    public function string()
    {

        $trim = Str::of('      Laravel      world    hello       ')->trim();

        $squish = Str::of('        Laravel          world   hello      ')->squish();

        // $tap = Str::of('Laravel')
        //     ->append(' Framework')
        //     ->tap(function (Stringable $string) {
        //         dump('String after append: ' . $string);
        //     })
        //     ->upper();

        $strip = Str::of('<a href="https://laravel.com">Taylor <b>Otwell</b></a>')->stripTags('<b>');

        echo $trim . "<br>";
        echo $squish . "<br>";
        // echo $tap . "<br>";
        echo $strip . "<br>";

    }

    public function array()
    {
        $array = ['products' => ['desk' => ['price' => 100]]];
        $dot = Arr::dot($array);

        $divide = [$keys, $values] = Arr::divide(['name' => 'Desk']);

        $array = [100, 200, 300];

        $first = Arr::first($array, function (int $value, int $key) {
            return $value == 100;
        });

        $array = ['name' => 'Joe', 'languages' => ['PHP', 'Ruby']];
        $flattened = Arr::flatten($array);

        $array = ['product' => ['name' => 'Desk', 'price' => 100]];
        $has = Arr::has($array, ['product.price']);

        $array = ['Tailwind', 'Alpine', 'Laravel', 'Livewire'];
        $joined = Arr::join($array, ', ', ' and ');

        $array = [
            ['product_id' => 'prod-100', 'name' => 'Desk'],
            ['product_id' => 'prod-100', 'name' => 'Chair'],
        ];
        $keyed = Arr::keyBy($array, 'product_id');

        $array = ['first' => 'james', 'last' => 'kirk'];
        $mapped = Arr::map($array, function (string $value, string $key) {
            return ucfirst($value);
        });

        $array = [
            [0, 1],
            [2, 3],
            [4, 5],
            [6, 7],
            [8, 9],
        ];
        $mapped1 = Arr::mapSpread($array, function (int $even, int $odd) {
            return $even + $odd;
        });

        $array = [
            ['developer' => ['id' => 1, 'name' => 'Taylor']],
            ['developer' => ['id' => 2, 'name' => 'Abigail']],
        ];
        $pluck = Arr::pluck($array, 'developer.name');
        $pluck1 = Arr::pluck($array, 'developer.name', 'developer.id');

        $array = ['price' => 100];
        $prepend = Arr::prepend($array, 'Desk', 'name');

        $array = [
            'name' => 'Taylor',
            'order' => [
                'column' => 'created_at',
                'direction' => 'desc'
            ]
        ];
        $query = Arr::query($array);

        $array = [1, 2, 3, 4, 5];
        $random = Arr::random($array, 2);

        $array = [
            ['Roman', 'Taylor', 'Li'],
            ['PHP', 'Ruby', 'JavaScript'],
            ['one' => 1, 'two' => 2, 'three' => 3],
        ];
        $sorted = Arr::sortRecursive($array);

        $isActive = false;
        $hasError = true;
        $array = ['p-4', 'font-bold' => $isActive, 'bg-red' => $hasError];
        $classes = Arr::toCssClasses($array);

        $array = [
            'user.name' => 'Kevin Malone',
            'user.occupation' => 'Accountant',
        ];
        $undot = Arr::undot($array);

        $array = [100, '200', 300, '400', 500];
        $filtered = Arr::where($array, function (string|int $value, int $key) {
            return is_string($value);
        });

        $data = ['products' => ['desk' => ['price' => 100]]];
        data_set($data, 'products.desk.price', 200);
        data_fill($data, 'products.desk.discount', 10);

        print_r($data);
        echo "<br>";
        print_r($filtered);
        echo "<br>";
        print_r($undot);
        echo "<br>";
        print_r($classes);
        echo "<br>";
        print_r($sorted);
        echo "<br>";
        print_r($random);
        echo "<br>";
        print_r($query);
        echo "<br>";
        print_r($prepend);
        echo "<br>";
        print_r($pluck1);
        echo "<br>";
        print_r($pluck);
        echo "<br>";
        print_r($mapped1);
        echo "<br>";
        print_r($mapped);
        echo "<br>";
        print_r($keyed);
        echo "<br>";
        print_r($joined);
        echo "<br>";
        print_r($has);
        echo "<br>";
        print_r($flattened);
        echo "<br>";
        print_r($first);
        echo "<br>";
        print_r($divide);
        echo "<br>";
        print_r($dot);
    }

    public function number()
    {
        $number = Number::clamp(20, min: 10, max: 100);
        // $currency = Number::currency(1000, in: 'INR');
        // $number = Number::ordinal(21);
        // $number = Number::spell(10, until: 10);

        // print_r($number);
        // echo "<br>";
        // print_r($number);
        // echo "<br>";
        // print_r($currency);
        // echo "<br>";
        print_r($number);
        echo "<br>";
    }

    public function url()
    {
        $url = action([NumberPracticecontroller::class, 'url']);
        $route = route('url');

        print_r($route);
        echo "<br>";
        print_r($url);
        echo "<br>";
    }
}
class NumberService extends NumberPracticecontroller
{
    public function all(): array
    {
        return once(fn() => [1, 2, 3]);
    }
}

// $service = new NumberService;

// $service->all();
// $service->all(); // (cached result)

// $secondService = new NumberService;

// $secondService->all();
// $secondService->all(); // (cached result)
