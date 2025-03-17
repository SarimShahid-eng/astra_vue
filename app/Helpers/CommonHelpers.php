<?php

namespace App\Helpers;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class CommonHelpers
{
    public static function send_email($view, $data, $to, $subject = 'Welcome !', $from_email = null, $from_name = null)
    {
        $from_name = $from_name ?? env('APP_NAME', "SNJ SYSTEMS");
        $from_email = $from_email ?? env('DEFAULT_EMAIL', "info@snjsystems.com");

        $data = (array) $data;
        $data['subject'] = $subject;
        $data['to'] = $to;
        $data['from_name'] = $from_name;
        $data['from_email'] = $from_email;

        $data['data'] = $data;
        try {
             Mail::send('emails.' . $view, $data, function ($message) use ($data) {
                $message->from($data['from_email'], $data['from_name']);
                $message->subject($data['subject']);
                $message->to($data['to']);
            });
            return true;
        } catch (Exception $ex) {
            return response()->json($ex);
        }
    }

    public static function uploadSingleFile($file, $path = 'upload/images/', $thumbnail = [600,600], $types = "png,gif,jpeg", $filesize = '2000')
    {
        $path = $path . date('Y') . '/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $rules = array('image' => 'required|mimes:' . $types . "|max:" . $filesize);
        $validator = Validator::make(array('image' => $file), $rules);
        if ($validator->passes()) {
          
                $filename = $file->getClientOriginalName();
                $destinationPath = public_path() . '/images/';
                $file->move($destinationPath, $filename);

            return $filename;
        } else {
            return ['error' => $validator->errors()->first('image')];
        }
    }
    public static function uploadProfileImage($file, $path = 'upload/images/', $thumbnail = [600,600], $types = "png,gif,jpeg", $filesize = '2000')
    {
        $path = $path . date('Y') . '/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $rules = array('image' => 'required|mimes:' . $types . "|max:" . $filesize);
        $validator = Validator::make(array('image' => $file), $rules);
        if ($validator->passes()) {
          
                $filename = $file->getClientOriginalName();
                $destinationPath = public_path() . '/images/user';
                $file->move($destinationPath, $filename);

            return $filename;
        } else {
            return ['error' => $validator->errors()->first('image')];
        }
    }

    public static function createThumbnail($file, $width, $height)
    {
        $img = ImageLib::make($file)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($file);
    }
}
