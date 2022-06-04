<?php

use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

if (!function_exists('uploadImage')) {
    function uploadImage($upload, $path, $resize_width = null, $resize_height = null)
    {
        $fileName = $upload->getClientOriginalName();
        $webp = pathinfo($fileName, PATHINFO_FILENAME);
        if (!file_exists(public_path('Original' . $path))) {
            mkdir(public_path('Original' . $path), 0755, true);
        }
        \Intervention\Image\Facades\Image::make($upload)
            ->save(public_path('Original' . $path) . $fileName);
        return $path . $fileName;
    }
}

if (!function_exists('webpImages')) {
    function webpImages($upload, $path, $resize_width = null, $resize_height = null)
    {
        $fileName = now()->timestamp . '_' . $upload->getClientOriginalName();
        $webp = pathinfo($fileName, PATHINFO_FILENAME);
        if (!file_exists(public_path('Webp' . $path))) {
            mkdir(public_path('Webp' . $path), 0755, true);
        }
        if (!file_exists(public_path('Original' . $path))) {
            mkdir(public_path('Original' . $path), 0755, true);
        }
        $original = \Intervention\Image\Facades\Image::make($upload)
            ->save(public_path('Original' . $path) . $fileName);

        $thumb = Image::make($upload)->encode('webp', 100);
        $thumb->save(public_path('Webp' . $path) . $webp . '.webp');

        if (public_path('Webp' . $path) . $webp . '.webp') {
            curlImage(public_path('Webp' . $path) . $webp . '.webp', 'Webp' . $path);
        }
        if (public_path('Original' . $path) . $fileName) {
            curlImage(public_path('Original' . $path) . $fileName, 'Original' . $path);
        }
        return $path . $webp . '.webp';
    }
}

if (!function_exists('webp64Images')) {
    function webp64Images($upload, $path, $fileName, $ext)
    {
        if (!file_exists(public_path('Original' . $path))) {
            mkdir(public_path('Original' . $path), 0755, true);
        }
        file_put_contents(public_path('Original' . $path) . '/' . $fileName . '.' . $ext, $upload);
        return $path . $fileName . '.' . $ext;
    }
}

if (!function_exists('deleteImage')) {
    function deleteImage($path)
    {
        if (file_exists($path)) {
            $delete = File::delete($path);
            if ($delete) return 1;
        }
        return 0;
    }
}

if (!function_exists('curlImage')) {
    function curlImage($imagePath, $path)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://old.bawabtalsharq.com/cdnSharq/upimage.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_SSL_VERIFYPEER => False,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('files[]' => new CURLFile($imagePath), 'path' => $path)
        ));
        curl_exec($curl);
        curl_close($curl);
    }
}

if (!function_exists('url_exists')) {
    function url_exists($path)
    {
        $ch = curl_init($path);
        curl_exec($ch);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($httpCode == 200) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('upload_bulk')) {
    function upload_bulk($upload, $path)
    {
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $filename = rand() . time() . '.' . $upload->getClientOriginalExtension();
        $upload->move(public_path('csv' . '/' . $path), '/' . $filename);
        set_bulk(public_path('csv' . '/' . $path . '/' . $filename));
        return set_bulk(public_path('csv' . '/' . $path . '/' . $filename));
    }
}

if (!function_exists('set_bulk')) {
    function set_bulk($path)
    {
        $query = sprintf("LOAD DATA INFILE '%s'
        IGNORE INTO TABLE test
        CHARACTER SET utf8
        FIELDS TERMINATED BY " . now() .
            "ENCLOSED BY '\"'
        ESCAPED BY ''
        LINES TERMINATED BY '\n'
        IGNORE 1 ROWS", addslashes($path));
        \DB::connection()->getpdo()->exec($query);
        return true;
    }
}

if (!function_exists('slugable')) {
    function slugable($string, $id = null)
    {
        $slug = str_replace(' ', '-', strtolower(trim($string)));
        $slug = str_replace('%', '', strtolower(trim($slug)));
        $slug = str_replace('\\', '', strtolower(trim($slug)));
        $slug = str_replace('?', '', strtolower(trim($slug)));
        $slug = str_replace('&', '', strtolower(trim($slug)));
        $slug = str_replace(')', '', strtolower(trim($slug)));
        $slug = str_replace('(', '', strtolower(trim($slug)));
        $slug = str_replace("'", '', strtolower(trim($slug)));
        $slug = str_replace("’", '', strtolower(trim($slug)));
        $slug = str_replace("é", '-', strtolower(trim($slug)));

        return $id ? $slug . '-' . $id : $slug;
    }
}

//if (!function_exists('slugable')) {
//    function slugable($string, $model = null)
//    {
//        $slug = str_replace(' ', '-', strtolower(trim($string)));
//        if ($model) {
//            $model = new $model;
//            $id = DB::select("SHOW TABLE STATUS LIKE '" . $model->getTable() . "'");
//            $next_id = $id[0]->Auto_increment;
//            $slug = $model::where('slug', $slug)->exists() ? $slug . '-' . $next_id : $slug;
//        }
//        return $slug;
//    }
//}

if (!function_exists('ResponseJson')) {
    function ResponseJson($status, $message = "", $data = [], $error = [])
    {
        $response = [
            'code' => $status,
            'msg' => $message,
            'data' => (object)$data,
            'error' => (object)$error,
        ];
        if ($error) {
            $response['error'] = (object)$error;
        }
        return response()->json($response, $status);
    }
}

if (!function_exists('getCoEfficient')) {
    function getCoEfficient()
    {
        if (session()->has('currency')) {
            $currency = Currency::where('code', session('currency'))->first();
            if ($currency) {
                return $currency->coefficient;
            }
        }
        return 1;
    }
}

if (!function_exists('getFullPrice')) {
    function getFullPrice($value)
    {
        $price = (double)$value;
        if (session()->has('currency')) {
            $currency = Currency::where('code', session('currency'))->first();
            if ($currency) {
                $price = session('currency') != 'USD' ? (double)$value * $currency->coefficient : (double)$value;
                return round($price, 2);
            }
        }
        return round($price, 2);
    }
}

if (!function_exists('getFullPriceMobile')) {
    function getFullPriceMobile($value)
    {
        $price = (double)$value;
        if (session()->has('currency')) {
            $currency = Currency::where('code', session('currency'))->first();
            if ($currency) {
                $price = session('currency') != 'USD' ? (double)$value * $currency->coefficient : (double)$value;
                $data = [
                    'currency' => $currency['name_' . app()->getLocale()],
                    'price' => round($price, 2),
                ];
                return $data;
            }
        }
        $currency = Currency::where('code', 'USD')->first();
        $data = [
            'currency' => $currency['name_' . app()->getLocale()],
            'price' => round($price, 2),
        ];
        return $data;
    }
}

if (!function_exists('addSEO')) {
    function addSEO($record)
    {
        $request = request();
        if (!$request->has('description_ar')) {
            $request->request->add(['description_ar' => $request->name_ar]);
        }
        if (!$request->has('description_en')) {
            $request->request->add(['description_en' => $request->name_en]);
        }
        if ($record->seoable) {
            $record->seoable()->update([
                'title_ar' => !($request->has('title_ar') && $request->title_ar) ?: $request->title_ar,
                'title_en' => !($request->has('title_en') && $request->title_en) ?: $request->title_en,
                'desc_ar' => !($request->has('desc_ar') && $request->desc_ar) ?: $request->desc_ar,
                'desc_en' => !($request->has('desc_en') && $request->desc_en) ?: $request->desc_en,
            ]);
        } else {
            $record->seoable()->create([
                'title_ar' => $request->has('title_ar') && $request->title_ar ? $request->title_ar : $request->name_ar,
                'title_en' => $request->has('title_en') && $request->title_en ? $request->title_en : $request->name_en,
                'desc_ar' => $request->has('desc_ar') && $request->desc_ar ? $request->desc_ar : $request->description_ar,
                'desc_en' => $request->has('desc_en') && $request->desc_en ? $request->desc_en : $request->description_en,
            ]);
        }
        return 1;
    }
}
