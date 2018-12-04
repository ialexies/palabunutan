<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Mail;
use App\Bunutan;
use Session;

class bunotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
    
        $bubunot = $request->bubunot;

        $validate_bubunot=$category=Bunutan::find($bubunot);
        $bubunot_name=$validate_bubunot->name;

        // echo $validate_bubunot->name;

        if ($validate_bubunot->active == 1){
                echo "nakabunot na";
        }
        elseif ($validate_bubunot->active == 0){

            $nabunots = Bunutan::all()->where('chosen', '==', 0)->where('id', '!=', $bubunot)->random(1);
            
                foreach ($nabunots as $nabunot) {
                    $nabunots_name = $nabunot->name ;
                    $nabunots_id = $nabunot->id ;
                }
                

              //  echo $nabunots_name;
            $update_bubunot=Bunutan::find($bubunot);
            $update_bubunot->active = 1;
            $update_bubunot->ip = $request->getClientIp();
            $update_bubunot->nabunot = $nabunots_name ;
            $update_bubunot->save();

            $update_bubunot=Bunutan::find($nabunots_id);

            $update_bubunot->chosen = 1 ;
            $update_bubunot->save();

            // session::flash('sessionbunnot','Ang iyong nabunot ay si '.$nabunots_name);
            
            // $cookie = Cookie::forever('name', 'value');
            // Cookie('testcookie',300, true, 10);
            $cookie_name = "cookienabunot";
            $cookie_value = $nabunots_name;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30*30), "/"); // 86400 = 1 day

            //send email
            // $data = array('name'=>"Joshua", "body" => "This is my first Online Email.");
            // Mail::send('emails.mail', $data, function($message) {
            //   $message->to('ialexies@gmail.com', 'To Website')
            //           ->subject('Online Email Test');
            //   $message->from('ialexies@gmail.com','From Visitor');
            // });


             return view('nabunot', compact('nabunots','bubunot_name','nabunots_name'))->withCookie(cookie('name', 'virat', 60));
        }
      

        // $nabunots = Bunutan::all()->where('active', '=', 0)->random(1);
        
        //update the record make the name active
        // $category=Category::find($id);
        // $category->name = $request->name;
        // $category->save();


        // return view('nabunot', compact('nabunots','bubunot'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
