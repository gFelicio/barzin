<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(8);

        $data['products'] = $products;

        return view('pages.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $message = [
            'name.required' => "Campo Nome é obrigatório.",
            'description.required' => "Campo Descrição é obrigatório.",
            'price.required' => "Campo Preço é obrigatório."
        ];

        $this->validate($request, [
            'name' => "required|max:200",
            'description' => 'required|min:3',
            'price' => 'required'
        ], $message);

        $product = Product::create($data);

        if (!$product) {
            return redirect()
                ->route('products.creaate')
            ->with('message', 'Produto não pode ser criado. Tente novamente. Caso o erro persista, entre em contato com o suporte');
        }

        return redirect()
            ->route('dashboard')
        ->with('message', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if (!$product) {
           return redirect()
                ->route('products.index')
            ->with('message', 'Produto não encontrado!');
        }

        $data['product'] = $product;
        // dd($product, $product->id, $product->name, $product->description, $product->price);
        return view('pages.products.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();

        $message = [
            'name.required' => "Campo Nome é obrigatório.",
            'description.required' => "Campo Descrição é obrigatório.",
            'price.required' => "Campo Preço é obrigatório."
        ];

        $this->validate($request, [
            'name' => "required|max:200",
            'description' => 'required|min:3',
            'price' => 'required'
        ], $message);

        if (!empty($data['name']) && !empty($data['description']) && !empty($data['price'])) {
            $result = $product->fill($data)->save();

            if ($result) {
                return redirect()
                    ->route('products.index')
                ->with('message', 'Produto Atualizado com Sucesso!');
            }

            return redirect()
                ->route('products.edit', $product->id)
            ->with('message', 'Produto não pode ser atualziado. Por favor, tente novamente. Caso o erro persista, entre em contato com o suporte.');
        }

        return redirect()
            ->route('products.edit', $product->id)
        ->with('message', 'Ocorreu um erro ao recuperar o produto. Tente novamente. Caso o erro persista, entre em contato com o suporte.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
