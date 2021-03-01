<?php
foreach ($article as $key => $value) {
    $sub = explode(' ',$value['content']);
    $sub= array_splice($sub,0,40);
    $sub = implode(' ',$sub);
    
    echo '<div class="mygrid">
    <div class="author">
        <img class="author-image" src="'.base_url('assets/img/profile.png').'">
        <a class="author-name">'.$value['fullname'].'</a>
        <a class="category"><i class="th icon"></i> '.$value['category_name'].'</a>
    </div>
    <a href="'.base_url('home/view/'.$value['id_article']).'" class="title"><h1>'.$value['title'].'</h1></a>
    <div class="articel-image">
        <img class="ui image" src="'.base_url('assets/article/'.$value['article_image']).'">
    </div>
    <div class="sub-content">
    <p>'.$sub.' <a href="'.base_url('home/view/'.$value['id_article']).'" class="title">[...]</a></p>
    </div>
    <div class="articel-action">
        <div class="ui divider"></div>
        <div title="لایکى ئەم بابەتە بکە" class="ui icon basic button">
            <i class="heart  icon"></i>
        </div>
        <div title="ڕاى خۆت بنوسە لەسەر ئەم بابەت" class="ui icon basic left floated button">
            <i class="edit  icon"></i>
        </div>
    </div>
</div>';
}

?>