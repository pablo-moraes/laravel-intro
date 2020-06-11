<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $products = ['PHP','Python','Ruby','Javascript','Go','C#','C++','Dart','Node','React','React Native','Laravel','Symfony','Ember','Angular','Knexjs','Expressjs'];
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
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
    {
        // return $this->products;
        $teste = $this->products;
        return view('admin.pages.products.index', compact('teste'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->only(['name', 'description']);
        // return $request->all();
        // return $request->input('teste', 'default');
        // return $request->except(['name', 'description']);
        // if(!($request->file('photo')->isValid()));
            // dd($request->photo->extension());
            // dd($request->photo->getClientOriginalName());
        return $request->file('photo')->store('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(array_key_exists($id, $this->products))
            return $this->products[$id];
        else
            return 'Product not found';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.products.edit', ['products' => $this->products, 'id' => $id]);
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
        return dd('Editando produto: ' . $this->products[$id] . ' ...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
