<?php $htmlString= 5; ?>
<html>
  <body>
    <script type="text/javascript">  
      // notice the quotes around the ?php tag         
      var htmlString=<?php echo $htmlString; ?>;
      alert(htmlString);
    </script>
  </body>
</html>