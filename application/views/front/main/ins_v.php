
<!DOCTYPE html>
<html lang="kr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--fav-->
        <link rel="shortcut icon" href="/assets/front/images/favicon.ico">
        <!--fav-->
        <link type="text/css" rel="stylesheet" href="/assets/front/css/jquery-ui.css" />
        <link type="text/css" rel="stylesheet" href="/assets/front/css/reset.css" />
        <link type="text/css" rel="stylesheet" href="/assets/front/css/fonts.css" />
        <link type="text/css" rel="stylesheet" href="/assets/front/css/layout.css?ver=<?php echo time()?>" />
        <link type="text/css" rel="stylesheet" href="/assets/front/css/responsive.css?ver=<?php echo time()?>" />
        <script type="text/javascript" src="/assets/front/js/jquery-3.6.1.min.js"></script>
		<script type="text/javascript" src="/assets/front/js/app.common.js?ver=<?php echo time(); ?>"></script>
		<script type="text/javascript" src="/assets/front/js/jquery.blockUI.js"></script>
		<!-- Firebase App is always required and must be first -->
		<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-app.js"></script>
		<!-- Add additional services that you want to use -->
		<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-auth.js"></script>
		<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-firestore.js"></script>	
		<script type="text/javascript" src="/assets/front/js/firebase-config.js?ver=<?php echo time(); ?>"></script>		
		<script type="text/javascript" src="/assets/front/js/chat.js?ver=<?php echo time(); ?>"></script>
        <title>대낙팡.com</title>
    </head>
    
<div class="ins-area">
    <div class="content">
        <img src="/assets/front/images/common/dn_check.png" alt="">
        <div class="expl">
            <?php echo nl2br($terms->content); ?>
        </div>
    </div>
</div>