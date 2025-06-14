<?php

namespace App\Http\Controllers;

use App\Helpers\RepositoryHelper;
use App\Models\AgentRefferal;
use App\Models\Category;
use App\Models\Learn;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Role;
use App\Models\ProductEngagementLog;
use App\Models\Refferal;
use App\Models\User;
use App\Models\UserProductRequest;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class AdminController extends Controller
{    
    public function __construct(private RepositoryHelper $repositoryHelper)
    {
        
    }

    public function getDashboardStatistics()
    {
        $userWithProducts = $this->repositoryHelper->getUserWithProducts();
        $userWithNoProducts = $this->repositoryHelper->getUserWithNoProduct();

        return $this->successResponse(
            statusCode: Response::HTTP_OK,
            message: 'Product listing statistics fetched successfully',
            data: [
                'userWithProducts' => $userWithProducts->count(),
                'userWithNoProducts' => $userWithNoProducts->count(),
            ]
        );
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $users = User::where('user_type', '=', 2 );

        if($search) {

          $users->where(function($query) use ($search) {

            $query->where('name', 'like', '%'.$search.'%')
                  ->orWhere('email', 'like', '%'.$search.'%')
                  ->orWhere('address', 'like', '%'.$search.'%')
                  ->orWhere('phone_number', 'like', '%'.$search.'%');

             });
    
        }

        $usersPaginated = $users->paginate($perPage);


        return response()->json([
            'status' => true,
            'message' => 'Registered Users Fetched Successfully',
            'users' => $usersPaginated->items(),
            'total' => $users->count(),
            'filtered_total' =>  $usersPaginated->total()

        ], 200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {    
        $user = User::find($id);

        if(!$user) {

            return response()->json([
                'status' => false,
                'message' => 'User Not Found',
    
            ], 404);
    

        }


        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string',
            'shop_no' => 'nullable|unique:users,shop_no',
            'username' => 'nullable|max:255|unique:users,username,'.$user->id,
            'phone_number'=> ['nullable', 'regex:/^(080|091|090|070|081)[0-9]{8}$/'],
            'address' => 'nullable',
            'email' => 'nullable|email|unique:users,email,'.$user->id,
            'nationality' => 'nullable|string',
            'bio' => 'nullable|string',
            'gender' => 'nullable|in:male,female',
            'photo_url' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:1024',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:1024',
            'selfie_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:1024',
            'nin_file' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:1024',

        ]);

        

        
        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors(),

            ],422);
        }

        

        $validatedData = $validator->validated();

        debugbar::info($validatedData);

        if($request->shop_no) {

            Refferal::create([
                'refferal_id' =>  $request->user()->id,
                'customer_id' => $id,

            ]);

        }




        $uploads = [

            'photo_url' => '/uploads/users',
            'banner' => '/uploads/users',
            'selfie_photo' => '/uploads/selfiePhotos',
            'nin_file' => 'uploads/nins'

        ];

        foreach ($uploads as $file => $path) {

            if($request->hasFile($file)) {

                $uploadedFile = $this->handleFileUpload($request->file($file), $path);

                if(!$uploadedFile) {
                    return response()->json([
                        'status' => false,
                        'message' => ucfirst(str_replace('_', '', $file )) . 'Upload Failed!!',

                    ],500);
                }

                $validatedData[$file] = $uploadedFile;
            }

        }


    

           if($user->update($validatedData)) {

            return response()->json([
                'status' => true,
                'message' => 'User Profile Update Successfully',

            ]);
           }



            return response()->json([
                'status' => false,
                'message' => 'User Profile Update Failed',

            ],500);

    }

    public function handleFileUpload($file, $path) {


            $rad = mt_rand(1000, 9999);

            $fileName = md5($file->getClientOriginalName()) . $rad . '.' .$file->getClientOriginalExtension();

            $upload =  $file->move(public_path($path), $fileName);

            return $upload ? $fileName : null;

    }


    public function suspend(Request $request) {

        $userId = $request->suspendUserId;

        debugbar::info($userId);

        $user = User::find($userId);

        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User Not Found',

            ], 404);
        }

        $user->user_type = -2;

        if($user->save()) {

            $user->tokens()->delete();  

            return response()->json([
                'status' => true,
                'message' => 'User Suspended Successfully',

            ], 200);
        };



        return response()->json([
            'status' => false,
            'message' => 'User Suspension Failed!!'

        ], 500);



        




    }

    public function getSuspendedUsers(Request $request) {

        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');

        $users = User::where('user_type', -2);

        if($search) {

            $users->where(function($query) use ($search) {
  
              $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhere('address', 'like', '%'.$search.'%')
                    ->orWhere('phone_number', 'like', '%'.$search.'%');
  
               });
      
          }
  
          $usersPaginated = $users->paginate($perPage);
  
  
          return response()->json([
              'status' => true,
              'message' => 'Suspended Users Fetched Successfully',
              'users' => $usersPaginated->items(),
              'total' => $users->count(),
              'filtered_total' =>  $usersPaginated->total()
  
          ], 200);



       
    }


    public function unsuspendUsers($id) {

        $user = User::find($id);

        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User Not Found',

            ],404);
        }

        $user->user_type = 2;
        
        if($user->save()) {

            return response()->json([
                'status' => true,
                'message' => 'User Suspension Revoked',

            ],200);
        }


        return response()->json([
            'status' => false,
            'message' => 'Revoking User Suspension Failed',

        ],500);

    }


    public function getDeletedAccounts(Request $request) {

        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');

       $users = User::onlyTrashed();

       
       if($search) {

        $users->where(function($query) use ($search) {

          $query->where('name', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->orWhere('address', 'like', '%'.$search.'%')
                ->orWhere('phone_number', 'like', '%'.$search.'%');

           });
  
      }

      $usersPaginated = $users->paginate($perPage);


      return response()->json([
          'status' => true,
          'message' => 'Deleted Users Fetched Successfully',
          'users' => $usersPaginated->items(),
          'total' => $users->count(),
          'filtered_total' =>  $usersPaginated->total()

      ], 200);


       


    }


 public function getUserProducts(Request $request) {

        
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');


       $products = Product::with(['user', 'category']);


       if($search) {

        $products->where(function($query) use ($search) {

          $query->where('title', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%')
                ->orWhere('quantity', 'like', '%'.$search.'%')
                ->orWhere('location', 'like', '%'.$search.'%');

           });
  
      }

      $productsPaginated = $products->paginate($perPage);


      return response()->json([
          'status' => true,
          'message' => 'Products Fetched Successfully',
          'products' => $productsPaginated->items(),
          'total' => $products->count(),
          'filtered_total' =>  $productsPaginated->total()

      ], 200);


    }


    public function getDelistedProducts(Request $request) {

        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');

        $products = Product::with(['user', 'category'])->onlyTrashed();

        
       if($search) {

        $products->where(function($query) use ($search) {

          $query->where('title', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%')
                ->orWhere('quantity', 'like', '%'.$search.'%')
                ->orWhere('location', 'like', '%'.$search.'%');

           });
  
      }

      $productsPaginated = $products->paginate($perPage);

      return response()->json([
        'status' => true,
        'message' => 'Delisted Products Fetched Successfully',
        'products' => $productsPaginated->items(),
        'total' => $products->count(),
        'filtered_total' =>  $productsPaginated->total()

    ], 200);


       
    }


    public function getUnlistedProducts(Request $request) {

        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');


        $user_product_request = UserProductRequest::with('user');
   
       if($search) {

        $user_product_request->where(function($query) use ($search) {

          $query->Where('request', 'like', '%'.$search.'%');

           });
  
      }


      $productsPaginated = $user_product_request->paginate($perPage);

        return response()->json([
            'status' => true,
            'message' => 'Delisted Products Fetched Successfully',
            'products' => $productsPaginated->items(),
            'total' => $productsPaginated->total(),
            'filtered_total' =>  $productsPaginated->total()

        ], 200);

       

    }






    public function getProductsBySoldPerformance(Request $request) {

        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');

        $products_sold = Product::with(['user', 'category'])->orderBy('sold','desc');


        if($search) {

            $products_sold->where(function ($query) use($search) {

                $query->where('title', 'like', '%'.$search . '%')
                      ->orWhere('sold', 'like', '%'.$search . '%')
                      ->orWhere('location', 'like', '%'.$search . '%')
                      ->orWhere('description', 'like', '%'.$search . '%');

            });
        }

        $products = $products_sold->paginate($perPage);

        return response()->json([
            'status' => true,
            'message' => 'Products Sold Fetched Successfully',
            'products' => $products->items(),
            'total' => $products->total(),
            'filtered_total' => $products->total(),
            
            
        ],200); 

    }

    public function getProductsByConectPerformance(Request $request) 
    {
               $perPage = $request->input('per_page',10);
               $search = $request->input('search');
             
                $productEngagements = DB::table('product_engagement_logs as e')
                ->join('products as p','e.product_id', '=', 'p.id')
                ->join('categories as c', 'p.category_id', '=', 'c.id',)
                ->select('e.product_id',
                'p.title as product_name',
                'p.description',
                'p.location',
                'c.name as category_name',
                DB::raw('COUNT(e.product_id) as total_engagements'))
                ->groupBy('e.product_id','p.title', 'c.name','p.description', 'p.location')
                ->orderByDesc('total_engagements');


                if($search) {

                    $productEngagements->where(function($query) use ($search) {

                        $query->where('p.title', 'like', '%'. $search . '%')
                               ->orWhere('c.name', 'like', '%'. $search . '%')
                               ->orWhere('p.description', 'like', '%'. $search . '%')
                               ->orWhere('p.location', 'like', '%'. $search . '%');

                    });


                }


                $products = $productEngagements->paginate($perPage);


                return response()->json([
                    'status' => true,
                    'message' => 'Products Engagements Fetched Successfully',
                    'products' => $products->items(),
                    'total' => DB::table('product_engagement_logs as e')->count(),
                    'filtered_total' =>  $products->total()
        
                ], 200);
        

    }

    public function getProductCategory() {

            $categories = Category::all();

            return response()->json([
                'status' => true,
                'message' => 'Product Category Fetched Successfully',
                'categories' => $categories,

            ], 200);
    }

    public function getFilteredProducts(Request $request) {         


        $condition = $request->condition;
        $category = $request->category;
        $actualPrice = $request->actual_price;
        $promoPrice = $request->promo_price;
        $askPrice = filter_var($request->ask_for_price, FILTER_VALIDATE_BOOLEAN);


       debugbar::info($condition, $category, $actualPrice, $promoPrice, $askPrice);


       $null = (trim($condition) == '' && trim($category) == '' && trim($actualPrice) == '' && trim($promoPrice) == '' && trim($askPrice) == '');

       if(empty($request->all()) || $null) {

        return response()->json([
            'status' => true,
            'message' => 'No filtered Parameter Given!!',
            'products' => [
                'data' => [],
            ],

        ], 200);

             
       }

        $query = Product::with(['user', 'category'])->where('quantity','!=', 0)
                           ->when($request->condition, function($q) use ($request) {
                            $q->where('condition', $request->condition);
                           })
                           ->when($request->category, function($q) use ($request) {
                            $q->where('category_id', $request->category);
                           })
                           ->when($request->actual_price, function($q) use ($request) {
                            $q->where('actual_price', $request->actual_price);
                           })
                           ->when($request->promo_price, function($q) use($request) {
                            $q->where('promo_price', $request->promo_price);
                           })
                           ->when($request->ask_for_price, function($q) use ($askPrice) {
                            $q->where('ask_for_price', $askPrice);
                           });

       
      //  $products = $query->get();

       $products = $query->paginate(10);


       if($products->isEmpty()) {

            return response()->json([
                'status' => true,
                'message' => 'No Products Matched Our Record',
                'products' => [
                    'data' => [],
                ],

            ], 200);
        }



        return response()->json([
            'status' => true,
            'message' => 'Products Filtered Successfully',
            'products' => $products,

        ]);
                           

                        
                        

    }

    
    public function getActiveBadges(Request $request)
     {

        
        $perPage = $request->input('per_page',10);
        $search = $request->input('search');

        $activeBadges = User::where('verify_status', 1)->where('badge_status', 1);

        if($search) {

            $activeBadges->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                  ->orWhere('email', 'like', '%'.$search.'%')
                  ->orWhere('address', 'like', '%'.$search.'%')
                  ->orWhere('phone_number', 'like', '%'.$search.'%');

             });
        }

        $users = $activeBadges->paginate($perPage);


        return response()->json([
            'status' => true,
            'message' => 'Users with active badges fetched successfully',
            'users' => $users->items(),
            'total' => $users->total(),
            'filtered_total' => $users->total(),


        ],200);


     }

     public function getExpiredBadges(Request $request)
     {

        
        $perPage = $request->input('per_page',10);
        $search = $request->input('search');

        $expiredBadges = User::where('verify_status', 1)->where('badge_status', -1);

        if($search) {

            $expiredBadges->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                  ->orWhere('email', 'like', '%'.$search.'%')
                  ->orWhere('address', 'like', '%'.$search.'%')
                  ->orWhere('phone_number', 'like', '%'.$search.'%');

             });
        }

        $users = $expiredBadges->paginate($perPage);


        return response()->json([
            'status' => true,
            'message' => 'Users with expired badges fetched successfully',
            'users' => $users->items(),
            'total' => $users->total(),
            'filtered_total' => $users->total(),


        ],200);


     }

     public function getUnbadgedUsers(Request $request)
     {

        
        $perPage = $request->input('per_page',10);
        $search = $request->input('search');

        $unBadgedUsers = User::where('verify_status', 0)->where('badge_status', 0);

        if($search) {

            $unBadgedUsers->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                  ->orWhere('email', 'like', '%'.$search.'%')
                  ->orWhere('address', 'like', '%'.$search.'%')
                  ->orWhere('phone_number', 'like', '%'.$search.'%');

             });
        }

        $users = $unBadgedUsers->paginate($perPage);


        return response()->json([
            'status' => true,
            'message' => 'unBadged users fetched successfully',
            'users' => $users->items(),
            'total' => $users->total(),
            'filtered_total' => $users->total(),


        ],200);


     }





   
    public function getAllBadges() {


         $users = User::all()->groupBy(function($user) {

            if($user->verify_status == 1 && $user->badge_status == 1) {

                return 'activeBadges';

            }

            if($user->verify_status == 1 && $user->badge_status == -1) {

                return 'expiredBadges';
            } 

            if($user->verify_status == 0 && $user->badge_status == 0) {

                return 'unverifiedUser';
            }

         });

    
        return response()->json([
            'status' => true,
            'message' => $users->isEmpty() ? 'No information available' : 'Badges Info Fetched Successfully',
            'activeBadges' => $users->get('activeBadges', []),
            'unverifiedUser' => $users->get('unverifiedUser', []),
            'expiredBadges' => $users->get('expiredBadges', []),
        ], 200);


    }

    public function getSuccessFullPayments(Request $request)
    {
        $perPage = $request->input('per_page',10);
        $search = $request->input('search');

        $userPayments = Payment::with('user')->where('status', 1)->where('gateway_response', 'successful');

        if($search) {

            $userPayments->where(function ($query) use ($search) {
                $query->whereHas('user', function($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhere('address', 'like', '%'.$search.'%')
                    ->orWhere('phone_number', 'like', '%'.$search.'%');
  
                });

                $query->orWhere('amount', 'like', '%'.$search.'%')
                      ->orWhere('invoice_number', 'like', '%'.$search.'%')
                      ->orWhere('transaction_reference', 'like', '%'.$search.'%');    
             });
        }


        $payments = $userPayments->paginate($perPage);


        return response()->json([
            'status' => true,
            'message' => 'Users payments fetched successfully',
            'payments' => $payments->items(), // Current page items
            'current_page' => $payments->currentPage(), // Current page number
            'last_page' => $payments->lastPage(), // Last page number
            'per_page' => $payments->perPage(), // Items per page
            'total' => $userPayments->count(),
            'filtered_total' => $payments->total(),


        ],200);


    }

    public function getFailedPayments(Request $request)
    {
        $perPage = $request->input('per_page',10);
        $search = $request->input('search');

        $userPayments = Payment::with('user')->where('status', -1)->whereNull('gateway_response');

        if($search) {

            $userPayments->where(function ($query) use ($search) {
                $query->whereHas('user', function($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhere('address', 'like', '%'.$search.'%')
                    ->orWhere('phone_number', 'like', '%'.$search.'%');
  
                });

                $query->orWhere('amount', 'like', '%'.$search.'%')
                      ->orWhere('invoice_number', 'like', '%'.$search.'%')
                      ->orWhere('transaction_reference', 'like', '%'.$search.'%');    
             });
        }


        $payments = $userPayments->paginate($perPage);


        return response()->json([
            'status' => true,
            'message' => 'Users failed payments fetched successfully',
            'payments' => $payments->items(), // Current page items
            'current_page' => $payments->currentPage(), // Current page number
            'last_page' => $payments->lastPage(), // Last page number
            'per_page' => $payments->perPage(), // Items per page
            'total' => $userPayments->count(),
            'filtered_total' => $payments->total(),


        ],200);



    }


    public function filterUserPayments(Request $request) {

        $amount = $request->amount ?? null;
        $status = $request->status ?? null;
        $trx = $request->trx ?? null; 
        $from =$request->from ? date('Y-m-d', strtotime($request->from)) . ' 00:00:00' : null;
        $to = $request->to ? date('Y-m-d', strtotime($request->to)) . ' 23:59:59' : null;

        $null =  (trim($amount) == '' && trim($status) == '' && trim($trx) == ''  && trim($from) == '' && trim($to) == '');

        if(empty($request->all()) || $null) {

            return response()->json([
                'status' => true,
                'message' => 'No filterd Parameter given!!',
                'payments' => [],

            ], 200);

        }

        $payments = Payment::with('user');

        if($amount) {

            $payments->where('amount', $amount);
        }

        if($status) {

            $payments->where('status', $status);
        }

        if($trx) {

            $payments->where('transaction_reference', $trx);
        }

        if($from && $to) {

            $payments->where('payment_date', '>=', $from)
                     ->where('payment_date', '<=', $to);

        }

        $filteredPayments = $payments->get();


        return response()->json([
            'status' => true,
            'message' => 'Payments Filterd Successfully',
            'payments' => $filteredPayments,

        ],200);





    }


    public function getLearnData() {

        $learns = Learn::all();

        return response()->json([
            'status' => true,
            'message' => 'Learn Data Fetched Successfully',
            'learns' => $learns

        ],200);
    }

    public function storeLearnData(Request $request) {

        debugbar::info($request->all());

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'url' => 'required|url'

        ]);


        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors(),

            ],422);
        }

         $learn = Learn::create($validator->validated());

         if($learn) {

            return response()->json([
                'status' => true,
                'message' => 'learn data uploaded successfully',

            ],200);
         }



         return response()->json([
            'status' => false,
            'message' => 'learn could not be created'

         ],500);

    }


    public function getLearnDetails(Request $request) {

       debugbar::info($request->learnId);

       $learn = Learn::find($request->learnId);

       if($learn) {

        return response()->json([
            'status' => true,
            'message' => 'Learn data fetched successfully',
            'learn' => $learn,

        ],200);

        

       }

       return response()->json([
          'status' => false,
          'message' => 'Learn data not found',

       ],404);










    }

    public function updateLearnData(Request $request) {

        debugbar::info($request->all());


        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:learns,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'url' => 'required|url'
            

        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()

            ],422);
        }

        $learn = Learn::find($request->id);

        if($learn) {

            $learn->update($validator->validated());

            return response()->json([
                'status' => true,
                'message' => 'Learn Data Updated Successfully',

            ], 200);

        }


        return response()->json([
            'status' => false,
            'message' => 'learn  data update failed',

        ],500);
    }


    public function deleteLearnData($id) {

        debugbar::info($id);
        
        $learn = Learn::find($id);

        if($learn) {
            $learn->delete();

            return response()->json([
                'status' => true,
                'message' => 'Learn data deleted successfully'

            ], 200);
        }


        return response()->json([
            'status' => false,
            'message'=> 'learn data failed to delete'

        ], 500);

        
    }

    public function getAdminUsers(Request $request) 
    {    try
         {
            $perPage = $request->input('per_page',10);
            $search = $request->input('search');

           $adminUsers = User::with('role')->where('user_type', 1);
           $roles = Role::all();

           if($search) {

            $adminUsers->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhere('address', 'like', '%'.$search.'%')
                    ->orWhere('phone_number', 'like', '%'.$search.'%');
             });

            


           }
            $users = $adminUsers->paginate($perPage);

           return response()->json([
            'status' => true,
            'message' => 'Admin Users Fetched Successfully',
            'roles' => $roles,
            'users' => $users->items(),
            'total' => $adminUsers->count(),
            'filtered_total' => $users->total(),
            

           ],200);

         } catch(Exception $err) {

            Log::error('Error fetching user profile: ' . $err->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong, Try again later!!'
               
            ],500);
         }
        
    }


    

    public function updateProfile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
          //  'email' => 'required|email|unique:users',
          //  'password' => ['required'],
            'photo_url' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:1024',
        ]);

        

        if($validator->fails()) {

            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),

            ],422);

        }

        $validated = $validator->validated();

        try{

      

        try {

        if($request->hasFile('photo_url')) {

            $image = $request->file('photo_url');

            $rad = mt_rand(1000,9999);

            $imageName = md5($image->getClientOriginalName()). $rad . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('./uploads/users/'), $imageName);

            $validated['photo_url'] = $imageName;
             
        }

      } catch(Exception $err) {

        log::error('Image upload failed' . ''. $err->getMessage());


        return response()->json([
            'status' => false,
            'message' => 'image upload failed',


        ],500);



      }


      $user = User::with('role')->where('email', $request->email)->first();

      if(!$user) {
        return response()->json([
            'status' => false,
            'message' => 'User not found'

        ],404);
      }

      debugbar::info($validated);

      $user->update($validated);

      return response()->json([
        'status' => true,
        'message'=> 'Admin profile updated successfully',
        'user' => $user,

      ],200);


        } catch (Exception $err) {

            log::error('User details update failed'. ''. $err->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'User details update failed',

            ],500);

        }

    }


    public function createUser(Request $request) 
    {
        $validator = Validator::make($request->all(), [
             'name' => ['required', 'string', 'max:255'],
             'role_id' => ['required'],
             'email' => ['required','email','unique:users'],
             'password' => ['required','min:8'],
             'photo_url' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:1024',

        ]);
 
        if($validator->fails()) {

            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),

            ],422);

        }
        
        $validated = $validator->validated();

    try{

      

      try {

        if($request->hasFile('photo_url')) {

            $image = $request->file('photo_url');

            $rad = mt_rand(1000,9999);

            $imageName = md5($image->getClientOriginalName()). $rad . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('./uploads/users/'), $imageName);

            $validated['photo_url'] = $imageName;
             
        }

      } catch(Exception $err) {

        log::error('Image upload failed' . ''. $err->getMessage());


        return response()->json([
            'status' => false,
            'message' => 'image upload failed',


        ],500);



      }

      $validated['user_type'] = 1;

       User::create($validated);

      return response()->json([
        'status' => true,
        'message'=> 'Admin profile updated successfully'

      ],200);


        } catch (Exception $err) {

            log::error('User creation  failed'. ''. $err->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'User creation failed',

            ],500);

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
    public function edit(string $id)
    {
         debugbar::info($id);

         $user = User::find($id);

         if($user) {

            return response()->json([
                'status' => true,
                'message' => 'User Fetched Successfully',
                'user' => $user,

            ],200);

         }


         return response()->json([
            'status' => false,
            'message' => 'User Not Found',


         ],400);




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
    public function destroy(string $id)
    {
        $user = User::find($id);

        if(!$user) {

            return response()->json([
                'status' => false,
                'message' => 'User Not Found',

            ], 404);
        }

        if($user->delete()) {
            
            Product::where('user_id', $user->id)->update(['deleted_at' => now()]);

            $user->tokens()->delete();


            return response()->json([
                'status' => true,
                'message' => 'User Deleted Successfully',

            ],200);


        }


        return response()->json([
            'status' => false,
            'message' => 'User Failed To Delete!!',

        ],500);





  
    }


    public function getOnboardedUsers(Request  $request, $id)
    {

        $refferals = Refferal::where('refferal_id', $id)->get();

    
        if($refferals->isEmpty()) {

            return response()->json([
                'status' => true,
                'message' => 'No onboarded users yet!!',
                'users' => [],
    
            ],200);

        }


        $userIds = $refferals->pluck('customer_id');
        $users = User::wherein('id', $userIds);

        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        

        if($search) {

          $users->where(function($query) use ($search) {

            $query->where('name', 'like', '%'.$search.'%')
                  ->orWhere('email', 'like', '%'.$search.'%')
                  ->orWhere('address', 'like', '%'.$search.'%')
                  ->orWhere('phone_number', 'like', '%'.$search.'%')
                  ->orWhere('shop_no', 'like', '%'.$search.'%');

             });
    
        }

        $usersPaginated = $users->paginate($perPage);


        return response()->json([
            'status' => true,
            'message' => 'Onboarded Users Fetched Successfully',
            'users' => $usersPaginated->items(),
            'total' => $usersPaginated->total(),
            'filtered_total' =>  $usersPaginated->total()

        ], 200);



    }

    public function getAllAgentRefferals(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
    
        $query = Refferal::with(['agent', 'customer']) // Load both agent and customer relationships
        ->when($search, function ($q) use ($search) {
            $q->whereHas('user', function ($subQuery) use ($search) {
                $subQuery->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%")
                    ->orWhere('username', 'like', "%{$search}%")
                    ->orWhere('phone_number', 'like', "%{$search}%");
            });
        });
    
        // Get all referrals without pagination for grouping
        $referrals = $query->get(); // Using get() to fetch all results for grouping
    
        // Group referrals by the agent (referral_id)
        $groupedReferrals = $referrals->groupBy('refferal_id');
    
        $result = [];
    
        foreach ($groupedReferrals as $agentId => $agentReferrals) {
            // Find the agent (referring user)
            $agent = User::find($agentId);
    
            if (!$agent) {
                continue; // Skip if agent does not exist
            }
    
            // Get the referred users (customers) for this agent
            $referredUsers = $agentReferrals->pluck('customer')->filter();
    
            // Collect the data for the agent and their referred users
            $result[] = [
                'agent' => $agent,
                'referred_users' => $referredUsers->values(),
                'total' => $referredUsers->count(),
            ];
        }
    
        // Apply pagination to the final result
        $paginatedResult = collect($result)->forPage($request->input('page', 1), $perPage);
    
        return response()->json([
            'status' => true,
            'message' => 'All agent referrals fetched successfully',
            'total' => $query->count(), // Total number of referrals without pagination
            'filtered_total' => $referrals->count(), // Total after applying search filters
            'data' => $paginatedResult, // The grouped data for agents and their referred users
        ]);
    }
    


   











}
