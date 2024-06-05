<?php

namespace App\Http\Controllers;

use App\Events\Welcome;
use App\Imports\FileImport;
use App\Jobs\ProcessCSVChunk;
use App\Models\Comments;
use App\Models\Form;
use App\Models\Profiles;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Log;
use Maatwebsite\Excel\Facades\Excel;


class Practicecontroller extends Controller
{
    public function index()
    {
        $data = Form::all();
        return view('welcome', compact('data'));
        //append
        // $collection = collect(['name' => 'vivek', 'age' => 23]);
        // $append = $collection-append(['city'=>'nadiad']); //not work
        // $append = $collection->merge(['city' => 'nadiad']); //work
        // return dd($append);

        //contains
        // $collection = collect(['apple', 'banana', 'cherry']);
        // $containsBanana = $collection->contains('banana');

        // return dd($containsBanana); //true

        //diff
        // $collection1 = collect([1, 2, 3, 4, 5]);
        // $collection2 = collect([3, 4, 5, 6, 7]);
        // $diff = $collection1->diff($collection2);

        // // Output:
        // // [1, 2]
        // return dd($diff);

        //except
        // $collection = collect(['name' => 'John', 'age' => 30, 'city' => 'New York']);
        // $excepted = $collection->except(['age', 'city']);

        // Output:
        // ['name' => 'John']
        // return dd($excepted);

        //find
        // $collection = collect([1, 2, 3, 4, 5]);
        // $key = $collection->find(3);
        // return dd($key);
        //Output: 2 coz 3 is on 2 number key->value 0->1, 1->2, 2->3, 3->4, 4->5 //3 is in 3 key

        //intersect
        // $collection1 = collect([1, 2, 3, 4, 5]);
        // $collection2 = collect([1, 4, 5, 6, 7]); //present in both collections
        // $intersect = $collection1->intersect($collection2);
        // return dd($intersect);

        //modelKeys
        // $users = Profiles::get()->where('id', '=', 25);
        // $users = Profiles::all();
        // $keys = $users->modelKeys();
        // return dd($keys);

        //makeVisible
        // $users = Profiles::all();
        // $users->makeVisible(['google_id']);
        // return dd($users);

        //makeHidden
        // $users = Profiles::all();
        // $users->makeHidden(['password']);
        // return dd($users);

        //toQuery
        // $collection = Profiles::all();
        // $query = $collection->toQuery();
        // $query->where('username', 'test333');
        // return dd($query);

        //unique
        // $collection = collect([1, 2, 2, 3, 3, 4, 5]);
        // $unique = $collection->unique();
        // return dd($unique);

        //explain
        // $query = Profiles::where('email', '=', 'vivek123@gmail.com')->explain();
        // return dd($query);

        //Arr::divide
        // $array = ['name' => 'John', 'age' => 25];
        // list($keys, $values) = Arr::divide($array);

        //output
        // $keys = ['name', 'age'];
        // $values = ['John', 25];

        // return dd($keys, $values);

        //Arr::dot
        // $array = ['user' => ['name' => 'John', 'age' => 25]];
        // $result = Arr::dot($array);

        // // $result = ['user.name' => 'John', 'user.age' => 25];
        // return dd($result);

        //Arr::first
        // $array = [100, 200, 300];
        // $result = Arr::first($array, function ($value, $key) {
        // return $value >= 150;
        // });
        // // $result = 200;
        // return dd($result);

        //Arr::flatten
        // $array = ['name' => 'John', 'languages' => ['PHP', 'JavaScript']];
        // $result = Arr::flatten($array);
        // // $result = ['John', 'PHP', 'JavaScript'];
        // return dd($result);

        //Arr::forget
        // $array = ['name' => 'John', 'mca' => ['languages' => ['PHP', 'JavaScript']]];
        // echo "<pre>";
        // print_r($array);
        // echo "</pre>";
        // Arr::forget($array, 'mca.languages');
        // // $array = ['name' => 'John'];
        // return dd($array);

        //Arr::get
        // $array = ['user' => ['name' => 'John', 'age' => 25]];
        // $result = Arr::get($array, 'user.name');
        // // $result = 'John';
        // return dd($result);

        //Arr::join
        // $array = ['a', 'b', 'c'];
        // $result = Arr::join($array, ', ', ' and ');
        // // $result = 'a, b and c';
        // return dd($result);

        //Arr::keyBy
        // $array = [
        //     ['name' => 'John', 'age' => 25],
        //     ['name' => 'Jane', 'age' => 28]
        // ];
        // $result = Arr::keyBy($array, 'name');

        // // $result = [
        // //     'John' => ['name' => 'John', 'age' => 25],
        // //     'Jane' => ['name' => 'Jane', 'age' => 28]
        // // ];
        // return dd($result);

        //Arr::last
        // $array = [100, 200, 300];
        // $result = Arr::last($array, function ($value, $key) {
        //     return $value >= 150;
        // // $result = 300;
        // });
        // return dd($result);

        //Arr::map
        // $array = [1, 2, 3];
        // $result = Arr::map(function ($value) {
        //     return $value * 2;
        // }, $array);

        // // $result = [2, 4, 6];
        // return dd($result);

        //Arr::mapSpread
        // $array = [[1, 2], [3, 4]];
        // $result = Arr::mapSpread(function ($a, $b) {
        //     return $a + $b;
        // }, $array);

        // // $result = [3, 7];
        // return dd($result);

        //Arr::mapWithKeys
        // $array = [
        //     ['name' => 'John', 'age' => 25],
        //     ['name' => 'Jane', 'age' => 28]
        // ];
        // $result = Arr::mapWithKeys(function ($item) {
        //     return [$item['name'] => $item['age']];
        // }, $array);

        // // $result = ['John' => 25, 'Jane' => 28];
        // return dd($result);        

        //Arr::prepend
        // $array = ['one', 'two', 'three'];
        // echo "<pre>";
        // print_r($array);
        // echo "</pre>";
        // $result = Arr::prepend($array, 'zero');
        // // $result = ['zero', 'one', 'two', 'three'];
        // return dd($result);

        // $array = ['name' => 'John', 'age' => 25];
        // echo "<pre>";
        // print_r($array);
        // echo "</pre>";
        // $result = Arr::prependKeysWith($array, 'user.');
        // // $result = ['user.name' => 'John', 'user.age' => 25]
        // return dd($result);

        // //Arr::query
        // $array = ['name' => 'John Doe', 'age' => 30];
        // $query = Arr::query($array);
        // 'name=John+Doe&age=30'
        // return dd($query);

        //Arr::randome
        // $array = [1, 2, 3, 4, 5];
        // $randomValue = Arr::random($array);
        // return dd($randomValue);

        //Arr::set
        // $array = ['products' => ['desk' => ['price' => 100]]];
        // echo "<pre>";
        // print_r($array);
        // echo "</pre>";
        // Arr::set($array, 'products.desk.price', 200);
        // return dd($array);

        // Arr::shuffle
        // $array = [1, 2, 3, 4, 5];
        // $shuffled = Arr::shuffle($array);
        // return dd($shuffled);

        // Arr::sortRecursive
        // $array = ['b' => ['d' => 2, 'c' => 1], 'a' => 3];
        // $result = Arr::sortRecursive($array);
        // // ['a' => 3, 'b' => ['c' => 1, 'd' => 2]]
        // return dd($result);

        //Arr::take
        // $array = [1, 2, 3, 4, 5];
        // $taken = Arr::take($array, 4);
        // // [1, 2, 3, 4]
        // return dd($taken);

        //Arr::toCssClasses //Converts an array to a CSS class string.
        // $array = ['btn', 'btn-primary', 'active' => true, 'disabled' => false];
        // $classes = Arr::toCssClasses($array);
        // // 'btn btn-primary active'
        // return dd($classes);

        //Arr::toCssStyles
        // $array = ['color' => 'red', 'font-weight' => 'bold'];
        // $styles = Arr::toCssStyles($array);
        // return dd($styles);
        // 'color: red; font-weight: bold;'
    }
    public function index2()
    {

        //Arr::undot
        // $array = ['foo.bar' => 'baz'];
        // $expanded = Arr::undot($array);
        // return $expanded;
        // ['foo' => ['bar' => 'baz']]

        //Arr::where
        // $array = [1, 2, 3, 4, 5];
        // $filtered = Arr::where($array, function ($value) {
        //     return $value > 2;
        // });
        // return $filtered;
        // [3, 4, 5]

        //Arr::whereNotNull
        // $array = ['name' => 'John', 'age' => null, 'email' => 'john@example.com'];
        // $filtered = Arr::whereNotNull($array);
        // return $filtered;
        // ['name' => 'John', 'email' => 'john@example.com']


        //data_fill
        // $array = ['product' => ['name' => 'Desk']];
        // $result = data_fill($array, 'product.price', 100);
        // return $result;

        //data_get
        // $array = ['product' => ['name' => 'Desk', 'price' => 100]];
        // $name = data_get($array, 'product.name');
        // return $name;

    }
    public function store(Request $request)
    {
        $formdata = $request->all();
        // dd($formdata);

        $userData = Form::create([
            'email' => $request->input('email'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
        ]);
        // event(new Welcome($userData));
        return redirect()->back();
    }

    public function importCSV()
    {
        return view('welcome');
    }
    public function uploadCSV(Request $request)
    {
        $file = $request->file('csvFile');
        $filePath = $file->storeAs('csvFiles', 'import.csv', 'local');
        Storage::put('csvFiles/offset.txt', 0);

        // Artisan::call('queue:work');
        ProcessCSVChunk::dispatch();
        return redirect()->route('import')->with('success', 'Your file will be imported in few seconds');
    }
}
