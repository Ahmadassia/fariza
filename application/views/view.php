<section class="ui centered grid">
    <div class="row">
        <div id="showart" class="nine wide column">
        
            <?php
if (count($article) == 1) {
    $article = $article[0];
    echo '<div class="mygrid">
    <div class="author">
    <img class="author-image" src="'.base_url('assets/img/'.$this->webop['header']).'">
    <a class="author-name">'.$article['fullname'].'</a>
    <a class="category"><i class="th icon"></i> '.$article['category_name'].'</a>
    </div>
    <a href="'.base_url('author/article/'.$article['id_article']).'" class="title"><h1>'.$article['title'].'</h1></a>
    <div class="articel-image">
    <img class="ui image" src="'.base_url('assets/article/'.$article['article_image']).'">
    </div>
    <div class="sub-content">
    <p>'.$article['content'].'</p>
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
</div>
<div class="five wide column">
<?php $this->load->view('leftside');?>

</div>
</div>
</section>