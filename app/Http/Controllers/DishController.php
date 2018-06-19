<?php

namespace App;

use App\Ingredient;
use App\Dish;
use App\Rate;
use App\Dish_ingr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    public function __construct()
    {
        $this->middleware('chef')->except(['show', 'index']);
    }
    
    public function index($lang)
    {
    	ChangeLang($lang);
        $dishes = Dish::orderBy('created_at')->get();
        $ing = Ingredient::all();

        foreach ($ing as $v) $v->name = CanTrans($v->name); 

        $data=null;
        if (!empty($_GET))
        {
            $data=$_GET;
            $data['modified'] = true;
            foreach ($dishes as $key => $di) {
                $ingreds = Dish_ingr::where('dish_id','=',$di->id)->get();
                    foreach ($ingreds as $key2 => $ingred) {
                        if (!isset($data['ing'.$ingred->ingredient_id]))
                        {
                            unset($dishes[$key]);
                            break;
                        }
                    }
            }
        }

        foreach ($dishes as $key => $value) 
            {   
                $rate = Rate::where('dish','=',$value->id)->get();
                $count=0; $points=0;
                foreach ($rate as $key2 => $value2) {
                    $count++;
                    $points+=$rate[$key2]->score;
                }
                if ($count>0) $value->rating=$points/$count;
                else $value->rating=0;
                $value->name=CanTrans($value->name);
            }

        if (isset($data['orderby']) && $data['orderby']=='rate')
        {
            $a = array();
            foreach ($dishes as $key => $value) $a[$key]=$value; 
            usort($a, function($o1, $o2){return strcmp($o2->rating, $o1->rating);});
            $dishes=$a;
        }

        return view('home',['dishes'=>$dishes, 'ingrs'=>$ing, 'param' => $data]);
    }

	public function show($lang, $id)
	{
    	ChangeLang($lang);
        $req = Dish::findOrFail($id);
        $req->name = CanTrans($req->name);
        $ing = Dish_ingr::where('dish_id','=',$id)->get();

        $Urate=0;
        $rate = Rate::where('dish','=',$id)->get();
        $count=0; $points=0;
        foreach ($rate as $key => $value) {
            $count++;
            $points+=$value->score;
            if (!Auth::Guest() && $value->user == Auth::User()->id) $Urate=$value->score;
        }
        if ($count!=0) $req->rating=$points/$count;
        else $req->rating=0;
        foreach ($ing as $key => $value) {
            $ing[$key]=Ingredient::findOrFail($value->ingredient_id)->name;
            $ing[$key]=mb_strtolower(CanTrans($ing[$key]));
            if ($key!=0) $ing[$key]=', '.$ing[$key];
        }

		return view('dish_show',['dish'=>$req,'ings'=>$ing, 'Urate' => $Urate]);
	}

	public function create($lang)
	{
    	ChangeLang($lang);
        $req = Ingredient::all();
        foreach ($req as $v) $v->name = CanTrans($v->name);
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
