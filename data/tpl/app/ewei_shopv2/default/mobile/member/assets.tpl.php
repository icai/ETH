<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" href="../addons/ewei_shopv2/static/css/bass.css">
<link rel="stylesheet" href="../addons/ewei_shopv2/static/css/assets.css">
<title>资产</title>

<div class='fui-page  fui-page-current member-cart-page'>
  <div class="main">
    <div class="screen">
      <span>在投个数</span>
      <p><?php  echo $investment;?></p>
    </div>

    <div class="nav">
      <div>
        <div class="imgBox aleft" style="color:red" <?php  if($member['type']==2) { ?>onclick="alert('您的账号已锁户');"<?php  } else { ?>onclick="location.href='<?php  echo mobileUrl('member/recharge')?>'"<?php  } ?> >
          <!-- <div class="bgBox"></div> -->
          <div class="txtBox">
            <span><?php  if($member['type']==0) { ?>激活<?php  } else if($member['type']==1) { ?>投资<?php  } else { ?>锁户<?php  } ?></span>
            <p>开启财富之路</p>
          </div>
        </div>
      </div>
      <div>
        <div class="imgBox aright" id="bonusjilu" style="color:green" >
          <!-- <div class="bgBox"></div> -->
          <div class="txtBox" >
            <span>奖金记录</span>
            <p>记录每笔奖金详情</p>
          </div>
        </div>
      </div>
    </div>

    <div class="trx">
      <div class="trxTop">
        <span>可用TRX个数</span>
        <span><?php  echo $investment;?></span>
      </div>
      <div class="trxBtm">
        <div>
          <img src="../addons/ewei_shopv2/static/images/zhuanbi.png" alt="转币">
        </div>
        <div onclick="window.location.href='<?php  echo mobileUrl('member/withdraw')?>'">
          <img src="../addons/ewei_shopv2/static/images/tibi.png" alt="提币">
        </div>
        <div <?php  if($member['type']==2) { ?>onclick="alert('您的账号已锁户');"<?php  } else { ?>onclick="location.href='<?php  echo mobileUrl('member/recharge')?>'"<?php  } ?>>
          <img src="../addons/ewei_shopv2/static/images/chongbi.png" alt="充币">
        </div>
      </div>
    </div>

    <div class="shouyi">
      <div style="background:url(../addons/ewei_shopv2/static/images/liushui3.png);background-size: 100% 100%;box-shadow: 0 0">
        <div class="left_top">
          <span>昨日收益（个）</span>
          <span style="color:#115ec1">0.00</span>
        </div>
        <div class="left_btm">
          <span style="color:#fff">累计收益</span>
          <span style="color:#ab4333">0.500</span>
        </div>
      </div>
      <div id="bonusjilu2" style="background:url(../addons/ewei_shopv2/static/images/liushui2.png);background-size: 100% 100%;box-shadow: 0 0"  >
        <p class="h4">收益流水</p>
        <span>所有收益</span>
        <span>记录汇总</span>
        <img src="" alt="" class="rightImg">
      </div>
    </div>

    <div class="jilu">
      <div class="jiluTop">
        <h4>投资记录</h4>
        <span>账户冲币、提币、转币记录</span>
      </div>
      <div class="jiluBtm">
        <a href="javascript:;" style="background: #2c4fb3;color:white">转币记录</a>
        <a <?php  if($member['type']==2) { ?>onclick="alert('您的账号已锁户');"<?php  } else { ?>href="<?php  echo mobileUrl('member/investmentjilu',array('type'=>2))?>"<?php  } ?>>提币记录</a>
        <a <?php  if($member['type']==2) { ?>onclick="alert('您的账号已锁户');"<?php  } else { ?>href="<?php  echo mobileUrl('member/investmentjilu',array('type'=>1))?>"<?php  } ?>>冲币记录</a>
        <a <?php  if($member['type']==2) { ?>onclick="alert('您的账号已锁户');"<?php  } else { ?>href="<?php  echo mobileUrl('member/wallet')?>"<?php  } ?>>钱包</a>
      </div>

    </div>
  </div>

</div>

<script type="text/javascript">
  var type  = "<?php  echo $member['type'];?>";
  
  if(type!=2){
      $("#bonusjilu").click(function(){
          window.location.href='<?php  echo mobileUrl('member/bonusjilu')?>';
      });
      $("#bonusjilu2").click(function(){
          window.location.href='<?php  echo mobileUrl('member/bonusjilu')?>';
      });
  }else{
       $("#bonusjilu").click(function(){
          alert("您的账号已锁户");
       });
       $("#bonusjilu2").click(function(){
          alert("您的账号已锁户");
       });
  }
      
</script>

<?php  if(empty($_GPC['isnewstore']) ) { ?>

<?php  $this->footerMenus()?>

<?php  } else { ?>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('../../../plugin/newstore/template/mobile/default/_menu', TEMPLATE_INCLUDEPATH)) : (include template('../../../plugin/newstore/template/mobile/default/_menu', TEMPLATE_INCLUDEPATH));?>

<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>