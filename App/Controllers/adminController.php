<?php  
namespace App\Controllers;

use App\core\Request;
use App\Models\admin;
use App\Models\customer;
use App\Models\category;
use App\Models\product;
use App\Models\report;
use App\Models\factor;


session_start();
class adminController{
    private $adminModel;
    private $customerModel;
    private $categoryModel;
    private $productModel;
    private $reportModel;
    private $factorModel;
    public function __construct(){
        $this->adminModel = new admin();
        $this->customerModel = new customer();
        $this->categoryModel = new category();
        $this->productModel = new product();
        $this->reportModel = new report();
    }

    public function session(){
        if (isset($_SESSION['admin']) || isset($_SESSION['admin_id'])) 
        {
            $data = $this->adminModel->get(["id", "admin-name", "admin-username"], ["id" => $_SESSION['admin_id']])[0];

            if ($data['admin-username'] != $_SESSION['admin']) {
                session_unset();
                Redirect(site_url(''), false);
            }
        }
    }

    public function dashboard()
    {
        $this->session();
        if (!empty($_SESSION['admin'])) 
        {
            $data = $this->adminModel->get(["id", "admin-name", "admin-password", "admin-username"], ["admin-username" => $_SESSION['admin']]);
            $customer_count = $this->customerModel->count([]);
            $sum_price = 100;

            $out['admin'] = $data[0];
            $out['customer'] = $customer_count;
            $out['sum_price'] = $sum_price;


            view('admin.adminDashboard', $out);
        }
        else
        {
            view('login.AdminLogin');
        }
    }

    public function login(){
        global $request;
        $data = $this->adminModel->get(["id", "admin-name", "admin-password", "admin-username"], ["admin-username" => $request->input('username')]);
        if (empty($data)) {
            $data['status'] = false;
            $data['Data'] = 'Wrong Username...';
            $data['url'] = '';
            view('errors.erorr-success', $data);
        }
        else
        {
            $adminRow = $data[0];

            if (password_verify($request->input('password'), $adminRow['admin-password'])) {
                $_SESSION['admin'] = $request->input('username');
                $_SESSION['admin_id'] = $adminRow['id'];
                Redirect(site_url(''), false);
            }
            else 
            {
                $data['status'] = false;
                $data['Data'] = 'Wrong Password...';
                $data['url'] = '';
                view('errors.erorr-success', $data);
            }
        }
    }

    public function logout(){
        if (isset($_SESSION['admin'])) {
            session_unset();
            Redirect(site_url(''), false);
        }
    }
    public function AdminDetails(){
        return $data = $this->adminModel->get(["id", "admin-name", "admin-password", "admin-username"], ["admin-username" => $_SESSION['admin']]);
    }
    public function customerForm(){
        $this->session();
        $data = $this->AdminDetails();
        $out['admin'] = $data[0];
        view('admin.customerForm', $out);
    }

    public function categoryForm(){
        $this->session();

        $data = $this->AdminDetails();
        $out['admin'] = $data[0];
        view('admin.categoryForm', $out);
    }

    public function productForm(){
        $this->session();

        $data = $this->AdminDetails();
        $x = $this->categoryModel->getAll();
        $out['admin'] = $data[0];
        $out['category'] = $x;

        view('admin.productForm', $out);
    }

    public function addCustomer(){
        $this->session();

        global $request;

        $Count = $this->customerModel->count(["customer_username"=>$request->input('cusername')]);

        if ($Count == 1) {

            $data['status'] = false;
            $data['Data'] = 'Customer With This Username Already Exist...';
            $data['url'] = 'admin/customerForm';
            view('errors.erorr-success', $data);
        }
        else 
        {
            $password = password_hash($request->input('cpassword'), PASSWORD_DEFAULT);
            $userInfo = 
            [
                "customer_name"=>$request->input('cname'),
                "customer_username"=>$request->input('cusername'),
                "customer_password"=>$password,
                "access_login"=>$request->input('login'),
            ];

            $data['status']= true;
            $data['Data'] = 'Customer Added successfully...';
            $data['url'] = 'admin/customersTable';
            $count = $this->customerModel->create($userInfo);
            view('errors.erorr-success', $data);
        }
    }

    public function addcategory(){
        $this->session();

        global $request;

        $Count = $this->categoryModel->count(["category_name" => $request->input('cname')]);

        if ($Count == 1) 
        {
            $data['status'] = false;
            $data['Data'] = 'Category With This name Already Exist...';
            $data['url'] = 'admin/categoryForm';
            view('errors.erorr-success', $data);
        } 
        else 
        {
            $userInfo =
                [
                "category_name" => $request->input('cname'),
            ];

            $data['status'] = true;
            $data['Data'] = 'Category Added successfully...';
            $data['url'] = 'admin/categoriesTable';
            $count = $this->categoryModel->create($userInfo);
            view('errors.erorr-success', $data);
        }
    }

    public function addproduct(){
        $this->session();

        global $request;
        $Count = $this->productModel->count(["product_name" => $request->input('pname')]);
        if ($Count == 1) {
            $data['status'] = false;
            $data['Data'] = 'Product With This name Already Exist...';
            $data['url'] = 'admin/productForm';
            view('errors.erorr-success', $data);
        } else {
            $userInfo =
                [
                "product_name" => $request->input('pname'),
                "product_inventory" => $request->input('pinventory'),
                "product_price" => $request->input('pprice'),
                "product_category" => $request->input('pcategory'),
                "remaining" => $request->input('pinventory'),
            ];

            $data['status'] = true;
            $data['Data'] = 'Product Added successfully...';
            $data['url'] = 'admin/productsTable';
            $count = $this->productModel->create($userInfo);
            view('errors.erorr-success', $data);
        }
    }

    public function productsTable(){
        $this->session();

        if (isset($_SESSION['admin'])) {
            $data = $this->AdminDetails();
            $products = $this->productModel->getAll();
            $out['admin'] = $data[0];
            $out['products'] = $products;
            view('admin.productTable', $out);
        }
        else{
            Redirect(site_url(''), false);
        }
    }

    public function customersTable(){
        $this->session();

        $data = $this->AdminDetails();
        $customer = $this->customerModel->getAll();
        $out['admin'] = $data[0];
        $out['customer'] = $customer;
        view('admin.customersTable', $out);
    }

    public function reportsTable(){
        $this->session();

        $data = $this->AdminDetails();
        $report = $this->reportModel->getAll();
        $out['admin'] = $data[0];
        $out['report'] = $report;
        view('admin.reportsTable', $out);
    }

    public function categoriesTable(){
        $this->session();

        $data = $this->AdminDetails();
        $category = $this->categoryModel->getAll();
        $out['admin'] = $data[0];
        $out['category'] = $category;
        view('admin.categoriesTable', $out);
    }

    public function ProductDelete(){
        $this->session();

        global $request;
        $id = $request->get_route_param('id');
        $count = $this->productModel->get('*',["id"=>$id]);

        if (count($count) == 1) {
            $Rowcount = $this->reportModel->get('*',["product_id"=>$id, "status"=>"pending"]);
            if (count($Rowcount) == 0) {
                $this->productModel->delete(["id"=>$id]);
                $data['status'] = true;
                $data['Data'] = "Product Deleted Successfully";
                $data['url'] = "admin/productsTable";
            }else {
                $data['status'] = false;
                $data['Data'] = "Pending Report with This Product Already Exist...";
                $data['url'] = "admin/reportsTable";
            }
        }
        elseif(count($count) != 1) {
            $data['status'] = false;
            $data['Data'] = "Product Dont Deleted Successfully";
            $data['url'] = "admin/productsTable";
        }
        view('errors.erorr-success', $data);
    }

    public function ProductEditform(){
        $this->session();

        global $request;
        $id = $request->get_route_param('id');
        $product = $this->productModel->get('*',["id"=>$id])[0];

        if (!empty($product)) {
            $category = $this->categoryModel->getAll();

            $out['product'] = $product;
            $out['category'] = $category;
            return view('admin.productEditform', $out);
        }else {

            $data['status'] = false;
            $data['Data'] = "Problem ...";
            $data['url'] = "admin/productsTable";        
            view('errors.erorr-success', $data);
        }
    }

    public function ProductEdit(){
        $this->session();

        global $request;
        $Count = $this->productModel->count(["id" => $request->input('id')]);

        if ($Count == 1) {
            $product = $this->productModel->get('*',["id"=>$request->input('id')])[0];
            $new_inventory = $product['product_inventory'] + $request->input('inventory');
            $new_remaining = $product['remaining'] + $request->input('inventory');

            if ($new_remaining < 0) {
        
                $data['status'] = false;
                $data['Data'] = "Product inventory cannot be negative ...";
                $data['url'] = "admin/productsTable";
            }
            else 
            {
                $check_duplicate_name = $this->productModel->get('*',["product_name"=>$request->input('name')])[0];
                if ($product['product_name'] == $check_duplicate_name['product_name']) 
                {
                    $userInfo = [
                        "product_name"=>$request->input('name'),
                        "product_inventory"=>$new_inventory,
                        "product_price"=>$request->input('price'),
                        "product_category"=>$request->input('category'),
                        "remaining"=>$new_remaining,
                    ]; 
    
                    $count = $this->productModel->update($userInfo, ["id"=>$request->input('id')]);
    
                    if ($count == 1) {         
                        $data['status'] = true;
                        $data['Data'] = "Product Updated Successfully ...";
                        $data['url'] = "admin/productsTable";
                    }
                }
                else 
                {
                    $data['status'] = false;
                    $data['Data'] = "Product With This Name Already Exist...";
                    $data['url'] = "admin/productsTable";
                }
            }
        }
        else 
        {
            $data['status'] = false;
            $data['Data'] = "Problem ...";
            $data['url'] = "admin/productsTable";
        }
        view('errors.erorr-success', $data);
    }

    public function CategoryDelete(){
        $this->session();

        global $request;
        $id = $request->get_route_param('id');
        $category = $this->categoryModel->get('*',["id"=>$id])[0];
        if (!empty($category)) {
            $category_name = $category['category_name'];
            $Count = $this->productModel->count(["product_category" => $category_name]);

            if ($Count == 1) {
                $data['status'] = false;
                $data['Data'] = "Product With This Category Already Exist, First Change Product Category To Delete This Category ...";
                $data['url'] = "admin/productsTable";   
            }
            else
            {
                $this->categoryModel->delete(["id"=>$id]);
                $data['status'] = true;
                $data['Data'] = "Category Deleted Successfully";
                $data['url'] = "admin/categoriesTable";
            }

        }
        else {
            $data['status'] = false;
            $data['Data'] = "Problem ...";
            $data['url'] = "admin/categoriesTable";        
        }
        view('errors.erorr-success', $data);
    }

    public function CategoryEditform(){
        $this->session();

        global $request;
        $id = $request->get_route_param('id');
        $category = $this->categoryModel->get('*',["id"=>$id])[0];

        if (!empty($category)) {

            $out['category'] = $category;
            return view('admin.categoryEditform', $out);
        }else {

            $data['status'] = false;
            $data['Data'] = "Problem ...";
            $data['url'] = "admin/categoriesTable";        
            view('errors.erorr-success', $data);
        }
    }

    public function CategoryEdit(){
        $this->session();

        global $request;
        $Count = $this->categoryModel->count(["id" => $request->input('id')]);

        if ($Count == 1) {

            $input_category_name = $request->input('name');
            $input_category_id = $request->input('id');

            $category = $this->categoryModel->get('*',["id"=>$input_category_id])[0];

            if ($input_category_name == $category['category_name']) {
                $data['status'] = true;
                $data['Data'] = "Category Updated Successfully ...";
                $data['url'] = "admin/categoriesTable";
            }
            else 
            {
                $category_check = $this->categoryModel->get('*',["category_name"=>$input_category_name]);
                if (empty($category_check)) 
                {
                    $userInfo = 
                    [
                        "category_name"=>$request->input('name'),
                    ]; 

                    $RowCount = $this->categoryModel->update($userInfo, ["id"=>$input_category_id]);

                    if ($RowCount == 1) {         
                        $data['status'] = true;
                        $data['Data'] = "Category Updated Successfully ...";
                        $data['url'] = "admin/categoriesTable";
                    }
                    else 
                    {
                        $data['status'] = true;
                        $data['Data'] = "Problem ...";
                        $data['url'] = "admin/categoriesTable";
                    }
                }
                else 
                {
                    $data['status'] = false;
                    $data['Data'] = "Category With This Name Already Exist...";
                    $data['url'] = "admin/categoriesTable";        
                }
            }
        }
        else 
        {
            $data['status'] = false;
            $data['Data'] = "Problem ...";
            $data['url'] = "admin/categoriesTable";
        }
        view('errors.erorr-success', $data);
    }

    public function acceptOrder(){
        $this->session();

        global $request;
        $report_id = $request->get_route_param('id');
        $report = $this->reportModel->get('*',["id"=>$report_id])[0];

        if (!empty($report)) {
            $product = $this->productModel->get('*',["id"=>$report['product_id']])[0];
            if ($report['num_product'] > $product['remaining']) {
                $data['url'] = "admin/reportsTable";
                $data['status'] = false;
                $data['Data'] = "The balance of the amount ordered by the customer is less than the amount ..";            
            }
            else
            {
                $updateReport = [
                    "status"=>'accept',
                ]; 
                $count = $this->reportModel->update($updateReport, ["id"=>$report_id]);
                if ($count == 1) {
                    $new_sale = $product['sales'] + $report['num_product'];
                    $new_remaining = $product['remaining'] - $report['num_product'];
                    $productUpdate = [
                        "sales"=>$new_sale,
                        "remaining"=>$new_remaining,
                    ]; 
                    $count = $this->productModel->update($productUpdate, ["id"=>$product['id']]);

                    if ($count == 1) {
                        $data['url'] = "admin/reportsTable";
                        $data['status'] = true;
                        $data['Data'] = "Report Accepted Successfully";
                    }
                    else
                    {
                        $data['url'] = "admin/reportsTable";
                        $data['status'] = false;
                        $data['Data'] = "Problem ...";
                    }
                }
                else 
                {
                    $data['url'] = "admin/reportsTable";
                    $data['status'] = false;
                    $data['Data'] = "Problem ...";
                }
            }
        }
        else{
            $data['url'] = "admin/reportsTable";
            $data['status'] = false;
            $data['Data'] = "Problem ...";
        }
        view('errors.erorr-success', $data);
    }

    public function cancelOrder(){
        $this->session();

        global $request;
        $report_id = $request->get_route_param('id');
        $report = $this->reportModel->get('*',["id"=>$report_id])[0];

        if (!empty($report)) 
        {
            $updateReport = [
                "status"=>'failed',
            ]; 
            $count = $this->reportModel->update($updateReport, ["id"=>$report_id]);

            if ($count == 1) {
                $data['url'] = "admin/reportsTable";
                $data['status'] = true;
                $data['Data'] = "Report Rejected Successfully";
            }
            else 
            {
                $data['url'] = "admin/reportsTable";
                $data['status'] = false;
                $data['Data'] = "Problem ...";
            }
        }
        else
        {
            $data['url'] = "admin/reportsTable";
            $data['status'] = false;
            $data['Data'] = "Problem ...";
        }
        view('errors.erorr-success', $data);
    }

    public function customerDelete(){
        global $request;
        $this->session();

        $id = $request->get_route_param('id');

        $count = $this->customerModel->get('*',["id"=>$id]);

        if (count($count) == 1) 
        {
            $check_report = $this->reportModel->count(["status" => "pending", "customer_id" => $id]);
            if ($check_report > 0) {
                $data['status'] = false;
                $data['Data'] = "There is Pending Report For This Customer, First Accept or Reject Her/Him Report ...";
                $data['url'] = "admin/reportsTable";
            }
            elseif($check_report == 0) 
            {
                $RowCount =  $this->customerModel->delete(["id"=>$id]);

                if ($RowCount == 1) {
                    $data['status'] = true;
                    $data['Data'] = "Customer Deleted Successfully";
                    $data['url'] = "admin/customersTable";
                } 
                else 
                {
                    $data['status'] = false;
                    $data['Data'] = "Problem ...";
                    $data['url'] = "admin/customersTable";
                }
            }
        }
        else 
        {
            $data['status'] = false;
            $data['Data'] = "Problem ...";
            $data['url'] = "admin/customersTable";
        }
        view('errors.erorr-success', $data);
    }

    public function customerEditform(){
        global $request;

        $this->session();

        $id = $request->get_route_param('id');
        $customer = $this->customerModel->get('*',["id"=>$id])[0];

        if (!empty($customer)) {

            $out['customer'] = $customer;
            return view('admin.CustomerEditform', $out);
        }else {

            $data['status'] = false;
            $data['Data'] = "Problem ...";
            $data['url'] = "admin/customersTable";        
            view('errors.erorr-success', $data);
        }
    }

    public function customerEdit(){

        $this->session();

        global $request;
        $Count = $this->customerModel->count(["id" => $request->input('id')]);

        if ($Count == 1) {

            $input_customer_username = $request->input('Username');
            $input_customer_id = $request->input('id');

            $customer = $this->customerModel->get('*',["id"=>$input_customer_id])[0];

            if ($input_customer_username == $customer['customer_username']) {

                $userInfo = 
                [
                    "access_login"=>$request->input('login'),
                ]; 

                $RowCount = $this->customerModel->update($userInfo, ["id"=>$input_customer_id]);

                $data['status'] = true;
                $data['Data'] = "Customer Updated Successfully ...";
                $data['url'] = "admin/customersTable";
            }
            else 
            {
                $customer_check = $this->customerModel->get('*',["customer_username"=>$input_customer_username]);
                if (empty($customer_check)) 
                {
                    $userInfo = 
                    [
                        "customer_username"=>$request->input('Username'),
                        "access_login"=>$request->input('login'),
                    ]; 

                    $RowCount = $this->customerModel->update($userInfo, ["id"=>$input_customer_id]);

                    if ($RowCount == 1) {         
                        $data['status'] = true;
                        $data['Data'] = "Customer Updated Successfully ...";
                        $data['url'] = "admin/customersTable";
                    }
                    else 
                    {
                        $data['status'] = true;
                        $data['Data'] = "Problem ...";
                        $data['url'] = "admin/customersTable";
                    }
                }
                else 
                {
                    $data['status'] = false;
                    $data['Data'] = "Customer With This Name Already Exist...";
                    $data['url'] = "admin/customersTable";        
                }
            }
        }
        else 
        {
            $data['status'] = false;
            $data['Data'] = "Problem ...";
            $data['url'] = "admin/customersTable";
        }
        view('errors.erorr-success', $data);
    }
}
?>