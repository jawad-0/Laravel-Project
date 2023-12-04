<?php
namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:company-list|company-create|company-edit|company-delete', ['only' => ['index','show']]);
         $this->middleware('permission:company-create', ['only' => ['create','store']]);
         $this->middleware('permission:company-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:company-delete', ['only' => ['destroy']]);
    }
    // Display the stored data
    public function index(): JsonResponse
    {
        // $posts = Company::paginate(10);
        // return view('company.index', ['company' => $posts]);
        $posts = Company::all();
        return $this->sendResponse(CompanyResource::collection($posts), 'Companies retrieved successfully.');
        //return view ('company.index')->with('company', $posts);
    }

    // Show the form for creating a new record
     
    public function create()
    {
        return view('company.create');
    }

    // Store a newly created record in database
     
    public function store(Request $request): JsonResponse
    {
        $rules = [
            'name' => 'required|string|max:20',
            'email' => 'required|email',
            'logo' => 'required',
            'website' => 'required|string|max:30'
        ];
        //$requestData = $request->all();
        $requestData = $request->except(['created_at', 'updated_at']);
        $requestData = $request->validate($rules);

        if($request->hasFile('logo')){
            $fileName = time().$request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->storeAs('images', $fileName , 'public'); 
            $requestData["logo"] = '/storage/'.$path;
        }
        else{
            $requestData["logo"] = 'pic.jpg';
        }
        company::create($requestData);
        return $this->sendResponse(new CompanyResource($requestData), 'Company created successfully.');
        //return redirect('company')->with('flash_message', 'company Added!');
    }

    // Display the specific record
    
    public function show(string $id): JsonResponse
    {
        $company = Company::find($id);
        if (is_null($company)) {
            return $this->sendError('Company not found.');
        }
        return $this->sendResponse(new CompanyResource($company), 'Company retrieved successfully.');
        //return view('company.show')->with('company', $company);
    }

    // Show the form for editing the specific record
    
    public function edit(string $id)
    {
        $company = Company::find($id);
        return view('company.edit')->with('company', $company);
    }

    //  Update the specific record in the database
    
    public function update(Request $request, string $id): JsonResponse
    {
        $company = Company::find($id);
        $rules = [
            'name' => 'required|string|max:20',
            'email' => 'required|email',
            'logo' => 'required',
            'website' => 'required|string|max:30'
        ];
        $requestData = $request->validate($rules);
        $requestData = $request->all();

        if($request->hasFile('logo')){
            $fileName = time().$request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->storeAs('images', $fileName , 'public'); 
            $requestData["logo"] = '/storage/'.$path;
        }
        else{
            $requestData["logo"] = 'pic.jpg';
        }

        $company->update($requestData);
        return $this->sendResponse(new ComapanyResource($company), 'Company updated successfully.');
        //return redirect('company')->with('flash_message', 'Company Updated!');
    }

    //  Remove the specific record from the database
    
    public function destroy(string $id): JsonResponse
    {
        Company::destroy($id);
        return $this->sendResponse([], 'Company deleted successfully.');
        //return redirect('company')->with('flash_message', 'Company Deleted!');
    }
}
