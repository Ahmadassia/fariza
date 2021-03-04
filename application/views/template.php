<!DOCTYPE html>
<html lang="ku" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="icon" href="<?=base_url('assets/img/'.$this->webop['logo'])?>" type="image/jpeg" sizes="16x16">
    <title><?=$this->webop['web_title']?></title>
    <link href="https://fonts.googleapis.com/earlyaccess/notonaskharabic.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href=<?=base_url("assets/semantic.min.css");?>>
    <link rel="stylesheet" type="text/css" href=<?=base_url("assets/css/stylead.css");?>>
    <link rel="stylesheet" type="text/css" href=<?=base_url("assets/css/suic.css");?>>
    
    <script>var mainUrl = '<?=base_url();?>'</script>
    
</head>
<body>
    
    <div class="pusher">
    <?php
    if(isset($dashbord)){ ?>
        <div id="mainmenu">
            <div class="toppage ui vertical inverted menu">
                <a class="item" href="<?=base_url()?>" class=""><i class="home icon"></i> &nbsp; <?=$this->webop['web_title']?> &nbsp; </a>
            </div>
            <div class="ui vertical inverted pointing menu">
                <a href="<?=base_url('author')?>" class="item active "><i class="grid layout icon"></i> نوسەر</a>
            </div>
        </div>
        <div id="mainpage">
            <div class="toppage">
            <?php
                if($this->session->userdata('authorstate') !== null){
                    echo ' </span> &nbsp; <a title="دەرچوون" href="'.base_url('author/logout').'" class="ui red mini icon left floated button"><i class="sign out alternate icon"></i></a> &nbsp; 
                    <span class="ui left floated mini labeled icon button">'.$this->authorData['fullname'].' <i class="user icon"></i></span>';   
                }
            ?>
            </div>
            <div id="maincontent">
                <?=$this->template->content;?>
            </div>
        </div>

    <?php } else { ?>

        <header id="haedpage" class="ui centered grid">
            <div class="right aligned seven wide column">
                <a href="<?=base_url()?>"><img class="logo" src="<?=base_url('assets/img/'.$this->webop['logo'])?>" alt="<?=$this->webop['web_title']?>">
                </a>
                <span class="web-title">
                    <?=$this->webop['web_title']?>
                </span>
                
            </div>
            
            <div class="left aligned seven wide column">
                <br>
                <br>
            <?php
                if($this->session->userdata('authorstate') !== null){
                    echo '<a href="'.base_url('author').'" ><img class="ui avatar image" src="'.base_url('assets/img/profile.png').'">
                    <span>'.$this->authorData['fullname'].' &nbsp; </span> &nbsp; </a> <a title="دەرچوون" href="'.base_url('author/logout').'" class="ui red icon button"><i class="sign out alternate icon"></i></a> ';
                } else {
                    echo '<div data-page="author/login/" class="ui tertiary prosForm button">چونەژورەوە</div> &nbsp; 
                    <div data-page="author/rigister/" class="ui blue prosForm button">خۆتۆمارکردن</div> &nbsp; ';
                }
            ?>
                
                <div class="ui icon small input">
                    <input type="text" placeholder="Search...">
                    <i class="search icon"></i>
                </div>
            </div>
            <div class="sixteen wide column">
            </div>
        </header>
        <nav id="mainnav" class="ui inverted blue stackable main menu ">
            <div class="ui text container">
                <a href="<?=base_url('')?>" class="header item">
                <?=$this->webop['web_title']?>
                </a>
            <?php
            foreach ($this->category as $key => $value) {
                echo '<a class="item" href="'.base_url('home/category/'.$value['category_name']).'">
                    '.$value['category_name'].'
                </a>';
            }
            ?>
                
            </div>
        </nav>

        <?=$this->template->content;?>

        <footer class="ui centered grid">
            <div class="sixteen wide center aligned column ">
                <br><br>
            <?php
            foreach ($this->category as $key => $value) {
                echo '<a class="ui inverted blue button" href="'.base_url('home/category/'.$value['category_name']).'">
                '.$value['category_name'].'
                </a> &nbsp; ';
            }
            ?>
                <br><br><br>
            </div>
            <div class="sixteen wide center aligned column ">
                <i class="facebook f blue big link icon"></i>
                <i class="instagram big yellow link icon"></i>
                <i class="twitter big teal link icon"></i>
                <i class="youtube red big link icon"></i>
                <i class="github  big link icon"></i>
                <br><br><br>
                </div>
            <div class="sixteen wide center aligned column ">

                <h4>ئەم وێبسایتە پڕۆژەیەکە بۆ وانەى وێب دیڤلۆپمێنت ، لەلایەم ئەم چوار خوێندکاروە گەشە پێدراوە</h4>
                <h4>احمد عاصى <i class="code icon"></i> بیلال محمد  <i class="code icon"></i> کۆڕەک عثمان <i class="code icon"></i> هیوا عزیز</h4>
                <h3><?=$this->webop['web_title']?>  2021 &copy;</h3>
                <br>
            </div>

        </footer>
        <div id="prosForm" class="ui modal"></div>
            

    <?php } ?>
    </div>
    <script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('assets/semantic.min.js')?>"></script>
    <script src="<?=base_url('assets/js/main.js')?>"></script>
      
</body>
</html>
