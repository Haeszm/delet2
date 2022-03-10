<?php

ob_start();
define('API_KEY','5152801203:AAGItZYQy2DgUszLOfms8FQdrdC8FzVASDo');
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
function apiRequest($method, $parameters) {
  if (!is_string($method)) {
error_log("Method name must be a string\n");
return false;
  }
  if (!$parameters) {
$parameters = array();
  } else if (!is_array($parameters)) {
error_log("Parameters must be an array\n");
return false;
  }
  foreach ($parameters as $key => &$val) {
if (!is_numeric($val) && !is_string($val)) {
  $val = json_encode($val);
}
  }
  $url = "https://api.telegram.org/bot".API_KEY."/".$method.'?'.http_build_query($parameters);
  $handle = curl_init($url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
  return exec_curl_request($handle);
}


function SendMessage($chat_id, $text , $reply_id){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'reply_to_message_id'=>$message_id,
'parse_mode'=>"MarkDown"
]);
}
function save($filename, $data)
{
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
	function EditMessageText($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$keyboard){
  bot('editMessagetext',[
'chat_id'=>$chat_id,
 'message_id'=>$message_id,
'text'=>$text,
'parse_mode'=>$parse_mode,
 'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
 ]);
 }
 function sendAction($chat_id, $action){
bot('sendChataction',[
'chat_id'=>$chat_id,
'action'=>$action]);
}
function objectToArrays($object)
{
if (!is_object($object) && !is_array($object)) {
return $object;
}
if (is_object($object)) {
$object = get_object_vars($object);
}
return array_map("objectToArrays", $object);
}
	function sendphoto($ChatId, $photo_id,$caption){
bot('sendphoto',[
'chat_id'=>$ChatId,
'photo'=>$photo_id,
'caption'=>$caption
]);
}
function sendvideo($chat_id,$video_id,$caption){
bot('sendvideo',[
'chat_id'=>$ChatId,
'video'=>$video_id,
'caption'=>$caption
]);
}
function sendaudio($chat_id,$audio_id,$caption){
bot('sendaudio',[
'chat_id'=>$ChatId,
'audio'=>$audio_id,
'caption'=>$caption
]);
}
function sendvoice($chat_id,$voice_id,$caption){
bot('sendvoice',[
'chat_id'=>$ChatId,
'voice'=>$audio_id,
'caption'=>$caption
]);
}
function senddocument($chat_id,$document_id,$caption){
bot('senddocument',[
'chat_id'=>$ChatId,
'document'=>$document_id,
'caption'=>$caption
]);
}
function sendsticker($chat_id,$sticker_id,$caption){
bot('sendsticker',[
'chat_id'=>$ChatId,
'sticker'=>$sticker_id,
'caption'=>$caption
]);
}
function ForwardMessage($chatid,$from_chat,$message_id){
	bot('ForwardMessage',[
	'chat_id'=>$chatid,
	'from_chat_id'=>$from_chat,
	'message_id'=>$message_id
	]);
	}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$admin = 5049221213; # ايديك
$chat_id2 = $update->callback_query->message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$name = $message->from->first_name;
$user = $message->from->username;
$from_id = $message->from->id;
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message = $update->message;
$chat_id = $message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$from_id = $message->from->id;
$fromid= $update->callback_query->from->id;
$data_name = $update->callback_query->from->first_name;
$datatag_name = "[$data_name](tg://user?id=$fromid";
$name = $update->message->from->first_name;
$from_id = $message->from->id;
$tws = file_get_contents("tw.txt");
$modxe = file_get_contents("usr.txt");
$username = $update->message->from->username;
$reply = $message->reply_to_message->message_id;
$list = file_get_contents("blocklist.txt");
$rep = $message->reply_to_message->forward_from; 
$id = $rep->id; 
$message = $update->message;
$chat_id = $message->chat->id;
$textmsg = $message->text;
$user = $message->from->username;
$name = $message->from->first_name;
$for = $message->from->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message = $update->message;
$chat_id = $message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$from_id = $message->from->id;
$name = $update->message->from->first_name;
$from_id = $message->from->id;
$admin2 = file_get_contents("admin2.txt");
$ad = array("$admin","$admin2");
$list = file_get_contents("blocklist.txt");
$ebu = explode("\n",$list);
if(in_array($from_id,$ebu)){
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"⛳| عزيزي انت محظور من البوت",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
}
$rembo = $message->from->id;
$from_id = $message->from->id;
$from_id = $message->from->id;
mkdir("alsh");
if(isset($message)){
$al = file_get_contents('memb.txt');
$alo = explode("\n",$al);
if(!in_array($from_id,$alo)){
$alsh2 = fopen("memb.txt", "a") or die("Unable to open file!");
fwrite($alsh2, "$from_id\n");
fclose($alsh2);}}
$first_name = $message->from->first_name;
$username = $message->from->username;
$from_id = $message->from->id;
$marcus = explode("\n",file_get_contents("memb.txt"));
$hassan = count($marcus)-1;
if ($message && !in_array($from_id, $marcus)) {
file_put_contents("memb.txt", $from_id."\n",FILE_APPEND);
}
$update = json_decode(file_get_contents('php://input'));
var_dump($update);
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->userame;
$text = $message->text;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id = $update->callback_query->message->message_id;
$reply = $update->message->reply_to_message;
$id = $message->from->id;
$name = $message->from->first_name;
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->userame;
$text = $message->text;
$chatid = $update->callback_query->message->chat->id;
$chat_id2 = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id = $update->callback_query->message->message_id;
$reply = $update->message->reply_to_message;
$id = $message->from->id;
$name = $message->from->first_name;
$message_id2 = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$text  = $message->text;
$firstname = $update->callback_query->from->first_name;
$usernames = $update->callback_query->from->username;
$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$membercall = $update->callback_query->id;
$reply = $update->message->reply_to_message->forward_from->id;
$data = $update->callback_query->data;
$messageid = $update->callback_query->message->message_id;
$tc = $update->message->chat->type;
$gpname = $update->callback_query->message->chat->title;
$namegroup = $update->message->chat->title;
$newchatmemberid = $update->message->new_chat_member->id;
$newchatmemberu = $update->message->new_chat_member->username;
$rt = $update->message->reply_to_message;
$replyid = $update->message->reply_to_message->message_id;
$tedadmsg = $update->message->message_id;
$edit = $update->edited_message->text;
$re_id = $update->message->reply_to_message->from->id;
$re_user = $update->message->reply_to_message->from->username;
$re_name = $update->message->reply_to_message->from->first_name;
$re_msgid = $update->message->reply_to_message->message_id;
$re_chatid = $update->message->reply_to_message->chat->id;
$message_edit_id = $update->edited_message->message_id;
$chat_edit_id = $update->edited_message->chat->id;
$edit_for_id = $update->edited_message->from->id;
$edit_chatid = $update->callback_query->edited_message->chat->id;
$caption = $update->message->caption;
$chat_id = $update->message->chat->id;
$from_id = $update->message->from->id;
$text = $update->message->text;
$message_id = $update->message->message_id;
$first_name= $update->message->from->first_name;
mkdir("user");
mkdir("user/$from_id");
$wthat = file_get_contents("user/$chat_id/wthat.txt");
$number = file_get_contents("user/$chat_id/number.txt");
$hash = file_get_contents("user/$chat_id/hash.txt");
$code = file_get_contents("user/$chat_id/code.txt");
$sta = file_get_contents("start.txt");
$all = file_get_contents("id.txt");
$rabt = file_get_contents("rabt.txt");
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$all&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
-عَليڪ ﺄلاشتراك بقناة ﺂلبوت الخاصة .💛.
لأستخدام البوت بشڪل صَحيح 💚.
اشترك ثم اضغط /start من جديد 💘.",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"- اضغط ۿنا للأشتراك",'url'=>"$rabt"]],
]])]);return false;}
#شتراك 
$op = file_get_contents("ch.txt");
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$op&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"- عَليڪ ﺄلاشتراك بقناة ﺂلبوت الاولى 💛.
لأستخدام البوت بشڪل صَحيح 💚.
اشترك ثم اضغط /start من جديد 💘. * @$op * ؛
",
'reply_to_message_id'=>$message->message_id,
]);return false;}
#شتراك اجباري2
$oop = file_get_contents("chc.txt");
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$oop&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"- عَليڪ ﺄلاشتراك بقناة ﺂلبوت الثانيه 💛.
لأستخدام البوت بشڪل صَحيح 💚.
اشترك ثم اضغط /start من جديد 💘.* @$oop * ؛",
'reply_to_message_id'=>$message->message_id,
]);return false;}
if($text == "/start" and !in_array($from_id,$ebu) and !in_array($from_id,$ebu) and !in_array($chat_id,$ad) and $sta == null){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>
"-🙋‍♂ أهلا بك:  • $first_name  •  ،
-📮 في بوت حذف حسابات التيليكرام.

▫️ من خلاله يمكنك حذف حسابك بسهوله،
▫️ عبر اتباعك للخطوات،
▫️ لكن احذر: لن تستطيع استرجاع حسابك أبداً.",
 'reply_markup'=>json_encode([
'keyboard'=>[[['text'=>"حذف حسابي ⛔..."]],],'resize_keyboard'=>true])
]);
}
if($text == "/start" and !in_array($from_id,$ebu) and !in_array($from_id,$ebu) and !in_array($chat_id,$ad) and $sta != null){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"$sta",
 'reply_markup'=>json_encode([
'keyboard'=>[[['text'=>"حذف حسابي ⛔..."]],],'resize_keyboard'=>true])
]);
}
if($text == "حذف حسابي ⛔..."){
 file_put_contents("user/$chat_id/wthat.txt","do");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"-👨🏻‍✈️ الآن قم بأرسال جهة الأتصال الخاصة بك،
-🚸 عبر الضغط على: ( أرسال جهتي 🎟 ).",
'reply_markup'=>json_encode([
'keyboard'=>[[['text'=>"رسال جهتي 🎟 ",'request_contact'=>true]],],'resize_keyboard'=>true])
]);
}
$contact_number = $message->contact->phone_number;
if($message->contact and $wthat == "do" ){
$cuuuuu = "https://forhassan.ml/my_ip/delete.php?phone=$contact_number"; 
$hassaN=json_decode(file_get_contents($cuuuuu),true); 
$hhzzz=$hassaN['result']['access_hash']; 
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"
-👨🏻‍✈️ الان قم باعادة توجيه الرسالة،
-🚸 التي ارسلت لك في الخاص،
-📛 لا تقم بنسخ الكود فقط !.",
 ]);
file_put_contents("user/$chat_id/number.txt",$contact_number);
file_put_contents("user/$chat_id/hash.txt",$hhzzz);
file_put_contents("user/$chat_id/wthat.txt","do2");
}
$ex = explode("\n",$text);
$coend = $ex[1];
if($wthat == "do2"){
file_put_contents("user/$chat_id/code.txt",$coend);
$hassanmuaed = "https://forhassan.ml/my_ip/delete.php?phone=$number&access_hash=$hash&password=$coend";
file_put_contents("user/$chat_id/wthat.txt","do3");
bot('sendMessage',[
'parse_mode' => "MarkDown",
 'chat_id'=>$chat_id,
 'text'=>"- هل تأكد عمليه الحذف 📌 .",
 'reply_markup'=>json_encode(['keyboard'=>[[['text'=>"- تأكيد ✅ ."],['text'=>"- الغاء ⛔ ."]],],'resize_keyboard'=>true])
  ]);
}
if($text == "- تأكيد ✅ ." && $wthat == "do3"){
$hassanmuaed = "https://forhassan.ml/my_ip/delete.php?phone=".$number."&access_hash=".$hash."&password=".$code."&do_delete=true";
$hassaN=json_decode(file_get_contents($hassanmuaed),true);
$Muaed=$hassaN['description'];
bot('sendMessage',[
'parse_mode' => "MarkDown",
 'chat_id'=>$chat_id,
 'text'=>"- باي 🚶‍♂️..",
  ]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>
"-🙋‍♂ أهلا بك:  • $first_name  •  ،
-📮 في بوت حذف حسابات التيليكرام.

▫️ من خلاله يمكنك حذف حسابك بسهوله،
▫️ عبر اتباعك للخطوات،
▫️ لكن احذر: لن تستطيع استرجاع حسابك أبداً.",
 'reply_markup'=>json_encode([
'keyboard'=>[[['text'=>"حذف حسابي ⛔..."]],],'resize_keyboard'=>true])
]);
unlink("user/$chat_id/wthat.txt");
unlink("user/$chat_id/number.txt");
unlink("user/$chat_id/hash.txt");
unlink("user/$chat_id/code.txt");
}
if($text == "- الغاء ⛔ ." && $wthat == "do3"){
$vhhhhh = "https://forhassan.ml/my_ip/delete.php?phone=".$number."&access_hash=".$hash."&password=".$code."&do_delete=flase";
$hassaN=json_decode(file_get_contents($vhhhhh),true);
bot('sendMessage',[
'parse_mode' => "MarkDown",
 'chat_id'=>$chat_id,
 'text'=>"- تم الغاء عمليه الحذف 🌀 .",
  ]);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>
"-🙋‍♂ أهلا بك:  • $first_name  •  ،
-📮 في بوت حذف حسابات التيليكرام.

▫️ من خلاله يمكنك حذف حسابك بسهوله،
▫️ عبر اتباعك للخطوات،
▫️ لكن احذر: لن تستطيع استرجاع حسابك أبداً.",
 'reply_markup'=>json_encode([
'keyboard'=>[[['text'=>"حذف حسابي ⛔..."]],],'resize_keyboard'=>true])
]);
unlink("user/$chat_id/wthat.txt");
unlink("user/$chat_id/number.txt");
unlink("user/$chat_id/hash.txt");
unlink("user/$chat_id/code.txt");
}
# الاوامر #
$bot = file_get_contents("com.txt");
if($text == "/start" and in_array($chat_id,$ad)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
اهلا بك مطوري $name
",
'parse_mode'=>"Markdown",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"تغيير /start🎗","callback_data"=>"start"]],
[["text"=>"تفعيل التواصل🎫","callback_data"=>"utws"],["text"=>"تعطيل التواصل💫","callback_data"=>"ntws"]],
[["text"=>"حظر عضو💔","callback_data"=>"bn"],["text"=>"الغاء حظر عضو💥","callback_data"=>"unbn"]],
[["text"=>"اضافه ادمن🎟","callback_data"=>"admin"]],
[["text"=>"احصائيات الاعضاء🕳","callback_data"=>"mem"]],
[["text"=>"معلومات عضو بالايدي🧧","callback_data"=>"info"]],
[["text"=>"الاشتراك الاجباري🎴","callback_data"=>"chh"],["text"=>"الااذاعه💌","callback_data"=>"bcc"]],
[["text"=>"حذف كل الاحصائيات🃏","callback_data"=>"delbot"]],
]])
]); 
unlink("com.txt");
}
#رجوع
if($data == "bk" and in_array($chat_id2,$ad)){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"
اهلا بك مطوري $name
",
'parse_mode'=>"Markdown",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"تغيير /start🎗","callback_data"=>"start"]],
[["text"=>"تفعيل التواصل🎫","callback_data"=>"utws"],["text"=>"تعطيل التواصل💫","callback_data"=>"ntws"]],
[["text"=>"حظر عضو💔","callback_data"=>"bn"],["text"=>"الغاء حظر عضو💥","callback_data"=>"unbn"]],
[["text"=>"اضافه ادمن🎟","callback_data"=>"admin"]],
[["text"=>"احصائيات الاعضاء🕳","callback_data"=>"mem"]],
[["text"=>"معلومات عضو بالايدي🧧","callback_data"=>"info"]],
[["text"=>"الاشتراك الاجباري🎴","callback_data"=>"chh"],["text"=>"الااذاعه💌","callback_data"=>"bcc"]],
[["text"=>"حذف كل الاحصائيات🃏","callback_data"=>"delbot"]],
]])
]); 
unlink("com.txt");
}
if($data == "delbot" and in_array($chat_id2,$ad)){
 bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- سيتم حذف اجصائيات البوت وكلشي . 🦄💸",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- تأكيد . 🦄💸","callback_data"=>"dell"],["text"=>"- الغاء . 🦄💸","callback_data"=>"bk"]],
]])
]); 
}
if($data == "dell" and in_array($chat_id2,$ad)){
 bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- تمت العمليه بالفعل عاد البوت كبدايته . 🦄💸",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- ألرجـوع . 🦄💸","callback_data"=>"bk"]],
]])
]); 
unlink("start.txt");
unlink("tw.txt");
unlink("blocklist.txt");
unlink("admin2.txt");
unlink("memb.txt");
unlink("rabt.txt");
unlink("id.txt");
unlink("ch.txt");
unlink("chc.txt");
unlink("zkf.txt");
}

if($data == "bcc" and in_array($chat_id2,$ad)){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- اختر نوع الاذاعه المطلوبه . 🦄💸",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- اذاعه رساله . 🦄💸","callback_data"=>"bc"],["text"=>"- اذاعه بالتوجيه . 🦄💸","callback_data"=>"for"]],
[["text"=>"- اذاعه شفاف . 🦄💸","callback_data"=>"inln"],["text"=>"- اذاعه بالميديا . 🦄💸","callback_data"=>"med"]],
[["text"=>"- ألرجـوع . 🦄💸","callback_data"=>"bk"]],
]])
]); 
}
#قسم شتراك اجباري
if($data == "chh" and in_array($chat_id2,$ad)){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- قسم الاشتراك الاجباري . 🦄💸",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- قناة عامه1 . 🦄💸","callback_data"=>"add2"],["text"=>"- قناة عامه2 . 🦄💸","callback_data"=>"add1"]],
[["text"=>"- قناة خاصه . 🦄💸","callback_data"=>"add"]],
[["text"=>"- حذف الاشتراك الاجباري . 🦄💸","callback_data"=>"remch"]],
[["text"=>"- ألرجـوع . 🦄💸","callback_data"=>"bk"]],
]])
]); 
}
$meb = explode("\n",file_get_contents("memb.txt"));
$band = explode("\n",file_get_contents("blocklist.txt"));
$mem = count($meb)-1;
$bnn = count($band)-1;
if($data == "mem" and in_array($chat_id2,$ad)){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"
💌--< $mem >-- - الاعضاء . 🦄💸

💟-- < $bnn >-- - المحظورين . 🦄💸
",
'parse_mode'=>"Markdown",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- ألرجـوع . 🦄💸","callback_data"=>"bk"]],
]])
]); 
}
#رساله ستارت
if($data == "start" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","start");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- ارسل كليشه ستارت الجديده علما يمكنك استخدام الماركداون . 🦄💸",
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- ألرجـوع . 🦄💸","callback_data"=>"bk"]],
]])
]); 
}
if($bot == "start" and $text != "/h" and $text != "/start" and in_array($chat_id,$ad)){
file_put_contents("start.txt","$text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- تم حفظ الستارت . 🦄💸",
'reply_to_message_id'=>$message->message_id,
]);
unlink("com.txt");
}
#تفعيل تواصل
if($data == "utws" and in_array($chat_id2,$ad)){
file_put_contents("tw.txt","on");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- تم تفعيل التواصل . 🦄💸",
]); 
}
#تعطيل تواصل
if($data == "ntws" and in_array($chat_id2,$ad)){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- تم تعطيل التواصل . 🦄💸",
]); 
unlink("tw.txt");
}
if($text and !in_array($from_id,$ebu) and !in_array($chat_id,$ad) and $tws == "on"){
bot('forwardMessage',[
'chat_id'=>$admin,
'from_chat_id'=>$chat_id,
'message_id'=>$update->message->message_id,
'text'=>$text,
]);
}
if($text and $message->reply_to_message && $text!="/info" && $text!="/ban" && $text!="/unban" && $text!="/forward" and !$data ){
bot('sendMessage',[
'chat_id'=>$message->reply_to_message->forward_from->id,
'text'=>$text,
]);
}
#اضافه ادمن
if($data == "admin" and $chat_id2 == $admin){
file_put_contents("com.txt","ad");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- ارسل ايدي المراد رفعه ادمن . 🦄💸",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- ألرجـوع . 🦄💸","callback_data"=>"bk"]],
]])
]); 
}
if($bot == "ad" and $text != "/start" and $chat_id == $admin){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"- تم رفعه بالتأكيد . 🦄💸",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- ألرجـوع . 🦄💸","callback_data"=>"bk"]],
]])
]); 
bot('sendMessage',[
'chat_id'=>$text,
'text'=>"- تم رفعك ادمن في البوت . 🦄💸",
'parse_mode'=>'MarkDown',
]);
unlink("com.txt");
file_put_contents("admin2.txt","$text");
}
#مـآيخصـك
if($data == "admin" and $chat_id2 == $admin2){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- الامر لا يخصك . 🦄💸",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- ألرجـوع . 🦄💸","callback_data"=>"bk"]],
]])
]); 
}
#حظر
if($data == "bn" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","bn");
 bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- ارسل ايدي العضو الان . 🦄💸",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- ألرجـوع . 🦄💸","callback_data"=>"bk"]],
]])
]); 
}
if($bot == "bn" and $text != "/start" and in_array($chat_id,$ad)){
$myfile2 = fopen("blocklist.txt", "a") or die("Unable to open file!");	
fwrite($myfile2, "$text\n");
fclose($myfile2);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- تم حظره بالتأكيد . 🦄💸",
]);
bot('sendmessage',[
'chat_id'=>$text,
'text'=>"- تم حظرك من قبل مطور البوت . 🦄💸",
]);
unlink("com.txt");
}
#الغاء حظر
$listt = file_get_contents("blocklist.txt");
if($data == "unbn" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","unbn");
 bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- ارسل ايدي العضو الان . 🦄💸",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- ألرجـوع . 🦄💸","callback_data"=>"bk"]],
]])
]); 
}
if($bot == "unbn" and $text != "/start" and in_array($chat_id,$ad)){
$newlist = str_replace($text,"",$listt);
file_put_contents("blocklist.txt",$newlist);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- بالتأكيد تم الغاء الحظر . 🦄💸",
]);
bot('sendmessage',[
'chat_id'=>$text,
'text'=>"- تم رفع الحظر عنك . 🦄💸",
]);
unlink("com.txt");
}
#معلومات
if($data == "info" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","info");
 bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- ارسل ايدي العضو #-يجب ان يكون مشترك في البوت . 🦄💸",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- ألرجـوع . 🦄💸","callback_data"=>"bk"]],
]])
]); 
}
if($bot == "info" and $text != "/start"and in_array($chat_id,$ad)){
$ine = json_decode(file_get_contents("http://api.telegram.org/bot".API_KEY."/getChat?chat_id=$text"));
$infe4 =$ine->result->first_name;
$infe2 =$ine->result->id;
$infe3 =$ine->result->username;
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"*- معلومات العضو هي . 🦄💸*
- الاسم . 🦄💸 : *$infe4* 
- المعرف . 🦄💸 : [@$infe3] 
- الايدي . 🦄💸 : `$infe2`",
'reply_to_message_id'=>$message->message_id,
'parse_mode'=>'MarkDown', 
]);
unlink("com.txt");
}
#شتراك اجباري1
if($data == "add2" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","ab");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- ارسل معرف قناتك بدون @ . 🦄💸",
'parse_mode'=>"Markdown",
]);
}
if($bot == "ab" and $text != "/h" and $text != "/start" and in_array($chat_id,$ad)){
file_put_contents("chc.txt","$text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- تم حفظ القناة . 🦄💸
- ارفع البوت ادمن في القناة . 🦄💸
- ارسل  /start للرجوع . 🦄💸",
'reply_to_message_id'=>$message->message_id,
]);
unlink("com.txt");
}
#شـترآك اجباري1
if($data == "add1" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","al");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- ارسل معرف قناتك بدون @ . 🦄💸",
'parse_mode'=>"Markdown",
]);
}

if($bot == "al" and $text != "/h" and $text != "/start" and in_array($chat_id,$ad)){
file_put_contents("ch.txt","$text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- تم حفظ القناة . 🦄💸
- ارفع البوت ادمن في القناة . 🦄💸
- ارسل  /start للرجوع . 🦄💸",
'reply_to_message_id'=>$message->message_id,
]);
unlink("com.txt");
}
#شتراك خاص
if($data == "add"and in_array($chat_id2,$ad)){
file_put_contents("com.txt","vv");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- ارسل ايدي قناتك  . 🦄💸
- مثال / -100078267657 . 🦄💸",
'parse_mode'=>"Markdown",
]);
}

if($bot == "vv" and $text != "/o" and $text != "/start" and in_array($chat_id,$ad)){
file_put_contents("com.txt","alo");
file_put_contents("id.txt","$text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- تم حفظ الايدي ارسل رابط قناتك الان . 🦄💸",
'reply_to_message_id'=>$message->message_id,
]);
}
if($bot == "alo" and $text != "/o" and $text != "/start" and in_array($chat_id,$ad)){
file_put_contents("rabt.txt","$text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- تم حفظ رابط قناتك . 🦄💸
- رابط القناة . 🦄💸 : `[$text]`
- ايدي القناة . 🦄💸 : `$al`
- ارسل /start للرجوع  . 🦄💸 ",
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
unlink("com.txt");
}
#حذف قنوات
if($data == "remch" and in_array($chat_id2,$ad)){
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- تم حذف جميع قنوات الاشتراك الاجباري . 🦄💸",
'parse_mode'=>"Markdown",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- ألرجـوع . 🦄💸","callback_data"=>"bk"]],
]])
]); 
unlink("rabt.txt");
unlink("id.txt");
unlink("ch.txt");
unlink("chc.txt");
}
#اذاعه
if($data == "bc" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","send");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- ارسل رسالتك الان يمكنك استخدام الماركداون . 🦄💸",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- ألرجـوع . 🦄💸","callback_data"=>"bk"]],
]])
]);
}
$ali = fopen( "memb.txt", 'r');
while(!feof( $ali)){
$alshh3 = fgets($ali);
if($bot == "send" and in_array($chat_id,$ad)){
bot('sendMessage', [
'chat_id' =>$alshh3,
'text'=>$text,
'parse_mode'=>"MarkDown",
'disable_web_page_preview' =>"true"
]);
unlink("com.txt");
}
}
$tx = file_get_contents("alh.txt");
if($data == "inln" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","sn");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- ارسل النص الذي تريده كرساله للازرار يمكنك استخدام الماركداون . 🦄💸",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- ألرجـوع . 🦄💸","callback_data"=>"bk"]],
]])
]);
}
if($bot == "sn" and $text != "/start" and in_array($chat_id,$ad)){
file_put_contents("alh.txt","$text");
file_put_contents("com.txt","snn");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- استخدم الاوامر اسفل لانشاء الكيبورد الشفاف . 🦄💸
text = link
text = link + text = link
نص = رابط
نص = رابط + نص = رابط",
'reply_to_message_id'=>$message->message_id,
]);
}
$i=0;
$keyboard = [];
$keyboard["inline_keyboard"] = [];
$rows = explode("\n",$text);
foreach($rows as $row){
$j=0;
$keyboard["inline_keyboard"][$i]=[];
$bottons = explode("+",$row);
foreach($bottons as $botton){
$alsh = explode("=",$botton."=");
$Ibotton = ["text" => trim($alsh[0]), "url" => trim($alsh[1])];
$keyboard["inline_keyboard"][$i][$j] = $Ibotton;
$j++;}$i++;}
$reply_markup=json_encode($keyboard);
if($bot == "snn" and $text != "/start" and in_array($chat_id,$ad)){
$ali = fopen( "memb.txt", 'r');
while(!feof( $ali)){
$alshh = fgets($ali);
bot('sendmessage',[
'chat_id'=>$alshh,
'text'=>$tx,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>($reply_markup)
]);
}
unlink("com.txt");
unlink("alh.txt");
}
if($data == "for" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","fd");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- ارسل توجيهك الان . 🦄💸",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- ألرجـوع . 🦄💸","callback_data"=>"bk"]],
]])
]);
}
if($bot == "fd" and $text != "/start" and in_array($chat_id,$ad)){
$ali = fopen( "memb.txt", 'r');
while(!feof( $ali)){
$ali2 = fgets($ali);
bot('forwardMessage',[
 'chat_id'=>$ali2,
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
 ]);
 unlink("com.txt");
 }
 }
 if($data == "med" and in_array($chat_id2,$ad)){
file_put_contents("com.txt","mide");
bot('EditMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"- ارسل احده الميديا الان . 🦄💸",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"- ألرجـوع . 🦄💸","callback_data"=>"bk"]],
]])
]);
}
 if($message->video and $bot == "mide" and in_array($chat_id,$ad) and $text != "/start"){
 $ali = fopen( "memb.txt", 'r');
while(!feof( $ali)){
$aly = fgets($ali);
bot('sendvideo',[
'chat_id'=>$aly,
'video'=>$message->video->file_id,
'caption'=>$message->caption,
'parse_mode'=>"MARKDOWN",'disable_web_page_preview'=>true,
]);
unlink("com.txt"); 
}
bot('sendmessage',[ 
'chat_id'=>$chat_id,
 'text'=>"- تم نشر الفيديو . 🦄💸",
]); 
}

if($message->document and $bot == "mide" and in_array($chat_id,$ad) and $text != "/start"){
$ali = fopen( "memb.txt", 'r');
while(!feof( $ali)){ 
$aly = fgets($ali);
bot('Senddocument',['chat_id'=>$aly,'document'=>$message->document->file_id,'caption'=>$message->caption,'parse_mode'=>"MARKDOWN",'disable_web_page_preview'=>true,
]);
unlink("com.txt");
}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"- تم نشر الملف او المتحركه . 🦄💸", 
]); 
} 

 if($message->audio and $bot == "mide" and in_array($chat_id,$ad) and $text != "/start"){
$ali = fopen( "memb.txt", 'r');
while(!feof( $ali)){
$aly = fgets($ali);
 bot('sendaudio',[
 'chat_id'=>$aly, 
'audio'=>$message->audio->file_id, 
 'caption'=>$message->caption,
'parse_mode'=>"MARKDOWN",'disable_web_page_preview'=>true,
 ]); 
 unlink("com.txt");
}
bot('sendmessage',[ 
'chat_id'=>$chat_id,
 'text'=>"- تم نشر الاغنيه . 🦄💸", 
]); 
} 

if($message->photo and $bot == "mide" and in_array($chat_id,$ad) and $text != "/start"){
$ali = fopen( "memb.txt", 'r');
while(!feof( $ali)){
$aly = fgets($ali);
bot('sendPhoto',[ 
 'chat_id'=>$aly,
'photo'=>$message->photo[0]->file_id,'caption'=>$message->caption,'parse_mode'=>"MARKDOWN",'disable_web_page_preview'=>true,
]);
unlink("com.txt");
}
bot('sendmessage',[ 
'chat_id'=>$chat_id, 
'text'=>"- تم نشر الصوره . 🦄💸", 
]); 
} 

if($message->voice and $bot == "mide" and in_array($chat_id,$ad) and $text != "/start"){
$ali = fopen( "memb.txt", 'r');
while(!feof( $ali)){
$aly = fgets($ali);
bot('sendvoice',[
 'chat_id'=>$aly, 
 'voice'=>$message->voice->file_id, 
'caption'=>$message->caption,'parse_mode'=>"MARKDOWN",'disable_web_page_preview'=>true,
]);
unlink("com.txt");
}
bot('sendmessage',[ 
'chat_id'=>$chat_id,
 'text'=>"- تم نشر البصمه . 🦄💸", 
]); 
} 
if($message->sticker and $bot == "mide" and in_array($chat_id,$ad) and $text != "/start"){
$ali = fopen( "memb.txt", 'r');
while(!feof( $ali)){
$aly = fgets($ali);
bot('sendsticker',[
'chat_id'=>$aly,
'sticker'=>$message->sticker->file_id
]);
unlink("com.txt"); 
}
bot('sendmessage',[
'chat_id'=>$chat_id,
 'text'=>"- تم نشر الملصق . 🦄💸", 
]); 
unlink("com.txt"); 
}