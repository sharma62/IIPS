<?php 


    $SITE_TITLE = $_SERVER['PHP_SELF'];
    $SITE_TITLE_arr =explode('/',$SITE_TITLE);
    // print_r($_SERVER['PHP_SELF']);
    // print_r($SITE_TITLE_arr);
    $title =  explode('.',$SITE_TITLE_arr[4]);
    // $finalTitle = 
    // echo $title[0];
    // echo "</pre>";

    // at the time of upload 
    define('SERVER_IMG',$_SERVER['DOCUMENT_ROOT']."/myphp/clients/IIPS/");//common for uplaod path
    define('SERVER_FACULTY_IMG',SERVER_IMG."media/faculty_img/");//for faculty
    define('SERVER_BANNER_IMG',SERVER_IMG."media/banner_img/");//for banner image

    //at the time of fatch 
    define('SITE_IMG','http://127.0.0.1/myphp/clients/IIPS/');//common for facth path
    define('SITE_FACULTY_IMG',SITE_IMG.'media/faculty_img/');//for faculty 
    define('SITE_BANNER_IMG',SITE_IMG.'media/banner_img/');//for banner image


     ?>