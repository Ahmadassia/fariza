<div class="ui sticky">
<div class="ui segment">
<div class="ui middle aligned animated divided list">
    <?php

foreach ($this->author as $key => $value) {
    if($value['id_author'] != $this->session->userdata('authorstate')){

        if(in_array($value['id_author'],$this->followAuthor)){
          $typefollow = "unfollow" ;
          $btn = "";
        } else {
          $btn = "inverted";
          $typefollow = "follow" ;
        }
        echo '<div class="item">
        <img class="ui avatar image" src="'.base_url('assets/img/profile.png').'">
        <div class="content">
        <div class="header">'.$value['fullname'].'</div>
        </div>
        <div data-typefollow="'.$typefollow.'" data-type="author" data-id="'.$value['id_author'].'" class="ui btnFollow left floated mini '.$btn.' blue button"> follow</div>
        </div>'; 
    }
}
echo '</div><br><div class="ui divider"></div><br>';
echo '<div class="ui middle aligned animated divided list">';
foreach ($this->category as $key => $value) {
    if(in_array($value['idcate'],$this->followCate)){
      $typefollow = "unfollow" ;
      $btn = "";
    } else {
      $btn = "inverted";
      $typefollow = "follow" ;
    }

    echo '<div class="item">
    <img class="ui avatar image" src="'.base_url('assets/img/category.png').'">
    <div class="content">
      <div class="header">'.$value['category_name'].'</div>
    </div>
      <div data-typefollow="'.$typefollow.'" data-type="cate" data-id="'.$value['idcate'].'" class="ui btnFollow left floated mini '.$btn.' blue button"> follow</div>
  </div>'; 

   
}
?>
  
  
</div>
</div>
</div>