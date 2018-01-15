<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<form action="<?php echo base_url()?>admin.php/auth/create_androide" method="post">
  <label for="nom"></label>
  <input type="text" name="login" id="login" />
  <label for="produit"></label>
  <input type="text" name="email" id="email" />

  <textarea name="numtel" id="numtel" cols="45" rows="5"></textarea>
 
  <textarea name="groupe" id="groupe" cols="45" rows="5"></textarea>
  <input type="text" name="district" id="district" />
    <input type="text" name="password" id="password" />
  <input type="submit"  value="Envoyer" />
</form>
</body>
</html>