<?php

        // $a = 0;
        // $i = 0;
        // $result='';
        // $result1='';
        // $result2='';
        //     for($a==1;$a<1;$a++){ // จำนวนรอบที่ต้องการทดสอบ หรือ สุ่ม
        //         $number='0123456789'; // ตัวแปรตัวเลข ที่จะเอาไปสุ่ม
        //         $number1="ABCDEFGHIJKLMNOPQRSTUVWXYZ"; // ตัวแปรแบบตัวอักษรภาษาอังกฤษ ที่จะเอาไปสุ่ม

        //           for($i==1;$i<2;$i++){ // จำนวนหลักที่ต้องการสามารถเปลี่ยนได้ตามใจชอบนะครับ จาก 5 เป็น 3 หรือ 6 หรือ 10 เป็นต้น
        //             $random=rand(0,strlen($number)-1); //สุ่มตัวเลข
        //             $cut_txt=substr($number,$random,1); //ตัดตัวเลข หรือ ตัวอักษรจากตำแหน่งที่สุ่มได้มา 1 ตัว
        //             $result.=substr($number,$random,1); // เก็บค่าที่ตัดมาแล้วใส่ตัวแปร
        //               $number=str_replace($cut_txt,'',$number); // ลบ หรือ แทนที่ตัวอักษร หรือ ตัวเลขนั้นด้วยค่า ว่าง
        //           }

        //           for($i==1;$i<5;$i++){ // จำนวนหลักที่ต้องการสามารถเปลี่ยนได้ตามใจชอบนะครับ จาก 5 เป็น 3 หรือ 6 หรือ 10 เป็นต้น
        //             $random1=rand(0,strlen($number1)-1); //สุ่มตัวเลข
        //             $cut_txt1=substr($number1,$random1,1); //ตัดตัวเลข หรือ ตัวอักษรจากตำแหน่งที่สุ่มได้มา 1 ตัว
        //             $result1.=substr($number1,$random1,1); // เก็บค่าที่ตัดมาแล้วใส่ตัวแปร
        //             $number2=str_replace($cut_txt1,'',$number1); // ลบ หรือ แทนที่ตัวอักษร หรือ ตัวเลขนั้นด้วยค่า ว่าง
        //           }
        //           $result2 = $result.$result1;
        //           $i=0; // ตั้งค่าให้ $i ใหม่ เริ่มต้นที่ 0
                                                // }
                        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                        // Output: 54esmdr0qf
                        $result = substr(str_shuffle($permitted_chars), 0, 5);
                        echo $result;

?>

