<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Dish;
use App\Rate;
use App\Dish_ingr;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function __construct()
    {
        $this->middleware('chef')->except(['show', 'index']);
    }
    
    public function index($lang)
    {
    	ChangeLang($lang);
        $req = Dish::all();
        foreach ($req as $key => $value) 
            {   
                $rate = Rate::where('dish','=',$req[$key]->id)->get();
                $count=0; $points=0;
                foreach ($rate as $key2 => $value2) {
                    $count++;
                    $points+=$rate[$key2]->score;
                }
                $req[$key]->rating=$points/$count;
                $a=$req[$key]->name;
                $a=strtolower($a);
                if (__('msg.'.$a) != 'msg.'.$a) $a=__('msg.'.$a);
                $req[$key]->name=$a;
            }
        return view('home',['dishes'=>$req]);
    }

	public function show($lang, $id)
	{
    	ChangeLang($lang);
        $req = Dish::findOrFail($id);
        $a=$req->name;
        $a=strtolower($a);
        if (__('msg.'.$a) != 'msg.'.$a) $a=__('msg.'.$a);
        $req->name=$a;
        $ing = Dish_ingr::where('dish_id','=',$id)->get();

        $rate = Rate::where('dish','=',$id)->get();
        $count=0; $points=0;
        foreach ($rate as $key => $value) {
            $count++;
            $points+=$rate[$key]->score;
        }
        $req->rating=$points/$count;

        foreach ($ing as $key => $value) {
            $ing[$key]=Ingredient::findOrFail($ing[$key]->ingredient_id)->name;
            $a=$ing[$key];
            $a=strtolower($a);
            if (__('msg.'.$a) != 'msg.'.$a) $a=strtolower(__('msg.'.$a));
            $ing[$key]=$a;
            if ($key!=0) $ing[$key]=', '.$ing[$key];
        }

		return view('dish_show',['dish'=>$req,'ings'=>$ing]);
	}

	public function create($lang)
	{
    	ChangeLang($lang);
        $req = Ingredient::all();
        foreach ($req as $key => $value) 
        	{	
        		$a=$req[$key]->name;
        		$a=strtolower($a);
        		if (__('msg.'.$a) != 'msg.'.$a) $a=__('msg.'.$a);
        		$req[$key]->name=$a;
        	}
        return view('dish_add',['ings'=>$req]);
	}

	public function store($lang, Request $request)
	{
    	ChangeLang($lang);
        $data = $request->all();
        $rules = array(
        	'name' => 'required|min:3|max:100|unique:dishes',
        	'price' => 'required|numeric|min:0|max:50',
        	'file' => 'required|image',
        );
        $this->validate($request, $rules);
        $d = new Dish();
        $d->name = $data['name'];
        $d->price = $data['price'];
        $d->photo_url = $data['file']->getClientOriginalName();
        $d->save();

        $data['file']->move('uploads', $d->photo_url);

        $id = $d->id;
        $i=0;
        do
        {
        	$name = "";
        	if ($i==0) $name='ingred';
        	else $name = 'ingred'.$i;
        	$req = Ingredient::where('name','=',$data[$name])->get();
        	$di = new Dish_ingr();
        	$di->dish_id = $id;
        	$di->ingredient_id = $req[0]->id;
        	$di->save();
        	$i++;
        } while (isset($data['ingred'.$i]));
        return redirect($lang.'/dish/'.$id);
	}
}
