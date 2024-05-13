<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ATM;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    ////////////////////* ATM All Method *////////////////////
    public function AllATM(){

        $atms = ATM::latest()->get();
        return view('backend.ticket.atm.all_atm',compact('atms'));

    } //End Method

    public function StoreATM(Request $request){

        $request->validate([
          'name' => 'required|max:200',
          'model' => 'required|max:200',
          'classification' => 'required|max:200',
          'type' => 'required|max:200',
          'category' => 'required|max:200',
          'address' => 'required|max:200',
          'city' => 'required|max:200'
        ]);

        ATM::insert([
          'name' => $request->name,
          'model' => $request->model,
          'classification' => $request->classification,
          'type' => $request->type,
          'category' => $request->category,
          'address' => $request->address,
          'city' => $request->city,
        ]);
        $notification = array(
          'message' => 'ATM Created Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.atms')->with($notification);

      } //End Method

      public function EditATM($id){

        $atms = ATM::findOrFail($id);
        return view('backend.ticket.atm.edit_atm',compact('atms'));

    }// End MEthod

    public function UpdateATM(Request $request){

        $atmid = $request->id;

        ATM::findOrFail($atmid)->update([
            'name' => $request->name,
            'model' => $request->model,
            'classification' => $request->classification,
            'type' => $request->type,
            'category' => $request->category,
            'address' => $request->address,
            'city' => $request->city,
        ]);
        $notification = array(
          'message' => 'ATM Info Updated Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.atms')->with($notification);

      } //End Method

      public function DeleteATM($id){

        ATM::findOrFail($id)->delete();

        $notification = array(
            'message' => 'This ATM Was Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
      }//End Method



    ////////////////////* Ticket All Method *////////////////////
    public function AllTicket(){

        $tickets = Ticket::latest()->get();
        $atms = ATM::all();
        $users = User::all();

        $combine_array = [];

        foreach ($tickets as $ticket) {
            # code...
            $ticket["name_user"] = "";
            $ticket["name_service"] = "";
            foreach ($users as $user) {
                # code...
                if($ticket["users_id"] == $user["id"]){
                    $ticket["name_user"] = $user["name"];
                }
            }
            foreach ($atms as $atm) {
                # code...
                if($ticket["a_t_m_s_id"] == $atm["id"]){
                    $ticket["name_atm"] = $atm["name"];
                }
            }
            array_push($combine_array, $ticket);

        }

        return view('backend.ticket.allticket.all_ticket',compact('combine_array','atms','users'));

    } //End Method

    public function StoreTicket(Request $request){

        $request->validate([
          'a_t_m_s_id' => 'required',
          'source'=>'required',
          'phone'=>'required',
          'call_type'=>'required',
          'call_date'=>'required',
          'status' => 'required',
          'address'=>'required',
          'city'=>'required',
          'sub_call_type'=>'required',
          'diagnoise'=>'required',
          'vendor'=>'required',
          'users_id'=>'required',
        ]);

        Ticket::create([
          'a_t_m_s_id' => $request->a_t_m_s_id,
          'source' => $request->source,
          'phone' => $request->phone,
          'call_type' => $request->call_type,
          'call_date' => $request->call_date,
          'status' => $request->status,
          'address' => $request->address,
          'city' => $request->city,
          'sub_call_type' => $request->sub_call_type,
          'diagnoise' => $request->diagnoise,
          'vendor' => $request->vendor,
          'users_id' => $request->users_id,
        ]);
        $notification = array(
          'message' => 'Ticket Was Created Succesfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.tickets')->with($notification);

      } //End Method

      public function EditTicket($id){

        $tickets = Ticket::findOrFail($id);
        $atms = ATM::all();
        $users = User::all();

        return view('backend.ticket.allticket.edit_ticket',compact('tickets','atms','users'));

    }// End MEthod

    public function UpdateTicket(Request $request, $id){

        $tickets = Ticket::findOrFail($id);
        $tickets-> a_t_m_s_id =  $request->a_t_m_s_id;
        $tickets-> source =  $request->source;
        $tickets-> phone =  $request->phone;
        $tickets-> call_type =  $request->call_type;
        $tickets-> call_date =  $request->call_date;
        $tickets-> status =  $request->status;
        $tickets-> address =  $request->address;
        $tickets-> city =  $request->city;
        $tickets-> sub_call_type =  $request->sub_call_type;
        $tickets-> diagnoise =  $request->diagnoise;
        $tickets-> vendor =  $request->vendor;
        $tickets-> users_id =  $request->users_id;
        $tickets-> save();

        $notification = array(
            'message' => 'Ticket Updated Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.tickets')->with($notification);

    }//End Method

    public function DeleteTicket($id){

        Ticket::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Ticket Deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
      }//End Method



}
