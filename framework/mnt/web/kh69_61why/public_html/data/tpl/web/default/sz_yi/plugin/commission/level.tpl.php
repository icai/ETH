<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<!--<link rel="stylesheet" href="./resource/css/bootstrap-switch.min.css" type="text/css" />
<script type="text/javascript" src="./resource/js/lib/bootstrap-switch.js"></script>-->
<ul class="nav nav-tabs">
  <?php if(cv('commission.level')) { ?>
  <li <?php  if($_GPC['method']=='level') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createPluginWebUrl('commission/level')?>">分销商等级</a></li>
  <?php  } ?>
</ul>
<div class='alert alert-info'> 提示: 没有设置等级的分销商将按默认设置计算提成。商品指定的佣金金额的优先级仍是最高的，也就是说只要商品指定了佣金金额就按商品的佣金金额来计算，不受等级影响</div>
<style>    
.pad-mar{margin: 10px 0 10px 20px;}    .panel-heading {        background: #E8ECEF;        padding: 5px 0px 5px 40px;        margin: 20px 0px 0 0;        border: 1px solid #CFCFCF;        border-bottom: none;        font-size: 16px;        font-weight: 200;    }    .panel-body {        padding: 20px 0;        margin-bottom: 20px;        border: 1px solid #CFCFCF;        border-top: none;    }
</style>
<?php  if($operation == 'post') { ?>
<div class="main">
  <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php  echo $level['id'];?>" />
    <div class=''> <!--<div class='panel-heading'>--> <!--分销商等级设置--> <!--</div>--> <!--<div class='panel-body'>-->
      <div class='panel-heading'> 权限设置 </div>
      <div class='panel-body'>
        <div class="form-group row">
          <div class="col-md-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon"><span style='color:red'>*</span> 等级名称</div>
              <input type="text" name="levelname" class="form-control" value="<?php  echo $level['levelname'];?>" />
            </div>
          </div>
          <div class="col-md-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">权重</div>
              <input type="text" name="weight" class="form-control" value="<?php  echo $level['weight'];?>" />
            </div>
          </div>
          <div class="col-md-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">是否自动升级</div>
              <div class="input-group-addon">
                <label class="radio-inline" style="margin-top: -7px;">
                  <input type="radio" name="autoupdate" value="1" <?php  if($level['autoupdate']==1) { ?> checked="checked" <?php  } ?>  >
                  是</label>
                <label class="radio-inline" style="margin-top: -7px;">
                  <input type="radio" name="autoupdate" value="0" <?php  if(empty($level['autoupdate']) ) { ?>checked="checked" <?php  } ?>   >
                  否</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class='panel-heading'> 分销比例 </div>
      <div class='panel-body'>
        <div class="row"> <?php  if($this->set['level']>=1) { ?>
          <div class="col-xs-12 col-sm-6 col-lg-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">一级分销比例</div>
              <input type="text" name="commission1" class="form-control" value="<?php  echo $level['commission1'];?>" />
            </div>
          </div>
          <?php  } ?>                    <?php  if($this->set['level']>=2) { ?>
          <div class="col-xs-12 col-sm-6 col-lg-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">二级分销比例</div>
              <input type="text" name="commission2" class="form-control" value="<?php  echo $level['commission2'];?>" />
            </div>
          </div>
          <?php  } ?>                    <?php  if($this->set['level']>=3) { ?>
          <div class="col-xs-12 col-sm-6 col-lg-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">三级分销比例</div>
              <input type="text" name="commission3" class="form-control" value="<?php  echo $level['commission3'];?>" />
            </div>
          </div>
          <?php  } ?>                    <?php  if($this->set['level']>=4) { ?>
          <div class="col-xs-12 col-sm-6 col-lg-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">四级分销比例</div>
              <input type="text" name="commission4" class="form-control" value="<?php  echo $level['commission4'];?>" />
            </div>
          </div>
          <?php  } ?>                    <?php  if($this->set['level']>=5) { ?>
          <div class="col-xs-12 col-sm-6 col-lg-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">五级分销比例</div>
              <input type="text" name="commission5" class="form-control" value="<?php  echo $level['commission5'];?>" />
            </div>
          </div>
          <?php  } ?>                    <?php  if($this->set['level']>=6) { ?>
          <div class="col-xs-12 col-sm-6 col-lg-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">六级分销比例</div>
              <input type="text" name="commission6" class="form-control" value="<?php  echo $level['commission6'];?>" />
            </div>
          </div>
          <?php  } ?>                    <?php  if($this->set['level']>=7) { ?>
          <div class="col-xs-12 col-sm-6 col-lg-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">七级分销比例</div>
              <input type="text" name="commission7" class="form-control" value="<?php  echo $level['commission7'];?>" />
            </div>
          </div>
          <?php  } ?>                    <?php  if($this->set['level']>=8) { ?>
          <div class="col-xs-12 col-sm-6 col-lg-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">八级分销比例</div>
              <input type="text" name="commission8" class="form-control" value="<?php  echo $level['commission8'];?>" />
            </div>
          </div>
          <?php  } ?>                    <?php  if($this->set['level']>=9) { ?>
          <div class="col-xs-12 col-sm-6 col-lg-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">九级分销比例</div>
              <input type="text" name="commission9" class="form-control" value="<?php  echo $level['commission9'];?>" />
            </div>
          </div>
          <?php  } ?>                    <?php  if($this->set['level']>=10) { ?>
          <div class="col-xs-12 col-sm-6 col-lg-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">十级分销比例</div>
              <input type="text" name="commission10" class="form-control" value="<?php  echo $level['commission10'];?>" />
            </div>
          </div>
          <?php  } ?>                    <?php  if($this->set['level']>=11) { ?>
          <div class="col-xs-12 col-sm-6 col-lg-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">十一级分销比例</div>
              <input type="text" name="commission11" class="form-control" value="<?php  echo $level['commission11'];?>" />
            </div>
          </div>
          <?php  } ?>                    <?php  if($this->set['level']>=12) { ?>
          <div class="col-xs-12 col-sm-6 col-lg-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">十二级分销比例</div>
              <input type="text" name="commission12" class="form-control" value="<?php  echo $level['commission12'];?>" />
            </div>
          </div>
          <?php  } ?>                    <?php  if($this->set['level']>=13) { ?>
          <div class="col-xs-12 col-sm-6 col-lg-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">十三级分销比例</div>
              <input type="text" name="commission13" class="form-control" value="<?php  echo $level['commission13'];?>" />
            </div>
          </div>
          <?php  } ?>                    <?php  if($this->set['level']>=14) { ?>
          <div class="col-xs-12 col-sm-6 col-lg-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">十四级分销比例</div>
              <input type="text" name="commission14" class="form-control" value="<?php  echo $level['commission14'];?>" />
            </div>
          </div>
          <?php  } ?>                    <?php  if($this->set['level']>=15) { ?>
          <div class="col-xs-12 col-sm-6 col-lg-3 pad-mar">
            <div class="input-group">
              <div class="input-group-addon">十五级分销比例</div>
              <input type="text" name="commission15" class="form-control" value="<?php  echo $level['commission15'];?>" />
            </div>
          </div>
          <?php  } ?> </div>
      </div>

      <div class='panel-heading'> 升级条件 </div>
      <div class='panel-body'>
      
        <?php  if($id ) { ?>
        <div class="form-group row pad-mar" style="padding-left: 35px;">
          <div class="input-group col-lg-9">
            <div class="input-group-addon">升&nbsp;级&nbsp;会&nbsp;员&nbsp;等&nbsp;级</div>
            <select name='updatemember' class='form-control'>
              <!--<option value="0">请选择</option>-->
              <?php  if(is_array($member_level)) { foreach($member_level as $m_level) { ?>
              <option value="<?php  echo $m_level['id'];?>" selected="selected"><?php  echo $m_level['levelname'];?></option>
              <?php  } } ?>  
            </select>
          </div>
        </div>
        
        <?php  } ?>
        <div class="form-group row pad-mar" style="padding-left: 35px;">
          <div class="input-group col-lg-9">
            <div class="input-group-addon">条&nbsp;&nbsp;&nbsp;件&nbsp;&nbsp;&nbsp;满&nbsp;&nbsp;&nbsp;足</div>
            <select name='tiaojian' class='form-control'>
              <option value='1' <?php  if($level['tiaojian']=='1') { ?>selected<?php  } ?>>下面条件满足任意一个</option>
              <option value='2' <?php  if($level['tiaojian']=='2') { ?>selected<?php  } ?>>满足所有条件</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-lg-4 pad-mar">
            <div class="input-group"> <span class='input-group-addon'>分&nbsp;销&nbsp;订&nbsp;单&nbsp;金&nbsp;额&nbsp;满</span>
              <input type="text" name="updatelevel[]" class="form-control" value="<?php  echo $updatelevel['0'];?>" />
              <span class='input-group-addon'>元</span> </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4 pad-mar">
            <div class="input-group"> <span class='input-group-addon'>一级分销订单金额满</span>
              <input type="text" name="updatelevel[]" class="form-control" value="<?php  echo $updatelevel['1'];?>" />
              <span class='input-group-addon'>元</span> </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4 pad-mar">
            <div class="input-group"> <span class='input-group-addon'>分销订单数量满</span>
              <input type="text" name="updatelevel[]" class="form-control" value="<?php  echo $updatelevel['2'];?>" />
              <span class='input-group-addon'>个</span> </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4 pad-mar">
            <div class="input-group"> <span class='input-group-addon'>一级分销订单数量满</span>
              <input type="text" name="updatelevel[]" class="form-control" value="<?php  echo $updatelevel['3'];?>" />
              <span class='input-group-addon'>个</span> </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4 pad-mar">
            <div class="input-group"> <span class='input-group-addon'>自购订单金额满</span>
              <input type="text" name="updatelevel[]" class="form-control" value="<?php  echo $updatelevel['4'];?>" />
              <span class='input-group-addon'>元</span> </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4 pad-mar">
            <div class="input-group"> <span class='input-group-addon'>下&nbsp;级&nbsp;总&nbsp;人&nbsp;数&nbsp;满&nbsp;&nbsp;</span>
              <input type="text" name="updatelevel[]" class="form-control" value="<?php  echo $updatelevel['5'];?>" />
              <span class='input-group-addon'>个（分销商+非分销商）</span> </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4 pad-mar">
            <div class="input-group"> <span class='input-group-addon'>一级下级人数满</span>
              <input type="text" name="updatelevel[]" class="form-control" value="<?php  echo $updatelevel['6'];?>" />
              <span class='input-group-addon'>个（分销商+非分销商）</span> </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4 pad-mar">
            <div class="input-group"> <span class='input-group-addon'>团&nbsp;队&nbsp;总&nbsp;人&nbsp;数&nbsp;满&nbsp;&nbsp;&nbsp;</span>
              <input type="text" name="updatelevel[]" class="form-control" value="<?php  echo $updatelevel['7'];?>" />
              <span class='input-group-addon'>个（分销商）</span> </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4 pad-mar">
            <div class="input-group"> <span class='input-group-addon'>一级团队人数满&nbsp;&nbsp;&nbsp;</span>
              <input type="text" name="updatelevel[]" class="form-control" value="<?php  echo $updatelevel['8'];?>" />
              <span class='input-group-addon'>个（分销商）</span> </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4 pad-mar">
            <div class="input-group"> <span class='input-group-addon'>已提现佣金总金额满</span>
              <input type="text" name="updatelevel[]" class="form-control" value="<?php  echo $updatelevel['9'];?>" />
              <span class='input-group-addon'>元</span> </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4 pad-mar">
            <div class="input-group"> <span class='input-group-addon'>积&nbsp;&nbsp;分&nbsp;&nbsp;金&nbsp;&nbsp;额&nbsp;&nbsp;满&nbsp;&nbsp;</span>
              <input type="text" name="updatelevel[]" class="form-control" value="<?php  echo $updatelevel['10'];?>" />
              <span class='input-group-addon'>个</span> </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4 pad-mar">
            <div class="input-group"> <span class='input-group-addon'>指定等级</span>
              <div class="input-group-addon" style="padding: 0;border: 0;background: transparent;width: 25%;">
                <select name='updatelevel[]' class='form-control' style="">
                  <option value='0' <?php  if($updatelevel['11']=='0') { ?>selected<?php  } ?>>请选择</option>
                                                                                                            <?php  if(is_array($list)) { foreach($list as $l) { ?>                                                                                          
                  <option value='<?php  echo $l['id'];?>' <?php  if($updatelevel['11']==$l['id']) { ?>selected<?php  } ?>><?php  echo $l['levelname'];?></option>
                                                                                                            <?php  } } ?>                                                                                
                </select>
              </div>
              <span class='input-group-addon'>一级下级人数</span>
              <input type="text" name="updatelevel[]" class="form-control" value="<?php  echo $updatelevel['12'];?>"/>
              <span class='input-group-addon'>个</span> </div>
            <span class='help-block'>分销商升级条件，不填写默认为0</span> </div>
        </div>
      </div>
      <?php  if(0) { ?>
      <div class="col-xs-12 col-sm-6 col-lg-3 pad-mar">
        <div class="input-group">
          <div class="input-group-addon">升级条件</div>
          
          
          <div class='input-group'> <?php  if($leveltype==0) { ?> <span class='input-group-addon'>分销订单金额满</span>
            <input type="text" name="ordermoney" class="form-control" value="<?php  echo $level['ordermoney'];?>" />
            <span class='input-group-addon'>元</span> <?php  } ?>                        <?php  if($leveltype==1) { ?> <span class='input-group-addon'>一级分销订单金额满</span>
            <input type="text" name="ordermoney" class="form-control" value="<?php  echo $level['ordermoney'];?>" />
            <span class='input-group-addon'>元</span> <?php  } ?>                        <?php  if($leveltype==2) { ?> <span class='input-group-addon'>分销订单数量满</span>
            <input type="text" name="ordercount" class="form-control" value="<?php  echo $level['ordercount'];?>" />
            <span class='input-group-addon'>个</span> <?php  } ?>                        <?php  if($leveltype==3) { ?> <span class='input-group-addon'>一级分销订单数量满</span>
            <input type="text" name="ordercount" class="form-control" value="<?php  echo $level['ordercount'];?>" />
            <span class='input-group-addon'>个</span> <?php  } ?>                        <?php  if($leveltype==4) { ?> <span class='input-group-addon'>自购订单金额满</span>
            <input type="text" name="ordermoney" class="form-control" value="<?php  echo $level['ordermoney'];?>" />
            <span class='input-group-addon'>元</span> <?php  } ?>                        <?php  if($leveltype==5) { ?> <span class='input-group-addon'>自购订单数量满</span>
            <input type="text" name="ordercount" class="form-control" value="<?php  echo $level['ordercount'];?>" />
            <span class='input-group-addon'>个</span> <?php  } ?>                        <?php  if($leveltype==6) { ?> <span class='input-group-addon'>下级总人数满</span>
            <input type="text" name="downcount" class="form-control" value="<?php  echo $level['downcount'];?>" />
            <span class='input-group-addon'>个（分销商+非分销商）</span> <?php  } ?>                        <?php  if($leveltype==7) { ?> <span class='input-group-addon'>一级下级人数满</span>
            <input type="text" name="downcount" class="form-control" value="<?php  echo $level['downcount'];?>" />
            <span class='input-group-addon'>个（分销商+非分销商）</span> <?php  } ?>                        <?php  if($leveltype==8) { ?> <span class='input-group-addon'>团队总人数满</span>
            <input type="text" name="downcount" class="form-control" value="<?php  echo $level['downcount'];?>" />
            <span class='input-group-addon'>个（分销商）</span> <?php  } ?>                        <?php  if($leveltype==9) { ?> <span class='input-group-addon'>一级团队人数满</span>
            <input type="text" name="downcount" class="form-control" value="<?php  echo $level['downcount'];?>" />
            <span class='input-group-addon'>个（分销商）</span> <?php  } ?>                        <?php  if($leveltype==10) { ?> <span class='input-group-addon'>已提现佣金总金额满</span>
            <input type="text" name="commissionmoney" class="form-control" value="<?php  echo $level['commissionmoney'];?>" />
            <span class='input-group-addon'>元</span> <?php  } ?> </div>
          <span class='help-block'>分销商升级条件，不填写默认为不自动升级</span> </div>
      </div>
      <?php  } ?>
      <div class='panel-heading'>分销权限</div>
      <div class='panel-body'>
          <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <input type="checkbox" <?php  if($level['authority']['is_withdraw']) { ?>checked="true"<?php  } ?> id="is_withdraw" value="1" name="authority[is_withdraw]">
            <label for="is_withdraw"><span style="color:#F00"> 佣金提现 </span><span style="color:#666">分销员可以佣金提现</span></label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <input type="checkbox" <?php  if($level['authority']['is_qrcode']) { ?>checked="true"<?php  } ?> id="is_qrcode" value="1" name="authority[is_qrcode]">
            <label for="is_qrcode"><span style="color:#F00"> 推广二维码 </span><span style="color:#666">分销员有自己推广二维码，分享显示的是自己的二维码，从扫描该二维码进来的普通消费者将成为该分销员的推荐会员
              设置该角色在分销系统里的权限，未开通分销系统该设置不生效。</span></label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <input type="checkbox" <?php  if(empty($level['authority']['is_shop'])) { ?>checked="true"<?php  } ?> id="is_shop" value="1" name="authority[is_shop]" onClick="actCheck('upmodeDiv1');" >
            <label for="is_shop"><span style="color:#F00"> "我的小店"功能 </span><span style="color:#666">分销员有自己小店，分享店铺时显示的是自己店铺名，从该店铺进来的普通消费者店主可以获得一级返佣，如果关闭小店功能, 则分享的店铺连接，进入店铺的连接全是总店</span></label>
          </div>
        </div>
        <div class="form-group" id="upmodeDiv" style="display:<?php  if($level['authority']['is_shop']) { ?>none<?php  } else { ?>block<?php  } ?>">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <input type="checkbox" <?php  if($level['authority']['is_optional']) { ?>checked="true"<?php  } ?> id="is_optional" value="1" name="authority[is_optional]">
            <label for="is_optional"><span style="color:#F00"> 分销商自选商品 </span><span style="color:#666">是否允许分销商自己的小店选择自己推广的产品,如果开启自选后，要单独禁用某个分销商的自选权限，请到分销商管理中设置</span></label>
          </div>
        </div>
  
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <input type="checkbox" <?php  if($level['authority']['show_goods']) { ?>checked="true"<?php  } ?> id="show_goods" value="1" name="authority[show_goods]">
            <label for="show_goods"><span style="color:#F00"> 分销订单商品详情 </span><span style="color:#666">分销中心分销订单是否显示商品详情</span></label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <input type="checkbox" <?php  if($level['authority']['show_customer']) { ?>checked="true"<?php  } ?> id="show_customer" value="1" name="authority[show_customer]">
            <label for="show_customer"><span style="color:#F00"> 分销订单购买者详情 </span><span style="color:#666">分销中心分销订单是否显示购买者</span></label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <input type="checkbox" <?php  if($level['authority']['is_remind']) { ?>checked="true"<?php  } ?> id="is_remind" value="1" name="authority[is_remind]">
            <label for="is_remind"><span style="color:#F00"> 三级消息提醒 </span><span style="color:#666">是否开启三级分销订单消息提醒功能，不开启上级有消息</span></label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <input type="checkbox" <?php  if($level['authority']['is_message']) { ?>checked="true"<?php  } ?> id="is_message" value="1" name="authority[is_message]">
            <label for="is_message"><span style="color:#F00"> 开启留言 </span><span style="color:#666"></span></label>
          </div>
        </div>
        <!--<div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-1 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <input type="checkbox" <?php  if($level['authority']['is_withdraw']) { ?>checked="true"<?php  } ?> id="is_withdraw" value="1" name="authority[is_withdraw]">
            <label for="is_withdraw"><span style="color:#F00"> 佣金提现 </span><span style="color:#666">分销员可以佣金提现</span></label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-1 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <input type="checkbox" <?php  if($level['authority']['is_qrcode']) { ?>checked="true"<?php  } ?> id="is_qrcode" value="1" name="authority[is_qrcode]">
            <label for="is_qrcode"><span style="color:#F00"> 推广二维码 </span><span style="color:#666">分销员有自己推广二维码，分享显示的是自己的二维码，从扫描该二维码进来的普通消费者将成为该分销员的推荐会员              设置该角色在分销系统里的权限，未开通分销系统该设置不生效。</span></label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-1 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <input type="checkbox" <?php  if($level['authority']['is_optional']) { ?>checked="true"<?php  } ?> id="is_optional" value="1" name="authority[is_optional]">
            <label for="is_optional"><span style="color:#F00"> 分销商自选商品 </span><span style="color:#666">是否允许分销商自己的小店选择自己推广的产品,如果开启自选后，要单独禁用某个分销商的自选权限，请到分销商管理中设置</span></label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-1 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <input type="checkbox" <?php  if($level['authority']['is_shop']) { ?>checked="true"<?php  } ?> id="is_shop" value="0" name="authority[is_shop]">
            <label for="is_shop"><span style="color:#F00"> "我的小店"功能 </span><span style="color:#666">分销员有自己小店，分享店铺时显示的是自己店铺名，从该店铺进来的普通消费者店主可以获得一级返佣，如果关闭小店功能, 则分享的店铺连接，进入店铺的连接全是总店</span></label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-1 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <input type="checkbox" <?php  if($level['authority']['show_goods']) { ?>checked="true"<?php  } ?> id="show_goods" value="1" name="authority[show_goods]">
            <label for="show_goods"><span style="color:#F00"> 分销订单商品详情 </span><span style="color:#666">分销中心分销订单是否显示商品详情</span></label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-1 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <input type="checkbox" <?php  if($level['authority']['show_customer']) { ?>checked="true"<?php  } ?> id="show_customer" value="1" name="authority[show_customer]">
            <label for="show_customer"><span style="color:#F00"> 分销订单购买者详情 </span><span style="color:#666">分销中心分销订单是否显示购买者</span></label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-1 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <input type="checkbox" <?php  if($level['authority']['is_remind']) { ?>checked="true"<?php  } ?> id="is_remind" value="1" name="authority[is_remind]">
            <label for="is_remind"><span style="color:#F00"> <?php  echo $level['authority']['is_remind'];?>三级消息提醒 </span><span style="color:#666">是否开启三级分销订单消息提醒功能，不开启上级有消息</span></label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-1 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <input type="checkbox" <?php  if($level['authority']['is_message']) { ?>checked="true"<?php  } ?> id="is_message" value="1" name="authority[is_message]">
            <label for="is_message"><span style="color:#F00"> 开启留言 </span><span style="color:#666"></span></label>
          </div>
        </div>-->
      </div>
      <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label">&nbsp;</label>
        <div class="col-sm-9 col-xs-12">
          <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
          <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
      </div>
      <!--</div>--> </div>
  </form>
</div>
</div>
<script language='javascript'>    $('form').submit(function(){        if($(':input[name=levelname]').isEmpty()){            Tip.focus($(':input[name=levelname]'),'请输入等级名称!');            return false;        }        return true;    })</script>
<?php  } else if($operation == 'defaultPost') { ?>
<div class="main">
  <form id="setform" action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php  echo $level['id'];?>" />
    <div class='panel panel-default'>
      <div class='panel-heading'> <?php echo empty($set['levelname'])?'普通等级':$set['levelname']?>分销商设置 </div>
      <div class='panel-body'>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 默认级别名称</label>
          <div class="col-sm-9 col-xs-12">
            <input type="text" name="setdata[levelname]" class="form-control" value="<?php echo empty($set['levelname'])?'普通等级':$set['levelname']?>"  />
            <span class="help-block">分销商默认等级名称，不填写默认“普通等级”</span> </div>
        </div>
        <?php  if($this->set['level']>=1) { ?>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">默认分销佣金比例</label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon">一级</div>
              <input type="text" name="setdata[commission1]" class="form-control" value="<?php  echo $set['commission1'];?>"  />
              <div class="input-group-addon">%</div>
            </div>
          </div>
        </div>
        <?php  } ?>                <?php  if($this->set['level']>=2) { ?>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon">二级</div>
              <input type="text" name="setdata[commission2]" class="form-control" value="<?php  echo $set['commission2'];?>"  />
              <div class="input-group-addon">%</div>
            </div>
          </div>
        </div>
        <?php  } ?>        <?php  if($this->set['level']>=3) { ?>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon">三级</div>
              <input type="text" name="setdata[commission3]" class="form-control" value="<?php  echo $set['commission3'];?>"  />
              <div class="input-group-addon">%</div>
            </div>
          </div>
        </div>
        <?php  } ?>        <?php  if($this->set['level']>=4) { ?>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon">四级</div>
              <input type="text" name="setdata[commission4]" class="form-control" value="<?php  echo $set['commission4'];?>"  />
              <div class="input-group-addon">%</div>
            </div>
          </div>
        </div>
        <?php  } ?>        <?php  if($this->set['level']>=5) { ?>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon">五级</div>
              <input type="text" name="setdata[commission5]" class="form-control" value="<?php  echo $set['commission5'];?>"  />
              <div class="input-group-addon">%</div>
            </div>
          </div>
        </div>
        <?php  } ?>        <?php  if($this->set['level']>=6) { ?>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon">六级</div>
              <input type="text" name="setdata[commission6]" class="form-control" value="<?php  echo $set['commission6'];?>"  />
              <div class="input-group-addon">%</div>
            </div>
          </div>
        </div>
        <?php  } ?>        <?php  if($this->set['level']>=7) { ?>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon">七级</div>
              <input type="text" name="setdata[commission7]" class="form-control" value="<?php  echo $set['commission7'];?>"  />
              <div class="input-group-addon">%</div>
            </div>
          </div>
        </div>
        <?php  } ?>        <?php  if($this->set['level']>=8) { ?>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon">八级</div>
              <input type="text" name="setdata[commission8]" class="form-control" value="<?php  echo $set['commission8'];?>"  />
              <div class="input-group-addon">%</div>
            </div>
          </div>
        </div>
        <?php  } ?>        <?php  if($this->set['level']>=9) { ?>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon">九级</div>
              <input type="text" name="setdata[commission9]" class="form-control" value="<?php  echo $set['commission9'];?>"  />
              <div class="input-group-addon">%</div>
            </div>
          </div>
        </div>
        <?php  } ?>        <?php  if($this->set['level']>=10) { ?>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon">十级</div>
              <input type="text" name="setdata[commission10]" class="form-control" value="<?php  echo $set['commission10'];?>"  />
              <div class="input-group-addon">%</div>
            </div>
          </div>
        </div>
        <?php  } ?>        <?php  if($this->set['level']>=11) { ?>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon">十一级</div>
              <input type="text" name="setdata[commission11]" class="form-control" value="<?php  echo $set['commission11'];?>"  />
              <div class="input-group-addon">%</div>
            </div>
          </div>
        </div>
        <?php  } ?>        <?php  if($this->set['level']>=12) { ?>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon">十二级</div>
              <input type="text" name="setdata[commission12]" class="form-control" value="<?php  echo $set['commission12'];?>"  />
              <div class="input-group-addon">%</div>
            </div>
          </div>
        </div>
        <?php  } ?>        <?php  if($this->set['level']>=13) { ?>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon">十三级</div>
              <input type="text" name="setdata[commission13]" class="form-control" value="<?php  echo $set['commission13'];?>"  />
              <div class="input-group-addon">%</div>
            </div>
          </div>
        </div>
        <?php  } ?>        <?php  if($this->set['level']>=14) { ?>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon">十四级</div>
              <input type="text" name="setdata[commission14]" class="form-control" value="<?php  echo $set['commission14'];?>"  />
              <div class="input-group-addon">%</div>
            </div>
          </div>
        </div>
        <?php  } ?>        <?php  if($this->set['level']>=15) { ?>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-4">
            <div class="input-group">
              <div class="input-group-addon">十五级</div>
              <input type="text" name="setdata[commission15]" class="form-control" value="<?php  echo $set['commission15'];?>"  />
              <div class="input-group-addon">%</div>
            </div>
          </div>
        </div>
        <?php  } ?>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-4">
            <div class="input-group"></div>
            <span class='help-block'>新加入的分销商（默认等级），采用此默认比例</span> <span class='help-block'>分销佣金计算优先级： 商品固定佣金比例 > 分销商等级佣金比例 >默认佣金比例</span> </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">成为分销商条件</label>
          <div class="col-sm-9 col-xs-12">
            <label class="radio-inline">
              <input type="radio"  name="setdata[become]" value="0" <?php  if($set['become'] ==0) { ?> checked="checked"<?php  } ?> />
              无条件</label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-6">
            <label class="radio-inline">
              <input type="radio"  name="setdata[become]" value="1" <?php  if($set['become'] ==1) { ?> checked="checked"<?php  } ?> />
              申请</label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-6">
            <div class='input-group' style='border:none;margin-left:-12px;'>
              <div class='input-group-addon'  style='border:none;background:#fff;'>
                <label class="radio-inline" style='margin-top:-3px;'>
                  <input type="radio"  name="setdata[become]" value="2" <?php  if($set['become'] == 2) { ?> checked="checked"<?php  } ?> />
                  消费达到</label>
              </div>
              <input type='text' class='form-control' name='setdata[become_ordercount]' value="<?php  echo $set['become_ordercount'];?>" />
              <div class='input-group-addon'  style='border:none;background:#fff;'>次</div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-6">
            <div class='input-group' style='border:none;margin-left:-12px;'>
              <div class='input-group-addon'  style='border:none;background:#fff;'>
                <label class="radio-inline" style='margin-top:-3px;'>
                  <input type="radio"  name="setdata[become]" value="3" <?php  if($set['become'] == 3) { ?> checked="checked"<?php  } ?> />
                  消费达到</label>
              </div>
              <input type='text' class='form-control' name='setdata[become_moneycount]' value="<?php  echo $set['become_moneycount'];?>" />
              <div class='input-group-addon'  style='border:none;background:#fff;'>元</div>
            </div>
          </div>
        </div>
        <!-- Author:Y.yang Date:2016-04-08 Content:购买指定商品成为分销商 -->
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-6">
            <input type='hidden' class='form-control' id='goodsid' name='setdata[become_goodsid]' value="<?php  echo $set['become_goodsid'];?>" />
            <div class='input-group' style='border:none;margin-left:-12px;'>
              <div class='input-group-addon'  style='border:none;background:#fff;'>
                <label class="radio-inline" style='margin-top:-3px;'>
                  <input type="radio"  name="setdata[become]" value="4" <?php  if($set['become'] == 4) { ?> checked="checked"<?php  } ?> />
                  购买商品</label>
              </div>
              <input type='text' class='form-control' id='goods' value="<?php  if(!empty($goods)) { ?>[<?php  echo $goods['id'];?>]<?php  echo $goods['title'];?><?php  } ?>" readonly />
              <div class="input-group-btn">
                <button type="button" onclick="$('#modal-goods').modal()" class="btn btn-default" >选择商品</button>
              </div>
            </div>
          </div>
        </div>
        <!-- END -->
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
          <div class="col-sm-9 col-xs-12">
            <label class="radio-inline">
              <input type="radio"  name="setdata[become_order]" value="0" <?php  if($set['become_order'] ==0) { ?> checked="checked"<?php  } ?> />
              付款后</label>
            <label class="radio-inline">
              <input type="radio"  name="setdata[become_order]" value="1" <?php  if($set['become_order'] ==1) { ?> checked="checked"<?php  } ?> />
              完成后</label>
            <span class="help-block">消费条件统计的方式</span> </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">佣金提现</label>
          <div class="col-sm-9 col-xs-12">
            <label class="radio-inline">
              <input type="radio"  name="setdata[extract_commission]" value="0" <?php  if($set['extract_commission'] ==0) { ?> checked="checked"<?php  } ?> />
              关闭</label>
            <label class="radio-inline">
              <input type="radio"  name="setdata[extract_commission]" value="1" <?php  if($set['extract_commission'] ==1) { ?> checked="checked"<?php  } ?> />
              开启</label>
            <span class="help-block">分销员可以佣金提现</span> </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">推广二维码</label>
          <div class="col-sm-9 col-xs-12">
            <label class="radio-inline">
              <input type="radio"  name="setdata[spread_qrcode]" value="0" <?php  if($set['spread_qrcode'] ==0) { ?> checked="checked"<?php  } ?> />
              关闭</label>
            <label class="radio-inline">
              <input type="radio"  name="setdata[spread_qrcode]" value="1" <?php  if($set['spread_qrcode'] ==1) { ?> checked="checked"<?php  } ?> />
              开启</label>
            <span class="help-block">分销员有自己推广二维码，分享显示的是自己的二维码，从扫描该二维码进来的普通消费者将成为该分销员的推荐会员 设置该角色在分销系统里的权限，未开通分销系统该设置不生效。</span> </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否关闭"我的小店"功能</label>
          <div class="col-sm-9 col-xs-12">
            <label class="radio-inline">
              <input type="radio"  name="setdata[closemyshop]" value="1" <?php  if($set['closemyshop'] ==1) { ?> checked="checked"<?php  } ?> onClick="actDiv1('upmodeDiv1');" />
              关闭</label>
            <label class="radio-inline">
              <input type="radio"  name="setdata[closemyshop]" value="0" <?php  if(empty($set['closemyshop'])) { ?> checked="checked"<?php  } ?> onClick="actDiv1('upmodeDiv2');"  />
              开启</label>
            <span class="help-block">如果关闭小店功能, 则分享的店铺连接，进入店铺的连接全是总店</span> </div>
        </div>
         <div class="form-group" id="upmodeDiv2" style="display:<?php  if($set['closemyshop'] !=1) { ?>block<?php  } else { ?>none<?php  } ?>">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销商自选商品</label>
          <div class="col-sm-9 col-xs-12">
            <label class="radio-inline">
              <input type="radio"  name="setdata[select_goods]" value="0" <?php  if($set['select_goods'] ==0) { ?> checked="checked"<?php  } ?> />
              关闭</label>
            <label class="radio-inline">
              <input type="radio"  name="setdata[select_goods]" value="1" <?php  if($set['select_goods'] ==1) { ?> checked="checked"<?php  } ?> />
              开启</label>
            <span class="help-block">是否允许分销商自己的小店选择自己推广的产品,如果开启自选后，要单独禁用某个分销商的自选权限，请到分销商管理中设置</span> </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销订单商品详情</label>
          <div class="col-sm-9 col-xs-12">
            <label class="radio-inline">
              <input type="radio"  name="setdata[openorderdetail]" value="0" <?php  if(empty($set['openorderdetail'])) { ?> checked="checked"<?php  } ?> />
              关闭</label>
            <label class="radio-inline">
              <input type="radio"  name="setdata[openorderdetail]" value="1" <?php  if($set['openorderdetail'] ==1) { ?> checked="checked"<?php  } ?> />
              显示</label>
            <span class="help-block">分销中心分销订单是否显示商品详情</span> </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">分销订单购买者详情</label>
          <div class="col-sm-9 col-xs-12">
            <label class="radio-inline">
              <input type="radio"  name="setdata[openorderbuyer]" value="0" <?php  if(empty($set['openorderbuyer'])) { ?> checked="checked"<?php  } ?> />
              关闭</label>
            <label class="radio-inline">
              <input type="radio"  name="setdata[openorderbuyer]" value="1" <?php  if($set['openorderbuyer'] ==1) { ?> checked="checked"<?php  } ?> />
              显示</label>
            <span class="help-block">分销中心分销订单是否显示购买者</span> </div>
        </div>
        <!-- Author:ym Date:2016-04-07 Content:三级消息提醒开关 -->
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">开启三级消息提醒</label>
          <div class="col-sm-9 col-xs-12">
            <label class="radio-inline">
              <input type="radio"  name="setdata[remind_message]" value="0" <?php  if(empty($set['remind_message'])) { ?> checked="checked"<?php  } ?> />
              关闭</label>
            <label class="radio-inline">
              <input type="radio"  name="setdata[remind_message]" value="1" <?php  if($set['remind_message'] ==1) { ?> checked="checked"<?php  } ?> />
              开启</label>
            <span class="help-block">是否开启三级分销订单消息提醒功能，不开启上级有消息</span> </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-3 col-md-2 control-label">开启留言</label>
          <div class="col-sm-9 col-xs-12">
            <label class="radio-inline">
              <input type="radio"  name="setdata[liuyan]" value="0" <?php  if(empty($set['liuyan'])) { ?> checked="checked"<?php  } ?> />
              关闭</label>
            <label class="radio-inline">
              <input type="radio"  name="setdata[liuyan]" value="1" <?php  if($set['liuyan'] ==1) { ?> checked="checked"<?php  } ?> />
              开启</label>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="col-xs-12 col-sm-3 col-md-2 control-label">&nbsp;</label>
      <div class="col-sm-9 col-xs-12">
        <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
      </div>
    </div>
  </form>
</div>
<!-- Author:Y.yang Date:2016-04-08 Content:购买指定商品成为分销商，（选择商品的输入框和JS） -->
<div id="modal-goods"  class="modal fade" tabindex="-1">
  <div class="modal-dialog" style='width: 920px;'>
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h3>选择商品</h3>
      </div>
      <div class="modal-body" >
        <div class="row">
          <div class="input-group">
            <input type="text" class="form-control" name="keyword" value="" id="search-kwd-goods" placeholder="请输入商品名称" />
            <span class='input-group-btn'>
            <button type="button" class="btn btn-default" onclick="search_goods();">搜索</button>
            </span> </div>
        </div>
        <div id="module-menus-goods" style="padding-top:5px;"></div>
      </div>
      <div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a></div>
    </div>
  </div>
</div>
<script language='javascript'>
function actDiv1(divname)
{
	if( divname == 'upmodeDiv1'){
		document.getElementById('upmodeDiv2').style.display = 'none';
	}
	if( divname == 'upmodeDiv2'){
		document.getElementById('upmodeDiv2').style.display = 'block';
	}
}
function search_goods() {
	if( $.trim($('#search-kwd-goods').val())==''){
		Tip.focus('#search-kwd-goods','请输入关键词');
		return;
	}
	$("#module-goods").html("正在搜索....")
	$.get("<?php  echo $this->createWebUrl('shop/query')?>", {
		keyword: $.trim($('#search-kwd-goods').val())
	}, function(dat){
		$('#module-menus-goods').html(dat);
	});
}
function select_good(o) {
	$("#goodsid").val(o.id);
	$("#goods").val( "[" + o.id + "]" + o.title);
	$("#modal-goods .close").click();
}
</script> 
<?php  } else if($operation == 'display') { ?>
<style>    
@media (min-width: 1500px){        table.table>thead>tr>th:last-child{            width: 9%;        }    }    @media (min-width: 1300px) and (max-width: 1480px){        table.table>thead>tr>th:last-child{            width: 11%;        }    }    @media (min-width: 1000px) and (max-width: 1300px){        table>thead>tr>th:last-child{            width: 13%;        }    }
</style>
<form action="" method="post" onsubmit="return formcheck(this)">
  <div class='panel panel-default'>
    <div class='panel-heading'> 分销商等级设置 </div>
    <div class='panel-body'>
      <table class="table table-hover table-responsive table-bordered">
        <thead>
          <tr>
            <th width="5%">等级ID</th>
            <th width="10%">等级名称</th>
            <th width="10%">等级比例</th>
            <th width="25%">升级条件</th>
            <th width="40%">分销权限</th>
            <th width="10%">操作</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>默认</td>
            <td><?php echo empty($set['levelname'])?'普通等级':$set['levelname']?></td>
            <td> <?php  if($this->set['level']>=1) { ?>1级：<?php  echo $set['commission1'];?>%<br />
              <?php  } ?>              <?php  if($this->set['level']>=2) { ?>2级：<?php  echo $set['commission2'];?>%<br />
              <?php  } ?>              <?php  if($this->set['level']>=3) { ?>3级：<?php  echo $set['commission3'];?>%<br />
              <?php  } ?>              <?php  if($this->set['level']>=4) { ?>4级：<?php  echo $set['commission4'];?>%<br />
              <?php  } ?>              <?php  if($this->set['level']>=5) { ?>5级：<?php  echo $set['commission5'];?>%<br />
              <?php  } ?>              <?php  if($this->set['level']>=6) { ?>6级：<?php  echo $set['commission6'];?>%<br />
              <?php  } ?>              <?php  if($this->set['level']>=7) { ?>7级：<?php  echo $set['commission7'];?>%<br />
              <?php  } ?>              <?php  if($this->set['level']>=8) { ?>8级：<?php  echo $set['commission8'];?>%<br />
              <?php  } ?>              <?php  if($this->set['level']>=9) { ?>9级：<?php  echo $set['commission9'];?>%<br />
              <?php  } ?>              <?php  if($this->set['level']>=10) { ?>10级：<?php  echo $set['commission10'];?>%<br />
              <?php  } ?>              <?php  if($this->set['level']>=11) { ?>11级：<?php  echo $set['commission11'];?>%<br />
              <?php  } ?>              <?php  if($this->set['level']>=12) { ?>12级：<?php  echo $set['commission12'];?>%<br />
              <?php  } ?>              <?php  if($this->set['level']>=13) { ?>13级：<?php  echo $set['commission13'];?>%<br />
              <?php  } ?>              <?php  if($this->set['level']>=14) { ?>14级：<?php  echo $set['commission14'];?>%<br />
              <?php  } ?>              <?php  if($this->set['level']>=15) { ?>15级：<?php  echo $set['commission15'];?>%<?php  } ?> </td>
            <td> <?php  if($set['become']==0) { ?>无条件              <?php  } else if($set['become']==1) { ?>申请              <?php  } else if($set['become']==2) { ?>消费达到<?php  echo $set['become_ordercount'];?>次              <?php  } else if($set['become']==3) { ?>消费达到<?php  echo $set['become_moneycount'];?>元              <?php  } else if($set['become']==4) { ?>购买商品：<br />
              <?php  if(!empty($goods)) { ?>[<?php  echo $goods['id'];?>]<?php  echo $goods['title'];?><?php  } ?>              <?php  } ?> </td>
            <td> <?php  if($set['extract_commission'] == 1) { ?>佣金提现,<?php  } ?>              <?php  if($set['spread_qrcode'] == 1) { ?>推广二维码,<?php  } ?>              <?php  if($set['select_goods'] == 1) { ?>自选商品,<?php  } ?>              <?php  if($set['closemyshop'] != 1) { ?>我的小店,<?php  } ?>              <?php  if($set['openorderdetail'] == 1) { ?>订单商品详情,<?php  } ?>              <?php  if($set['openorderbuyer'] == 1) { ?>订单购买者详情,<?php  } ?>              <?php  if($set['remind_message'] == 1) { ?>消息提醒,<?php  } ?>              <?php  if($set['liuyan'] == 1) { ?>开启留言<?php  } ?> </td>
            <td><a class='btn btn-default' href="<?php  echo $this->createPluginWebUrl('commission/level', array('op' => 'defaultPost'))?>">编辑</a></td>
          </tr>
        <?php  if(is_array($list)) { foreach($list as $row) { ?>
        <tr>
          <td><?php  echo $row['id'];?></td>
          <td><?php  echo $row['levelname'];?></td>
          <td> <?php  if($this->set['level']>=1) { ?>1级：<?php  echo $row['commission1'];?>%<br />
            <?php  } ?>            <?php  if($this->set['level']>=2) { ?>2级：<?php  echo $row['commission2'];?>%<br />
            <?php  } ?>            <?php  if($this->set['level']>=3) { ?>3级：<?php  echo $row['commission3'];?>%<br />
            <?php  } ?>            <?php  if($this->set['level']>=4) { ?>4级：<?php  echo $row['commission4'];?>%<br />
            <?php  } ?>            <?php  if($this->set['level']>=5) { ?>5级：<?php  echo $row['commission5'];?>%<br />
            <?php  } ?>            <?php  if($this->set['level']>=6) { ?>6级：<?php  echo $row['commission6'];?>%<br />
            <?php  } ?>            <?php  if($this->set['level']>=7) { ?>7级：<?php  echo $row['commission7'];?>%<br />
            <?php  } ?>            <?php  if($this->set['level']>=8) { ?>8级：<?php  echo $row['commission8'];?>%<br />
            <?php  } ?>            <?php  if($this->set['level']>=9) { ?>9级：<?php  echo $row['commission9'];?>%<br />
            <?php  } ?>            <?php  if($this->set['level']>=10) { ?>10级：<?php  echo $row['commission10'];?>%<br />
            <?php  } ?>            <?php  if($this->set['level']>=11) { ?>11级：<?php  echo $row['commission11'];?>%<br />
            <?php  } ?>            <?php  if($this->set['level']>=12) { ?>12级：<?php  echo $row['commission12'];?>%<br />
            <?php  } ?>            <?php  if($this->set['level']>=13) { ?>13级：<?php  echo $row['commission13'];?>%<br />
            <?php  } ?>            <?php  if($this->set['level']>=14) { ?>14级：<?php  echo $row['commission14'];?>%<br />
            <?php  } ?>            <?php  if($this->set['level']>=15) { ?>15级：<?php  echo $row['commission15'];?>%<?php  } ?> </td>
          <td><?php                 if(!empty($row['autoupdate'])){                  echo '自动升级';               }else{                  echo '不自动升级';              }              ?>
            <?php  if(0) { ?>            <?php  if($leveltype==0) { ?><?php  if($row['ordermoney']>0) { ?>分销订单金额满 <?php  echo $row['ordermoney'];?> 元 <?php  } else { ?>不自动升级<?php  } ?><?php  } ?>            <?php  if($leveltype==1) { ?><?php  if($row['ordermoney']>0) { ?>一级分销订单金额满 <?php  echo $row['ordermoney'];?> 元 <?php  } else { ?>不自动升级<?php  } ?><?php  } ?>            <?php  if($leveltype==2) { ?><?php  if($row['ordercount']>0) { ?>分销订单数量满 <?php  echo $row['ordercount'];?> 个 <?php  } else { ?>不自动升级<?php  } ?><?php  } ?>            <?php  if($leveltype==3) { ?><?php  if($row['ordercount']>0) { ?>一级分销订单数量满 <?php  echo $row['ordercount'];?> 个 <?php  } else { ?>不自动升级<?php  } ?><?php  } ?>            <?php  if($leveltype==4) { ?><?php  if($row['ordermoney']>0) { ?>自购订单金额满 <?php  echo $row['ordermoney'];?> 元 <?php  } else { ?>不自动升级<?php  } ?><?php  } ?>            <?php  if($leveltype==5) { ?><?php  if($row['ordercount']>0) { ?>自购订单数量满 <?php  echo $row['ordercount'];?> 个 <?php  } else { ?>不自动升级<?php  } ?><?php  } ?>            <?php  if($leveltype==6) { ?><?php  if($row['downcount']>0) { ?>下级总人数满 <?php  echo $row['downcount'];?> 个（分销商+非分销商） <?php  } else { ?>不自动升级<?php  } ?><?php  } ?>            <?php  if($leveltype==7) { ?><?php  if($row['downcount']>0) { ?>一级下级人数满 <?php  echo $row['downcount'];?> 个（分销商+非分销商） <?php  } else { ?>不自动升级<?php  } ?><?php  } ?>            <?php  if($leveltype==8) { ?><?php  if($row['downcount']>0) { ?>团队总人数满 <?php  echo $row['downcount'];?> 个（分销商） <?php  } else { ?>不自动升级<?php  } ?><?php  } ?>            <?php  if($leveltype==9) { ?><?php  if($row['downcount']>0) { ?>一级团队人数满 <?php  echo $row['downcount'];?> 个（分销商） <?php  } else { ?>不自动升级<?php  } ?><?php  } ?>            <?php  if($leveltype==10) { ?><?php  if($row['commissionmoney']>0) { ?>已提现佣金总金额满 <?php  echo $row['commissionmoney'];?> 元<?php  } else { ?>不自动升级<?php  } ?><?php  } ?>	            <?php  } ?> </td>
          <td><?php  echo $row['authority_item'];?></td>
          <td><a class='btn btn-default' href="<?php  echo $this->createPluginWebUrl('commission/level', array('op' => 'post', 'id' => $row['id']))?>">编辑</a> <a class='btn btn-default'  href="<?php  echo $this->createPluginWebUrl('commission/level', array('op' => 'delete', 'id' => $row['id']))?>" onclick="return confirm('确认删除此等级吗？');return false;">删除</a></td>
        </tr>
        <?php  } } ?>
          </tbody>
        
      </table>
    </div>
    <div class='panel-footer'> <a class='btn btn-primary' href="<?php  echo $this->createPluginWebUrl('commission/level', array('op' => 'post'))?>"><i class="fa fa-plus"></i> 添加新等级</a> </div>
  </div>
</form>
<?php  } ?><script>  $(function() {    $('[type="checkbox"]').bootstrapSwitch();  });</script>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_footer', TEMPLATE_INCLUDEPATH)) : (include template('web/_footer', TEMPLATE_INCLUDEPATH));?>