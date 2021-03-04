<?php
$id_article = $data['id_article'] ?? null;
$title = $data['title'] ?? null;
$content = $data['content'] ?? null;
$image = $data['article_image'] ?? null;

$old_image = ($image != '')?$image:"pro.jpg";
$re = [];
if(isset($article_cate)){

    foreach($article_cate as $key => $value){
    $re[] = $value['idcate_fk'];
    }
}

?>
<i class="close red icon"></i>
    <div class="header">
    بڵاوکراوە 
  </div>
  <div class="content">
  <?=form_open_multipart('author/article', ['class'=>'ui form','id'=> 'modalformall','data-sent' => "author/article"]);?>
        <div class="field">
            <label for="">ناونیشان </label>
            <input type="hidden" name="id" value="<?=$id_article?>">
            <input placeholder="ناونیشان " required="" name="data[title]" type="text" value="<?=$title?>">
        </div>
        <div class="field">
            <label for="">بابەت</label>
            <textarea name="data[content]" required="" placeholder="بابەت"><?=$content?></textarea>
        </div>
        <div class="equal width fields">
            <div class="field">
                <label>وێنە</label>
                <input type="file" class="ImgInp" name="image">
                <input type="hidden" required="" name="old_image" value="<?=$old_image?>">
            </div>
            <div class="field">
            <label for="content">پۆلێن </label>
            <select id="refSel_cate_info" required="" multiple=""  name="category[]"  class="ui fluid multiple selection dropdown" >
              <option value="">پۆلێن</option>
        <?php
            
            foreach ($this->category as $key => $value) {
                $che = (in_array($value['idcate'], $re))?"selected":"";
              echo '<option value="'.$value['idcate'].'" '.$che.'>'.$value['category_name'].'</option>';
            }
        ?>
        
            </select>
        </div>
        </div>

        <div class="field actions">
            <div class="ui divider"></div>
            <input id="subbtn" type="submit" value="هەڵگرتن " class="ui fluid teal button">
        </div>
    </form>

  </div>