<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function delivery(Request $request){
        $city = City::orderBy('matp','ASC')->get();
        return view('admin.delivery.add_delivery')->with(compact('city'));
    }
    public function select_delivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output='';
            if($data['action']=='city'){
                $select_province = Province::where('matp',$data['ma_id'])->orderBy('maqh','asc')->get();
                $output.= '<option>---Chọn quận huyện---</option>';
                foreach($select_province as $key => $province){
                $output.= '<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }
            }else{
                $select_wards = Wards::where('maqh',$data['ma_id'])->orderBy('xaid','asc')->get();
                $output.= '<option>---Chọn xã phường---</option>';
                foreach($select_wards as $key => $ward){
                $output.= '<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
        }
        echo $output;
    }
    public function add_delivery(Request $request){
        $data = $request->all();
        $fee_ship = new Feeship();
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_xaid = $data['wards'];
        $fee_ship->fee_feeship = $data['fee_ship'];
        $fee_ship->save();
    }
    public function select_feeship(){
        $fee_ship = Feeship::orderBy('fee_id','desc')->get();
        $output = '';
        $output .= '<div class="table-reponsive">
        <table class ="table table-bordered">
            <thread>
                <tr>
                    <th>Tỉnh - Thành phố</th>
                    <th>Quận - Huyện</th>
                    <th>Xã phường - TT</th>
                    <th>Tiền phí</th>
                </tr>
            </thread>
            <tbody>
            ';
            foreach($fee_ship as $key => $fee){
            $output .='
                <tr>
                    <td>'.$fee->city->name_city.'</td>
                    <td>'.$fee->province->name_quanhuyen.'</td>
                    <td>'.$fee->wards->name_xaphuong.'</td>
                    <td contenteditable data-feeship_id="'.$fee->fee_id.'" class="fee_feeship_edit">'.number_format($fee->fee_feeship,0,',','.').'</td>
                </tr>
                ';
            }
           $output .= '
           </tbody>
           </table>
           </div>
           '; 
            echo $output; 
    }
    public function update_delivery(Request $request){
        $data = $request->all();
        $fee_ship = Feeship::find($data['feeship_id']);
        $fee_value = rtrim($data['fee_value'],'.');
        $fee_ship->fee_feeship = $fee_value;
        $fee_ship->save();
    }

    public function select_delivery_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output='';
            if($data['action']=='city'){
                $select_province = Province::where('matp',$data['ma_id'])->orderBy('maqh','asc')->get();
                $output.= '<option>---Chọn quận huyện---</option>';
                foreach($select_province as $key => $province){
                $output.= '<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }
            }else{
                $select_wards = Wards::where('maqh',$data['ma_id'])->orderBy('xaid','asc')->get();
                $output.= '<option>---Chọn xã phường---</option>';
                foreach($select_wards as $key => $ward){
                $output.= '<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
        }
        echo $output;
    }

    public function caculate_fee(Request $request){
        $data = $request->all();
        if($data['matp']){
            $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])
            ->where('fee_xaid',$data['xaid'])->get();
            if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship>0){
                    foreach($feeship as $key => $fee){
                        Session::put('fee',$fee->fee_feeship);
                        Session::save();
                }
            }else{
                    Session::put('fee',10000);
                    Session::save();
                }
            }
        }
    }
}
