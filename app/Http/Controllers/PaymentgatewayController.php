<?php
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use App\Models\PaymentDetails;
use App\Models\User;
class PaymentgatewayController extends Controller
{
    public function orderGenerate(Request $request)
    {
       
        $api = new Api(Config("values.razorpayKey"), Config("values.razorpaySecret"));
        $orderData  = $api->order->create([
            'receipt' => '111',
            'amount' => $request->price * 100,
            'currency' => 'INR'
        ]); // Creates Razorpay order

        $data = [
            "key"               => Config("values.razorpayKey"),
            "amount"            => $request->price,
            "order_id"          => $orderData['id'],
        ];
        $user = Auth::user();
        $payment =  new PaymentDetails();
        $payment->user_id = $user->id;
        $payment->price = $request->price;
        $payment->razorpay_order_id = $orderData['id'];
        $payment->save();
        return response()->json($data, 200);
    }

    function verify(Request $request)
    {
        $success = true;
        $error = "Payment Failed!";

        if (empty($request->razorpay_payment_id) === false) {
            $api = new Api(Config("values.razorpayKey"), Config("values.razorpaySecret"));
            try {
                $attributes = [
                    'razorpay_order_id' => $request->razorpay_order_id,
                    'razorpay_payment_id' => $request->razorpay_payment_id,
                    'razorpay_signature' => $request->razorpay_signature
                ];
                $api->utility->verifyPaymentSignature($attributes);
            } catch (SignatureVerificationError $e) {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
        }

        if ($success === true) {
            // Update database with success data
            // Redirect to success page
            return response()->json(['msg' => 'Payment Successfuly'], 200);
        } else {
            // Update database with error data
            // Redirect to payment page with error
            // Pass $error along with route
            return response()->json(['msg' => 'Field Successfuly'], 400);
        }
    }

    function savePayment(Request $request){
     
        try{
        $user = Auth::user();
        $payment =  new PaymentDetails();
        $payment->type = 'verified';
        $payment->user_id = $user->id;
        $payment->price = 500;
        $payment->razorpay_order_id = $request->orderId;
        $payment->razorpay_payment_id = $request->paymentId;
        $payment->razorpay_signature = $request->sign;
        $payment->save();
        $updateUser = User::where('id',$user->id)->first();
        $updateUser->user_verified = true;
        $updateUser->save();
        return response()->json(['msg' => 'Payment Successfuly'], 200);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400); 
        }
    }
}