<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="fa"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="fa"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="fa"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<!--<![endif]-->

<head>
<meta charset="utf-8">

<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
<meta name="description" content="">
<meta name="author" content="web-art.ir">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>هتل پارسیان بوعلی</title>
<link rel="stylesheet" href="../css/base.css">
<link rel="stylesheet" href="../css/skeleton.css">
<link rel="stylesheet" href="../css/flexslider.css">
<link rel="stylesheet" href="../css/jquery.fancybox-1.3.4.css">
<link rel="stylesheet" href="../css/validationEngine.jquery.css">
<link rel="stylesheet" href="../css/smoothness/jquery-ui-1.8.22.custom.css">
<link rel="stylesheet" href="../css/ui.spinner.css">
<link rel="stylesheet" href="../css/main.css">

<!--[if IE 9]>
        <link href="css/ie9.css" rel="stylesheet">
<![endif]-->

<!--[if IE 8]>
        <link href="css/ie8.css" rel="stylesheet">
<![endif]-->

<!--[if lt IE 9]>
        <script src="js/html5.js"></script>
<![endif]-->

<link rel="shortcut icon" href="../images/favicon.ico">
<link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="../images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="../images/apple-touch-icon-114x114.png">
</head>

<body>

<!-- Background Image --> 
<img src="../images/bg.jpg" class="bg" alt=""> 

<!-- Root Container -->
<div id="root-container" class="container">
  <div id="wrapper" class="sixteen columns"> 
    
    <!-- Banner -->
    <div id="sub-banner">
      <div id="logo"> <img src="../images/logo.png" alt=""> </div>
      <img src="../images/banner/sub-banner1.jpg" alt=""> </div>
    
    <!-- Main Menu -->
    <div id="menu" class="page">
      <ul id="root-menu" class="sf-menu">
        <li> <a href="../index.php">خانه</a> </li>
        <li> <a href="../reservation" class="active">رزرواسیون</a></li>
        <li> <a href="../about.php">درباره ما</a> </li>
        <li> <a href="../contact.php">تماس با ما</a> </li>
      </ul>
    </div>
    
    <!-- Content -->
    <div id="content" class="reservation">
      <div class="container section">
        <div class="one-third column">
          <h3 class="nobg">رزرواسیون هتل پارسیان بوعلی</h3>
          
          <?php
		  require_once("../connections/link.php");
		  
		  if(isset($_POST['submit']))
		  {
			  do {
				  $name = mysqli_real_escape_string($link, $_POST['firstname']);
				  $family = mysqli_real_escape_string($link, $_POST['lastname']);
				  $melli_code = mysqli_real_escape_string($link, $_POST['melli_code']);
				  $phone = mysqli_real_escape_string($link, $_POST['phone']);
				  $email = mysqli_real_escape_string($link, $_POST['email']);
				  
				  $roomType = intval($_POST['roomType']);
				  $checkin = mysqli_real_escape_string($link, $_POST['checkin']);
				  $checkout = mysqli_real_escape_string($link, $_POST['checkout']);
				  $adult = intval($_POST['adult']);
				  $children = intval($_POST['children']);
				  
				  ///////////////////////////
				  if(empty($name) || empty($family) || empty($melli_code) || empty($phone) || empty($email) || empty($roomType)||empty($checkin) || empty($checkout) || empty($adult) || empty($children))
				  {
					  $msg = '<div class="warning box">لطفا همه فیلدها را کامل کنید!</div>';
					  break;
				  }
				  
				  /////////////////////////
				  $guest_query = "INSERT INTO `guest` VALUES(NULL, '$name', '$family', '$melli_code', '$phone', '$email', $adult, $children);";
				  if(!mysqli_query($link, $guest_query))
				  {
					  $msg = '<div class="error box">خطا در درج اطلاعات</div>';
					  break;
				  }
				  $guestID = mysqli_insert_id($link);
				  
				  ////////////////////////////
				  $roomID = 1;
				  
				  ////////////////////////////
				  $res_query = "INSERT INTO `reservation` VALUES(NULL, '$checkin', '$checkout', $roomID, $guestID);";
				  if(!mysqli_query($link, $res_query)) {
					  $msg = '<div class="error box">خطا در درج اطلاعات</div>';
					  break;
				  }
				  $msg = '<div class="success box">با موفقیت ثبت شد!</div>';
				  
			  } while(false);
			  
			  
		  }
          
		  ?>
          
          <div class="info box">فیلدهای ستاره دار الزامی است.</div>
          <?php if(isset($msg)) echo $msg; ?>
        </div>
        
        <br>
        
        <div class="two-third column last">
          <form class="validate" method="post" action="reservation.php">
            <h3><span class="left">اطلاعات میهمان</span></h3>
            <p>
              <label for="firstname" class="required label">نام:</label>
              <input id="firstname" class="validate[required]" type="text" name="firstname" />
            </p>
            <p>
              <label for="lastname" class="required label">نام خانوادگی:</label>
              <input id="lastname" class="validate[required]" type="text" name="lastname" />
            </p>
            <p>
              <label for="melli_code" class="required label">کد ملی:</label>
              <input id="melli_code" class="validate[required]" type="text" name="melli_code" />
            </p>
            <p>
              <label for="phone" class="required label">تلفن:</label>
              <input id="phone" class="validate[required]" type="text" name="phone" />
            </p>
            <p>
              <label for="email" class="required label">ایمیل:</label>
              <input id="email" class="validate[required,custom[email]]" type="text" name="email" />
            </p>
            <br>
            
            <h3 class="extra-margin top"><span class="left">اطلاعات رزرو</span></h3>
            
            <?php
			$ID = isset($_GET['ID']) ? intval($_GET['ID']) : 0;
			$room_result = mysqli_query($link, "SELECT * FROM `room_type`") or die(mysqli_error());
			
			echo '<label for="room-type" class="required label">نوع اتاق:</label>
				  <select id="room-type" class="validate[required]" name="roomType">';
			
			while($rooms = mysqli_fetch_array($room_result))
			{
				if($ID == $rooms[0])
				{
					echo '<option value="'.$rooms[0].'" selected>'.$rooms[1].'</option>';
				} else {
					echo '<option value="'.$rooms[0].'">'.$rooms[1].'</option>';
				}
			}
			
			echo '</select>';
			?>
            <p>
              
              
                
              
            </p>
            <p>
              <label for="checkin" class="required label">تاریخ ورود:</label>
              <input type="text" readonly="readonly" id="checkin" class="validate[required] datepicker" name="checkin" />
            </p>
            <p>
              <label for="checkout" class="required label">تاریخ خروج:</label>
              <input type="text" readonly="readonly" id="checkout" class="validate[required] datepicker" name="checkout" />
            </p>
       
            <p>
              <label for="adultamt" class="required label">تعداد افراد بزرگسال:</label>
              <input type="text" id="adultamt" name="adult" value="1" class="spinner" />
            </p>
            <p>
              <label for="childrenamt" class="required label">تعداد بچه‌ها:</label>
              <input type="text" id="childrenamt" name="children" value="0" class="spinner-min0" />
            </p>
            
            <p>
              <label></label>
              <input type="submit" name="submit" id="submit" class="medium gray button" value=" ثبت " />
            </p>
          </form>
        </div>
      </div>
    </div>
    
    <!-- Footer -->
    <div id="footer">
      <div class="container section end">
        <div id="footer-about" class="one-fourth column">
          <p><img src="../images/footer-logo.png" alt=""> </p>
          <p><strong>آدرس:</strong> همدان خیابان بوعلی کد پستی 65156</p>
          <p> <span><strong>تلفن:</strong> 8252822-3 و 8250788</span></p>
          <p><span><strong>فاکس:</strong> 8276373</span></p>
        </div>
        <div id="footer-events" class="one-fourth column">
          <h4><span class="footer right">امكانات هتل</span></h4>
          <ul>
            <li><a href="#">اينترنت وايرلس Wi-Fi</a></li>
            <li><a href="#">خشكشويي</a></li>
            <li><a href="#">تاكسي سرويس</a></li>
            <li><a href="#">پاركينگ اختصاصي</a></li>
          </ul>
        </div>
        <div id="footer-offers" class="one-fourth column">
          <h4><span class="footer right">امكانات اتاق</span></h4>
          <ul>
            <li><a href="#">حمام با وان</a></li>
            <li><a href="#">بالكن با نماي باغ</a></li>
            <li><a href="#">ميني بار</a></li>
            <li><a href="#">سشوار</a></li>
          </ul>
        </div>
        <div id="footer-gallery" class="one-fourth column last">
          <h4><span class="footer right">گالری تصاویر</span></h4>
          <ul>
            <li> <a href="../images/gallery/beach/1.jpg" class="image-box" rel="beach"><img src="../images/footer-gallery1.jpg"  alt=""></a> </li>
            <li> <a href="../images/gallery/beach/2.jpg" class="image-box" rel="beach"><img src="../images/footer-gallery2.jpg"  alt=""></a> </li>
            <li> <a href="../images/gallery/beach/3.jpg" class="image-box" rel="beach"><img src="../images/footer-gallery3.jpg"  alt=""></a> </li>
            <li> <a href="../images/gallery/beach/4.jpg" class="image-box" rel="beach"><img src="../images/footer-gallery4.jpg"  alt=""></a> </li>
            <li> <a href="../images/gallery/beach/5.jpg" class="image-box" rel="beach"><img src="../images/footer-gallery5.jpg"  alt=""></a> </li>
            <li> <a href="../images/gallery/beach/6.jpg" class="image-box" rel="beach"><img src="../images/footer-gallery6.jpg"  alt=""></a> </li>
          </ul>
        </div>
      </div>
    </div>
    
    <!-- Copyright and Social Icons -->
    <div id="copyright">
      <div class="container section end">
        <ul id="social">
          <li> <a href="#"><img src="../images/social/facebook.png" alt=""></a> </li>
          <li> <a href="#"><img src="../images/social/flickr.png" alt=""></a> </li>
          <li> <a href="#"><img src="../images/social/twitter.png" alt=""></a> </li>
          <li> <a href="#"><img src="../images/social/vimeo.png" alt=""></a> </li>
          <li> <a href="#"><img src="../images/social/rss.png" alt=""></a> </li>
          <li> <a href="#"><img src="../images/social/google-plus.png" alt=""></a> </li>
          <li> <a href="#"><img src="../images/social/linkedin.png" alt=""></a> </li>
          <li> <a href="#"><img src="../images/social/dribbble.png" alt=""></a> </li>
        </ul>
        <span id="text">Copyright &copy; 2013 Hotel | Design &amp; Implementation: <a href="http://web-art.ir">Web-Art</a></span> </div>
    </div>
  </div>
</div>


<script src="../js/jquery-1.7.2.min.js"></script> 
<script src="../js/jquery.easing.1.3.js"></script> 
<script src="../js/jquery.flexslider-min.js"></script> 
<script src="../js/jquery.hoverIntent.minified.js"></script> 
<script src="../js/superfish.js"></script> 
<script src="../js/jquery.cycle.lite.js"></script> 
<script src="../js/jquery.fancybox-1.3.4.pack.js"></script> 

<script src="../js/jquery.validationEngine.js"></script> 
<script src="../js/jquery.validationEngine-en.js"></script> 
<script src="../js/jquery-ui-1.8.22.custom.min.js"></script> 
<script src="../js/ui.spinner.min.js"></script> 

<script src="../js/script.js"></script>
</body>
</html>
