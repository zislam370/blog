<?php
/**
 * Created by PhpStorm.
 * User: Zahid
 * Date: 30-Oct-16
 * Time: 10:22 AM
 */

namespace App\Http\Controllers;

class PagesController extends Controller {


    public function getIndex(){

        return view("layouts.welcome");

    }

    public function getBlog(){

        return view("layouts.blog");

    }


}