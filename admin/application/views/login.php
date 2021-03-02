<?php
$idadm = $data['idadm'] ?? null;
$fullname = $data['fullname'] ?? null;
$email = $data['email'] ?? null;
$password = $data['password'] ?? null;

?>
<!DOCTYPE html>
<html lang="ku" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="icon" href="<?=base_url('../assets/img/'.$this->webop['logo'])?>" type="image/jpeg" sizes="16x16">
    <title><?=$this->webop['web_title']?></title>
    <link href="https://fonts.googleapis.com/earlyaccess/notonaskharabic.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href=<?=base_url("../assets/semantic.min.css");?>>
    <link rel="stylesheet" type="text/css" href=<?=base_url("../assets/css/stylead.css");?>>
    <link rel="stylesheet" type="text/css" href=<?=base_url("../assets/css/suic.css");?>>
    
    <script>var mainUrl = '<?=base_url();?>'</script>
    
</head>
<body>
<div class="ui centered grid">
<div class="ten wide column">
<br><br><br><br>
    <form method="post" data-sent="login" id="modalformall" class="ui form">

                <div class="fields">
            <div class="eleven wide field">
                <br>
                <input type="hidden" name="type" value="login">
                <div class="field">
                    <label for="">ئیمەیل</label>
                    <input placeholder="ئیمەیل" class="font-en" name="data[email]" type="email" >
                </div>
                <br>
                <div class="field">
                    <label for="">پاسۆرد</label>
                    <input placeholder="پاسۆرد" class="font-en" name="data[password]" type="password">
                </div>
            </div>
            <div class="four wide field">
                <img class="rigister" src="<?=base_url('../assets/img/login.png')?>" alt="">
            </div>
                </div>

        <div class="field actions">
            <div class="ui divider"></div>
            <input id="subbtn" type="submit" value="چونەژورەوە" class="ui fluid teal button">
        </div>
    </form>

</div>
</div>

  <script src="<?=base_url('../assets/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('../assets/semantic.min.js')?>"></script>
    <script src="<?=base_url('../assets/js/main.js')?>"></script>
      
</body>
</html>
  <?php die() ?>