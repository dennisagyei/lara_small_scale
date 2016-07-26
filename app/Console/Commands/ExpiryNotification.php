<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Member;
use DateTime;

class ExpiryNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:expiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends Sms to notify various members of their licence expiry date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $epa_members=Member::where('epa_expiry_date', '<', new DateTime('NOW'))->get();
        $min_members=Member::where('mining_expiry_date', '<', new DateTime('NOW'))->get();
        $oper_members=Member::where('oper_expiry_date', '<', new DateTime('NOW'))->get();
        
        foreach ($epa_members as $recipient) 
    	{	
    		$number='233'.substr($recipient->contact_phone,-9);

	    	$url = "http://api.mytxtbox.com/v3/messages/send?".
			 "From=GNASSM-MIS"
			 ."&To=$number"
			 ."&Content=".urlencode('Please take note. Your EPA license has expired')
			 ."&ClientId=jphgfwqa"
			 ."&ClientSecret=apskecby"
			 ."&RegisteredDelivery=true"; 
			 $curl = curl_init();

			 curl_setopt_array($curl, array(
			 CURLOPT_URL => $url,
			 CURLOPT_RETURNTRANSFER => true,
			 CURLOPT_CUSTOMREQUEST => "GET",
			 ));

			 $response = curl_exec($curl);
			 $err = curl_error($curl);

			 curl_close($curl);
 		}
 		
 		foreach ($min_members as $recipient) 
    	{	
    		$number='233'.substr($recipient->contact_phone,-9);

	    	$url = "http://api.mytxtbox.com/v3/messages/send?".
			 "From=GNASSM-MIS"
			 ."&To=$number"
			 ."&Content=".urlencode('Please take note. Your Mining license has expired')
			 ."&ClientId=jphgfwqa"
			 ."&ClientSecret=apskecby"
			 ."&RegisteredDelivery=true"; 
			 $curl = curl_init();

			 curl_setopt_array($curl, array(
			 CURLOPT_URL => $url,
			 CURLOPT_RETURNTRANSFER => true,
			 CURLOPT_CUSTOMREQUEST => "GET",
			 ));

			 $response = curl_exec($curl);
			 $err = curl_error($curl);

			 curl_close($curl);
 		}
 		
        $this->info('SMS has been sent');
    }
}
