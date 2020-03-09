<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Card;

use Illuminate\Http\Request;

use App\Services\CardService;
use JWTAuth;

class CardController extends Controller
{

    private $cardService;

    public function __construct(CardService $cardService)
    {
        $this->cardService = $cardService;
    }

    public function store(Request $request)
    {
        $validator = $this->cardService->makeValidator($request->all());

        if($validator->fails())
        {
            return response()->json(['message' => $validator->errors()], 400);
        }

        $card = new Card();

        return $this->fillAndSave($card, $request->all());
    }

    public function update(Request $request)
    {
        $validator = $this->cardService->makeValidator($request->all());

        if($validator->fails())
        {
            return response()->json(['message' => $validator->errors()], 400);
        }

        $card = Card::find($request->input('id'));
        
        return $this->fillAndSave($card, $request->all());
    }

    private function fillAndSave($card, $inputs)
    {
        $card->fill($request->all());

        $card->save();

        return $card;
    }

    public function delete($id)
    {
        $card = Card::find($id);

        $card->delete();

        return response()->json(['message' => "Card deleted."], 200);
    }

    private function sizePerPage(Request $request)
    {
        if( $request != null && !empty($request->input('size')) )
        {
            $size = intval($request->input('size'));
            return $size > 10 ? 10 : $size;
        }

        return env('CARD_LENGTH_PAGINATION', 6);
    }

    public function findByName(Request $request)
    {
        $cardBuilder = Card::orderBy('name')
                            ->select($this->columnsByRole());
        
        if( ! empty($request->input('name')) )
        {
            $cardBuilder->where('name', 'LIKE', "%{$request->input('name')}%");
        }

        return $cardBuilder->paginate($this->sizePerPage($request));
    }

    private function columnsByRole()
    {
        $user = null;
        
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Throwable $th) {
        } 

        if( $user != null && $user->isAdmin() )
        {
            return "*";
        }

        return [ "id", "name", "image", "brand_id", "category_id", "limit","annual_fee" ];
    }

}
