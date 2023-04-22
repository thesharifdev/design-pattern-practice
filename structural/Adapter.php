<?php

/**
 * The adapter design pattern is a structural pattern which allows object with incompatible interfaces to collaborate.
 * It involves creating an adapter class that acts as a bridget between two incompatible interfaces, allowing them to work together seamlessly
 */

 interface PaymentGatway
 {
    public function paymentProccessed();
 }

 class PaymentProcess
 {

    private $payment_gatway;

    public function __construct( PaymentGatway $pg )
    {
        $this->payment_gatway = $pg;
    }

    public function makePeyment()
    {
      return $this->payment_gatway->paymentProccessed();
    } 
 }

 class BikashPayment implements PaymentGatway
 {

   public function paymentProccessed()
   {
      return "Payment proccessed by Bikash";
   }
 }

 class StrpePayment
 {
   public function stripePayment($sid, $samount)
   {
      return "Payment procceesd by stripe id is {$sid} and the amount is {$samount}";
   }
 }

 class StrpeAdapter implements PaymentGatway
 {

   public function __construct($stp)
   {
      $this->stp = $stp;
   }
   public function paymentProccessed()
   {
      return $this->stp->stripePayment(20, 500);
   }
 }


 $bikash_payment = new BikashPayment();
 $sp = new StrpePayment();
 $spa = new StrpeAdapter($sp);
 $pp = new PaymentProcess($spa);
 echo $pp->makePeyment();

