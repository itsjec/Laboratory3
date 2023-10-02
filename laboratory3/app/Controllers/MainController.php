<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\ProductsModel;

class MainController extends BaseController
{
    private $products; // Define a private property to hold the ProductsModel instance

    public function __construct()
    {
        $this->productModel = new ProductsModel(); // Load and assign the ProductsModel in the constructor
    }

    public function updateProduct()
    {
        // Get the submitted form data
        $id = $this->request->getPost('id');
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'category' => $this->request->getPost('category'),
            'quantity' => $this->request->getPost('quantity'),
        ];

        // Load the ProductsModel
        $productModel = new ProductsModel();

        // Update the product in the database
        $productModel->update($id, $data);

        // Redirect to the "/Showadmin" page
        return redirect()->to('/Showadmin');
    }


    public function displayProducts()
    {
        // Load the model to fetch product data from the database
        $productModel = new ProductsModel(); // Replace with your actual model name
        
        // Fetch product data from the model
        $data['products'] = $productModel->findAll(); // Assuming you want to fetch all products
        
        // Load the view and pass the data to it
        return view('index', $data);
    }
    


    public function delete($id)
    {
        // Load your product model (replace 'ProductModel' with your actual model name)
        $productModel = new ProductsModel();

        // Check if the product with the given ID exists
        $product = $productModel->find($id);

        if ($product) {
            // Delete the product
            $productModel->delete($id);
            // Redirect back to the same page or wherever you want
            return redirect()->to('/Showadmin')->with('success', 'Product deleted successfully');
        } else {
            // Product not found, show an error or redirect to an error page
            return redirect()->to('/Showadmin')->with('error', 'Product not found');
        }
    }

    public function editProduct($id = null)
    {
        $productModel = new ProductsModel(); 
        $selectedProduct = $productModel->where('id', $id)->first();

        $data = [
            'active' => 'updateproduct',
            'selectedProduct' => $selectedProduct,
        ];

        return view('include/adminUpdate',$data);
    }
    
    

    public function addProducts()
    {
        // Get the uploaded file
        $file = $this->request->getFile('image');
    
        // Check if the file was uploaded successfully
        if ($file->isValid()) {
            // Get the client's original file name
            $newName = $file->getClientName();
    
            // Define the data to be inserted into the database
            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'category' => $this->request->getPost('category'),
                'quantity' => $this->request->getPost('quantity'),
                'image' => $newName
            ];
    
            // Define the validation rules for the image
            $rules = [
                'image' => [
                    'uploaded[image]',
                    'max_size[image,10240]',
                    'ext_in[image,png,jpg,jpeg,gif]'
                ]
            ];

            // Validate the image
            if ($this->validate($rules)) {
                // Move the uploaded file to the desired directory
                if ($file->move(ROOTPATH . 'public/uploads', $newName)) {
                    // Save the product data to the database
                    $this->productModel->save($data);
                } else {
                    echo $file->getErrorString() . ' ' . $file->getError();
                }
            } else {
                // Handle validation errors
                $data['validation'] = $this->validator;
            }
        }
    
        return redirect()->to('/Showadmin');
    }    

    public function save()
    {
        $id = $this->request->getPost('id');
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'category' => $this->request->getPost('category'),
            'quantity' => $this->request->getPost('quantity'),
        ];
    
        // Handle file upload
        $image = $this->request->getFile('image');
    
        if ($image) {
            // Check if a file was uploaded
            if ($image->isValid() && !$image->hasMoved()) {
                // Generate a unique filename
                $newName = $image->getClientName(); // Use a random name to avoid conflicts
    
                // Move the uploaded file to the public/uploads directory
                $image->move(ROOTPATH . 'public/uploads', $newName);
    
                // Save the generated filename to the database
                $data['image'] = 'uploads/' . $newName; // Store the path to the uploaded image
            }
        }
    
        // Save the data to the database
        $productModel = new ProductsModel();
    
        if ($id) {
            // If ID is provided, update the existing record
            $productModel->update($id, $data);
        } else {
            // If ID is not provided, insert a new record
            $productModel->insert($data);
        }
    
        // Redirect to the "/Showadmin" page
        return redirect()->to('/Showadmin');
    }    

    public function admin()
    {
        $productModel = new ProductsModel();
    
        $data['products'] = $productModel->findAll();
    
        return view('admin', $data);
    }
    

    public function Showadmin()
    {
        $productModel = new ProductsModel();
    
        $data['products'] = $productModel->findAll();
        return view('admin', $data);
    }

    public function displayaddproduct()
    {
        $productModel = new ProductsModel();
        $data = [
            'products' => $productModel->findAll(),
            'active' => 'addproduct'
        ];
    
        // Load the AddProduct view and pass the product data and active state
        return view('include/AddProduct', $data);
    }

    public function displayhome()
    {
        // Redirect to the index page
        return redirect()->to(base_url());
    }
    

    public function displaylogin()
    {
        $data = [
            'active' => 'login' // Set the active state for the "Add New Product" menu item
        ];
        return view('include/login', $data);
    }

    public function displayupdate()
    {
        $data = [
            'active' => 'updateproduct' // Set the active state for the "Add New Product" menu item
        ];
        return view('include/adminUpdate', $data);
    }

    public function displayprod()
    {
        $data = [
            'active' => 'products' // Set the active state for the "Add New Product" menu item
        ];
        return view('include/adminProducts', $data);
    }

    // ...

    public function login()
    {
        // Get the submitted login credentials
        $emailOrUsername = $this->request->getPost('emailOrUsername');
        $password = $this->request->getPost('password');
    
        // Use the UserModel to retrieve the user by email or username
        $userModel = new UserModel(); // Create an instance of your UserModel
        $user = $userModel->getUserByEmailOrUsername($emailOrUsername);
    
        if ($user) {
            // Check the user's role
            if ($user['role'] === 'admin') {
                // Redirect admin to the admin panel by calling Showadmin() function
                return $this->Showadmin();
            } elseif ($user['role'] === 'user') {
                // Redirect user to the /products route
                return redirect()->to('/products');
            }
        }
    
        // If the user doesn't exist or has an unknown role, show an error
        return redirect()->to('/login')->with('error', 'Invalid login credentials.');
    }
    
      
    
    public function register()
    {
        // Get the submitted registration data
        $username = $this->request->getPost('username2');
        $email = $this->request->getPost('email2');
        $password = $this->request->getPost('password2');

        // Check if the submitted email is already an admin email
        if ($this->isAdminEmail($email)) {
            // If it's an admin email, create an admin account
            $adminModel = new AdminModel(); // Replace with your Admin model
            $adminModel->insert([
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
            ]);

            // Redirect admin to the admin panel
            return redirect()->to('/admin');
        }

        // If not an admin email, create a regular user account
        $userModel = new UserModel(); // Replace with your User model
        $userModel->insert([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ]);

        // After successful registration, redirect the user to the login page
        return redirect()->to(site_url('auth/login'));
    }

    // Utility functions to check user and admin roles
    private function isAdmin($emailOrUsername, $password)
    {
        // Load the AdminModel
        $adminModel = new \App\Models\AdminModel();

        // Search for an admin with the provided email or username
        $admin = $adminModel->where('email', $emailOrUsername)
                        ->orWhere('username', $emailOrUsername)
                        ->first();

        if ($admin && password_verify($password, $admin['password'])) {
            return true; // Credentials match an admin
        }

        return false; // Not an admin
    }

    private function isUser($emailOrUsername, $password)
    {
        // Load the UserModel
        $userModel = new \App\Models\UserModel();

        // Search for a user with the provided email or username
        $user = $userModel->where('email', $emailOrUsername)
                        ->orWhere('username', $emailOrUsername)
                        ->first();

        if ($user && password_verify($password, $user['password'])) {
            return true; // Credentials match a user
        }

        return false; // Not a user
    }

    private function isAdminEmail($email)
    {
        // List of admin emails
        $adminEmails = ['admin@example.com', 'anotheradmin@example.com'];

        return in_array($email, $adminEmails);
    }

    public function showLoginForm()
    {
        // Render the login form view
        return view('include\login');
    }
    
}
