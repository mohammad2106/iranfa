<?php

define('API_KEY',' 
1138013191:AAH4H0-93Cyf-F09bVH3Q_3rHQ5BdZBIxF8 ');

function api($method,$datas=[]){
 $url = "https://api.telegram.org/bot".API_KEY."/".$method;
 $ch = curl_init();
 curl_setopt($ch,CURLOPT_URL,$url);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
 curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
 $res = curl_exec($ch);
 if(curl_error($ch)){
 var_dump(curl_error($ch));
 }else{
 return json_decode($res);
 }
}

$update = json_decode(file_get_contents('php://input'));
$txt = $update->message->text;
$chat_id = $update->message->chat->id;
$message_id = $update->message->message_id;
$boolean = file_get_contents('step.txt');
$booleans= explode("\n",$boolean);

$channelusername = '@mydigipayir';
$channelnoa = 'mydigipayir';
$adminnoa = 'mydigipayir';
$admin = 594324853;


$button = array(
 'inline_keyboard'=>[
 [['text'=>'1⃣برو به اولین پیام۱⃣','url'=>'https://telegram.me/'.$channelnoa.'/5']],
 [['text'=>'⚜ برو به کانال ⚜','url'=>'https://telegram.me/'.$channelnoa]],
 [['text'=>'📍تبلیغات شما در اینجا📍','url'=>'https://telegram.me/'.$adminnoa]]
 ]

// ⚜📍
);
$btninline = json_encode($button);


if ($chat_id == $admin){

 if($txt == "/start"){
 api('sendMessage',[
 'chat_id'=>$admin,
 'text'=>'سلام رئیس
 جوک هات رو بفرست تا من بروسونم به دست کاربران تو کانال
 
 از همین حالا بفرست : ...',
 'reply_markup'=>json_encode([
 'keyboard'=>[array("آمار کانال","اطلاعات کانال"),array("مقام من")],
 'resize_keyboard'=>true
 ])
 ]);
 }elseif($txt == "مقام من"){
// https://api.telegram.org/bot208887950:AAFRHMU4TPBRPztspJj-DfRp9QKx-hpAiu4/getChatMember?chat_id=@ch_jockdoni&user_id=322242763
 $maqams = json_decode(
 file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$channelusername&user_id=".$chat_id)
 );
 if ($maqams->ok == true)
 {
 api('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"مقام شما : ".$maqams->result->status,
 'reply_markup'=>$buttonsadehmanage
 ]);
 }

 }elseif ($txt == '/state' || $txt == "آمار کانال"){
 $amar = json_decode(
 file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMembersCount?chat_id=$channelusername")
 );
 if ($amar->ok == true)
 {
 api('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"آمار فعلی کانال شما :".$amar->result,
 'reply_markup'=>$buttonsadehmanage
 ]);
 }
 }elseif($txt == "/info" || $txt == "اطلاعات کانال"){
 $info = json_decode(
 file_get_contents("https://api.telegram.org/bot".API_KEY."/getChat?chat_id=$channelusername")
 );
 if ($info->ok == true)
 {
 api('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"نام کانال شما :
 ".$info->result->title."
 آیدی حروفی :
 ".$info->result->username."
 آیدی عددی کانال :
 ".$info->result->id,
 'reply_markup'=>$buttonsadehmanage
 ]);
 }
 }elseif ($txt == "/update"){
 api('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>'0%'
 ]);
 sleep(1);
 api('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id,
 'text'=>'10%➖'
 ]);
 sleep(1);
 api('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'20%➖➖'
 ]);
 sleep(1);
 api('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'30%➖➖➖'
 ]);
 sleep(1);
 api('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'40%➖➖➖➖'
 ]);
 sleep(1);
 api('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'50%➖➖➖➖➖'
 ]);
 sleep(1);
 api('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'60%➖➖➖➖➖➖'
 ]);
 sleep(1);
 api('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'70%➖➖➖➖➖➖➖'
 ]);
 sleep(1);
 api('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'80%➖➖➖➖➖➖➖➖'
 ]);
 sleep(1);
 api('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'90%➖➖➖➖➖➖➖➖➖'
 ]);
 sleep(1);
 api('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'100%➖➖➖➖➖➖➖➖➖➖'
 ]);
 sleep(1);
 api('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id + 1,
 'text'=>'آپدیت شد.'
 ]);
 }else{
 api('sendMessage',[
 'chat_id'=>$channelusername,
 'text'=>$txt."\n\n\n 〽️ https://telegram.me/$channelnoa
🆔 $channelusername",
 'reply_markup'=>$btninline
 ]);

 api('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"پیام ارسال شد.
برای ارسال پیام های بعدی پیام خود را بفرستید پیام باید متن باشد. ✏️",
 'reply_markup'=>$btninline
 ]);

 api('sendMessage',[
 'chat_id'=>"$channelusername",
 'text'=>"⚠️لطفا بدون منبع ارسال نکنید⚠️",
 'reply_markup'=>$btninline,
 'reply_to_message_id'=>$channelmsgid
 ]);
 }
}

if ($chat_id != $admin) {
 $buttonsadeh = json_encode([
 'keyboard' => [
 array("ارسال جوک")
 ]]);

 if ($txt == "/start") {
 api('sendMessage', [
 'chat_id' => $chat_id,
 'text' => "در حال تعمییر",
 'reply_markup' => $btninline
 ]);
 } elseif ($txt == "/update") {
 api('sendMessage', [
 'chat_id' => $chat_id,
 'text' => '0%'
 ]);
 sleep(1);
 api('editMessageText', [
 'chat_id' => $chat_id,
 'message_id' => $message_id,
 'text' => '10%➖'
 ]);
 sleep(1);
 api('editMessageText', [
 'chat_id' => $chat_id,
 'message_id' => $message_id + 1,
 'text' => '20%➖➖'
 ]);
 sleep(1);
 api('editMessageText', [
 'chat_id' => $chat_id,
 'message_id' => $message_id + 1,
 'text' => '30%➖➖➖'
 ]);
 sleep(1);
 api('editMessageText', [
 'chat_id' => $chat_id,
 'message_id' => $message_id + 1,
 'text' => '40%➖➖➖➖'
 ]);
 sleep(1);
 api('editMessageText', [
 'chat_id' => $chat_id,
 'message_id' => $message_id + 1,
 'text' => '50%➖➖➖➖➖'
 ]);
 sleep(1);
 api('editMessageText', [
 'chat_id' => $chat_id,
 'message_id' => $message_id + 1,
 'text' => '60%➖➖➖➖➖➖'
 ]);
 sleep(1);
 api('editMessageText', [
 'chat_id' => $chat_id,
 'message_id' => $message_id + 1,
 'text' => '70%➖➖➖➖➖➖➖'
 ]);
 sleep(1);
 api('editMessageText', [
 'chat_id' => $chat_id,
 'message_id' => $message_id + 1,
 'text' => '80%➖➖➖➖➖➖➖➖'
 ]);
 sleep(1);
 api('editMessageText', [
 'chat_id' => $chat_id,
 'message_id' => $message_id + 1,
 'text' => '90%➖➖➖➖➖➖➖➖➖'
 ]);
 sleep(1);
 api('editMessageText', [
 'chat_id' => $chat_id,
 'message_id' => $message_id + 1,
 'text' => '100%➖➖➖➖➖➖➖➖➖➖'
 ]);
 sleep(1);
 api('editMessageText', [
 'chat_id' => $chat_id,
 'message_id' => $message_id + 1,
 'text' => 'آپدیت شد.'
 ]);
 }
}

// این کد توسط گروه برنامه نویسی بینام نوشته شده است