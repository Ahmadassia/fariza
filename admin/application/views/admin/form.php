<?php
$idadm = $data['idadm'] ?? null;
$fullname = $data['fullname'] ?? null;
$email = $data['email'] ?? null;
$password = $data['password'] ?? null;

?>
<i class="close red icon"></i>
    <div class="header">
    فۆڕمى بەڕێوبەر
  </div>
  <div class="content">
    <form method="post" data-sent="admin" id="modalformall" class="ui form">
        <div class="equal width fields">
            <div class="field">
                <label for="">ناوى تەواو</label>
                <input type="hidden" name="id" value="<?=$idadm?>">
                <input placeholder="ناوى تەواو" name="data[fullname]" type="text" value="<?=$fullname?>">
            </div>
            <div class="field">
                <label for="">ئیمەیل</label>
                <input placeholder="ئیمەیل" class="font-en" name="data[email]" type="email" value="<?=$email?>">
            </div>
            <div class="field">
                <label for="">پاسۆرد</label>
                <input placeholder="پاسۆرد" class="font-en" name="data[password]" type="password" value="<?=$password?>">
            </div>
        </div>
        <div class="field actions">
            <div class="ui divider"></div>
            <input id="subbtn" type="submit" value="ناردنى زانیارى" class="ui fluid teal button">
        </div>
    </form>

  </div>