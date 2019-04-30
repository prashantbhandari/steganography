<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Picture;
use DB;
use Auth;

class CodeController extends Controller
{
    public function encryptImage(Request $request)
    {   
        $name = Auth::user()->name;
        $imageFile = "storage/".$name.".png";
        $message = $request->message;

        //bin function

        function toBin($str){
            $str = (string)$str;
            $l = strlen($str);
            $result = '';
            while($l--){
              $result = str_pad(decbin(ord($str[$l])),8,"0",STR_PAD_LEFT).$result;
            }
            return $result;
          }
          function toString($binary){
            return pack('H*',base_convert($binary,2,16));
          }
        
        //encryption function
        $message_to_hide = $message;
        $binary_message = toBin($message_to_hide);
        $message_length = strlen($binary_message);
        $src = "storage/".$name.".png";
        $im = imagecreatefromjpeg($src);
        for($x=0;$x<$message_length;$x++){
          $y = $x;
          $rgb = imagecolorat($im,$x,$y);
          $r = ($rgb >>16) & 0xFF;
          $g = ($rgb >>8) & 0xFF;
          $b = $rgb & 0xFF;
          
          $newR = $r;
          $newG = $g;
          $newB = toBin($b);
          $newB[strlen($newB)-1] = $binary_message[$x];
          $newB = toString($newB);
          
          $new_color = imagecolorallocate($im,$newR,$newG,$newB);
          imagesetpixel($im,$x,$y,$new_color);
        }
        echo $x;
        imagepng($im,'simple.png');
        imagedestroy($im);
        
        
        return redirect('/encodedimage')->with('success', 'Image Encoded successfully');
    }
    public function decode()
    {   
        //toBIn function
        function toBin($str){
            $str = (string)$str;
            $l = strlen($str);
            $result = '';
            while($l--){
              $result = str_pad(decbin(ord($str[$l])),8,"0",STR_PAD_LEFT).$result;
            }
            return $result;
          }
          function toString($binary){
            return pack('H*',base_convert($binary,2,16));
          }

        //decryption function
        $src = 'simple.png';
        $im = imagecreatefrompng($src);
        $real_message = '';
        for($x=0;$x<160;$x++){
          $y = $x;
          $rgb = imagecolorat($im,$x,$y);
          $r = ($rgb >>16) & 0xFF;
          $g = ($rgb >>8) & 0xFF;
          $b = $rgb & 0xFF;
          if ($r >= 255) {
            $r = 245;
        }
          
          $blue = toBin($b);
          $real_message .= $blue[strlen($blue)-1];
        }
        $real_message = toString($real_message);
        return view("pictures.decode",compact("real_message"));
        die;
    }
    
}