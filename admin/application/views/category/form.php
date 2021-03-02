<?php
$idcate = $data['idcate'] ?? null;
$category_name = $data['category_name'] ?? null;

?>
<i class="close red icon"></i>
    <div class="header">
    فۆڕمى پۆلێن
  </div>
  <div class="content">
    <form method="post" data-sent="category" id="modalformall" class="ui form">
        <div class="equal width fields">
            <div class="field">
                <label for="">ناوى تەواو</label>
                <input type="hidden" name="id" value="<?=$idcate?>">
                <input placeholder="ناوى تەواو" name="data[category_name]" type="text" value="<?=$category_name?>">
            </div>
        </div>
        <div class="field actions">
            <div class="ui divider"></div>
            <input id="subbtn" type="submit" value="ناردنى زانیارى" class="ui fluid teal button">
        </div>
    </form>

  </div>