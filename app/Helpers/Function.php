
<?php 


function currency_format($number, $suffix = 'đ') {
  if (!empty($number)) {
    return number_format($number, 0, ',', '.') . "{$suffix}";
  }
  if($number==0)
  {
    return number_format($number, 0, ',', '.') . "{$suffix}";
  }
}
function getDayExpirationComing($key)
{
  if($key==1)
  {
    $expiration_coming = Carbon\Carbon::now()->addDays(10)->format("Y-m-d");
    return strtotime($expiration_coming);
  }
  if($key==2){
    $now = Carbon\Carbon::now()->format("Y-m-d");
    return strtotime($now);
  }
  return "";
  
}
 function format_date($date)
{
    return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
}
function convert_vi_to_en($str) {
  $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
  $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
  $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
  $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
  $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
  $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
  $str = preg_replace("/(đ)/", "d", $str);
  $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
  $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
  $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
  $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
  $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
  $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
  $str = preg_replace("/(Đ)/", "D", $str);
  $str = str_replace(" ", "-", str_replace("&*#39;","",$str));
  return $str;
}
function get_code($id,$prefix)
{
  $numRule=7;
  $str="";
  for($i=0;$i<($numRule-strlen($id));$i++)
  {
    $str=$str."0";
  }
  return $prefix."".$str."".$id;
}

    ?>