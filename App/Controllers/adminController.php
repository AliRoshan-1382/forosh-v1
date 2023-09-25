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
        $this->factorModel = new factor();
    }

    public function dashboard()
    {
        if (isset($_SESSION['admin'])) 
        {
            $data = $this->adminModel->get(["id", "admin-name", "admin-password", "admin-username"], ["admin-username" => $_SESSION['admin']]);
            $customer_count = $this->customerModel->count([]);
            // $sum_price = $this->factorModel->sum('Total_price', []);
            $sum_price = 100;
            // $data = $this->adminModel->get(["id", "admin-name", "admin-password", "admin-username"], ["admin-username" => $_SESSION['admin']]);

            $out['admin'] = $data[0];
            $out['customer'] = $customer_count;
            $out['sum_price'] = $sum_price;


            view('admin.adminDashboard', $out);
        }
        else
        {
            view('login.AdminLogin');
        }
        // $data['users'] = $this->UserModel->get('*' , ["ORDER"=>"Created_At"]);
        // $data['groups'] = $this->groupsModel->get('*',[]);
    }

    public function login(){
        global $request;
        $data = $this->adminModel->get(["id","admin-name","admin-password","admin-username"], ["admin-username"=>$request->input('username')]);
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

    public function customerForm(){
        $data = $this->adminModel->get(["id", "admin-name", "admin-password", "admin-username"], ["admin-username" => $_SESSION['admin']]);
        $out['admin'] = $data[0];
        view('admin.customerForm', $out);
    }

    public function categoryForm(){
        $data = $this->adminModel->get(["id", "admin-name", "admin-password", "admin-username"], ["admin-username" => $_SESSION['admin']]);
        $out['admin'] = $data[0];
        view('admin.categoryForm', $out);
    }

    public function productForm(){
        $data = $this->adminModel->get(["id", "admin-name", "admin-password", "admin-username"], ["admin-username" => $_SESSION['admin']]);
        $x = $this->categoryModel->getAll();
        $out['admin'] = $data[0];
        $out['category'] = $x;

        view('admin.productForm', $out);
    }

    public function addCustomer(){
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
            ];

            $data['status']= true;
            $data['Data'] = 'Customer Added successfully...';
            $data['url'] = '';
            $count = $this->customerModel->create($userInfo);
            view('errors.erorr-success', $data);
        }
    }

    public function addcategory(){
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
            $data['url'] = '';
            $count = $this->categoryModel->create($userInfo);
            view('errors.erorr-success', $data);
        }
    }

    public function addproduct(){
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
        $data = $this->adminModel->get(["id", "admin-name", "admin-password", "admin-username"], ["admin-username" => $_SESSION['admin']]);
        $products = $this->productModel->getAll();
        $out['admin'] = $data[0];
        $out['products'] = $products;
        view('admin.productTable', $out);
    }

    public function customersTable(){
        $data = $this->adminModel->get(["id", "admin-name", "admin-password", "admin-username"], ["admin-username" => $_SESSION['admin']]);
        $customer = $this->customerModel->getAll();
        $out['admin'] = $data[0];
        $out['customer'] = $customer;
        view('admin.customersTable', $out);
    }

    
    public function reportsTable(){
        $data = $this->adminModel->get(["id", "admin-name", "admin-password", "admin-username"], ["admin-username" => $_SESSION['admin']]);
        $report = $this->reportModel->getAll();
        $out['admin'] = $data[0];
        $out['report'] = $report;
        view('admin.reportsTable', $out);
    }

    
    public function categoriesTable(){
        $data = $this->adminModel->get(["id", "admin-name", "admin-password", "admin-username"], ["admin-username" => $_SESSION['admin']]);
        $category = $this->categoryModel->getAll();
        $out['admin'] = $data[0];
        $out['category'] = $category;
        view('admin.categoriesTable', $out);
    }

    public function ProductDelete(){
        global $request;
        $id = $request->get_route_param('id');
        $count = $this->productModel->get('*',["id"=>$id]);

        if (count($count) == 1) {
            $this->productModel->delete(["id"=>$id]);
            $data['status'] = true;
            $data['Data'] = "Product Deleted Successfully";
            $data['url'] = "admin/productsTable";
        }
        elseif(count($count) != 1) {
            $data['status'] = false;
            $data['Data'] = "Product Dont Deleted Successfully";
            $data['url'] = "admin/productsTable";
        }
        view('errors.erorr-success', $data);
    }


    // public function Userform()
    // {
    //     $data['users'] = $this->UserModel->get('*' , ["ORDER"=>"Created_At"]);
    //     $data['groups'] = $this->groupsModel->get('*',[]);
    //     view('user.UserForm', $data);
    // }

    // public function UserEdit()
    // {
    //     global $request;
    //     $id = $request->get_route_param('id');
    //     $out['groups'] = $this->groupsModel->get('*',[]);
    //     $data = $this->UserModel->get(["id","Fname","Lname","MeliCode","Address","PostalCode","Gender","group_name "], ["id"=>$id]);
    //     foreach ($data as $user) {

    //     }
    //     $out['user'] = $user;
    //     view('user.UserEditForm',$out);   
    // }

    // public function AdduserEdit()
    // {
    //     global $request;
    //     $userInfo = [
    //         "Fname"=>$request->input('FirstName'),
    //         "Lname"=>$request->input('LastName'),
    //         "MeliCode"=>$request->input('MelliCode'),
    //         "Address"=>$request->input('Address'),
    //         "PostalCode"=>$request->input('PostalCode'),
    //         "Gender"=>$request->input('gender'),
    //         "group_name"=>$request->input('group'),
    //     ]; 

    //     $MelliCount = $this->UserModel->get("MeliCode" ,["MeliCode"=>$userInfo['MeliCode']]);

    //     $data['id'] = $request->input('id');
    //     if (count($MelliCount) == 1) {
    //         $count =count($this->UserModel->get('MeliCode' ,["AND" => [
    //             "MeliCode"=>$request->input('MelliCode'),
    //             "id"=>$request->input('id')
    //         ]]));

    //         if ($count == 1) {
    //                 $data['status']= true;
    //                 $count = $this->UserModel->update($userInfo, ["id"=>$request->input('id')]);
    //                 view('user.user-edit',$data); 
    //         }
    //         else 
    //         {
    //                 $data['status'] = false;
    //                 view('user.user-edit',$data);    
    //         }
    //     }
    //     elseif(count($MelliCount) == 0)
    //     {
    //         $data['status']= true;
    //         $count = $this->UserModel->update($userInfo, ["id"=>$request->input('id')]);
    //         view('user.user-edit',$data);   
    //     }
    // }

    // public function Useradd()
    // {
    //     global $request;
    //     $userInfo = [
    //         "Fname"=>$request->input('FirstName'),
    //         "Lname"=>$request->input('LastName'),
    //         "MeliCode"=>$request->input('MelliCode'),
    //         "Address"=>$request->input('Address'),
    //         "PostalCode"=>$request->input('PostalCode'),
    //         "Gender"=>$request->input('gender'),
    //         "group_name"=>$request->input('group'),
    //     ];
    //     $MelliCount = $this->UserModel->get('MeliCode' ,["MeliCode"=>$request->input('MelliCode')]);
    //     if (count($MelliCount) == 0) {
    //         $data['status']= true;
    //         $count = $this->UserModel->create($userInfo);
    //         view('user.add-user',$data);    
    //     }else {
    //         $data['status'] = false;
    //         view('user.add-user',$data);    
    //     }
    // }

    // public function Userdelete()
    // {
    //     global $request;
    //     $id = $request->get_route_param('id');
    //     $data['deleted_count'] = $this->UserModel->delete(["id"=>$id]);
    //     view('user.delete-result',$data);    
    // }

    // public function GroupsTable()
    // {
    //     $data['users'] = $this->UserModel->get('*' , ["ORDER"=>"Created_At"]);
    //     $data['groups'] = $this->groupsModel->get('*',[]);
    //     view('group.GroupTable', $data);
    // }

    // public function Groupform()
    // {
    //     $data['users'] = $this->UserModel->get('*' , ["ORDER"=>"Created_At"]);
    //     $data['groups'] = $this->groupsModel->get('*',[]);
    //     view('group.GroupForm', $data);
    // }

    // public function GroupEdit()
    // {
    //     global $request;
    //     $id = $request->get_route_param('id');
    //     $data = $this->groupsModel->get(["Gname","id"], ["id"=>$id]);
    //     foreach ($data as $group) {

    //     }
    //     view('group.GroupEditForm',$group);   
    // }

    // public function AddGroupEdit()
    // {
    //     global $request;
    //     $id = $request->input('id');
    //     $Gname = $request->input('Gname');

    //     $groupCount = $this->groupsModel->get("Gname" ,["Gname"=>$Gname]);

    //     if (count($groupCount) == 1) {
    //         $data['status'] = false;
    //         view('group.group-edit',$data);  
    //     }
    //     else{
    //         $data['status'] = true;
    //         $data['editedCount'] = $this->groupsModel->update(["Gname"=>$Gname], ["id"=>$id]);
    //         view('group.group-edit',$data);  
    //     }
    // }
    

    // public function Groupadd()
    // {
    //     global $request;
    //     $groupName = $request->input('group');

    //     $Count = $this->groupsModel->count(["Gname"=>$groupName]);
    //     if ($Count == 0) {
    //         $data['status'] = true;
    //         $data['Gname'] = $this->groupsModel->create(["Gname"=>$groupName]);
    //     }else {
    //         $data['status'] = false;
    //     }
    //     view('group.add-group',$data);    
    // }

    // public function Groupdelete()
    // {
    //     global $request;
    //     $id = $request->get_route_param('id');

    //     $Gname =  $this->groupsModel->get('Gname', ["id"=>$id])[0];

    //     $count = $this->UserModel->count(["group_name"=>$Gname]);
    //     if ($count > 0) {
    //         $data['status'] = false;
    //         view('group.delete-result',$data);    
    //     }
    //     else 
    //     {
    //         $data['status'] = true;
    //         $data['deleted_count'] = $this->groupsModel->delete(["id"=>$id]);
    //         view('group.delete-result',$data);    
    //     }
    // }
    
}
?>