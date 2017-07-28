<?php namespace App\Services\Cart;

use Cookie;
use Illuminate\Http\Request;

class Cart
{

    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    public $app;

    private $_cart;
    private $minutes;

    /**
     * Create a new confide instance.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    public function __construct($app)
    {
        $this->app = $app;
        $this->minutes=30*24*60;
    }


    public function get(){
        $this->_cart=request()->cookie('cart');
        return $this->_cart;
    }

    public function set(){
        Cookie::queue('cart','', $this->minutes);
    }

    public function update($data){
        Cookie::queue('cart',$data, $this->minutes);
    }
    public function delete(){
        Cookie::queue('cart','', 0);
    }

    public function getMinutes(){
        return $this->minutes;
    }
}