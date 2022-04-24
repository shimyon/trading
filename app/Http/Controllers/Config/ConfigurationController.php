<?php

namespace App\Http\Controllers\config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuration;
use Mail;
use Illuminate\Support\Facades\DB;

class ConfigurationController extends Controller
{
    public function configList()
    {
        $configurations = Configuration::all(); 
        return view('config.configList',compact('configurations'));
    }

    public function configFormAdd()
    {
      return view('config.addConfig');
    }

    public function configFormStore(Request $request)
    {
        $validatedData = $request->validate([
            'cofigame' => 'required',
            'tp' => 'required',
            'sl' => 'required',
            'isStop' => 'required',
            'buy_unit' => 'required',
            'rsi_buy' => 'required',
            'rsi_sell' => 'required',
            'new_trade_wait_time' => 'required',
            'isStopLossHandle' => 'required',
        ]);
         //dd($validatedData);
        if (request('isStop') === 'on') {
            $validatedData['isStop'] = true;
        }
        if (request('isStopLossHandle') === 'on') {
            $validatedData['isStopLossHandle'] = true;
        }
        //   dd($validatedData);
        $show = Configuration::create($validatedData);
        //  dd($show);
   
        return redirect('/config/configList')->with('status', 'Configuration successfully created');
    }

    public function editconfig(Request $request,$id)
    {
        $configurations = Configuration::findOrFail($id);
        return view('config.editConfig',compact('configurations'));
    }

    public function configFormupdate(Request $request, $id)
    { 
        // dd($request);
        $validatedData = $request->validate([
            'cofigame' => 'required',
            'tp' => 'required',
            'sl' => 'required',
            'isStop' => '',
            'buy_unit' => 'required',
            'rsi_buy' => 'required',
            'rsi_sell' => 'required',
            'new_trade_wait_time' => 'required',
            'isStopLossHandle' => '',
        ]);
        // 
            $validatedData['isStop'] = (request('isStop') === 'on');

            $validatedData['isStopLossHandle'] = (request('isStopLossHandle') === 'on');
            
          Configuration::find($id)->update($validatedData);
        //   dd($validatedData);
          $maildata = array(
            'id' => $id,
            'cofigame' => $validatedData['cofigame'],
            'tp' => $validatedData['tp'],
            'sl' => $validatedData['sl'],
            'isStop' => $validatedData['isStop'],
        );
        Mail::send('mail', $maildata, function ($message) use (&$validatedData,&$id) {
            $message->to('shimyon@hotmail.com', "Configuration " . $id . " has been Changed.")
                ->subject("Configuration " .  $id . " has been Changed");
        });

        return redirect('/config/configList')->with('status', 'Configuration successfully updated');
    }

    public function deleteConfig($id)
    {
        $configuration = Configuration::findOrFail($id);
        $configuration->delete();

        return redirect('/config/configList')->with('status', ' Configuration successfully deleted');
    }

    public function changeStatus(Request $request)
    {
        $config = Configuration::find($request->id)->update(['isStop' => $request->isStop]);
        // return redirect('/config/configList')->with('status', 'Status changed successfully.');
        $getdata = Configuration::select('cofigame','tp','sl')->where('id',$request->id)->get(); 
        // dd($request);
         // dd($getdata);
        $maildata = array(
            'id' => $request['id'],
            'cofigame' => $getdata[0]['cofigame'],
            'tp' => $getdata[0]["tp"],
            'sl' => $getdata[0]['sl'],
            'isStop' => $request['isStop'],
        );
        //dd($maildata);
        Mail::send('mailchange', $maildata, function ($message) use (&$validatedData,&$id) {
            $message->to('shimyon@hotmail.com', "Configuration " . $id . " Status has been Changed.")
                ->subject("Configuration " .  $id . "  Status has been Changed");
        });
         return response()->json(['success'=>'Status changed successfully.']);
    }

}
