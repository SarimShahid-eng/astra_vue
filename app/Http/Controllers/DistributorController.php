<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Business;
use App\Models\Distributor;
use Illuminate\Http\Request;
use libphonenumber\PhoneNumberUtil;
use Illuminate\Support\Facades\Validator;
use Propaganistas\LaravelPhone\PhoneNumber;
use Propaganistas\LaravelPhone\Rules\Phone;
use Illuminate\Validation\ValidationException;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::all();
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
        // Validating phone  country wise
        $countryInput = $request->input('country');
        list($countryCode, $countryName) = explode('-', $countryInput) + [null, null];
        if (!$countryCode) {
            throw ValidationException::withMessages([
                'country' => ['Invalid country selected. Please choose a valid country.']
            ]);
        }
        // Get user input (direct phone & main phone)
        $dpn = trim($request->input('dpn')); // User enters 3XXXXXXXXX
        $mpn = trim($request->input('mpn')); // User enters 3XXXXXXXXX

        // Concatenate country dial code with user input
        $fullDpn = '+' . $this->getCountryDialCode($countryCode) . $dpn;
        $fullMpn = '+' . $this->getCountryDialCode($countryCode) . $mpn;
        $validator = Validator::make(
            [
                'dpn' => $fullDpn,
                'mpn' => $fullMpn,
            ],
            [
                'dpn' => ['required', new Phone($countryCode)],
                'mpn' => ['required', new Phone($countryCode)],
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


        $Input =   $request->validate(
            [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'password' => [
                    $request->has('update_id') ? 'nullable' : 'required',
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
                // 'mpn' => ['required', new Phone($countryCode)],
                'business_email' => 'required|email',
                //territory ended
            ],
            [
                'mpn' => ['required', new Phone($countryCode)],
                'confirmpassword.same' => 'The confirmation password must match the password.',
                // 'dpn' => 'The phone number must be 11 digits'
                'mpn' => [
                    'phone' => 'Invalid Main phone number for ' . ($countryName ?? 'the selected country') . '.',
                ],
                'dpn' => [
                    'phone' => 'Invalid Direct phone number for ' . ($countryName ?? 'the selected country') . '.',
                ]
            ]
        );

        $userData = [
            'name' => $Input['firstname'],
            'email' =>    $Input['work_email'],
            'password' =>  bcrypt($Input['password']),
            'role' =>     'distributor',
            'number' =>   $fullDpn,
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
            // 'country' => $Input['country'],
            'mpn' => $fullMpn, //main phone number
            // 'mpn' => , //main phone number
            'business_email' => $Input['business_email'],
            //territory ended
            'lastname' => $Input['lastname'],
            'job_title' => $Input['job_title'],
            'department' => $Input['department'],
            // user details ended
        ];
        if ($request->distributor_id != null) {
            $distributor = Distributor::find($request->distributor_id);
            $distributor->update($distributorData);
            $user = User::find($distributor->user_id);
            $user->update($userData);
        } else {
            $user = User::create($userData);
            $distributorData['user_id'] = $user->id;
            $distributor = Distributor::create($distributorData);
        }


        return response()->json([
            'success' => 'Distributor Saved',
            'redirect' => route('distributor.index')
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
        $distributor = Distributor::destroy($id);
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
