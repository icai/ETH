<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

 

 
<div class="panel panel-info">
    <div class="panel-heading">直接连接 直接进入的URL</div>
    <div class="panel-body">
        <form action="./index.php" method="get" class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">直接URL</label>
                <div class="col-sm-8 col-lg-9">
                     <input type="text" class="form-control" readonly="readonly" name="url_show" value="<?php  echo $url;?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">二维码</label>
                <div class="col-sm-8 col-lg-9" id="qrcode-block">
                  
                  
                </div>
            </div>

        </form>
    </div>
</div>


<script type="text/javascript">
    
$(function() {

    require(['jquery.qrcode'], function(){

        $('#qrcode-block').html('').qrcode({

            render: 'canvas',

            width: 150,

            height: 150,

            text: '<?php  echo $url;?>'

        });

    })

})

</script>
 
 
 
 
 
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_footer', TEMPLATE_INCLUDEPATH)) : (include template('web/_footer', TEMPLATE_INCLUDEPATH));?>
