<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ImgProduct;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|lt:price',
            'photo' => 'required|image',
            'photos.*' => 'image',
        ], [
            'sale_price.lt' => 'Giá khuyến mãi phải bé hơn giá sản phẩm',
        ]);

        $fileName = $request->photo->getClientOriginalName();
        $request->photo->storeAs('public/images', $fileName);
        $request->merge(['image' => $fileName]);

        try {
            $product = Product::create($request->all());

            if ($product && $request->hasFile('photos')) {
                foreach ($request->photos as $key => $value) {
                    $fileNames = $value->getClientOriginalName();
                    $value->storeAs('public/images', $fileNames);
                    ImgProduct::create([
                        'product_id' => $product->id,
                        'image' => $fileNames
                    ]);
                }
            }

            return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            // Xóa tất cả các hình ảnh liên quan đến sản phẩm
            foreach ($product->images as $image) {
                // Xóa ảnh từ storage nếu cần
                Storage::delete('public/images/' . $image->image);
                // Xóa bản ghi trong cơ sở dữ liệu
                $image->delete();
            }

            // Sau khi xóa các bản ghi liên quan, xóa sản phẩm
            $product->delete();

            return redirect()->route('product.index')->with('success', 'Xóa thành công');
        } catch (\Throwable $th) {
            // Bắt và hiển thị lỗi
            return redirect()->back()->with('error', 'Xóa thất bại: ' . $th->getMessage());
        }
    }
}
