<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping;

class ApiController extends Controller {

    /**
     * Get All Shipping BY user_id
     *
     * @return Response
     */
    public function getAllShippingByUserId() {
        
        $userId = request()->user()->id;
        $responseArray = array();
        $shippings = Shipping::where('user_id', $userId)->get();
        if ($shippings) {
            foreach ($shippings as $shipping) {
                $responseArray[] = $this->responseShipping($shipping);
            }
            $response["data"] = $responseArray;
            return response()->json($response, 200);
        } else {
            return response()->json(['message' => "Not found shipping for this user"], 404);
        }
    }
    
    /**
     * Get Shipping BY id
     *
     * @return Response
     */
    public function getShippingDataById($id) {
        $shipping = Shipping::find($id);
        if ($shipping) {
            $response["data"] = $this->responseShipping($shipping);
            return response()->json($response, 200);
        } else {
            return response()->json(['message' => "Shipping not found"], 404);
        }
    }

    /**
     * Get Shipping BY code
     *
     * @return Response
     */
    public function getShippingDataByCode($code) {
        $shipping = Shipping::where('code', $code)->first();
        if ($shipping) {
            $response["data"] = $this->responseShipping($shipping);
            return response()->json($response, 200);
        } else {
            return response()->json(['message' => "Shipping not found"], 404);
        }
    }

    /**
     * Sign Shipping
     *
     * @return Response
     */
    public function signShipping(Request $request) {
        $shipping = Shipping::find($request->id);
        if ($shipping) {
            $shipping->states = 3;
            $shipping->save();
            return response()->json(['message' => "Shipping Signed"], 200);
        } else {
            return response()->json(['message' => "Shipping not found"], 404);
        }
    }
    
    /**
     * Get Shipping destiny
     *
     * @return Response
     */
    public function getShippingDestinyById($id) {
        $shipping = Shipping::find($id);
        if ($shipping) {
            //Carrer de valencia, 359 barcelona, barcelona, 08013 españa
            $response["data"]["destination"] = $shipping->address . " " . $shipping->city . "," . $shipping->state . "," . $shipping->city . " " . $shipping->country;
            
            return response()->json($response, 200);
        } else {
            return response()->json(['message' => "Shipping not found"], 404);
        }
    }

    public function responseShipping($shipping) {
        // Datos Base documento Nodo
        $response = [
            'id' => $shipping->id,
            'code' => $shipping->code,
            'states' => $shipping->states,
            'contact_person' => $shipping->contact_person,
            'email' => $shipping->email,
            'number' => $shipping->number,
            'weight' => $shipping->weight,
            'size' => $shipping->size,
            'fragile' => $shipping->fragile,
            'telephone' => $shipping->telephone,
            'address' => $shipping->address,
            'delivery_date' => $shipping->delivery_date,
            'cp' => $shipping->cp,
            'city' => $shipping->city,
            'state' => $shipping->state,
            'country' => $shipping->country,
            'created_at' => (isset($shipping->created_at)) ? $shipping->created_at->toDateTimeString() : "",
            'updated_at' => (isset($shipping->updated_at)) ? $shipping->updated_at->toDateTimeString() : "",
        ];

        return $response;
    }

}
