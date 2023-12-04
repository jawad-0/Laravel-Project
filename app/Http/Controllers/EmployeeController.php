<?php
namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\EmployeeResource;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:employee-list|employee-create|employee-edit|employee-delete', ['only' => ['index','show']]);
         $this->middleware('permission:employee-create', ['only' => ['create','store']]);
         $this->middleware('permission:employee-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:employee-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$posts = employee::paginate(10);
        //return view('employee.index', ['employee' => $posts]);
        $posts = employee::all();
        return view ('employee.index')->with('employee', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'firstname' => 'required|string|max:20',
            'lastname' => 'required|string|max:20',
            'company' => 'required|string|max:30',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ];
        $requestData = $request->except(['created_at', 'updated_at']);
        $requestData = $request->validate($rules);
        $requestData = $request->all();
        employee::create($requestData);
        return redirect('employee')->with('flash_message', 'Employee Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::find($id);
        if (is_null($employee)) {
            return $this->sendError('Employee not found.');
        }
        return view('employee.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        return view('employee.edit')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::find($id);
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ];
        $requestData = $request->validate($rules);
        $input = $request->all();
        $employee->update($input);
        return redirect('employee')->with('flash_message', 'Employee Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::destroy($id);
        return redirect('employee')->with('flash_message', 'Employee Deleted!');
    }
}
