<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Models;
use App\RelatedImage;
use App\Supplier;
use App\Manufacture;
use App\Address;
use Yajra\Datatables\Datatables;
use DB;
use Carbon\Carbon;
use Storage;
use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::with('models','supplier')->where('pro_status', '<>', 0);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn =    '<a href="javascript:void(0)" data-id="'.$row->pro_id.'" class="btn btn-info btn-sm editProduct"><i class="fas fa-pencil-alt"></i> Edit</a>                                    
                                    <a href="javascript:void(0)" data-id="'.$row->pro_id.'" class="btn btn-danger btn-sm deleteProduct"><i class="fas fa-trash"></i> Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('image', function($row){
                    $url_image = asset('storage/images/products/imgs/' .$row->pro_image);
                    $image =    '<img src="'.$url_image.'" class="table-avatar" alt="Avatar"></img>';
                    return $image;
                })
                ->rawColumns(['action','image'])
                ->make(true);
        }
        return view('backend.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'pro_sku' => 'required|min:14|max:14|unique:product',
            'pro_name' => 'required|min:3|max:50',
            'pro_image' => 'required',
            'pro_detail' => 'required',
            'pro_descriptS' => 'required',
            'pro_descriptF' => 'required',
            'mod_id' => 'required',
            'sup_id' => 'required'
        );  
        $messages = array(
            'pro_sku.required' => 'Enter the SKU.',
            'pro_sku.min' => 'SKU must have at least 14 characters.',
            'pro_sku.max' => 'SKU contains up to 14 characters.',
            'pro_sku.unique' => 'SKU already exists.',
            'pro_name.unique' => 'Enter the product name.',
            'pro_name.min' => 'SKU must have at least 3 characters.',
            'pro_name.max' => 'SKU contains up to 50 characters.',
            'pro_image.required' => 'Enter the image.',
            'pro_detail.required' => 'Enter the detail.',
            'pro_descriptS.required' => 'Enter the description sort.',
            'pro_descriptF.required' => 'Enter the description full.',
            'mod_id.required' => 'Choose the model.',
            'sup_id.required' => 'Choose the supplier.'
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        $product = new Product();
        $product->pro_sku = $request->pro_sku;
        $product->pro_name = $request->pro_name;
        $product->pro_detail = $request->pro_detail;
        $product->pro_descriptS = $request->pro_descriptS;
        $product->pro_descriptF = $request->pro_descriptF;
        $product->pro_created = Carbon::now();
        $product->pro_updated = Carbon::now();
        $product->mod_id = $request->mod_id;
        $product->sup_id = $request->sup_id;
        if ($files = $request->pro_image) {
            $product->pro_image = $files->getClientOriginalName();
            $fileSaved = $files->storeAs('public/images/products/imgs/', $product->pro_image);
        }
        if ($files = $request->pro_reimg) {

            foreach ($files as $index => $file) { 
                $file->storeAs('public/images/products/imgs/', $file->getClientOriginalName());
                $image = new RelatedImage();
                $image->pro_id = $product->pro_id;
                $image->reimg_stt = ($index + 1);
                $image->reimg_name = $file->getClientOriginalName();
                $image->save();
            }

        }
        $product->save();
        return response()->json(['success'=>'Added new records.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $model = $product->models->mod_name; 
        $supplier = $product->supplier->sup_name;
        return response()->json([$product, $model, $supplier]);
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
        $rules = array(
            'pro_sku' => 'required|min:14|max:14|unique:product,pro_sku,'.$id.',pro_id',
            'pro_name' => 'required|min:3|max:50',
            'pro_detail' => 'required',
            'pro_descriptS' => 'required',
            'pro_descriptF' => 'required',
            'mod_id' => 'required',
            'sup_id' => 'required'
        );  
        $messages = array(   
            'pro_sku.required' => 'Enter the SKU.',
            'pro_sku.min' => 'SKU must have at least 14 characters.',
            'pro_sku.max' => 'SKU contains up to 14 characters.',
            'pro_sku.unique' => 'SKU already exists.',
            'pro_name.unique' => 'Enter the product name.',
            'pro_name.min' => 'SKU must have at least 3 characters.',
            'pro_name.max' => 'SKU contains up to 50 characters.',
            'pro_detail.required' => 'Enter the detail.',
            'pro_descriptS.required' => 'Enter the description sort.',
            'pro_descriptF.required' => 'Enter the description full.',
            'mod_id.required' => 'Enter the model.',
            'sup_id.required' => 'Enter the supplier.'
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        $product = Product::find($id);
        $product->pro_sku = $request->pro_sku;
        $product->pro_name = $request->pro_name;
        $product->pro_detail = $request->pro_detail;
        $product->pro_descriptS = $request->pro_descriptS;
        $product->pro_descriptF = $request->pro_descriptF;
        $product->pro_updated = Carbon::now();
        $product->mod_id = $request->mod_id;
        $product->sup_id = $request->sup_id;
        if ($files = $request->pro_image) {
            Storage::delete('public/images/products/imgs/'.$product->pro_image);
            $product->pro_image = $files->getClientOriginalName();
            $fileSaved = $files->storeAs('public/images/products/imgs/', $product->pro_image);
        }
        $product->save();
        return response()->json(['success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $product = Product::find($id);
        $product->pro_status = 0;
        $product->save();
        return response()->json(['success']);
    }

    public function print()
    {
        $products = Product::all();
        $models    = Models::all();
        $supliers = Supplier::all();
 
        return view('backend.products.print')
            ->with('products', $products)
            ->with('models', $models)
            ->with('suppliers', $supliers);
    }

    public function excel() 
    {
        /* Code dành cho việc debug
        - Khi debug cần hiển thị view để xem trước khi Export Excel
        */
        // $ds_sanpham = Sanpham::all();
        // $ds_loai    = Loai::all();
        // return view('backend.sanpham.excel')
        //     ->with('danhsachsanpham', $ds_sanpham)
        //     ->with('danhsachloai', $ds_loai);

        return Excel::download(new ProductExport, 'product.xlsx');
    }

    public function pdf() 
    {
        $products = Product::all();
        $models    = Models::all();
        $supliers = Supplier::all();
        $data = [
            'products' => $products,
            'models'    => $models,
            'suppliers' => $supliers
        ];

        /* Code dành cho việc debug
        - Khi debug cần hiển thị view để xem trước khi Export PDF
        */
        // return view('backend.products.pdf')
        // ->with('products', $products)
        // ->with('suppliers', $supliers)
        // ->with('models', $models);

        $pdf = PDF::loadView('backend.products.pdf', $data);
        return $pdf->download('products.pdf');
    }
    
}
