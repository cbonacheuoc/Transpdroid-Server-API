<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Shipping;
use App\ShippingStatesHistory;

class ApiController extends Controller {

    /**
     * Get All Shipping BY user_id
     *
     * @return Response
     */
    public function getAllShippingByUserId() {

        $userId = Auth::user()->id;
        $responseArray = array();
        $shippings = Shipping::where('user_id', $userId)->orderBy('states', 'asc')->get();
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
            if (Auth::user()->id == $shipping->user_id) {
                $response["data"] = $this->responseShipping($shipping);
                return response()->json($response, 200);
            } else {
                return response()->json(['message' => "Not found shipping for this user"], 404);
            }
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
            if (Auth::user()->id == $shipping->user_id) {
                $response["data"] = $this->responseShipping($shipping);
                return response()->json($response, 200);
            } else {
                return response()->json(['message' => "Not found shipping for this user"], 404);
            }
        } else {
            return response()->json(['message' => "Shipping not found"], 404);
        }
    }

    /**
     * Set Shipping States
     *
     * @return Response
     */
    public function setShippingStates(Request $request) {
        $shipping = Shipping::find($request->id);
        $states = $request->states;
        if ($shipping) {
            if (Auth::user()->id == $shipping->user_id) {
                $statesArray = array(3, 4, 5);
                if (in_array($states, $statesArray)) {
                    $shipping->states = $states;
                    $shipping->save();

                    //Historic
                    $shippingStatesHistory = new ShippingStatesHistory();
                    $shippingStatesHistory->shipping_id = $shipping->id;
                    $shippingStatesHistory->state_id = $states;

                    $shippingStatesHistory->save();

                    //Send mail
                    $this->sendShippingMail($shipping);

                    return response()->json(['message' => "Shipping States Changed"], 200);
                } else {
                    return response()->json(['message' => "States incorrect"], 502);
                }
            } else {
                return response()->json(['message' => "Not found shipping for this user"], 404);
            }
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
            if (Auth::user()->id == $shipping->user_id) {
                //Carrer de valencia, 359 barcelona, barcelona, 08013 españa
                $response["data"]["destination"] = $shipping->address . " " . $shipping->city . "," . $shipping->state . "," . $shipping->city . " " . $shipping->country;
            } else {
                return response()->json(['message' => "Not found shipping for this user"], 404);
            }
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
            'states' => (int) $shipping->states,
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

    private function sendShippingMail($shipping) {

        $stringState = "";

        switch ($shipping->states) {
            case 1:
                $stringState = "En la oficina Central";
                break;
            case 2:
                $stringState = "En transit";
                break;
            case 3:
                $stringState = "Entregat";
                break;
            case 4:
                $stringState = "Usuari no trobat";
                break;
            case 5:
                $stringState = "Direcció erronea";
                break;
        }


        $data = [
            'date' => $shipping->delivery_date,
            'code' => $shipping->code,
            'number' => $shipping->number,
            'weight' => $shipping->weight,
            'state' => $stringState,
            'email' => $shipping->email,
        ];

        \Mail::send('emails.notificationSend', $data, function ($message) use ($data) {
            $message->to($data["email"])->subject("Nou estat de l'enviament: " . $data["code"]);
        });

        return "Se envío el email";
    }

}
