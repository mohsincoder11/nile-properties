<?php

namespace App\Http\Controllers\panel;

use App\Models\City;
use App\Models\Occupation;
use App\Models\OtherCharges;
use App\Models\TokenStatus;
use Illuminate\Http\Request;
use App\Models\LayoutFeature;
use App\Models\WhatsappModel;
use App\Models\PlotSaleStatus;
use App\Models\TransactionType;
use App\Http\Controllers\Controller;

class MasterController extends Controller
{
    public function login_index_get()
    {
        return view('panel.login_index');
    }

    public function login_index()
    {
        return view('panel.login_index');
    }
    public function index()
    {

        $whatsapp = WhatsappModel::first();

        $city = City::all();
        $other = OtherCharges::all();

        $token = TokenStatus::all();

        $occupation = Occupation::all();
        $layout = LayoutFeature::all();
        $plot = PlotSaleStatus::all();
        $transaction = TransactionType::all();
        return view('panel.city_master', [
            'city' => $city,
            'token' => $token,
            'occupation' => $occupation,
            'layout' => $layout,
            'plot' => $plot,
            'transaction' => $transaction,
            'whatsapp' => $whatsapp,
            'other' => $other,



        ]);
    }


    // store

    public function city_store(Request $request)
    {

        $request->validate([
            'city' => 'required',
        ]);
        $data = [
            'city' => $request->input('city'),
        ];

        $city = City::create($data);

        return redirect(route('city_master'))->with('success', 'City Added Successfully');
        // return redirect()->route('city_master')->with('success', 'City Added Successfully');
    }

    public function other_charges_store(Request $request)
    {

        $request->validate([
            'other_charges' => 'required',
        ]);
        $data = [
            'other_charges' => $request->input('other_charges'),
        ];

        $city = OtherCharges::create($data);

        return redirect(route('city_master'))->with('success', 'Other Charges Added Successfully');
        // return redirect()->route('city_master')->with('success', 'City Added Successfully');
    }


    public function token_store(Request $request)
    {

        $request->validate([
            'token' => 'required',
        ]);
        $data = [
            'token' => $request->input('token'),
        ];

        $token = TokenStatus::create($data);

        return redirect(route('city_master'))->with('success', 'Token Added Successfully');
        // return redirect()->route('city_master')->with('success', 'City Added Successfully');
    }


    //destroy
    public function city_destroy($id)
    {
        $city = City::find($id);
        if ($city) {
            $city->delete();
            return redirect(route('city_master'))->with('success', 'City Deleted Successfully');
        } else {
            return redirect(route('city_master'))->with('error', 'City not found');

        }
    }

    public function other_charges_destroy($id)
    {
        $city = OtherCharges::find($id);
        if ($city) {
            $city->delete();
            return redirect(route('city_master'))->with('success', 'Other Charges Deleted Successfully');
        } else {
            return redirect(route('city_master'))->with('error', 'Other Charges found');

        }
    }

    public function token_destroy($id)
    {
        $token = TokenStatus::find($id);
        if ($token) {
            $token->delete();
            return redirect(route('city_master'))->with('success', 'Token Deleted Successfully');
        } else {
            return redirect(route('city_master'))->with('error', 'token not found');

        }
    }

    //edit

    public function edit_city($id)
    {
        $city = City::find($id);

        if (!$city) {
            return response()->json([
                'status' => 404,
                'message' => 'City not found',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'city' => $city,
        ]);
    }

    public function edit_other_charges($id)
    {
        $city = OtherCharges::find($id);
        //  dd($city);
        if (!$city) {
            return response()->json([
                'status' => 404,
                'message' => 'Other Charges not found',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'city' => $city,
        ]);
    }

    public function edit_token($id)
    {
        $token = TokenStatus::find($id);

        if (!$token) {
            return response()->json([
                'status' => 404,
                'message' => 'token not found',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'token' => $token,
        ]);
    }

    //update

    public function update_city(Request $request)
    {
        $city_id = $request->input('city_id');
        $city = City::find($city_id);
        $city->city = $request->input('city');
        $city->update();
        return redirect()->back()->with('success', 'City Updated Successfully');
    }
    public function update_other_charges(Request $request)
    {
        //    dd($request->all());

        $city_id = $request->input('other_charges_id');
        $city = OtherCharges::find($city_id);
        $city->other_charges = $request->input('other_charges');
        $city->update();
        return redirect()->back()->with('success', 'Other Charges Updated Successfully');
    }



    public function update_token(Request $request)
    {
        $token_id = $request->input('token_id');
        $token = TokenStatus::find($token_id);
        $token->token = $request->input('token');
        $token->update();
        return redirect()->back()->with('success', 'Token Updated Successfully');
    }

    //OCCUPATION

    public function occupation_store(Request $request)
    {
        $occupation = new Occupation([
            'occupation' => $request->input('occupation'),
        ]);

        $occupation->save();
        return redirect()->route('city_master')->with('success', 'Occupation Added Successfully');
    }



    //edit

    // public function edit_occupation($id)
// {
//     $occupation = Occupation::find($id);

    //     if (!$occupation) {
//         return response()->json([
//             'status' => 404,
//             'message' => 'City not found',
//         ], 404);
//     }

    //     return response()->json([
//         'status' => 200,
//         'city' => $city,
//     ]);
// }


    //update

    public function update_occupation(Request $request)
    {
        $occupation_id = $request->input('occupation_id');
        $occupation = Occupation::find($occupation_id);
        //  dump($occupation);
        $occupation->occupation = $request->input('occupation');
        $occupation->update();
        return redirect()->back()->with('success', 'Occupation Updated Successfully');
    }

    //destroy

    public function occupation_destroy($id)
    {
        $occupation = Occupation::find($id);
        if ($occupation) {
            $occupation->delete();

            return redirect(route('city_master'))->with('success', 'Occupation Deleted Successfully');
        } else {
            return redirect(route('city_master'))->with('error', 'Occupation Not Found');
        }
    }


    // LAYOUT FEATURE

    public function layout_feature_store(Request $request)
    {
        $layout_feature = new LayoutFeature([
            'layout_feature' => $request->input('layout_feature'),
        ]);

        $layout_feature->save();
        return redirect()->route('city_master')->with('success', 'Layout Feature Added Successfully');
    }



    //edit

    public function edit_layout($id)
    {
        $layout_feature = LayoutFeature::find($id);

        if (!$layout_feature) {
            return response()->json([
                'status' => 404,
                'message' => 'Layout not found',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'layout_feature' => $layout_feature,
        ]);
    }


    //update

    public function update_layout(Request $request)
    {
        $layout_id = $request->input('layout_id');
        $layout_feature = LayoutFeature::find($layout_id);
        //  dump($occupation);
        $layout_feature->layout_feature = $request->input('layout_feature');
        $layout_feature->update();
        return redirect()->back()->with('success', 'Layout Feature Updated Successfully');
    }


    public function layout_destroy($id)
    {
        $layout = LayoutFeature::find($id);
        if ($layout) {
            $layout->delete();

            return redirect(route('city_master'))->with('success', 'Layout Feature Deleted Successfully');
        } else {
            return redirect(route('city_master'))->with('error', 'Layout Feature Not Found');
        }
    }



    // PLOT SALE STATUS

    //store

    public function plot_sale_status_store(Request $request)
    {
        $plot_sale_status = new PlotSaleStatus([
            'plot_sale_status' => $request->input('plot_sale_status'),
        ]);
        $plot_sale_status->save();

        return redirect()->route('city_master')->with('success', 'Plot Sale Status Added Successfully');
    }


    //update

    public function update_plot(Request $request)
    {
        $plot_id = $request->input('plot_id');
        $plot_sale_status = PlotSaleStatus::find($plot_id);

        if (!$plot_sale_status) {
            return redirect()->back()->with('error', 'Plot Status not found');
        }

        $plot_sale_status->plot_sale_status = $request->input('plot_sale_status');
        $plot_sale_status->update();

        return redirect()->back()->with('success', 'Plot Status Updated Successfully');
    }


    // delete

    public function plot_destroy($id)
    {
        $plot = PlotSaleStatus::find($id);
        if ($plot) {
            $plot->delete();

            return redirect(route('city_master'))->with('success', 'Plot Sale Status Deleted Successfully');
        } else {
            return redirect(route('city_master'))->with('error', 'Plot Sale Status Not Found');
        }
    }


    // TRANSACTION

    //store
    public function transaction_type_store(Request $request)
    {
        $transaction_type = new TransactionType([
            'transaction_type' => $request->input('transaction_type'),
        ]);

        $transaction_type->save();
        return redirect()->route('city_master')->with('success', 'Transaction Type Added Successfully');

    }


    //update

    public function update_transaction(Request $request)
    {

        // dd($request->all());
        $transaction_id = $request->input('transaction_id');
        $transaction_type = TransactionType::find($transaction_id);
        if (!$transaction_type) {
            return redirect()->back()->with('error', 'Transaction Type not found');
        }
        $transaction_type->transaction_type = $request->input('transaction_type');
        $transaction_type->update();
        return redirect()->back()->with('success', 'Transaction Type Updated Successfully');
    }


    //delete

    public function transaction_destroy($id)
    {
        $transaction = TransactionType::find($id);
        if ($transaction) {
            $transaction->delete();

            return redirect(route('city_master'))->with('success', 'Transaction Deleted Successfully');
        } else {
            return redirect(route('city_master'))->with('error', 'Transaction Not Found');
        }
    }





    public function update_whatsapp(Request $request)
    {
        // Retrieve the WhatsApp number from the request
        $whatsapp_number = $request->input('number');

        // Find the first record in the WhatsAppModel
        $whatsapp = WhatsAppModel::first();

        if ($whatsapp) {
            // Update the WhatsApp number
            $whatsapp->number = $whatsapp_number;
            $whatsapp->save();

            // Return a success message
            return redirect()->back()->with('success', 'WhatsApp number updated successfully!');
        } else {
            // If no record found, return an error message
            return redirect()->back()->with('error', 'No WhatsApp number found!');
        }
    }


}