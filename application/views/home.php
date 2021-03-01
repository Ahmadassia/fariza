<section class="ui centered grid">
    <div class="row">
        <div class="five wide topArticle column">
            <img src="<?=base_url('assets/article/'.$list[0]['article_image'])?>" alt="<?=$list[0]['title']?>">

            <a href="<?=base_url('author/article/'.$list[0]['id_article'])?>"><?=$list[0]['title']?></a>
        </div>
        <div class="five wide topArticle column">
            <img src="<?=base_url('assets/article/'.$list[1]['article_image'])?>" alt="<?=$list[1]['title']?>">

            <a href="<?=base_url('author/article/'.$list[1]['id_article'])?>"><?=$list[1]['title']?></a>
        </div>
        <div class="four wide topArticle column">
            <img src="<?=base_url('assets/article/'.$list[2]['article_image'])?>" alt="<?=$list[2]['title']?>">

            <a href="<?=base_url('author/article/'.$list[2]['id_article'])?>"><?=$list[2]['title']?></a>
        </div>
    </div>
    <div class="row">
        <div class="four wide topArticle column">
            <img src="<?=base_url('assets/article/'.$list[3]['article_image'])?>" alt="<?=$list[3]['title']?>">

            <a href="<?=base_url('author/article/'.$list[3]['id_article'])?>"><?=$list[3]['title']?></a>
        </div>
        <div class="five wide topArticle column">
            <img src="<?=base_url('assets/article/'.$list[4]['article_image'])?>" alt="<?=$list[4]['title']?>">

            <a href="<?=base_url('author/article/'.$list[4]['id_article'])?>"><?=$list[4]['title']?></a>
        </div>
        <div class="five wide topArticle column">
            <img src="<?=base_url('assets/article/'.$list[5]['article_image'])?>" alt="<?=$list[5]['title']?>">

            <a href="<?=base_url('author/article/'.$list[5]['id_article'])?>"><?=$list[5]['title']?></a>
        </div>
    </div>
    
</section>
<section class="ui centered grid">
    <div class="row">
        <div id="showart" class="nine wide column">
        <?php $this->load->view('sub_article');
         ?>
        </div>
        <div class="five wide column">
         <?php $this->load->view('leftside');?>
        </div>
    </div>
</section>