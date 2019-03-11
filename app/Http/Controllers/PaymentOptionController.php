<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use App\BankBenefit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentOptionController extends Controller
{

    public function index()
    {

           $array_payment_options = array();
           $payment_options = PaymentMethod::all();


            for ($po = 0; $po < sizeof($payment_options); $po++) {
                

                $bank_benefits = BankBenefit::where('payment_method_id', $payment_options[$po]->id)->get();


                $bank_benefits = DB::table('bank_benefits')
                    ->join('banks','bank_benefits.bank_id','=','banks.id')
                    ->where('payment_method_id', $payment_options[$po]->id)
                    ->select('bank_benefits.id',
                            'bank_benefits.bank_id',
                            'bank_benefits.payment_method_id',
                            'bank_benefits.quotes',
                            'bank_benefits.interest',
                            'banks.name AS bank_name')
                    ->orderBy('bank_id')
                    ->get();



                if (sizeof($bank_benefits) > 0) {

                  
                    // info('sizeof($bank_benefits)');
                    // info(sizeof($bank_benefits));

                    // for ($i = 0; $i < sizeof($bank_benefits); $i++) {
                    //    info($bank_benefits[$i]->bank_id); 
                    //    info($bank_benefits[$i]->payment_method_id); 
                    //    info($bank_benefits[$i]->quotes); 
                    //    info($bank_benefits[$i]->interest); 
                    //      info('---------------------: ');

                    // }
                    
                    $banks_array = array();
                    $bank_benefits_array = array();

                    $bank_ant = $bank_benefits[0]->bank_id;
                    $bank_ant_name = $bank_benefits[0]->bank_name;

                    $bank_benefits_array[] = new CBankBenefit($bank_benefits[0]->id, $bank_benefits[0]->bank_id, $bank_benefits[0]->payment_method_id, $bank_benefits[0]->quotes, $bank_benefits[0]->interest);

                    if (sizeof($bank_benefits) > 1) {

                        for ($bb = 1; $bb < sizeof($bank_benefits); $bb++) {

                         // info('-------- entra en el loop -------------: ');
                         // info($bb);     
                         

                            if ($bank_benefits[$bb]->bank_id == $bank_ant) {

                                $flag = 1;
                                
                                $bank_benefits_array[] = new CBankBenefit($bank_benefits[$bb]->id, $bank_benefits[$bb]->bank_id, $bank_benefits[$bb]->payment_method_id, $bank_benefits[$bb]->quotes, $bank_benefits[$bb]->interest);

                            } else {
                                
                                $flag = 2;

                                $banks_array[] = new CBank($bank_ant, $bank_ant_name, $bank_benefits_array);

                                $bank_ant = $bank_benefits[$bb]->bank_id;
                                $bank_ant_name = $bank_benefits[$bb]->bank_name;
                                $bank_benefits_array = array();
                                $bank_benefits_array[] = new CBankBenefit($bank_benefits[$bb]->id, $bank_benefits[$bb]->bank_id, $bank_benefits[$bb]->payment_method_id, $bank_benefits[$bb]->quotes, $bank_benefits[$bb]->interest);
                            }

                        }

                        if ($flag == 1) {

                            $banks_array[] = new CBank($bank_ant, $bank_ant_name, $bank_benefits_array); 
                            // info("------PASA POR EL FLAAAAAAGGGGGG------");

                            // info('bank_ant');
                            // info($bank_ant);
                            // info('----------');

                            // info('bank_ant_name');
                            // info($bank_ant_name);
                            // info('----------');

                            // info('bank_benefits_array');
                            // info($bank_benefits_array);
                            // info('----------');

                            // info("------TEMRINA EL FLAAAAAAGGGGGG------");                           
                           
                        }



                    } else {


                        $banks_array[] = new CBank($bank_benefits[0]->bank_id, $bank_benefits[0]->bank_name, $bank_benefits_array);
                    }



                    


                }

                $array_payment_options[] = new CPaymentOption($payment_options[$po]->id, $payment_options[$po]->name, $banks_array);

            }

           // 


           return json_encode($array_payment_options);
           
       
    }

 
}


class CPaymentOption {

    public $payment_method_id;
    public $is_active;
    public $name;
    public $banks;

    public function __construct($payment_method_id, $name, $banks) {

        $this->payment_method_id = $payment_method_id;
        $this->name = $name;
        $this->banks = $banks;
        $this->is_active = 0;

    }
}

class CBank {

    public $bank_id;
    public $bank_name;
    public $bank_benefits;

    public function __construct($bank_id, $bank_name, $bank_benefits) {

        $this->bank_id = $bank_id;
        $this->bank_name = $bank_name;
        $this->bank_benefits = $bank_benefits;

    }
}


class CBankBenefit {

    public $bank_benefit_id;
    public $quotes;
    public $interest;

    public function __construct($bank_benefit_id, $bank_id, $payment_method_id, $quotes, $interest) {

        $this->bank_benefit_id = $bank_benefit_id;
        $this->bank_id = $bank_id;
        $this->payment_method_id = $payment_method_id;
        $this->quotes = $quotes;
        $this->interest = $interest;

    }
}
