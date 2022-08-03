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

        $illuminatedMatriz = $this->generateLights($matrices);

        //print_r($matrices);
        //var_dump($illuminatedMatriz);
        return response()->json(['matrices' => $matrices, 'illuminatedMatriz' => $illuminatedMatriz]);

    }


    //Generate matriz
    protected function getMatriz($file)
    {
        $files      = $file;
        $file    = Storage::disk('local')->get($files);
        $contents   = explode("\r\n", $file);


        $matriz = [];
        foreach ($contents as $content) {
            $matriz[] = explode(" ",$content);
        }

        return $matriz;
    }

    //Generate matriz
    protected function generateLights($matrices)
    {

        $light = 0;
        for($i = 0; $i < count($matrices); $i++){
            for($j = 0; $j < count($matrices[0]); $j++){

                if($matrices[$i][$j] == 0){
                    $light++;
                    $matrices[$i][$j] = "focus-".$light;


                    for($k = $i+1; $k < count($matrices[0]); $k++){


                        if($matrices[$i][$k] == 0){
                            $matrices[$i][$k] = "light-".$light;
                        }
                        if($matrices[$i][$k] == 1){
                            break;
                        }
                    }

                    for($k = $j+1; $k < count($matrices); $k++){
                        if($matrices[$k][$j] == 0){
                            $matrices[$k][$j] = "light-".$light;
                        }
                        if($matrices[$k][$j] == 1){
                            break;
                        }
                    }


                }

            }
        }
        return $matrices;
    }
}
