<?php
    namespace App\Controllers\Admin;
    use App\Controllers\BaseController;
    use App\Models\ProductModel;
class SearchController extends BaseController{
        // public function index(){
        //     if(!$this === ''){
        //         // -nhap thong tin can tim vao form, nhan enter 
        //         // - hien thong tin can tim ra giao dien main 
        //         // - hien thi tu khoa lien quan

        //     }

        // }
    public function index()
    {
        return view('search_view');
    }

    public function results()
    {
        $keyword = $this->request->getPost('keyword');
        
        $productModel = new ProductModel;

        $results = $productModel->search($keyword);

        return view('search_results', ['results' => $results, 'keyword' => $keyword]);
    }
}
