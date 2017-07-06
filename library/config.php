<?php
ini_set('session.gc_maxlifetime', 3600);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED & ~E_WARNING);
session_set_cookie_params(3600);
class CONFIG {
	/* DATABASE */
	const DB_HOST = "localhost";
	 
	const RELURL = "/";	
  
  //LIVE
	
  const DB_USER = "savekubw_live";
	const DB_PSW = "%3F=t)uWP@ro";
	const DB_DB = "savekubw_live";
  const SITE = "https://savekubwa.com";
	const SITEADMIN = "https://savekubwa.com/admin/";
  const B_CLIENTID="36757d79-5c27-45c4-a17d-e3ab75e5db24";
  const B_USERNAME="denver";
  const B_PASSWORD="0da95be3ed11240194e324b7bf064b4eaf5bd601";
  const B_SHOPID="SAVEKUBWA";
  
  /*
  //DEMO
  const DB_USER = "savekubw_demo";
	const DB_PSW = "%3F=t)uWP@ro";
	const DB_DB = "savekubw_demo";
  const SITE = "https://demo.savekubwa.com";
	const SITEADMIN = "https://demo.savekubwa.com/admin/";
  const B_CLIENTID="1f8a1efd-929c-41ff-bceb-6a01b7cd3a94";
  const B_USERNAME="savekubwa";
  const B_PASSWORD="e19385ff-0f5a-4c6a-b5bb-b72f5ee9cc39";
  const B_SHOPID="SAVEKUBWA_TEST";

  */
  
  
	const SITENAME = "Savekubwa";
	const EMAIL = "jambo@savekubwa.com"; 
	const FEEDBACK_EMAIL = "feedback@savekubwa.com"; 
	const CONTACT_EMAIL = "mambo@savekubwa.com"; 
	const PAYPAL="info@savekubwa.com";
	const PAYPALURL="https://www.sandbox.paypal.com/cgi-bin/webscr";
	const ADMINMAIL="mambo@savekubwa.com";
	
	const PROBLEM_REPORT_MAIL = "mambo@savekubwa.com";
	const MAIL_FROM = "Savekubwa";
	const LOGO="images/logo.png";
	//Facebook Details
	const APP_ID='829293693783711';
	const APP_SECRET='42944a13fcda3ea7f7ba242a91a0885c';
	 

	
	}
?>