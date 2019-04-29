<?php
    
$unencoded = 'time1556545972club179267730id1351746';
$key = 104758639;
$encoded = encode($unencoded, $key);


echo $encoded;
$encoded = 'c1cbf68827973e7e7a30628cc045b033a898628cf731b033a898e4c0a832bea5a8989be3487b0234aa17f17998ecea4e17cc628cdb4bbea517cc0234f7313696a8989be317cc985c1fe4674c019a4b9517cc9be3a8324b95a8989be3019acde4';
echo '<br>';
$ret = decode($encoded, $key);
echo $ret;
function encode($unencoded,$key){//Шифруем
                $string=base64_encode($unencoded);//Переводим в base64

                $arr=array();//Это массив
                $x=0;
                while ($x++< strlen($string)) {//Цикл
                    $arr[$x-1] = md5(md5($key.$string[$x-1]).$key);//Почти чистый md5
                    $newstr = $newstr.$arr[$x-1][3].$arr[$x-1][6].$arr[$x-1][1].$arr[$x-1][2];//Склеиваем символы
                }
                return $newstr;//Вертаем строку
            }

function decode($encoded, $key){//расшифровываем
$strofsym="qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM=";//Символы, с которых состоит base64-ключ
$x=0;
while ($x++<= strlen($strofsym)) {//Цикл
$tmp = md5(md5($key.$strofsym[$x-1]).$key);//Хеш, который соответствует символу, на который его заменят.
$encoded = str_replace($tmp[3].$tmp[6].$tmp[1].$tmp[2], $strofsym[$x-1], $encoded);//Заменяем №3,6,1,2 из хеша на символ
}
return base64_decode($encoded);
}
?>