<?php

namespace App\Http\Controllers\config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuration;

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
            'isStop' => '',
            'stopon' => '',
            'buy_unit' => 'required',
            'exp_sl' => 'required',
            'exp_tp' => 'required',
            'rsi_buy' => 'required',
            'rsi_sell' => 'required',
            'new_trade_wait_time' => 'required',
            'isStopLossHandle' => '',
        ]);
        if (request('isStop') === 'on') {
            $validatedData['isStop'] = true;
        }
        if (request('isStopLossHandle') === 'on') {
            $validatedData['isStopLossHandle'] = true;
        }
        // dd($validatedData);
        $show = Configuration::create($validatedData);
        //dd($show);
   
        return redirect('/config/configList')->with('success', 'Configuration is successfully saved');
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
            'isStop' => 'required',
            'stopon' => 'required',
        ]);
    //  dd($validatedData);
        if (request('isStop') === 'on') {
            $validatedData['isStop'] = true;
        }
          Configuration::find($id)->update($validatedData);
        //   dd($validatedData);

        return redirect('/config/configList')->with('success', 'Configuration successfully updated');
    }

    public function deleteConfig($id)
    {
        $configuration = Configuration::findOrFail($id);
        $configuration->delete();

        return redirect('/config/configList')->with('success', ' Configuration Data is successfully deleted');
    }
}
