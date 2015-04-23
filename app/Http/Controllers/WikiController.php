<?php namespace Fungku\Kwiki\Http\Controllers;

class WikiController extends Controller
{
    public function four($one, $two, $three, $four)
    {
        return 4;
    }

    public function three($one, $two, $three)
    {
        return 3;
    }

    public function two($one, $two)
    {
        return 2;
    }

    public function one($one)
    {
        return 1;
    }
}
