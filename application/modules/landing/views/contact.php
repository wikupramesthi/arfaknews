 <?php
   $this->load->view('landing/header.php');
   //echo '<pre>';print_r($channel);
 ?>

 <div class="container content-wrapper">
  <div class="row">

   <div class="col col_9_of_12 content">
   <div class="panel_title">
     <div>
        <h4>Hubungi Kami</h4>
     </div>
    </div>
    
<div class="contact-us">
     <p>Silahkan isi form di bawah ini untuk mengirim pertanyaan, kritik dan saran tentang arfaknews.com.</p>
      <form action="landing/contact_us" id="contact" method="post" class="form">
            <p>
                <label>Nama*</label>
                <input type="text"  name="nama" id="nama" class="form-input" required>
            </p>
            <p>
                <label>No. Telepon*</label>
                <input type="text"  name="telp" id="telp" class="form-input" required>
            </p>
            <p>
                <label>Email*</label>
                <input type="text"  name="email" id="email" class="form-input" required>
            </p>
            <p>
                <label>Pesan</label>
                <textarea  name="isi" id="isi" class="form-input" required></textarea>
            </p>
            <p>
               <input type="submit" class="btn" value="Kirim">
            </p>
        </form>
  </div>

   </div>

    <div id="sidebar" class="col col_3_of_12 sidebar isfixedsidebar">
           <?php
             $this->load->view('landing/sidebar.php');
          ?>    
   </div>

 </div>
</div>


<?php
$this->load->view('landing/footer.php');
?>