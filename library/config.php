<?php
ini_set('session.gc_maxlifetime', 3600);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED & ~E_WARNING);
session_set_cookie_params(3600);

class CONFIG
{
    /* DATABASE */
    const DB_HOST = "localhost";
    const RELURL = "/";

    //LIVE

    const DB_USER = "root";
    const DB_PSW = "";
    const DB_DB = "pms";
    const SITE = "https://#";

//
const PROJECT_STATUS_0 = 'Pending';
const PROJECT_STATUS_1 = 'Approved';

}

?>