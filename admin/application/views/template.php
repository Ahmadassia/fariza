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
    
    <div class="pusher">
        <div id="mainmenu">
            <div class="toppage menu">
            </div>
            <div class="ui vertical inverted pointing menu">
                <a href="<?=base_url('admin')?>" class="item active "><i class="user  icon"></i> بەڕێوبەر</a>
                <a href="<?=base_url('category')?>" class="item"><i class="grid layout icon"></i> پۆلێن</a>
                <a href="<?=base_url('')?>" class="item"><i class="edit layout icon"></i> بڵاوکراوەکان</a>
            </div>
        </div>
        <div id="mainpage">
            <div class="toppage">
            <?php
                if($this->session->userdata('adminstate') !== null){
                    echo ' </span> &nbsp; <a title="دەرچوون" href="'.base_url('login/logout').'" class="ui red mini icon left floated button"><i class="sign out alternate icon"></i></a> &nbsp; 
                    <span class="ui left floated mini labeled icon button">'.$this->adminData['fullname'].' <i class="user icon"></i></span>';   
                }
            ?>
            </div>
            <div id="maincontent">
                <?=$this->template->content;?>
            </div>
        </div>
    </div>
    <script src="<?=base_url('../assets/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('../assets/semantic.min.js')?>"></script>
    <script src="<?=base_url('../assets/js/main.js')?>"></script>
      
</body>
</html>