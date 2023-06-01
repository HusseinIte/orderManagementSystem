<?php


namespace App\Services\Users;


use App\Http\Resources\UserResource;
use App\Models\Shopping\Cart;
use App\Models\User\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CustomerService
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('admin.customer.index');
    }

    public function storeCustomer(Request $request,$user)
    {

        return Customer::create([
            'user_id' =>$user->id,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'centerName' => $request->centerName,
            'city' => $request->city,
            'address' => $request->address,
            'phone' => $request->phone,
            'mobile' => $request->mobile
        ]);
    }

    public function register(Request $request)
    {
        $user = $this->userService->storeUser($request,4);
        Cart::create([
            'user_id'=>$user->id,
            'totalPrice'=>0
        ]);
        $token = Auth::login($user);
        $customer = $this->storeCustomer($request,$user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'customer' => $customer,
            'user' =>new UserResource($user),
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }
}
