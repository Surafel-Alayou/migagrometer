  <?php
  $text=" Name: ".$first_name=$_POST['First_name']." ".$last_name=$_POST['Last_name']."  From: ".date('m/d/y h:i A', strtotime($from_datetime=$_POST['From_date']))." To: ".date('m/d/y h:i A', strtotime($to_datetime=$_POST['To_date']))." Number of peoples: ".$peoples=$_POST['Peoples']." Experience: ".$experience=$_POST['Experience']." Aim of the experiment: ".$aim=$_POST['Aim']."";
  
  $chat_id='@AMSE_lab';
  $token = "5395660536:AAG9IAn04u8dMgxupYh80nSbfed-7DEUNvE";
  $url="https://api.telegram.org/bot$token/sendMessage?text=$text&chat_id=$chat_id";
  $ch=curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result=curl_exec($ch);
  curl_close($ch);
  $result=json_decode($result,true);
  if(isset($result['result'])){

  }else{
  	echo "<pre>";
  	print_r($result);
  	echo "Something went wrong!";
  }
  ?>
  