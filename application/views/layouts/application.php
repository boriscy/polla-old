<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Polla mundialista del Super pollón marfileño</title>

  <link rel="stylesheet" href="<?php echo base_url();?>system/css/style.css" type="text/css" media="screen" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

</head>
<body>
  <div id="wrapper">
    <?php $this->load->view( 'layouts/header' ) ?>
  
    <div id="cont">
      <?php $this->load->view( 'layouts/notices' ) ?>  

      <?php $this->load->view( $template ) ?>
    </div>
  
    <?php $this->load->view( 'layouts/footer' ) ?>
  </div>
</body>
</html>
