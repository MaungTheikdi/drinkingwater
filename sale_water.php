<?php 

include 'includes/connection.php';

if(isset($_POST['save_sale'])) {


    $sale_date = $_POST['sale_date'];
    $customer_id = $_POST['customer_id'];
    $old_rent_balance = $_POST['old_rent_balance'];
    $rent_no = $_POST['rent_no'];
    $return_no = $_POST['return_no'];
    $new_rent_balance = $_POST['new_rent_balance'];

    $sql = 	"INSERT  INTO `water_distribution` (sale_date,customer_id,old_rent_balance,rent_no,return_no,new_rent_balance)
    values 
        ('$sale_date','$customer_id','$old_rent_balance','$rent_no','$return_no','$new_rent_balance')";
     

     if (mysqli_query($link, $sql)) {

        //$csone = "SELECT customer_id FROM customer ";
        
        $cssql = "UPDATE `customer` SET `rent_balance` = $new_rent_balance WHERE `customer_id`= $customer_id";
        
        if (mysqli_query($link, $cssql)) {
            header('Location: index.php');
        } else {
            echo "Error UPDATE: " . $cssql . " " . mysqli_error($link);
            //echo "<script type= 'text/javascript'>alert('Please, don't use the symbol!');</script>";
        }
        mysqli_close($link);
        //echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
	 } else {
        echo "Error INSERT: " . $sql . " " . mysqli_error($link);
        //echo "<script type= 'text/javascript'>alert('Please, don't use the symbol!');</script>";
	 }
	 //mysqli_close($link);
}

if(isset($_POST['save_sale_sms'])) {

    $sale_date = $_POST['sale_date'];
    $customer_id = $_POST['customer_id'];
    $old_rent_balance = $_POST['old_rent_balance'];
    $rent_no = $_POST['rent_no'];
    $return_no = $_POST['return_no'];
    $new_rent_balance = $_POST['new_rent_balance'];


    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $sms_message = 'Theikdi ရေသန့်မှ '.$customer_name.' ဗူးဝယ်'.$rent_no.' ခွံပြန်ပေး'.$return_no.' ပေးရန်ကျန်'.$new_rent_balance.;

    $sender_info = "Info"


    $sql = 	"INSERT  INTO `water_distribution` (sale_date,customer_id,old_rent_balance,rent_no,return_no,new_rent_balance)
    values 
        ('$sale_date','$customer_id','$old_rent_balance','$rent_no','$return_no','$new_rent_balance')";
     

     if (mysqli_query($link, $sql)) {

        
        $cssql = "UPDATE `customer` SET `rent_balance` = $new_rent_balance WHERE `customer_id`= $customer_id";
        
        if (mysqli_query($link, $cssql)) {

                //SMSPOH
                //iVYF9CD4VjkVmd14TQoPRT0_a3hftCrwqaWfoMDeq1wL0gtkN8pJ5-VlWEZqCZ9J
                //https://smspoh.com/api/http/send?key={YOUR_AUTH_KEY}&message=Hello+World&recipients=09xxxxxxxxx
                // SMSPoh Authorization Token
                
                //if(isset($_POST['submit'])){
                //$token = "";
                $token = "iVYF9CD4VjkVmd14TQoPRT0_a3hftCrwqaWfoMDeq1wL0gtkN8pJ5-VlWEZqCZ9J";
                // Prepare data for POST request
                $data = [
                    "to"        =>      $customer_phone,
                    "message"   =>      $sms_message,
                    "sender"    =>      $sender_info
                ];


                $ch = curl_init("https://smspoh.com/api/v2/send");
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        'Authorization: Bearer ' . $token,
                        'Content-Type: application/json'
                    ]);

                $result = curl_exec($ch);

                //echo $result;
                //}
                
            header('Location: index.php');
        } else {
            echo "Error UPDATE: " . $cssql . " " . mysqli_error($link);
            //echo "<script type= 'text/javascript'>alert('Please, don't use the symbol!');</script>";
        }
        mysqli_close($link);
        //echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
	 } else {
        echo "Error INSERT: " . $sql . " " . mysqli_error($link);
        //echo "<script type= 'text/javascript'>alert('Please, don't use the symbol!');</script>";
	 }
	 //mysqli_close($link);
}


if(isset($_POST['update_sale'])) {

    $id = $_POST['id'];

    $sale_date = $_POST['sale_date'];
    $customer_id = $_POST['customer_id'];
    $old_rent_balance = $_POST['old_rent_balance'];
    $rent_no = $_POST['rent_no'];
    $return_no = $_POST['return_no'];
    $new_rent_balance = $_POST['new_rent_balance'];
     

    $sql = 	"UPDATE  `water_distribution` SET 
            sale_date='$sale_date',
            customer_id=$customer_id,
            old_rent_balance=$old_rent_balance,
            rent_no=$rent_no,
            return_no=$return_no,
            new_rent_balance=$new_rent_balance
            WHERE distribution_id=$id";
     

     if (mysqli_query($link, $sql)) {

        //$csone = "SELECT customer_id FROM customer ";
        
        $cssql = "UPDATE `customer` SET `rent_balance` = $new_rent_balance WHERE `customer_id`= $customer_id";
        
        if (mysqli_query($link, $cssql)) {
            header('Location: index.php');
        } else {
            echo "Error UPDATE: " . $cssql . " " . mysqli_error($link);
            //echo "<script type= 'text/javascript'>alert('Please, don't use the symbol!');</script>";
        }
        mysqli_close($link);
        //echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
	 } else {
        echo "Error INSERT: " . $sql . " " . mysqli_error($link);
        //echo "<script type= 'text/javascript'>alert('Please, don't use the symbol!');</script>";
	 }
	 //mysqli_close($link);
}

?>