<?php
namespace App\Http\Controllers;

use App\Models\Gallary;
use App\Models\Product;
use App\Models\Service;
use App\Models\Department;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $gallaries = Gallary::all();
        $sliders = Gallary::paginate(5);
        $departments = Department::with('translations')->get(); // Departments with translations
        $products = Product::with('translations')->paginate(3); // Paginate products

        $services = Service::with('translations')->paginate(3); // Paginate services

        return view('Front.home', [
            'services' => $services,
            'gallaries' => $gallaries,
            'sliders' => $sliders,
            'products' => $products,
            'departments' => $departments
        ]);
    }

    public function gallary()
    {
        $gallaries = Gallary::all();
        return view('Front.gallary', ['gallaries' => $gallaries]);
    }

    public function products()
    {
        $products = Product::with('translations')->paginate(9);
        $departments = Department::all();
        return view('Front.products', ['products' => $products, 'departments' => $departments]);
    }

    // Show products by department
    public function showProductsByDepartment($departmentId = null)
{
    // If a department is selected, fetch the products related to that department
    if ($departmentId) {
        // Fetch the department with its products and translations (eager loading)
        $department = Department::with('translations')->findOrFail($departmentId);
        $categories=$department->categories()->pluck('id')->toArray();        ;
        // dd($categories);
        $products = Product::whereRelation('category',fn($q) => $q->whereIn('id',$categories))->get();
        // dd($products); // Get products for this specific department
    } else {
        // If no department is selected, fetch all products
        $products = Product::with('translations')->get();
    }

    // Fetch all departments for the sidebar
    $departments = Department::all();

    // Return the view with products and departments
    return view('Front.products', compact('products', 'departments'));
}


public function product_details($id)
{
    // Fetch product with related photos
    $product = Product::with('photos')->find($id);

    if (!$product) {
        abort(404, 'Product not found');
    }

    // Debug photos data
    // dd($product->photos);

    return view('Front.product_details', [
        'product' => $product,
        'departments' => Department::all(),
    ]);
}


    public function services()
    {
        $services = Service::with('translations')->get();
        return view('Front.services', compact('services'));
    }
}
