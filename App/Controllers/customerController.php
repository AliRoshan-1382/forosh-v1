<?php
namespace App\Controllers;

use App\Models\admin;
use App\Models\category;
use App\Models\customer;
use App\Models\factor;
use App\Models\product;
use App\Models\report;

session_start();
class customerController
{
    private $adminModel;
    private $customerModel;
    private $categoryModel;
    private $productModel;
    private $reportModel;
    private $factorModel;
    public function __construct()
    {
        $this->adminModel = new admin();
        $this->customerModel = new customer();
        $this->categoryModel = new category();
        $this->productModel = new product();
        $this->reportModel = new report();
    }

    public function session(){
        if (isset($_SESSION['customer']) || isset($_SESSION['customer_id'])) 
        {
            $data = $this->customerModel->get(["id", "customer_name", "customer_password", "customer_username", "access_login"], ["id" => $_SESSION['customer_id']])[0];

            if ($data['customer_username'] != $_SESSION['customer']) {
                session_unset();
                Redirect(site_url('customer'), false);
            }
            if ($data['access_login'] == 'no') {
                session_unset();
                Redirect(site_url('customer'), false);            
            }
        }else {
            Redirect(site_url('customer'), false);
        }
    }

    public function dashboard()
    {
        if (!empty($_SESSION['customer'])) {
            $data = $this->customerModel->get(["id", "customer_name", "customer_password", "customer_username"], ["customer_username" => $_SESSION['customer']]);

            $product = $this->productModel->get(["id", "product_name", "product_inventory", "product_price", "product_category", "remaining"], ["remaining[>]" => 1]);

            $out['customer'] = $data[0];
            $out['products'] = $product;

            view('customer.CustomerDashboard', $out);
        } else {
            view('login.CustomerLogin');
        }
    }

    public function login()
    {
        global $request;
        $data = $this->customerModel->get(["id", "customer_name", "customer_password", "customer_username", "access_login"], ["customer_username" => $request->input('username')]);
        if (!empty($data)) 
        {
            $customerRow = $data[0];
            if ($customerRow['access_login'] == 'ok') {
                if (password_verify($request->input('password'), $customerRow['customer_password'])) {
                    $_SESSION['customer'] = $request->input('username');
                    $_SESSION['customer_id'] = $customerRow['id'];
                    Redirect(site_url('customer'), false);
                } else {
                    $data['status'] = false;
                    $data['Data'] = 'Wrong Password...';
                    $data['url'] = 'customer';
                }
            }
            else 
            {
                $data['status'] = false;
                $data['Data'] = 'You Dont Have Aceess To Login...';
                $data['url'] = 'customer';
            }
        }
        else 
        {
            $data['status'] = false;
            $data['Data'] = 'Wrong Username...';
            $data['url'] = 'customer';
        }
        view('errors.erorr-success', $data);
    }

    public function logout()
    {
        if (isset($_SESSION['customer'])) {
            unset($_SESSION['customer']);
            Redirect(site_url('customer'), false);
        }
    }

    public function customerDetails(){
        return $this->customerModel->get(["id", "customer_name", "customer_password", "customer_username"], ["customer_username" => $_SESSION['customer']]);
    }

    public function OrderForm(){
        $this->session();

        $data = $this->customerDetails();
        $product = $this->productModel->get(["id", "product_name", "product_inventory", "product_price", "product_category", "remaining"], ["remaining[>]" => 1]);
        $out['customer'] = $data[0];
        $out['products'] = $product;
        view('customer.order', $out);
    }

    public function addOrder(){
        $this->session();

        global $request;
        $customer = $this->customerDetails()[0];
        $product = $this->productModel->get(["id", "product_name", "product_inventory", "product_price", "product_category", "remaining"], ["id"=>$request->input('id')])[0];

        $productInfo =
        [
            "customer_name" => $customer['customer_name'],
            "customer_id" => $customer['id'],
            "product_id" => $product['id'],
            "product_name" => $product['product_name'],
            "status" => "pending",
            "price" => $product['product_price'],
            "num_product" => $request->input('inventory'),
            "total_price" => $request->input('inventory') * $product['product_price'],
        ];

        $data['status'] = true;
        $data['Data'] = 'Product Ordered successfully...';
        $data['url'] = 'customer/OrderForm';
        $count = $this->reportModel->create($productInfo);
        view('errors.erorr-success', $data);
    }

    public function productsTable(){
        $this->session();

        $data = $this->customerDetails();
        $products = $this->productModel->getAll();
        $out['customer'] = $data[0];
        $out['products'] = $products;
        view('customer.productTable', $out);
    }

    public function reportsTable(){
        $this->session();

        $data = $this->customerModel->get(["id", "customer_name", "customer_password", "customer_username"], ["customer_username" => $_SESSION['customer']]);
        $customer = $this->customerDetails()[0];

        $reports = $this->reportModel->get("*", ["customer_id" =>$customer['id']]);
        $out['customer'] = $data[0];
        $out['reports'] = $reports;
        view('customer.reportsTable', $out);
    }

    public function reportDelete(){
        $this->session();

        global $request;
        $id = $request->get_route_param('id');
        $count = $this->reportModel->get('*',["id"=>$id]);

        if (count($count) == 1) {
            $this->reportModel->delete(["id"=>$id]);
            $data['status'] = true;
            $data['Data'] = "Report Deleted Successfully";
            $data['url'] = "customer/reportsTable";
        }
        elseif(count($count) != 1) {
            $data['status'] = false;
            $data['Data'] = "Report Dont Deleted Successfully";
            $data['url'] = "customer/reportsTable";
        }
        view('errors.erorr-success', $data);
    }
}
