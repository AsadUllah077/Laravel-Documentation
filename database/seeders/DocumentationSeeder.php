<?php

namespace Database\Seeders;

use App\Models\DocumentationCategory;
use App\Models\DocumentationTopic;
use Illuminate\Database\Seeder;

class DocumentationSeeder extends Seeder
{
    public function run(): void
    {
        // Installation & Setup
        $installation = DocumentationCategory::create([
            'name' => 'Installation & Setup',
            'slug' => 'installation-setup',
            'description' => 'Learn how to install and set up Laravel on your system',
            'order' => 1,
            'icon' => '⚙️',
        ]);

        DocumentationTopic::create([
            'category_id' => $installation->id,
            'title' => 'Server Requirements',
            'slug' => 'server-requirements',
            'description' => 'Learn about the server requirements for running Laravel',
            'order' => 1,
            'content' => <<<'HTML'
<h2>Server Requirements</h2>
<p>Laravel has a few system requirements. All of these requirements are satisfied by the Laravel Homestead virtual machine, so it's highly recommended that you use Homestead as your local Laravel development environment.</p>

<h3>PHP Requirements</h3>
<ul>
    <li>PHP >= 8.2</li>
    <li>BCMath PHP Extension</li>
    <li>Ctype PHP Extension</li>
    <li>cURL PHP Extension</li>
    <li>DOM PHP Extension</li>
    <li>Fileinfo PHP Extension</li>
    <li>Filter PHP Extension</li>
    <li>Hash PHP Extension</li>
    <li>Mbstring PHP Extension</li>
    <li>OpenSSL PHP Extension</li>
    <li>PCRE PHP Extension</li>
    <li>PDO PHP Extension</li>
    <li>Tokenizer PHP Extension</li>
    <li>XML PHP Extension</li>
</ul>

<h3>Checking Requirements</h3>
<p>You can check if your system meets the requirements by running:</p>
<pre><code>php -m</code></pre>

<p>This command will list all loaded PHP modules. Make sure the required extensions are present.</p>

<h3>Web Server Configuration</h3>
<p>For production environments, ensure your web server is configured correctly. Laravel includes a public/.htaccess file that is used to serve URLs without the index.php front controller in the path.</p>
HTML,
        ]);

        DocumentationTopic::create([
            'category_id' => $installation->id,
            'title' => 'Installing Laravel',
            'slug' => 'installing-laravel',
            'description' => 'Learn how to install Laravel using Composer and Laravel Installer',
            'order' => 2,
            'content' => <<<'HTML'
<h2>Installing Laravel</h2>
<p>Laravel utilizes Composer to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.</p>

<h3>Via Composer Create-Project</h3>
<p>You may install Laravel by issuing the Composer create-project command in your terminal:</p>
<pre><code>composer create-project laravel/laravel example-app</code></pre>

<h3>Via Laravel Installer</h3>
<p>First, download the Laravel Installer using Composer:</p>
<pre><code>composer global require laravel/installer</code></pre>

<p>Make sure to place Composer's system-wide vendor bin directory in your PATH so the laravel executable can be located by your system. This directory exists in different locations based on your operating system.</p>

<p>Once installed, the laravel new command will create a fresh Laravel installation in the directory you specify:</p>
<pre><code>laravel new example-app</code></pre>

<h3>Local Development Server</h3>
<p>If you have PHP installed locally and you would like to use PHP's built-in development server to serve your application, you may use the serve Artisan command:</p>
<pre><code>cd example-app
php artisan serve</code></pre>

<p>This command will start a development server at http://localhost:8000.</p>

<h3>Configuration</h3>
<p>After installing Laravel, you should configure your application. The configuration files are located in the config directory. Each option is documented, so feel free to look through the files and get familiar with the options available to you.</p>
HTML,
        ]);

        DocumentationTopic::create([
            'category_id' => $installation->id,
            'title' => 'Configuration',
            'slug' => 'configuration',
            'description' => 'Learn about Laravel configuration files and environment variables',
            'order' => 3,
            'content' => <<<'HTML'
<h2>Configuration</h2>
<p>Laravel's configuration files are located in the config directory. Each option is documented, so feel free to look through the files and get familiar with the options available to you.</p>

<h3>Environment Configuration</h3>
<p>Laravel utilizes the DotEnv PHP library. In a fresh Laravel installation, the root directory of your application will contain a .env.example file. If you haven't already, you should make a copy of the .env.example file as .env.</p>

<pre><code>cp .env.example .env</code></pre>

<p>The .env file contains important configuration values for your application. Never commit this file to version control.</p>

<h3>Application Key</h3>
<p>The application key is a random string used to encrypt sessions and other sensitive data. You can generate a new key using the command:</p>
<pre><code>php artisan key:generate</code> artisan</pre>

<h3>Database Configuration</h3>
<p>Laravel makes interacting with databases extremely easy across a variety of database backends. The database configuration for your application is located in config/database.php.</p>

<pre><code>'mysql' => [
    'driver' => 'mysql',
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE', 'forge'),
    'username' => env('DB_USERNAME', 'forge'),
    'password' => env('DB_PASSWORD', ''),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
    'strict' => true,
],</code></pre>

<h3>Debug Mode</h3>
<p>The debug option in your config/app.php file determines how much information about an error is actually displayed to the user. By default, this option is set to respect the value of the APP_DEBUG environment variable.</p>

<p><strong>Never leave debug mode enabled in production.</strong></p>
HTML,
        ]);

        // Routing
        $routing = DocumentationCategory::create([
            'name' => 'Routing',
            'slug' => 'routing',
            'description' => 'Learn about Laravel routing, including basic routing, named routes, and route groups',
            'order' => 2,
            'icon' => '🛤️',
        ]);

        DocumentationTopic::create([
            'category_id' => $routing->id,
            'title' => 'Basic Routing',
            'slug' => 'basic-routing',
            'description' => 'Learn the basics of routing in Laravel',
            'order' => 1,
            'content' => <<<'HTML'
<h2>Basic Routing</h2>
<p>The most basic Laravel routes accept a URI and a Closure, providing a very simple and expressive method of defining routes and behavior without complicated routing configuration files.</p>

<h3>Available Router Methods</h3>
<p>The router allows you to register routes that respond to any HTTP verb:</p>
<pre><code>Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);</code></pre>

<h3>Registering Routes</h3>
<p>Routes are typically defined in the routes/web.php file. Here's an example of a basic route:</p>
<pre><code>use Illuminate\Support\Facades\Route;

Route::get('/greeting', function () {
    return 'Hello, World!';
});</code></pre>

<h3>The Home Route</h3>
<p>A common requirement is to register routes for the application's home page. This can be accomplished like so:</p>
<pre><code>Route::get('/', function () {
    return view('welcome');
});</code></pre>

<h3>CSRF Protection</h3>
<p>Any HTML forms pointing to POST, PUT, PATCH, or DELETE routes that are defined in the web routes file should include a CSRF token field. Otherwise, the request will be rejected.</p>
<pre><code><form method="POST" action="/profile">
    @csrf
    ...
</form></code></pre>
HTML,
        ]);

        DocumentationTopic::create([
            'category_id' => $routing->id,
            'title' => 'Route Parameters',
            'slug' => 'route-parameters',
            'description' => 'Learn how to capture segments of the URI as parameters',
            'order' => 2,
            'content' => <<<'HTML'
<h2>Route Parameters</h2>
<p>Sometimes you need to capture segments of the URI within your route. For example, you may need to capture a user's ID from the URL. You may do so by defining route parameters.</p>

<h3>Required Parameters</h3>
<p>Required parameters are route segments that must be present for the route to match:</p>
<pre><code>Route::get('/users/{id}', function (string $id) {
    return 'User '.$id;
});</code></pre>

<p>You may define as many route parameters as required by your route:</p>
<pre><code>Route::get('/posts/{post}/comments/{comment}', function (string $postId, string $commentId) {
    //
});</code></pre>

<h3>Optional Parameters</h3>
<p>Occasionally you may need to specify a route parameter that may not always be present in the URI. You may do so by placing a ? mark after the parameter name:</p>
<pre><code>Route::get('/user/{name?}', function (string $name = null) {
    return $name;
});</code></pre>

<h3>Regular Expression Constraints</h3>
<p>You may constrain the format of your route parameters using the where method on a route instance:</p>
<pre><code>Route::get('/user/{id}', function (string $id) {
    //
})->where('id', '[0-9]+');

Route::get('/user/{name}', function (string $name) {
    //
})->where('name', '[a-z]+');

Route::get('/user/{id}/{name}', function (string $id, string $name) {
    //
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);</code></pre>
HTML,
        ]);

        DocumentationTopic::create([
            'category_id' => $routing->id,
            'title' => 'Named Routes',
            'slug' => 'named-routes',
            'description' => 'Learn how to assign names to your routes',
            'order' => 3,
            'content' => <<<'HTML'
<h2>Named Routes</h2>
<p>Named routes allow the convenient generation of URLs or redirects for specific routes. You may specify a name for a route by chaining the name method onto the route definition:</p>

<h3>Assigning Names to Routes</h3>
<pre><code>Route::get('/user/profile', function () {
    //
})->name('profile');</code></pre>

<h3>Generating URLs to Named Routes</h3>
<p>Once you have assigned a name to a given route, you may use the route name when generating URLs or redirects via Laravel's route and redirect functions:</p>
<pre><code>// Generating URLs...
$url = route('profile');

// Generating Redirects...
return redirect()->route('profile');</code></pre>

<h3>Parameters with Named Routes</h3>
<p>If the route has parameters, you can pass them as the second argument to the route function:</p>
<pre><code>Route::get('/user/{id}/profile', function (string $id) {
    //
})->name('profile');

$url = route('profile', ['id' => 1]);</code></pre>

<h3>Inspecting the Current Route</h3>
<p>If you would like to determine if the current request was routed to a given named route, you may use the named method on a Route instance:</p>
<pre><code>use Illuminate\Support\Facades\Route;

if (Route::current()->named('profile')) {
    //
}</code></pre>
HTML,
        ]);

        // Controllers
        $controllers = DocumentationCategory::create([
            'name' => 'Controllers',
            'slug' => 'controllers',
            'description' => 'Learn about controllers and how they handle HTTP requests',
            'order' => 3,
            'icon' => '🎮',
        ]);

        DocumentationTopic::create([
            'category_id' => $controllers->id,
            'title' => 'Controller Basics',
            'slug' => 'controller-basics',
            'description' => 'Learn the basics of controllers in Laravel',
            'order' => 1,
            'content' => <<<'HTML'
<h2>Controller Basics</h2>
<p>Instead of defining all of your request handling logic as Closures in route files, you may wish to organize this behavior using Controller classes. Controllers can group related request handling logic into a single class.</p>

<h3>Defining Controllers</h3>
<p>Controllers are typically stored in the app/Http/Controllers directory. Here's an example of a basic controller:</p>
<pre><code><?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function show(string $id): Response
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }
}</code></pre>

<h3>Registering Controllers</h3>
<p>Once you have defined a controller class, you may register a route to it:</p>
<pre><code>use App\Http\Controllers\UserController;

Route::get('/user/{id}', [UserController::class, 'show']);</code></pre>

<h3>Single Action Controllers</h3>
<p>If a controller action is particularly complex, you might find it convenient to dedicate an entire controller class to a single action. To accomplish this, you may define a single __invoke method within the controller:</p>
<pre><code><?php

namespace App\Http\Controllers;

class ShowProfile extends Controller
{
    public function __invoke(string $id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }
}</code></pre>
HTML,
        ]);

        DocumentationTopic::create([
            'category_id' => $controllers->id,
            'title' => 'Resource Controllers',
            'slug' => 'resource-controllers',
            'description' => 'Learn how to use resource controllers for CRUD operations',
            'order' => 2,
            'content' => <<<'HTML'
<h2>Resource Controllers</h2>
<p>Laravel resource routing assigns the typical "CRUD" routes to a controller with a single line of code. For example, you may wish to create a controller that handles all HTTP requests for "photos" stored by your application.</p>

<h3>Creating a Resource Controller</h3>
<p>You may create a resource controller using the Artisan CLI:</p>
<pre><code>php artisan make:controller PhotoController --resource</code></pre>

<h3>Registering Resource Routes</h3>
<p>This single method call creates multiple routes for handling a variety of actions on the resource:</p>
<pre><code>Route::resource('photos', PhotoController::class);</code></pre>

<h3>Actions Handled by Resource Controller</h3>
<table class="w-full">
    <thead>
        <tr>
            <th>Verb</th>
            <th>URI</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr><td>GET</td><td>/photos</td><td>index</td></tr>
        <tr><td>GET</td><td>/photos/create</td><td>create</td></tr>
        <tr><td>POST</td><td>/photos</td><td>store</td></tr>
        <tr><td>GET</td><td>/photos/{photo}</td><td>show</td></tr>
        <tr><td>GET</td><td>/photos/{photo}/edit</td><td>edit</td></tr>
        <tr><td>PUT/PATCH</td><td>/photos/{photo}</td><td>update</td></tr>
        <tr><td>DELETE</td><td>/photos/{photo}</td><td>destroy</td></tr>
    </tbody>
</table>

<h3>Partial Resource Routes</h3>
<p>When declaring a resource route, you may specify a subset of actions the controller should handle:</p>
<pre><code>Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);</code></pre>
HTML,
        ]);

        // Models & Database
        $models = DocumentationCategory::create([
            'name' => 'Models & Database',
            'slug' => 'models-database',
            'description' => 'Learn about Eloquent ORM and database operations',
            'order' => 4,
            'icon' => '🗄️',
        ]);

        DocumentationTopic::create([
            'category_id' => $models->id,
            'title' => 'Eloquent ORM',
            'slug' => 'eloquent-orm',
            'description' => 'Learn the basics of Laravel\'s Eloquent ORM',
            'order' => 1,
            'content' => <<<'HTML'
<h2>Eloquent ORM</h2>
<p>Laravel includes Eloquent, an object-relational mapper (ORM) that makes it enjoyable to interact with your database. When using Eloquent, each database table has a corresponding "Model" that is used to interact with that table.</p>

<h3>Defining Models</h3>
<p>To get started, let's create an Eloquent model. Models typically live in the app/Models directory:</p>
<pre><code><?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    //
}</code></pre>

<h3>Retrieving Models</h3>
<p>Once a model has been defined, you can retrieve records from your database:</p>
<pre><code>use App\Models\Flight;

$flights = Flight::all();

foreach ($flights as $flight) {
    echo $flight->name;
}</code></pre>

<h3>Adding Additional Constraints</h3>
<p>The Eloquent query builder provides a variety of methods you may use to constrain queries:</p>
<pre><code>$flights = Flight::where('active', 1)
    ->orderBy('name')
    ->take(10)
    ->get();</code></pre>

<h3>Retrieving Single Models</h3>
<p>In addition to retrieving all records for a given table, you may also retrieve single records using find or first:</p>
<pre><code>$flight = Flight::find(1);

$flight = Flight::where('active', 1)->first();</code></pre>

<h3>Inserting Models</h3>
<p>To insert a new record, instantiate a model and set attributes on it:</p>
<pre><code>$flight = new Flight;
$flight->name = 'London to Paris';
$flight->save();</code></pre>

<h3>Updating Models</h3>
<p>To update a model, retrieve it, change an attribute, and call save:</p>
<pre><code>$flight = Flight::find(1);
$flight->name = 'Paris to London';
$flight->save();</code></pre>
HTML,
        ]);

        DocumentationTopic::create([
            'category_id' => $models->id,
            'title' => 'Migrations',
            'slug' => 'migrations',
            'description' => 'Learn how to use database migrations to manage your database schema',
            'order' => 2,
            'content' => <<<'HTML'
<h2>Database Migrations</h2>
<p>Migrations are like version control for your database, allowing your team to easily modify and share the application's database schema. Migrations are typically paired with Laravel's schema builder to easily build your application's database schema.</p>

<h3>Generating Migrations</h3>
<p>You may use the make:migration Artisan command to generate a database migration:</p>
<pre><code>php artisan make:migration create_flights_table</code></pre>

<h3>Migration Structure</h3>
<p>A migration file contains two methods: up and down. The up method is used to add new tables, columns, or indexes to your database, while the down method should reverse the operations performed by the up method:</p>
<pre><code><?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('airline');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};</code></pre>

<h3>Running Migrations</h3>
<p>To run all of your outstanding migrations, execute the migrate Artisan command:</p>
<pre><code>php artisan migrate</code></pre>

<h3>Rolling Back Migrations</h3>
<p>To roll back the latest migration operation, you may use the rollback command:</p>
<pre><code>php artisan migrate:rollback</code></pre>

<h3>Schema Builder</h3>
<p>Laravel's schema facade provides database agnostic support for creating and manipulating tables:</p>
<pre><code>Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->rememberToken();
    $table->timestamps();
});</code></pre>
HTML,
        ]);

        // Views & Blade
        $views = DocumentationCategory::create([
            'name' => 'Views & Blade',
            'slug' => 'views-blade',
            'description' => 'Learn about Blade templates and building dynamic views',
            'order' => 5,
            'icon' => '👁️',
        ]);

        DocumentationTopic::create([
            'category_id' => $views->id,
            'title' => 'Blade Templates',
            'slug' => 'blade-templates',
            'description' => 'Learn the basics of Laravel\'s Blade templating engine',
            'order' => 1,
            'content' => <<<'HTML'
<h2>Blade Templates</h2>
<p>Blade is the simple, yet powerful templating engine that is included with Laravel. Unlike other PHP templating engines, Blade does not restrict you from using plain PHP code in your views.</p>

<h3>Layouts Using Template Inheritance</h3>
<p>The primary benefit of Blade is its template inheritance and sections. Let's get started with a simple example.</p>

<h3>Master Layout File</h3>
<p>Create a master layout file in resources/views/layouts/app.blade.php:</p>
<pre><code><html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html></code></pre>

<h3>Child Layout</h3>
<p>When defining a child page, use the @extends directive to specify which layout the page should inherit:</p>
<pre><code>@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection</code></pre>

<h3>Displaying Data</h3>
<p>You may display data passed to your Blade views by wrapping the variable in curly braces:</p>
<pre><code>Hello, {{ $name }};</code></pre>

<h3>Blade Directives</h3>
<p>Blade provides many directives for common operations:</p>
<pre><code>@if (count($records) === 1)
    I have one record!
@elseif (count($records) > 1)
    I have multiple records!
@else
    I have no records!
@endif

@forelse ($users as $user)
    <li>{{ $user->name }}</li>
@empty
    <p>No users</p>
@endforelse

@foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
@endforeach</code></pre>
HTML,
        ]);

        DocumentationTopic::create([
            'category_id' => $views->id,
            'title' => 'Blade Components',
            'slug' => 'blade-components',
            'description' => 'Learn how to create reusable Blade components',
            'order' => 2,
            'content' => <<<'HTML'
<h2>Blade Components</h2>
<p>Components and slots provide similar benefits to sections, layouts, and includes; however, some may find the mental model of components and slots easier to understand. There are two approaches to writing components: class-based components and anonymous components.</p>

<h3>Creating Components</h3>
<p>To create a class-based component, you may use the make:component Artisan command:</p>
<pre><code>php artisan make:component Alert</code></pre>

<h3>Defining the Component Class</h3>
<p>The component class will be placed in the app/View/Components directory:</p>
<pre><code><?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;

class Alert extends Component
{
    public function __construct(string $type = 'info', string $message = '')
    {
        $this->type = $type;
        $this->message = $message;
    }

    public function render(): Closure
    {
        return function (array $data) {
            return '<div class="alert alert-'.$this->type.'">'.$this->message.'</div>';
        };
    }
}</code></pre>

<h3>Using Components</h3>
<p>To display a component, you may use the component tag in one of your Blade templates:</p>
<pre><code><x-alert type="error" message="Something went wrong!" /></code></pre>

<h3>Anonymous Components</h3>
<p>If a component only needs a Blade template and has no associated class, you may create an anonymous component:</p>
<pre><code><!-- resources/views/components/alert.blade.php -->
<div {{ $attributes->class(['alert', 'alert-'.$type]) }}>
    {{ $slot }}
</div></code></pre>

<h3>Passing Data to Components</h3>
<p>You can pass data to components as HTML attributes:</p>
<pre><code><x-alert type="warning">
    <strong>Warning!</strong> Something bad happened.
</x-alert></code></pre>
HTML,
        ]);

        // Middleware
        $middleware = DocumentationCategory::create([
            'name' => 'Middleware',
            'slug' => 'middleware',
            'description' => 'Learn about HTTP middleware for filtering requests',
            'order' => 6,
            'icon' => '🛡️',
        ]);

        DocumentationTopic::create([
            'category_id' => $middleware->id,
            'title' => 'Middleware Basics',
            'slug' => 'middleware-basics',
            'description' => 'Learn the basics of middleware in Laravel',
            'order' => 1,
            'content' => <<<'HTML'
<h2>Middleware Basics</h2>
<p>Middleware provides a convenient mechanism for filtering HTTP requests entering your application. For example, Laravel includes a middleware that verifies the user of your application is authenticated.</p>

<h3>Creating Middleware</h3>
<p>You may create a new middleware using the make:middleware Artisan command:</p>
<pre><code>php artisan make:middleware CheckAge</code></pre>

<h3>Defining Middleware</h3>
<p>Let's create a middleware that only allows access to a route if the supplied age is greater than 200:</p>
<pre><code><?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->age <= 200) {
            return redirect('/home');
        }

        return $next($request);
    }
}</code></pre>

<h3>Registering Middleware</h3>
<p>All middleware are registered in the app/Http/Kernel.php file. Laravel includes several built-in middleware. You may register web and api middleware groups:</p>
<pre><code>protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
    'can' => \Illuminate\Auth\Middleware\Authorize::class,
];</code></pre>

<h3>Applying Middleware to Routes</h3>
<p>You may assign middleware to routes using the middleware method:</p>
<pre><code>Route::get('/profile', function () {
    //
})->middleware('auth');</code></pre>

<h3>Middleware Groups</h3>
<p>You may group several middleware under a single key to make them easier to assign to routes:</p>
<pre><code>protected $middlewareGroups = [
    'web' => [
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
    ],

    'api' => [
        \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    ],
];</code></pre>
HTML,
        ]);

        // Forms & Validation
        $forms = DocumentationCategory::create([
            'name' => 'Forms & Validation',
            'slug' => 'forms-validation',
            'description' => 'Learn about form handling and data validation',
            'order' => 7,
            'icon' => '📝',
        ]);

        DocumentationTopic::create([
            'category_id' => $forms->id,
            'title' => 'Form Handling',
            'slug' => 'form-handling',
            'description' => 'Learn how to handle form submissions in Laravel',
            'order' => 1,
            'content' => <<<'HTML'
<h2>Form Handling</h2>
<p>Laravel provides several approaches for validating your application's incoming data. The most common approach is using the validate method available on incoming HTTP requests.</p>

<h3>Basic Validation</h3>
<pre><code>use Illuminate\Http\Request;

Route::post('/user', function (Request $request) {
    $validated = $request->validate([
        'title' => 'required|unique:posts|max:255',
        'body' => 'required',
    ]);

    // The request is valid...
    return redirect('/posts');
});</code></pre>

<h3>Displaying Validation Errors</h3>
<p>If validation fails, a redirect response will be generated to send the user back to their previous location. The errors will also be flashed to the session so they are available for display.</p>
<pre><code><!-- resources/views/create.blade.php -->
<label for="title">Post Title</label>
<input id="title" type="text" name="title" class="@error('title') is-invalid @enderror">

@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror</code></pre>

<h3>Form Requests</h3>
<p>For more complex validation scenarios, you may create a "form request". Form requests are custom request classes that encapsulate their own validation and authorization logic:</p>
<pre><code>php artisan make:request StorePostRequest</code></pre>

<h3>Defining Form Request Logic</h3>
<pre><code><?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ];
    }
}</code></pre>

<h3>Using Form Requests</h3>
<pre><code>use App\Http\Requests\StorePostRequest;

Route::post('/posts', function (StorePostRequest $request) {
    // The incoming request is valid...

    // Retrieve the validated input data...
    $validated = $request->validated();
});</code></pre>
HTML,
        ]);

        // Authentication
        $auth = DocumentationCategory::create([
            'name' => 'Authentication',
            'slug' => 'authentication',
            'description' => 'Learn about Laravel\'s built-in authentication system',
            'order' => 8,
            'icon' => '🔐',
        ]);

        DocumentationTopic::create([
            'category_id' => $auth->id,
            'title' => 'Authentication Basics',
            'slug' => 'authentication-basics',
            'description' => 'Learn the basics of Laravel authentication',
            'order' => 1,
            'content' => <<<'HTML'
<h2>Authentication Basics</h2>
<p>Laravel makes implementing authentication very simple. In fact, almost everything is configured out of the box. The authentication configuration file is located at config/auth.php.</p>

<h3>Starter Kits</h3>
<p>The fastest way to get started with Laravel's authentication is to use our starter kits. These packages automatically scaffold the entire backend and frontend authentication flow:</p>
<pre><code>composer require laravel/breeze --dev
php artisan breeze:install</code></pre>

<h3>Manually Implementing Authentication</h3>
<p>If you prefer to implement authentication manually, you'll need to define the following:</p>

<h3>The User Model</h3>
<p>Laravel includes an App\Models\User Eloquent model by default. This model may be used with the default Eloquent authentication driver:</p>
<pre><code><?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}</code></pre>

<h3>Authenticating Users</h3>
<p>You may use the Auth facade to authenticate users:</p>
<pre><code>use Illuminate\Support\Facades\Auth;

if (Auth::attempt(['email' => $email, 'password' => $password])) {
    $request->session()->regenerate();

    return redirect()->intended('/dashboard');
}</code></pre>

<h3>Checking if a User is Authenticated</h3>
<pre><code>use Illuminate\Support\Facades\Auth;

if (Auth::check()) {
    // The user is logged in...
}</code></pre>

<h3>Logging Out</h3>
<pre><code>use Illuminate\Support\Facades\Auth;

Auth::logout();

return redirect('/');</code></pre>
HTML,
        ]);

        // API
        $api = DocumentationCategory::create([
            'name' => 'API Development',
            'slug' => 'api-development',
            'description' => 'Learn about building RESTful APIs with Laravel',
            'order' => 9,
            'icon' => '🌐',
        ]);

        DocumentationTopic::create([
            'category_id' => $api->id,
            'title' => 'API Routes & Controllers',
            'slug' => 'api-routes-controllers',
            'description' => 'Learn how to build RESTful APIs in Laravel',
            'order' => 1,
            'content' => <<<'HTML'
<h2>API Routes & Controllers</h2>
<p>Laravel provides two main HTTP entry points for your application: routes/web.php for requests that return HTML views, and routes/api.php for stateless requests to your API.</p>

<h3>API Routes File</h3>
<p>Routes defined in the routes/api.php file are stateless and do not receive session state:</p>
<pre><code>use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});</code></pre>

<h3>Resource Controllers for API</h3>
<p>When generating a resource controller for an API, you may exclude the create and edit methods since they are HTML-oriented:</p>
<pre><code>php artisan make:controller PhotoController --api</code></pre>

<h3>API Resource Routes</h3>
<pre><code>Route::apiResource('photos', PhotoController::class);</code></pre>

<h3>API Versioning</h3>
<p>Laravel supports API versioning through route groups:</p>
<pre><code>Route::prefix('v1')->group(function () {
    Route::apiResource('users', UserController::class);
});</code></pre>

<h3>Returning JSON Responses</h3>
<pre><code>use App\Models\User;
use Illuminate\Http\JsonResponse;

Route::get('/users', function (): JsonResponse {
    return response()->json([
        'data' => User::all(),
        'message' => 'Users retrieved successfully',
    ]);
});</code></pre>

<h3>API Resources</h3>
<p>Laravel's resource classes allow you to transform your models and relationships into JSON:</p>
<pre><code>php artisan make:resource UserResource</code></pre>

<pre><code>use App\Http\Resources\UserResource;
use App\Models\User;

Route::get('/user/{id}', function (int $id): UserResource {
    return new UserResource(User::findOrFail($id));
});</code></pre>
HTML,
        ]);
    }
}
