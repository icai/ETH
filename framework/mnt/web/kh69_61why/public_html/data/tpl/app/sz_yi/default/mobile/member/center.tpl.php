<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<title>个人中心</title>
<style type="text/css">
    body { margin: 0px; background: #eee; -moz-appearance: none; }
    a { text-decoration: none; }
    .header { height: auto; width: 100%; padding: 0px; background: url(../addons/sz_yi/template/mobile/default/static/images/bg2.png) 0 0 no-repeat; background-size: 100% 100%; }
    .header .user { height: 48px; padding: 10px; }
    .header .user .user-head { height: 48px; width: 48px; background: #fff; border-radius: 50%; float: left; border: 2px solid #fff; }
    .header .user .user-head img { height: 48px; width: 48px; border-radius: 24px; }
    .header .user .user-info { height: 48px; width: auto; float: left; margin-left: 14px; color: #fff; padding-top: 5px; }
    .header .user .user-info .user-name { height: 24px; width: auto; font-size: 16px; line-height: 24px; }
    .header .user .user-info .user-other { height: 24px; width: auto; font-size: 12px; }
    .header .user-gold { height: 35px; width: 94%; padding: 5px 3%; border-bottom: 1px solid #ddd; background: #fff; font-size: 16px; line-height: 35px; }
    .header .user-gold .title { height: 35px; width: auto; float: left; color: #666; }
    .header .user-gold .num { height: 35px; width: auto; float: left; color: #f90; }
    .header .user-gold .draw { width: 80px; height: 30px; background: #6c9; float: right; }
    .header .user .set { height: 26px; width: 26px; float: right; margin-top: 10px; }
    .header .user-op { height: 35px; width: 94%; padding: 5px 3%; border-bottom: 1px solid #ddd; background: #fff; font-size: 16px; line-height: 35px; }
    .take { height: 30px; width: auto; padding: 0 10px; line-height: 30px; font-size: 16px; float: right; background: #ff6600; border-radius: 5px; margin-top: 5px; color: #fff; }
    .take1 { height: 30px; width: auto; padding: 0 10px; line-height: 30px; font-size: 16px; float: right; background: #00cc00; border-radius: 5px; margin-top: 5px; color: #fff; }
    .order { height: 135px; width: 100%; background: #fff; margin-top: 20px; border-bottom: 1px solid #ddd; }
    .order_all { height: 100px; width: 100%; padding: 16px 0px; color: #666; }
    .order_pub { height: 18px; float: left; border-left: 1px solid #eee; padding-top: 5px; text-align: center; color: #666; position: relative; }
    .order_pub span { height: 16px; width: 16px; background: #f30; border-radius: 8px; position: absolute; top: 0; right: 25%; font-size: 12px; color: #fff; line-height: 16px; }
    .order_1 { width: 24%; }
    .order_2 { width: 25%; }
    .order_3 { width: 25%; }
    .order_4 { width: 25%; }
    .list1 { height: 44px; width: 94%; background: #fff; padding: 0px 3%; margin-top: 20px; border-bottom: 1px solid #ddd; border-top: 1px solid #ddd; line-height: 44px; color: #666; }
    .list1 i { font-size: 20px; margin-right: 10px; }
    .allorder { float: right; color: #aaa; margin-right: 45px; text-decoration: none; }
    .cart { height: auto; width: 100%; background: #fff; margin-top: 20px; border-bottom: 1px solid #ddd; }
    .address { height: 38px; width: 100%; background: #fff; margin-top: 20px; border-bottom: 1px solid #ddd; border-top: 1px solid #ddd; line-height: 38px; }
    .copyright { height: 40px; width: 100%; text-align: center; line-height: 40px; font-size: 12px; color: #999; margin-top: 10px; }
    span.count { float: right; margin-top: 15px; margin-right: 5px; height: 16px; width: 16px; background: #f30; border-radius: 8px; font-size: 12px; color: #fff; line-height: 16px; text-align: center; }

    /*我的农场*/
    .hs-center-top{background: #6c6cef;color: #fff;overflow: hidden; padding: 20px 10px}
    .hs-center-img{text-align: center;float: left;}
    .hs-center-img span{height: 60px;width: 60px;border-radius: 50%;border: 2px solid #fff;overflow: hidden;display: block;}
    .hs-center-img span img{width: 100%;border: 0}
    .hs-center-left{float: left;margin-left: 10px;line-height: 22px}
    .hs-center-set{float: right;margin-top: 20px}
    .hs-center-pic{overflow: hidden;}
    .hs-center-pic a{float: left;background: #fff;width: 33.333%;display: block;padding: 10px 0;text-align: center;color: #666;line-height: 22px;height: 50px}
    .hs-center-pic a span{display: inline-block; text-align: left;}
    .hs-center-pic a span:first-child{text-align: center; margin-right: 3px; vertical-align: 10px;width: 35px;height: 35px;border-radius: 3px;    text-align: center;}
    .hs-center-pic a span:first-child i{font-size: 25px;color: #fff;padding: 5px}
    .hs-center-link{overflow: hidden; background: #fff;margin-top: 15px;border-top: 1px solid #eee;border-bottom: 1px solid #eee}
    .hs-center-link a{display: block;float: left;width: 25%;border-right: 1px solid #eee;border-bottom: 1px solid #eee;margin-left: -1px;text-align: center;padding: 20px 0;color: #666}
    .hs-center-link a span{display: block;line-height: 25px}
    .hs-center-link a span:first-child i{font-size: 30px}
</style>
<div id="container"></div>
<script id="member_center" type="text/html">
    <div class="hs-center-top">
        <div class="hs-center-img">
            <span><img src="<%member.avatar%>" /></span>
        </div>
        <div class="hs-center-left">
            <div>会员ID：<%member.id%></div>
            <div>微信昵称：<%member.nickname%></div>
            <div>会员等级：<%level.levelname%><%if shop_set.shop.isreferrer%> [推荐人：<%referrer.realname%>]<%/if%></div>
        </div>
        <div class="hs-center-set" onclick='location.href="<?php  echo $this->createMobileUrl('member/info')?>"'>
            <i class="fa fa-gear" style="font-size:26px; color:#fff;"></i>
        </div>
    </div>
    <div class="hs-center-pic">
        <a href="javascript:;">
            <span style="background: #93ca0c"><i class="fa fa-jpy"></i></span>
            <span>金果<br/><%member.credit2%></span> 
        </a>
        <a href="javascript:;">
            <span style="background: #e2b64b"><i class="fa fa-heart-o"></i></span>
            <span>鲜果<br/><%member.xianguo%></span>
        </a>
        <a href="javascript:;">
            <span style="background: #0096ff"><i class="fa fa-bars"></i></span>
            <span>耕种果<br/><%member.gengzhongguo%></span>
        </a> 
    </div>
    <div class="hs-center-link">
        <a href="<?php  echo $this->createMobileUrl('shop/jinguo')?>">
            <span style="color: #93ca0c"><i class="fa fa-heart-o"></i></span>
            <span>金果转赠</span> 
        </a> 
        <?php  if($hascom) { ?>
        <a href="<?php  echo $this->createPluginMobileUrl('commission')?>">
            <span style="color:#f10;"><i class="fa fa-home"></i></span>
            <!-- <span><?php  echo $pset['texts']['center']?></span>  -->
            <span>我的果园</span> 
        </a>
        <?php  } ?>
        <a href="<?php  echo $this->createMobileUrl('shop/entrepot')?>">
            <span style="color: #cf2e3e"><i class="fa fa-university"></i></span>
            <span>原果仓库</span> 
        </a>
        <a href="<?php  echo $this->createMobileUrl('shop/steal')?>">
            <span style="color: #93ca0c"><i class="fa fa-scissors"></i></span>
            <span>果粉互偷</span> 
        </a>
        <?php  if(isset($set['trade']) && $set['trade']['withdraw']==1) { ?>
        <a href="javascript:;" id="btnwithdraw">
            <span style="color:#0096ff;"><i class="fa fa-money"></i></span>
            <span>金果提现</span>
        </a>
        <?php  } ?> 
        <?php  if(isset($set['trade']) && ($set['trade']['withdraw']==1 || empty($set['trade']['closerecharge']))) { ?>
        <a href="<?php  echo $this->createMobileUrl('member/log')?>">
            <span style="color:#009;"><i class="fa fa-file-text"></i></span>
            <span><?php  if(isset($set['trade']) && $set['trade']['withdraw']==1) { ?>余额明细<?php  } else { ?>充值记录<?php  } ?></span>
        </a>
        <?php  } ?>
        <a href="<?php  echo $this->createMobileUrl('member/info')?>">
            <span style="color:#A6E1EC;"><i class="fa fa-user"></i></span>
            <span>我的资料</span>
        </a>
        <a href="<?php  echo $this->createMobileUrl('shop/zengsong')?>">
            <span style="color: #e2b64b"><i class="fa fa-exchange"></i></span>
            <span>赠耕种果</span> 
        </a>
        <a href="<?php  echo $this->createMobileUrl('order')?>">
            <span style="color: #cf2e3e"><i class="fa fa-reorder"></i></span>
            <span>我的订单</span> 
        </a>
        <a href="<?php  echo $this->createPluginMobileUrl('commission/order')?>">            
        	<span style="color:#1AD6BC;"><i class="fa fa-file-text-o"></i></span>
        	<span>分销订单</span>
        </a>		
        <a href="<?php  echo $this->createMobileUrl('shop/fanguo')?>">
            <span style="color: #e2b64b"><i class="fa fa-paste"></i></span>
            <span>返果明细</span> 
        </a>
 		<a href="<?php  echo $this->createMobileUrl('member/huzeng')?>">
            <span style="color: #e2564b"><i class="fa fa-exchange"></i></span>
            <span>互赠记录</span> 
        </a>
        <?php  if($hascom) { ?>
        <!--<a href="<?php  echo $this->createPluginMobileUrl('commission/shares')?>">
            <span style="color: #cf2e3e"><i class="fa fa-qrcode"></i></span>
            <span>我的二维码</span> 
        </a>-->
        <?php  } ?>
        <?php  if($supplier) { ?>
        <a href="<?php  echo $this->createPluginMobileUrl('suppliermenu/index')?>">
            <span style="color:#795548;"><i class="fa fa-users"></i></span>
            <span>供应商管理</span> 
        </a>
        <?php  } else { ?>
        <a href="<?php  echo $this->createPluginMobileUrl('supplier/af_supplier',array('style'=>$member['style']))?>">
            <span style="color:#795548;"><i class="fa fa-users"></i></span>
            <span>供应商申请</span> 
        </a>
        <?php  } ?>
        <?php  if(!is_weixin()) { ?>
        <a href="<?php  echo $this->createMobileUrl('member/logout')?>">
            <span style="color: #999"><i class="fa fa-sign-out"></i></span>
            <span>退出</span> 
        </a>
        <?php  } ?>
    </div>
    <!-- <div class="header">
        <div class="user">
            <div class="user-head"><img src="<%member.avatar%>" /></div>
            <div class="user-info">
                <div class="user-name"><%member.nickname%></div>
                <div class="user-other" <?php  if(!empty($set['shop']['levelurl'])) { ?>onclick='location.href="<?php  echo $set['shop']['levelurl'];?>"'<?php  } ?>> 
                    [<%level.levelname%>] 
                    <?php  if(!empty($set['shop']['levelurl'])) { ?>
                        <i class='fa fa-question-circle'></i>
                    <?php  } ?>
                    <%if shop_set.shop.isreferrer%>
                        [推荐人：<%referrer.realname%>]
                    <%/if%>
                </div>
            </div>
            <div class="set" onclick='location.href="<?php  echo $this->createMobileUrl('member/info')?>"'><i class="fa fa-gear" style="font-size:26px; color:#fff;"></i></div>
        </div>
    </div>
    <div class="cart" style='margin-top:-20px;'>
        <a href="javascript:;">
            <div class="list1" style=" border-bottom:0px;border-top:0px;">金果: <span style='color:#f90'><%member.credit2%></span> 
                <?php  if(empty($set['trade']['closerecharge'])) { ?>
                <div class="take" onclick="location.href='<?php  echo $this->createMobileUrl('member/recharge',array('openid'=>$openid))?>'">充值</div>
                <?php  } ?>
            </div>
        </a>
        <a href="javascript:;">
            <div class="list1" style="margin:0px; border-bottom:0px;">鲜果:
                <%member.xianguo%>
            </div>
        </a>
        <a href="javascript:;">
            <div class="list1" style="margin:0px; border-bottom:0px;">耕种果:
                <%member.gengzhongguo%>
            </div>
        </a>
    </div> -->
    <!-- <div class="order">
        <a href="<?php  echo $this->createMobileUrl('order')?>">
            <div class="list1" style="margin-top:0px;">
                <i class="fa fa-reorder" style="float:left; line-height:44px;"></i>
                <span style="float:left;">我的订单</span>
                <i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i>
                <div class="allorder">查看我的全部订单</div>
            </div>
        </a>
        <div class="order_all">
            <a href="<?php  echo $this->createMobileUrl('order',array('status'=>0))?>">
                <div class="order_pub order_1" style="border:0px;"><i class="fa fa-credit-card" style="font-size:30px"></i>
                    <br>待付款<%if order.status0>0%><span><%order.status0%></span><%/if%>
                </div>
            </a>
            <a href="<?php  echo $this->createMobileUrl('order',array('status'=>1))?>">
                <div class="order_pub order_2"><i class="fa fa-suitcase" style="font-size:30px"></i>
                    <br>待发货<%if order.status1>0%><span><%order.status1%></span><%/if%>
                </div>
            </a>
            <a href="<?php  echo $this->createMobileUrl('order',array('status'=>2))?>">
                <div class="order_pub order_3"><i class="fa fa-truck" style="font-size:30px"></i>
                    <br>待收货<%if order.status2>0%><span><%order.status2%></span><%/if%>
                </div>
            </a>
            <a href="<?php  echo $this->createMobileUrl('order',array('status'=>4))?>">
                <div class="order_pub order_4"><i class="fa fa-money" style="font-size:30px"></i>
                    <br>待退款<%if order.status4>0%><span><%order.status4%></span><%/if%>
                </div>
            </a>
        </div>
    </div>
    <div class="cart">
        <?php  if($hascom) { ?>
        <a href="<?php  echo $this->createPluginMobileUrl('commission')?>">
            <div class="list1" style="margin:0px; border-bottom:0px;"><i class="fa fa-home" style="color:#f10;"></i><?php  echo $pset['texts']['center']?><i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i></div>
        </a>
        <?php  } ?>
        分红中心
        <?php  if($pluginbonus) { ?> <?php  if(!empty($bonus_set['start'])) { ?> <?php  if(empty($bonus_set['bonushow'])) { ?>
        <a href="<?php  echo $this->createPluginMobileUrl('bonus/index')?>">
            <div class="list1" style="margin:0px; border-bottom:0px;"><i class="fa fa-sitemap"></i><?php echo empty($bonus_set['texts']['center']) ? "分红中心" : $bonus_set['texts']['center'];?><i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i></div>
        </a>
        <?php  } ?> <?php  } ?> <?php  } ?>
        <a href="<?php  echo $this->createMobileUrl('member/info')?>">
            <div class="list1" style="margin:0px; border-bottom:0px;"><i class="fa fa-user" style="color:#A6E1EC;"></i>我的资料<i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i></div>
        </a>
        <?php  if(!$member['isbindmobile'] && is_weixin()) { ?>
        <a href="<?php  echo $this->createMobileUrl('member/bindmobile')?>">
            <div class="list1" style="margin:0px; border-bottom:0px;"><i class="fa fa-mobile" style="color:#f10;"></i>绑定手机<i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i></div>
        </a>
        <?php  } ?>
        zyw
        <a href="<?php  echo $this->createMobileUrl('shop/zengsong')?>">
            <div class="list1" style="margin:0px; border-bottom:0px;"><i class="fa fa-mobile" style="color:#f10;"></i>赠耕种果<i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i></div>
        </a>
        <?php  if($supplier) { ?>
        <a href="<?php  echo $this->createPluginMobileUrl('suppliermenu/index')?>">
            <div class="list1" style="margin:0px; border-bottom:0px;"><i class="fa fa-user" style="color:#A6E1EC;"></i>供应商店铺管理<i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i></div>
        </a>
        <?php  } else { ?>
        <a href="<?php  echo $this->createPluginMobileUrl('supplier/af_supplier',array('style'=>$member['style']))?>">
            <div class="list1" style="margin:0px; border-bottom:0px;"><i class="fa fa-user" style="color:#A6E1EC;"></i>供应商申请<i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i></div>
        </a>
        <?php  } ?>
    </div>
    <div class="cart">
        <a href="<?php  echo $this->createMobileUrl('member/phb')?>">
            <div class="list1" style="margin:0px; border-bottom:0px;"><i class="fa fa-mobile" style="color:#f10;"></i>消费排行<i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i></div>
        </a>
    </div>
    <?php  if($hascoupon) { ?>
    <div class="cart">
        <?php  if($hascouponcenter) { ?>
        <a href="<?php  echo $this->createPluginMobileUrl('coupon')?>">
            <div class="list1" style="margin:0px; border-bottom:0px;"><i class="fa fa-tags" style="color:#b03d08;"></i>领取优惠券 <i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i> </div>
        </a>
        <?php  } ?>
        <a href="<?php  echo $this->createPluginMobileUrl('coupon/my')?>">
            <div class="list1" style="margin:0px; border-bottom:0px;"><i class="fa fa-gift" style="color:#08b00e;"></i>我的优惠券 <i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i> <span class="count"><%counts.couponcount%></span></div>
        </a>
    </div>
    <?php  } ?>
    <div class="cart">
        <a href="<?php  echo $this->createMobileUrl('shop/cart')?>">
            <div class="list1" style="margin:0px; border-bottom:0px;"><i class="fa fa-shopping-cart" style="color:#f90;"></i>我的购物车<i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i> <span class="count"><%counts.cartcount%></span></div>
        </a>
        <a href="<?php  echo $this->createMobileUrl('shop/favorite')?>">
            <div class="list1" style="margin:0px; border-bottom:0px;"><i class="fa fa-heart" style="color:#f03;"></i>我的收藏<i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i><span class="count"><%counts.favcount%></span></div>
        </a>
        <a href="<?php  echo $this->createMobileUrl('shop/history')?>">
            <div class="list1" style="margin:0px; border-bottom:0px;"><i class="fa fa-list" style="color:#096;"></i>我的足迹<i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i></div>
        </a>
        <a href="<?php  echo $this->createMobileUrl('member/notice')?>">
            <div class="list1" style="margin:0px; border-bottom:0px;"><i class="fa fa-volume-up" style="color:#cc6;"></i>消息提醒设置<i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i></div>
        </a>
    </div>
    <?php  if(isset($set['trade']) && $set['trade']['withdraw']==1) { ?>
    <a href="javascript:;" id="btnwithdraw">
        <div class="list1" style="border-bottom: 0px;"><i class="fa fa-money" style="color:#0096ff;"></i>余额提现<i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i></div>
    </a>
    <?php  } ?> <?php  if(isset($set['trade']) && ($set['trade']['withdraw']==1 || empty($set['trade']['closerecharge']))) { ?>
    <a href="<?php  echo $this->createMobileUrl('member/log')?>">
        <div class="list1" style="<?php  if(isset($set['trade']) && $set['trade']['withdraw']==1) { ?>margin:0px;<?php  } ?>"><i class="fa fa-file-text" style="color:#009;"></i><?php  if(isset($set['trade']) && $set['trade']['withdraw']==1) { ?>余额明细<?php  } else { ?>充值记录<?php  } ?>
            <i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i></div>
    </a>
    <?php  } ?>
    <a href="<?php  echo $this->createMobileUrl('shop/address')?>">
        <div class="list1"><i class="fa fa-street-view" style="color:#99C"></i>收货地址管理<i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i></div>
    </a>
    <?php  if(!is_weixin()) { ?>
    <a href="<?php  echo $this->createMobileUrl('member/logout')?>">
        <div class="list1"><i class="fa fa-sign-out" style="color:#99C"></i>退出<i class="fa fa-angle-right" style="color:#999; font-size:26px; float:right; line-height:44px;"></i></div>
    </a>
    <?php  } ?> -->
    <div class="copyright">版权所有 © <?php  if(empty($set['shop']['name'])) { ?><?php  echo $_W['account']['name'];?><?php  } else { ?><?php  echo $set['shop']['name'];?><?php  } ?> </div>
</script>
<script language="javascript">
require(['tpl', 'core'], function(tpl, core) {
    core.json('member/center', {}, function(json) {
    	console.log(json);
        $('#container').html(tpl('member_center', json.result));
        var withdrawmoney = <?php echo empty($set['trade']['withdrawmoney']) ? 0 : floatval($set['trade']['withdrawmoney'])?>;
        $('#btnwithdraw').click(function() {
            if (json.result.member.credit2 <= 0) {
                core.tip.show('无余额可提!');
                return;
            }
            if(json.result.zyw==1){
                core.tip.show('请去我的资料填写银行卡号,支付宝等信息！');
                location.href = core.getUrl('member/info');
                return;
               
            }
            if (withdrawmoney > 0 && json.result.member.credit2 < withdrawmoney) {
                core.tip.show('满' + withdrawmoney + "元才能提现!");
                return;
            }
            location.href = core.getUrl('member/withdraw');
        })
    }, true);
})
</script>
<?php  $show_footer=true?> 
<?php  $footer_current='member'?> 
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>