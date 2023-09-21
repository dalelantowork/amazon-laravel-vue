<?php

namespace App\Http\Middleware;

use App\Models\Address;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => auth()->check() ? auth()->user() : null,
                'address' => auth()->check() && !is_null(Address::where('user_id', auth()->user()->id)->first()) 
                    ? Address::where('user_id', auth()->user()->id)->first() 
                    : null,
            ],
            'categories' => Category::all(),
            'random_products' => Product::inRandomOrder()->limit(8)->get(),
            'ziggy' => fn () => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],
        ];
    }
}
