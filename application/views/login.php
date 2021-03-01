<?php
$idadm = $data['idadm'] ?? null;
$fullname = $data['fullname'] ?? null;
$email = $data['email'] ?? null;
$password = $data['password'] ?? null;

?>
<i class="close red icon"></i>
    <div class="header">
    فۆڕمى چونەژورەوە
  </div>
  <div class="content">
    <form method="post" data-sent="author" id="modalformall" class="ui form">

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
                <img class="rigister" src="<?=base_url('assets/img/login.png')?>" alt="">
            </div>
                </div>

        <div class="field actions">
            <div class="ui divider"></div>
            <input id="subbtn" type="submit" value="چونەژورەوە" class="ui fluid teal button">
        </div>
    </form>

  </div>