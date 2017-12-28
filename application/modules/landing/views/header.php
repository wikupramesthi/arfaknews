<!DOCTYPE HTML>
<html lang = "en">
    <head>
    <title>Arfaknews</title>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta content='http://www.arfaknews.com/' property='og:url'/>   
    <meta content='Arfaknews' property='og:title'/>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Arfaknews">
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow" />
    <meta name="googlebot-news" content="index,follow" />
    <meta name="msnbot" content="index,follow" />
    <meta name="webcrawlers" content="index,follow" />
    <meta name="spiders" content="index,follow" />
    <meta name="rating" content="general" />
    <link rel="alternate" href="http://www.arfaknews.com/" hreflang="id" />
    <link rel="alternate" href="http://www.arfaknews.com/" hreflang="x-default" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="http://www.arfaknews.com/" />
    <meta property="og:type" content="website" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

        <!-- Stylesheets -->

        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:300,300italic,400,400italic,700,700italic' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/front/normalize.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/front/weather.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/front/typography.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/front/style.css">
        
        <!-- Responsive -->
        <link rel="stylesheet" type="text/css" media="(max-width:768px)" href="<?=base_url();?>assets/css/front/responsive-0.css">
        <link rel="stylesheet" type="text/css" media="(min-width:769px) and (max-width:992px)" href="<?=base_url();?>assets/css/front/responsive-768.css">
        <link rel="stylesheet" type="text/css" media="(min-width:993px) and (max-width:1200px)" href="<?=base_url();?>assets/css/front/responsive-992.css">
        <link rel="stylesheet" type="text/css" media="(min-width:1201px)" href="<?=base_url();?>assets/css/front/responsive-1200.css">
 
 </head>
  
  <body>
    <div id="wrapper" class="wide">            
        <!-- Header -->
        <header id="header" role="banner">                
            <div class="header_meta">
                <div class="container">
                 <div class="site_brand site_left">
                    <h1 id="site_title"><a href="<?=base_url();?>">Arfak<span class="red-color">News</span></a></h1>
                  </div>
                  <div class="sub-search">
                     <form method="get" class="search-form" action="<?=base_url();?>most-recent">
                        <input type="search" class="search-bar" placeholder="berita apa yang Anda cari?" >
                         <button type="submit" class="search-button" value="Cari">Cari</button>
                    </form>
                 </div>
                 <div class="head-social-icons">
                    <ul class="social-icons">
                        <li><a href="#" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="social-icon"> <i class="fa fa-twitter"></i></a></li>
                        <li><a href="" class="social-icon"> <i class="fa fa-instagram"></i></a></li>
                        <li><a href="" class="social-icon"> <i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
                </div>
            </div>

            <div id="header_main" class="sticky header_main">
             <div class="container">
                <nav class="site_navigation" role="navigation">
                 <span class="site_navigation_toggle"><i class="fa fa-reorder"></i></span>
                     <ul class="menu">
                      <li class="logo-fix"><h4><a href="<?=base_url();?>">Arfak<span class="red-color">News</span></a></h4></li>
                      <li class="home"><a href="<?=base_url();?>">Home</a></li>
                        <?php
                        foreach ($category as $row) {
                        ?>
                            <li><a href="<?=base_url().'channel/'.$row->id.'/'.$row->nama_channel?>"><?=$row->nama_channel;?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>

                </div>
            </div>
     </header>