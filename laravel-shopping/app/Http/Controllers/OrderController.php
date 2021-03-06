<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Statistical;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\CategoryPost;
use App\Models\Brand;
use Carbon\Carbon;
use PDF;
use DB;
use Session;
use App\Models\Slider;
session_start();
class OrderController extends Controller
{
    public function manage_order(){
        $order = Order::orderBy('order_id','desc')->get();
        return view('admin.manage_order')->with(compact('order'));
    }
    
    public function view_order($order_code){
		$order_details = OrderDetails::with('product')->where('order_code',$order_code)->paginate(10);
		$order = Order::where('order_code',$order_code)->get();
		foreach($order as $key => $ord){
			$customer_id = $ord->customer_id;
			$shipping_id = $ord->shipping_id;
			$order_status = $ord->order_status;
		}
		$customer = Customer::where('customer_id',$customer_id)->first();
		$shipping = Shipping::where('shipping_id',$shipping_id)->first();

		$order_details_product = OrderDetails::with('product')->where('order_code', $order_code)->get();
		foreach($order_details_product as $key => $order_d){
			$product_coupon = $order_d->product_coupon;
		}
		if($product_coupon != 'no'){
			$coupon = Coupon::where('coupon_code',$product_coupon)->first();
			$coupon_option = $coupon['coupon_option'];
			$coupon_value = $coupon['coupon_value'];
		}else{
			$coupon_option = 1;
			$coupon_value = 0;
		}
		// dd($order_details_product);
		return view('admin.view_order')->with(compact('order_details','customer','shipping','order_details_product','coupon_option','coupon_value','order','order_status'));

	}
    public function print_order($checkout_code){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->LoadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }
    public function print_order_convert($checkout_code){
        $order_details = OrderDetails::with('product')->where('order_code',$checkout_code)->get();
        $order = Order::where('order_code',$checkout_code)->get();
        foreach($order as $key => $order){
            $customer_id = $order->customer_id;
            $shipping_id = $order->shipping_id;
        }
        $customer = Customer::where('customer_id',$customer_id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();
        $order_details_product = OrderDetails::with('product')->where('order_code',$checkout_code)->get();
        foreach($order_details_product as $key => $order_d){

			$product_coupon = $order_d->product_coupon;
		}
		if($product_coupon != 'no'){
            $coupon = Coupon::where('coupon_code',$product_coupon)->first();
			$coupon_option = $coupon['coupon_option'];
			$coupon_value = $coupon['coupon_value'];
            if($coupon_option == 0){
                $coupon_echo = $coupon_value.'%';
            }else{
                $coupon_echo = number_format($coupon_value,0,',','.').'VN??';
            }
		}else{
			$coupon_option = 1;
            $coupon_value = 0;
            $coupon_echo= '';
		}
        $output = '';

		$output.='<style>body{
			font-family: DejaVu Sans;
		}
		.table-styling{
			border:1px solid #000;
		}
		.table-styling tbody tr td{
			border:1px solid #000;
		}
		</style>
		<h1><center>C??ng ty B???ng ch??? c??i VN</center></h1>
		<h3><center>????n ?????t h??ng</center></h3>
		<p>Ng?????i ?????t h??ng</p>
		<table class="table-styling">
				<thead>
					<tr>
						<th>T??n kh??ch ?????t</th>
						<th>S??? ??i???n tho???i</th>
						<th>?????a ch???</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>';
				
		$output.='		
					<tr>
						<td>'.$customer->customer_name.'</td>
						<td>'.$customer->customer_phone.'</td>
						<td>'.$customer->customer_address.'</td>
						<td>'.$customer->customer_email.'</td>
						
					</tr>';
				

		$output.='				
				</tbody>
			
		</table>

		<p>Th??ng tin v???n chuy???n</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>T??n ng?????i v???n chuy???n</th>
						<th>Ghi ch??</th>
					</tr>
				</thead>
				<tbody>';
				
		$output.='		
					<tr>
						<td>'.$shipping->shipping_name.'</td>
						<td>'.$shipping->shipping_note.'</td>											
					</tr>';
				
		$output.='				
				</tbody>
			
		</table>

		<p>Th??ng tin s???n ph???m b???n ?????t mua</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>T??n s???n ph???m</th>
						<th>M?? gi???m gi??</th>
						<th>Ph?? ship</th>
						<th>S??? l?????ng</th>
						<th>Gi?? s???n ph???m</th>
						<th>Th??nh ti???n</th>
					</tr>
				</thead>
				<tbody>';
			
				$total = 0;

				foreach($order_details_product as $key => $product){

					$subtotal = $product->product_price*$product->product_sales_quantity;
					$total+=$subtotal;

					if($product->product_coupon!='no'){
						$product_coupon = $product->product_coupon;
					}else{
						$product_coupon = 'kh??ng m??';
					}		

		$output.='		
					<tr>
						<td>'.$product->product_name.'</td>
						<td>'.$product_coupon.'</td>
						<td>'.number_format($product->product_feeship,0,',','.').'VN??'.'</td>
						<td>'.$product->product_sales_quantity.'</td>
						<td>'.number_format($product->product_price,0,',','.').'VN??'.'</td>
						<td>'.number_format($subtotal,0,',','.').'VN??'.'</td>
						
					</tr>';
				}

				if($coupon_option==0){
					$total_after_coupon = ($total*$coupon_value)/100;
	                $total_coupon = $total - $total_after_coupon;
				}else{
                  	$total_coupon = $total - $coupon_value;
				}

		$output.= '<tr>
				<td colspan="2">
					<p>T???ng gi???m: '.$coupon_echo.'</p>
					<p>Ph?? ship: '.number_format($product->product_feeship,0,',','.').'VN??'.'</p>
					<p>Thanh to??n : '.number_format($total_coupon + $product->product_feeship,0,',','.').'VN??'.'</p>
				</td>
		</tr>';
		$output.='				
				</tbody>
			
		</table>
				<p>M???i qu?? kh??ch h??ng ?????c k??? c??c th??ng tin ????? x??c nh???n ????ng ch??nh x??c v?? k?? nh???n, ch??ng t??i c???m ??n s??? ???ng h??? c???a qu?? kh??ch !</p> 
			<table>
				<thead>
					<tr>
						<th width="200px">Ng?????i l???p phi???u</th>
						<th width="800px">Ng?????i nh???n</th>
						
					</tr>
				</thead>
				<tbody>';
						
		$output.='				
				</tbody>
			
		</table>

		';

		return $output;

    }

    public function update_order_qty(Request $request){
        $data = $request->all();
        $order = Order::find($data['order_id']);
		$order->order_status = $data['order_status'];
		$order_date = $order->order_date;
		$statistical = Statistical::where('order_date',$order_date)->get();
		$order->save();
		
		if($statistical){
			$statistical_count = $statistical->count();
		}else{
			$statistical_count = 0;
		}
        
        if($order->order_status==3){
			$total_order = 0;
			$sales= 0;
			$profit = 0;
			$quantity = 0;
			foreach($data['order_product_id'] as $key => $product_id){
				
				$product = Product::find($product_id);
				$product_quantity = $product->product_quantity;
				$product_sold = $product->product_sold;
				$product_price = $product->product_price;
				$product_cost = $product->price_cost;
				$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
				foreach($data['quantity'] as $key2 => $qty){
						if($key==$key2){
								$pro_remain = $product_quantity - $qty;
								$product->product_quantity = $pro_remain;
								$product->product_sold = $product_sold + $qty;
								$product->save();
								//C???p nh???t doanh thu
								$quantity+=$qty;
								$total_order+=1;
								$sales+=$product_price*$qty;
								$profit = $sales-($product_cost*$qty);
						}
				    }
                }
				if($statistical_count>0){
					$statistical_update = Statistical::where('order_date',$order_date)->first();
					$statistical_update->sales = $statistical_update->sales + $sales;
					$statistical_update->profit = $statistical_update->profit + $profit;
					$statistical_update->quantity = $statistical_update->quantity + $quantity;
					$statistical_update->total_order = $statistical_update->total_order + $total_order;
					$statistical_update->save();
				}else{
					$statistical_new = new Statistical();
					$statistical_new->order_date = $order_date;
					$statistical_new->sales = $sales;
					$statistical_new->profit = $profit;
					$statistical_new->quantity = $quantity;
					$statistical_new->total_order = $total_order;
					$statistical_new->save();
				}
			}
        }

        public function update_qty(Request $request){
            $data = $request->all();
            $order_details = OrderDetails::where('product_id',$data['order_product_id'])
            ->where('order_code',$data['order_code'])->first();
            $order_details->product_sales_quantity = $data['order_qty'];
            $order_details->save();
		}
	public function history_order(){
		if(!Session::get('customer_id')){
			return redirect('login')->with('error','Vui l??ng ????ng nh???p ????? xem l???ch s??? mua h??ng');
		}else{
			$category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
			$slider = Slider::orderBy('slider_id','desc')->where('slider_status','1')->take(4)->get();
			
			$brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
			$getorder = Order::where('customer_id',Session::get('customer_id'))->orderBy('order_id','desc')->paginate(10);
			return view('pages.order.history_order')
        	->with('brand',$brand_product)
        	->with('slider',$slider)->with('category_post',$category_post)
        	->with('getorder',$getorder);
		}
	}
	public function view_history_order(Request $request, $order_code){
		if(!Session::get('customer_id')){
			return redirect('login')->with('error','Vui l??ng ????ng nh???p ????? xem l???ch s??? mua h??ng');
		}else{
			$category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
			$slider = Slider::orderBy('slider_id','desc')->where('slider_status','1')->take(4)->get();
			
			$brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
			
			//Xem lich su don h??ng
			$order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
			$order = Order::where('order_code',$order_code)->get();
			foreach($order as $key => $order){

				$customer_id = $order->customer_id;
				$shipping_id = $order->shipping_id;
				$order_status = $order->order_status;
			}
			
			$customer = Customer::where('customer_id',$customer_id)->first();
			$shipping = Shipping::where('shipping_id',$shipping_id)->first();

			$order_details_product = OrderDetails::with('product')->where('order_code', $order_code)->get();
			foreach($order_details_product as $key => $order_d){
				$product_coupon = $order_d->product_coupon;
			}
			if($product_coupon != 'no'){
				$coupon = Coupon::where('coupon_code',$product_coupon)->first();
				$coupon_option = $coupon['coupon_option'];
				$coupon_value = $coupon['coupon_value'];
			}else{
				$coupon_option = 1;
				$coupon_value = 0;
			}
			return view('pages.order.view_history_order')
        	->with('brand',$brand_product)->with('slider',$slider)->with('category_post',$category_post)
			->with('order_details',$order_details)->with('customer',$customer)
			->with('shipping',$shipping)->with('order_details_product',$order_details_product)
			->with('coupon_option',$coupon_option)->with('coupon_value',$coupon_value)
			->with('order',$order)->with('order_status',$order_status);
		}
	}
}
