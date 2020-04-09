<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThinksController extends Controller
{
    private $data=[
        1=>'Hello 1',
        2=>'Hello 2',
        3=>'Hello 3',
        4=>'Hello 4',
        5=>'Hello 5',
        6=>'Hello 6',
        7=>'Hello 7'
    ];
    public function index(){
        dump($this->data);
    }

    public function show($id){
        dump($this->data[$id]);
    }

    public function store(){}

    public function update(){}

    public function destroy($id){}
}
