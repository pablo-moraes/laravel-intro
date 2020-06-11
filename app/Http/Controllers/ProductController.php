<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUpdateProductRequest;

class ProductController extends Controller
{
    protected $products = ['PHP','Python','Ruby','Javascript','Go','C#','C++','Dart','Node','React','React Native','Laravel','Symfony','Ember','Angular','Knexjs','Expressjs'];
    protected $request;
    protected $repo;
    public function __construct(Request $request, Product $repo)
    {
        $this->request = $request;
        $this->repo = $repo;
        /*$this->middleware('auth');
        *///Pede autenticação em todos

        /*$this->middleware('auth')->only([
            'create', 'store'
            ]); 
        *///Para pedir autenticação apenas no método create ^^^
        // $this->middleware('auth')->except([
        //     'index', 'show'
        // ]);
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $products = $this->repo->latest()->paginate(5);
        // $products = Product::all();
        // return $this->products;
        // $teste = $this->products;
        return view('admin.pages.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $data =  $request->only(['name', 'description', 'price']);

        if ($request->hasFile('photo') && $request->photo->isValid()) {
            $imgPath = $request->photo->store('products');

            $data['photo'] = $imgPath;
        }

        $this->repo->create($data);
        return redirect()->route('products.index');
        // Forma não recomendado
        // $request->validate([
        //     'name' => 'required|min:3|max:255',
        //     'description' => 'nullable|min:3|max:10000',
        //     'photo' => 'required|image'
        // ]);

        // return $request->only(['name', 'description']);
        // return $request->all();
        // return $request->input('teste', 'default');
        // return $request->except(['name', 'description']);
        // if(!($request->file('photo')->isValid()));
            // dd($request->photo->extension());
            // dd($request->photo->getClientOriginalName());
        // return $request->file('photo')store('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $product = Product::where('id', $id)->get();
        // $product = Product::where('id', $id)->first();
        $product = $this->repo->find($id);
        if(!$product) {
            return redirect()->back();
        }
        return view('admin.pages.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repo->find($id);
        if(!$product)
            return redirect()->back();
        return view('admin.pages.products.edit', ['product' =>  $product]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = $this->repo->find($id);
        if(!$product)
            return redirect()->back();

        $data = $request->all();

        if ($request->hasFile('photo') && $request->photo->isValid()) {
            if ($product->photo && Storage::exists($product->photo)){
                Storage::delete($product->photo);
            }

            $imgPath = $request->photo->store('products');

            $data['photo'] = $imgPath;
        }   

        $product->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$product = $this->repo->find($id))
            return redirect()->back();
        if ($product->photo && Storage::exists($product->photo)){
            Storage::delete($product->photo);
        }            
        $product->delete();
        return redirect()->route('products.index');
    }

    /**
     * Search Products
     */

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        // dd($request->all());
        $products = $this->repo->search($request->filter);
        return view('admin.pages.products.index', ['products' => $products, 'filters' => $filters]);
    }
}
