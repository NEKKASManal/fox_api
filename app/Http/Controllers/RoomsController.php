<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fox\Foxclass;
use Carbon\Carbon;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = 'SELECT C.NUMERO,C.TYPECH,C.NOMBLIS FROM CHAMBRE C , TYPECH T WHERE C.TYPECH = T.CDCHBRE AND C.ETAT =.T. ORDER BY TYPECH';
        $q1 = 'SELECT * FROM TYPECH WHERE ETAT =.T. ORDER BY cdchbre';
        
        try {
            //code..
            $resa =  Foxclass::fquery($q,['numero','typech','nomblis']);
            $rtype =  Foxclass::fquery($q1,['cdchbre','libelle']);

            $all = array();
            $room = array();
            $rooms = array();
            $roomstype = array();

            foreach($rtype as $t)
            {
                $roomstype['cdchbre']=$t['cdchbre'];
                $roomstype['libelle']=$t['libelle'];
                array_push($all,$roomstype);
                foreach($resa as $r)
                {
                    if($r['typech'] == $t['cdchbre'])
                    {
                        $room['numero']=$r['numero'];
                        $room['nomblis']=$r['nomblis'];
                        array_push($rooms,$room);
                    }
                    else
                    {
                        $all['rooms']=$rooms;
                    }
                }
            }

            return response()->json(['data'=>$all],200);
            
        } catch (\Throwable $th) {
            //throw $th;
            return self::callback("occupied","123");
        }        
    }
    
    public function insert()
    {
        $q = 'INSERT INTO Unite(cdunit,libunit,etat) VALUES("manal","manal",.T.)';
        START:  
        try 
        {
            $resa =  Foxclass::obj($q);
            return "done";
            // return response()->json(['data'=>$all],200);    
        } catch (\Throwable $th) 
        {          
            $var = Carbon::now()->toDateTimeString();
            print($var.'<br>');
            goto START;
            return self::callback("occupied","123");  
        }       
    }
    
    public function callback($status,$transacion_id)
    {
        $feedback = 
        [
            "status" => $status,
            "transaction_id" => $transacion_id,
        ];
        return response()->json($feedback);
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
