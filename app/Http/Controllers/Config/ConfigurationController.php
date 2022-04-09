<?php

namespace App\Http\Controllers\config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuration;
use Mail;

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
            'price' => 'required',
            'tp' => 'required',
            'sl' => 'required',
            'isStop' => 'required',
            'stopon' => 'required',
            'buy_unit' => 'required',
            'exp_sl' => 'required',
            'exp_tp' => 'required',
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
        $validatedData = $request->validate([
            'cofigame' => 'required',
            'price' => 'required',
            'tp' => 'required',
            'sl' => 'required',
            'isStop' => '',
            'stopon' => 'required',
            'buy_unit' => 'required',
            'exp_sl' => 'required',
            'exp_tp' => 'required',
            'rsi_buy' => 'required',
            'rsi_sell' => 'required',
            'new_trade_wait_time' => 'required',
            'isStopLossHandle' => '',
        ]);
            $validatedData['isStop'] = (request('isStop') === 'on');

            $validatedData['isStopLossHandle'] = (request('isStopLossHandle') === 'on');
            
          Configuration::find($id)->update($validatedData);
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
}
