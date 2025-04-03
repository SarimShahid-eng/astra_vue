<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Business;
use App\Models\Distributor;
use Illuminate\Http\Request;
use libphonenumber\PhoneNumberUtil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Propaganistas\LaravelPhone\PhoneNumber;
use Propaganistas\LaravelPhone\Rules\Phone;
use Illuminate\Validation\ValidationException;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::with('user')->get();
        return view('admin.distributor.index', compact('distributors'));
    }
    public function create()
    {
        $countries = config('countries.countries');
        // $businesses = Business::all();
        return view('admin.distributor.add', compact('countries'));
    }

    public function store(Request $request)
    {

        $countryInput = $request->input('country');
        // if ($countryInput) {
        // dd($request->all());
        list($countryCode, $countryName) = explode('-', $countryInput) + [null, null];
        if (!$countryCode || !$countryInput) {
            throw ValidationException::withMessages([
                ['Invalid country selected. Please choose a valid country.']
            ]);
        }

        $dpn = trim($request->input('dpn')); // User enters 3XXXXXXXXX
        $mpn = trim($request->input('mpn')); // User enters 3XXXXXXXXX

        if ($mpn || $dpn) {
            // Concatenate country dial code with user input
            $fullDpn = '+' . $this->getCountryDialCode($countryCode) . $dpn;
            $fullMpn = '+' . $this->getCountryDialCode($countryCode) . $mpn;

            // Use the full numbers for validation
            $validator = Validator::make(
                [
                    'dpn' => $fullDpn,  // Use full number for validation
                    'mpn' => $fullMpn,  // Use full number for validation
                ],
                [
                    'dpn' => $request->filled('dpn') && !$request->has('distributor_id') ? ['required', new Phone($countryCode)] : ['nullable', new Phone($countryCode)],
                    'mpn' => $request->filled('mpn') && !$request->has('distributor_id') ? ['required', new Phone($countryCode)] : ['nullable', new Phone($countryCode)],
                ],
                [
                    'dpn.required' => 'The direct phone number is required.',
                    'mpn.required' => 'The main phone number is required.',
                    'dpn.phone' => 'Invalid direct phone number for ' . ($countryName ?? 'the selected country') . '. Please enter a valid number.',
                    'mpn.phone' => 'Invalid main phone number for ' . ($countryName ?? 'the selected country') . '. Please enter a valid number.',
                ]
            );

            // Throw a 422 error if validation fails
            if ($validator->fails()) {
                $errors = $validator->errors()->toArray();
                foreach ($errors as $key => &$errorMessages) {
                    foreach ($errorMessages as &$message) {
                        if ($message === 'validation.phone') {
                            $message =  'Invalid Direct Phone Number or Main number.Kindly recheck to proceed';
                        }
                    }
                }
                throw ValidationException::withMessages($errors);
            }
        }
        $Input = $request->validate(
            [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'password' => [
                    $request->has('distributor_id') ? 'nullable' : 'required',
                    'min:8',
                    // 'confirmed'
                ],
                'confirmpassword' => 'same:password',
                'job_title' => 'required|string|max:255',
                'department' => 'required|string|max:255',
                'work_email' => 'required|string|max:255',
                'company_name' => 'required|string|max:255',
                'registration_number' => 'required|integer',
                'year_founded' => 'nullable|integer|min:4,max:4',
                'no_of_employees' => 'nullable|integer',
                'company_description' => 'required|string',
                'company_website' => 'nullable|string|max:255',
                //company ended
                'headquarters_address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'postal_code' => 'required|integer',
                'country' => 'required|string|max:255',
                'business_email' => 'required|email',
                //territory ended
            ],
            [
                'confirmpassword.same' => 'The confirmation password must match the password.',
            ]
        );

        $userData = [
            'name' => $Input['firstname'],
            'email' => $Input['work_email'],
            'password' => bcrypt($Input['password']),
            'role' => 'distributor',
            'number' => $fullDpn ?? '',
        ];

        $distributorData = [
            'company_name' => $Input['company_name'],
            'reg_no' => $Input['registration_number'],
            'founded_year' => $Input['year_founded'],
            'no_of_employees' => $Input['no_of_employees'],
            'company_desc' => $Input['company_description'],
            'company_website' => $Input['company_website'],
            //company ended
            'headquarters_address' => $Input['headquarters_address'],
            'city' => $Input['city'],
            'province' => $Input['state'],
            'postal_code' => $Input['postal_code'],
            'country' => $countryName,
            'mpn' => $fullMpn ?? '', //main phone number
            'business_email' => $Input['business_email'],
            'lastname' => $Input['lastname'],
            'job_title' => $Input['job_title'],
            'department' => $Input['department'],
        ];

        if ($request->distributor_id != null) {
            $distributor = Distributor::find($request->distributor_id);
            if (empty($fullMpn)) {
                unset($distributorData['mpn']);
            }
            if (empty($fullDpn)) {
                unset($userData['number']);
            }
            $distributor->update($distributorData);
            $user = User::find($distributor->user_id);
            $user->update($userData);
        } else {
            $user = User::create($userData);
            $distributorData['user_id'] = $user->id;
            $distributor = Distributor::create($distributorData);
        }


        if (Auth::user()->role === 'distributor') {
            return response()->json([
                'success' => 'Distributor Saved',
                'redirect' => route('distributor.add'),
            ]);
        }
        // if(Auth::user()->role === 'distributor'){
        return response()->json([
            'success' => 'Distributor Saved',
            'redirect' =>  route('distributor.index')
        ]);
    }
    public function getCountryDialCode($countryCode)
    {
        $phoneUtil = PhoneNumberUtil::getInstance();

        try {
            // Get example number for the country
            $exampleNumber = $phoneUtil->getExampleNumberForType($countryCode, \libphonenumber\PhoneNumberType::MOBILE);

            // Get the country dialing code
            return $exampleNumber ? $exampleNumber->getCountryCode() : null;
        } catch (\Exception $e) {
            return null;
        }
    }
    function edit($id)
    {
        $distributor = Distributor::with('user')->find($id);
        // dd($distributor);
        $countries = config('countries.countries');
        return view('admin.distributor.add', compact('distributor', 'countries'));
    }
    function destroy($id)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->user()->delete();
        $distributor->delete();
        return response()->json([
            'success' => 'Distributor Saved',
            'redirect' => route('distributor.index')
        ]);
    }
    function get_distributor_country_dialcode(Request $request)
    {
        $countryCode = $request->country;
        list($countryCode, $countryName) = explode('-', $countryCode) + [null, null];
        $countryDialCode = $this->getCountryDialCode($countryCode);
        return response()->json([
            'countryDialCode' => '+' . $countryDialCode
        ]);
    }
}
