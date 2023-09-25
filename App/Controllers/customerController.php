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
        $this->factorModel = new factor();
    }

    public function dashboard()
    {
        if (isset($_SESSION['customer'])) {
            $data = $this->customerModel->get(["id", "customer_name", "customer_password", "customer_username"], ["customer_username" => $_SESSION['customer']]);
            // $customer_count = $this->customerModel->count([]);
            // $sum_price = $this->factorModel->sum('Total_price', []);
            // $sum_price = 100;
            // $data = $this->adminModel->get(["id", "admin-name", "admin-password", "admin-username"], ["admin-username" => $_SESSION['admin']]);

            $out['customer'] = $data[0];
            // $out['customer'] = $customer_count;
            // $out['sum_price'] = $sum_price;

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
            session_unset();
            Redirect(site_url('customer'), false);
        }
    }
}
