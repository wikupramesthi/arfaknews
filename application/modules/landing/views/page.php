<?php
$this->load->view('landing/header.php');
//echo '<pre>';print_r($featured);die;

?>


<div class="content">
   <div class="wrapper">
      <div class="content-wrapper">

<div class="composs-main-content composs-main-content-s-1">

            <!-- BEGIN .composs-panel -->
            <div class="composs-panel">
                <div class="composs-panel-inner">
                    <div class="composs-main-article-content">
                        <div class="shortcode-content">

                            <h2><?=$content->judul?></h2>

                            <p><?=$content->isi?></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
$this->load->view('landing/sidebar.php');
?>

 </div>
 </div>
</div>

<?php
$this->load->view('landing/footer.php');
?>
