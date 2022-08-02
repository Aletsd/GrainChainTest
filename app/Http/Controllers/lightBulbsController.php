<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class lightBulbsController extends Controller
{
    public function setFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_light' => ['required', 'mimes:txt', 'max:2048']
            // file validation

        ]); // create the validations
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return response()->json($validator->messages(), Response::HTTP_BAD_REQUEST);
        }


        $matrices = $this->getMatriz($request->file('file_light')->store('avatars'));

        return $matrices[0];
    }


    //Generate matriz
    protected function getMatriz($file)
    {
        $files      = $file;
        $content    = Storage::disk('local')->get($files);
        $contents   = explode("\r\n", $content);
        $contents   = explode('', $content[0]);

        print_r($contents);
    }

    //Generate matriz
    protected function generateLights($matrices)
    {
        foreach ($matrices as $matriz) {
        }
    }
}
