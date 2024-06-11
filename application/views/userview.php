<!doctype html>
<html>
  <head>
    <!-- TinyMCE script -->
    
  </head>
  <body>
    <center>
    
    <!-- Form -->
    <form method='post' action=''>
      <!-- Textarea -->
      <script src='<?= base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js'></script>
      <textarea class='tinymce' name='content'>
      <center><h1>AYYA NADAR JANAKI AMMAL COLLEGE</h1><h5>(Autonomus,affiliated to Madurai Kamaraj University,
        Re-accredited(3rd Cycle) with 'A' grade<br>(CGPA 3.67 out of 4)
        by NAAC and recognized as College of Excellence by UGC,<br>
        Star College by DBT and Ranked 47th at National Level in NIRF 2018)</h5>
        <h2>Sivakasi-West 626124</h2>
      </center>

      <?php if(isset($content)){ echo $content; } ?> 
      </textarea>
      <br>
      
    </form>

    <!-- Script -->
    <script>
    tinymce.init({ 
      selector:'textarea.tinymce,h1.tinymce,h5.tinymce,h2.tinymce',
      theme: 'modern',
      height: 500,
      plugins:["print preview"],
      toolbars:"print preview"
    });
    </script>
    
 </body>
</html>