<?php defined('IN_IA') or exit('Access Denied');?> <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" href="../addons/ewei_shopv2/static/css/bass.css">
<link rel="stylesheet" href="../addons/ewei_shopv2/static/css/me.css">
<title>我的</title>

<style>
	.mask0 {
		position: fixed;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		background-color: rgba(0, 0, 0, .6);
		z-index: 9;
		overflow: scroll;
		display: none;
	}

	.mask0_box {
		width: 80%;
		padding: 20px;
		background-color: #fff;
		border-radius: 5px;
		margin: 0 auto 20%;
		margin-top: 50%;
	}

	.mask0_box_title {
		font-size: 20px;
		font-weight: 600;
		margin-bottom: 8px;
		text-align: center;
	}

	.mask0_box_lis {
		display: flex;
		margin-bottom: 5px;
		font-size: 16px;
		justify-content: center;
	}

	.mask0_box_btn {
		width: 100%;
		margin: 10px auto;
		padding: 5px 0;
		background-color: #0a0;
		border-radius: 20px;
		font-size: 16px;
		color: #fff;
		text-align: center;
	}
	.mask1 {
		position: fixed;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		background-color: rgba(0, 0, 0, .6);
		z-index: 9;
		overflow: scroll;
		display: none;
	}
	.mask1_box{
		width: 80%;
		background-color: #fff;
		border-radius: .5rem;
		margin: 50% auto;
		padding: 15px;
		padding-bottom: 5px;
	}
	.mask1_title{
		font-size: .9rem;
		text-align: center;
		color:red;
	}
	.mask1_title img{
	    width: 30px;
	    vertical-align: middle;
	    position: relative;
	    top: -3px;
	    left: -10px;
	}
	.mask1_txt{
		text-indent: 1rem;
		font-size: .7rem;
		margin: 10px 0;/*color:red;*/
	}
	.mask1_box_btn{
		display: flex;
		border-top: 1px solid #ccc;
		margin-top: 10px;
	}
	.mask1_btn{
		flex: 1;
		background-color: #fff;
		border: 0;
		font-size: .8rem;
		padding: 5px 0;
	}
	.mask1_btn1{
		border-right: 1px solid #ccc;
	}
	.mask2{
		position: fixed;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		background-color: rgba(0, 0, 0, .6);
		z-index: 9;
		overflow: scroll;
		display: none;
	}
	.mask2_box{
		width: 80%;
		background-color: #fff;
		border-radius: .5rem;
		margin: 50% auto;
		padding: 15px;
		padding-bottom: 5px;
	}
	.mask2_box > .erweima{
		display: block;
		width: 200px;
		height: 200px;
		margin: 0 auto;;
	}
	.mask2_box > .wxerweima{
		display: none;
	}
	/* .mask2_box_tit{
		text-align: center;
    font-size: .9rem;
    border-bottom: 1px solid #ccc;
	} */
	.mask2_box_tit{
		display: flex;
		text-align: center;
		font-size: .9rem;
		border-bottom: 1px solid #ccc;
	}
	.mask2_box_tit > span{
		flex: 1;
	}
	.mask2_box_tit > span:nth-child(1){
		border-right: 1px solid #ccc;
	}
	.kefu_tit_active{
		color: orange;
		border-bottom: 2px solid orange;
	}
	.mask2_close{
		font-size: .9rem;
    text-align: center;
    border-top: 1px solid #ccc;
		padding: 5px 0;
	}

</style>

<div class='fui-page  fui-page-current'>
	<div class="header">
		<div class="headerTit">我的</div>
		<div class="headerCon">
			<a class="headerCon_left" href="<?php  echo mobileUrl('member/info/face')?>">
				<div class="imgBox">
					<img src="<?php  echo $member['avatar'];?>" onerror="this.src='../addons/ewei_shopv2/static/images/noface.png'" />
				</div>
				<div class="left_txt" style="color: white;">
					<span> <?php  echo $member['nickname'];?> </span>
					
					<?php  if($huiyuanlevel['levelname1'] == '') { ?>
						<span> 会员等级: 暂无 </span>
					<?php  } else { ?>
						<span> 会员等级: <?php  echo $huiyuanlevel['levelname1'];?> </span>
					<?php  } ?>

					<?php  if($huiyuanlevel['levelname3'] == '') { ?>
						<span> 市场等级: 暂无 </span>
					<?php  } else { ?>
						<span> 市场等级: <?php  echo $huiyuanlevel['levelname3'];?> </span>
					<?php  } ?>

				</div>
			</a>
			<div class="headerCon_right"><?php  if($member['type']==0) { ?>未激活<?php  } else if($member['type']==1) { ?>已激活<?php  } else { ?>已锁户<?php  } ?></div>
		</div>
	</div>
	<div class="list">

		<!-- <a href="javascript:;" class="lis jifenshifang">
			<div class="lis_left">
				<img src="../addons/ewei_shopv2/static/images/jifen2.png" alt="">
				<span>积分释放</span>
			</div>
			<div class="list_right icon icon-right"></div>
		</a> -->


		<!-- <a href="javascript:;" class="lis">
			<div class="lis_left">
				<img src="../addons/ewei_shopv2/static/images/shequ.png" alt="">
				<span>生态社区</span>
			</div>
			<div class="list_right icon icon-right"></div>
		</a> -->
		<a href="<?php  echo mobileUrl('member/wallet')?>" class="lis">
			<div class="lis_left">
				<img src="../addons/ewei_shopv2/static/images/qianbao.png" alt="">
				<span>我的钱包</span>
			</div>
			<div class="list_right icon icon-right"></div>
		</a>
		<a href="<?php  echo mobileurl('member/guamai/guamaijilu')?>" class="lis">
			<div class="lis_left">
				<img src="../addons/ewei_shopv2/static/images/jihuo.png" alt="">
				<span>C2C订单</span>
			</div>
			<div class="list_right icon icon-right"></div>
		</a>
		<a class="lis"
			href="<?php  if(!empty($member['mobileverify'])) { ?><?php  echo mobileUrl('member/changepwd')?><?php  } else { ?><?php  echo mobileUrl('member/bind')?><?php  } ?>">
			<div class="lis_left">
				<img src="../addons/ewei_shopv2/static/images/mima.png" alt="">
				<span>修改密码</span>
			</div>
			<div class="list_right icon icon-right"></div>
		</a>

		<!-- <a href="<?php  echo mobileUrl('member/info')?>" class="lis">
			<div class="lis_left">
				<img src="../addons/ewei_shopv2/static/images/xiaoxi.png" alt="">
				<span>实名认证</span>
			</div>
			<div class="list_right icon icon-right"></div>
		</a> -->

		<a href="<?php  echo mobileUrl('commission/qrcode')?>" class="lis">
			<div class="lis_left">
				<img src="../addons/ewei_shopv2/static/images/yijian.png" alt="">
				<span>我的邀请</span>
			</div>
			<div class="list_right icon icon-right"></div>
		</a>

		<a href="javascript:;" class="lis kefu">
			<div class="lis_left">
				<img src="../addons/ewei_shopv2/static/images/shequ.png" alt="">
				<span>联系客服</span>
			</div>
			<div class="list_right icon icon-right"></div>
		</a>

	<?php  if($member['type'] != 2) { ?>
		<a href="javascript:;" class="lis tuichujizhi">
			<div class="lis_left">
				<img src="../addons/ewei_shopv2/static/images/jizhi.png" alt="">
				<span>退出机制</span>
			</div>
			<div class="list_right icon icon-right"></div>
		</a>
	<?php  } ?>

		<a href="<?php  echo mobileurl('account/download')?>" class="lis">
			<div class="lis_left">
				<img src="../addons/ewei_shopv2/static/images/xiazai.png" alt="">
				<span>下载APP</span>
			</div>
			<div class="list_right icon icon-right"></div>
		</a>
		
		<!-- <a href="javascript:;" class="lis" >
			<div class="lis_left">
				<img src="../addons/ewei_shopv2/static/images/gonggao2.png" alt="">
				<span>平台公告</span>
			</div>
			<div class="list_right icon icon-right"> </div>
		</a> -->

		<!-- <a href="javascript:;" class="lis">
			<div class="lis_left">
				<img src="../addons/ewei_shopv2/static/images/xiaoxi.png" alt="">
				<span>公告中心</span>
			</div>
			<div class="list_right ">
				<span style="color: #999">0条未读</span>
				<i class="icon icon-right"></i>
			</div>
		</a> -->
	</div>

	<div class="fui-cell-group fui-cell-click transparent">

		<a class="fui-cell external btn-logout">

			<div class="fui-cell-text" style="text-align: center;">
				<p class="fui-cell-text">退出登录</p>
			</div>

		</a>

	</div>

	<div class="mask0">
		<div class="mask0_box">
			<div class="mask0_box_title">积分释放</div>
			<div class="mask0_box_lis">
				<span>当前积分：</span>
				<span class="credit1"><?php  echo $member['credit1'];?></span>
			</div>
			<div class="mask0_box_lis">
				<span>本次可得静态余额：</span>
				<span class="money"><?php  echo $money;?></span>
			</div>
			<div class="mask0_box_lis">
				<span>本次可得复投余额：</span>
				<span class="money2"><?php  echo $money2;?></span>
			</div>

			<?php  if(!$arr) { ?>
			<div class="mask0_box_btn">确定释放</div>
			<?php  } else { ?>
			<div class="mask0_box_btn">今日已释放</div>
			<?php  } ?>

		</div>
	</div>

	<div class="mask1">
		<div class="mask1_box">
			<div class="mask1_title"><img src="../addons/ewei_shopv2/static/images/jinggao.png">提示：该操作有风险！</div>
			<p class="mask1_txt">该操作将锁定您的账户，不能再进行投资和收益，不能解锁账户</p>
			<p class="mask1_txt">退出规则：进行该操作，立马退还投资的50%，剩下的50%分5个月退还！<span style="color:red">取消操作点击不退出</span></p>
			<p>投资总额：<?php  echo $arr2['money'];?> </p>
			<p>可退金额：<span class="ketuiMoney"><?php  echo $money4;?></span> </p>
			<div class="mask1_box_btn">
				<button class="mask1_btn1 mask1_btn">不退出</button>
				<button class="mask1_btn0 mask1_btn">退出</butt>
				
			</div>
		</div>
	</div>

	<div class="mask2">
		<div class="mask2_box">
			<!-- <div class="mask2_box_tit">扫描二维码添加好友</div> -->
			<div class="mask2_box_tit">
				<span class="tit_QQ kefu_tit_active">QQ客服</span>
				<span class="tit_WX">微信客服</span>
			</div>
			<img src=" <?php  echo tomedia($sys['kefufile'])?>" alt="" class="erweima qqerweima">
			<img src="<?php  echo tomedia($sys['wxkffile'])?>" alt="" class="erweima wxerweima">
			<div class="mask2_close">关闭</div>
		</div>
	</div>


</div>



<script language='javascript'>

	require(['biz/member/index'], function (modal) {

		modal.init();

	});

</script>

<script type="text/javascript">


	$('.tit_QQ').on('click',function () {
		$(this).addClass('kefu_tit_active');
		$(this).siblings().removeClass('kefu_tit_active');
		$('.wxerweima').css('display','none');
		$('.qqerweima').css('display','block');

	})
	$('.tit_WX').on('click',function () {
		$(this).addClass('kefu_tit_active');
		$(this).siblings().removeClass('kefu_tit_active');
		$('.wxerweima').css('display','block');
		$('.qqerweima').css('display','none');

	})

	$('.kefu').on('click',function () {
		$('.mask2').fadeIn(300);
	})

	$('.mask2_close').on('click',function () {
		$('.mask2').fadeOut(300);
	})

	$('.lis').click(function (event) {
		
		if("<?php  echo $member['type'];?>" == 2){
			alert('该账号已锁户！');
			return false;
		}
	})
	$('.headerCon').click(function (event) {
		
		if("<?php  echo $member['type'];?>" == 2){
			alert('该账号已锁户！');
			return false;
		}
	})




	$('.tuichujizhi').click(function () {
		$('.mask1').fadeIn(300);
	})
	$('.mask1_btn1').click(function () {
		$('.mask1').fadeOut(300);
	})
	$('.mask1_btn0').click(function () {
		let money = $('.ketuiMoney').html();
		
		$.ajax({
			url:"<?php  echo mobileUrl('member/index/out')?>",
			data:{
				money: money
			},
			type:'post',
			dataType:'json',
			success:function(data){
				console.log(data);
				if(data.status == 1){
					$('.mask1').fadeOut(300);
					alert('销户成功！');
				}
			},error:function(err){
				console.log(err);
			}
		})
	})

	$('.jifenshifang').click(function () {
		// console.log('<?php  echo $arr;?>');
		if ('<?php  echo $arr;?>') {
			alert('今日积分已释放');
		} else if("<?php  echo $member['type'];?>"==2){
			alert('您的账号已锁户');
		}else{
			$('.mask0').fadeIn(300);
		}
	})

	$('.mask0').click(function () {
		$(this).fadeOut(300);
	})

	$('.mask0_box').click('mask0_box_btn', function () {
		// console.log(1);
		if ($('.credit1').html() <= 0) {
			alert('当前积分不足，无法释放')
			$(this).fadeOut(300);
		} else {
			$.ajax({
				url: "<?php  echo mobileUrl('member/index')?>",
				type: 'post',
				data: { type: 1 },
				dataType: 'json',
				success: function (data) {
					console.log(data);
				}
			})
		}
		return false;

	})
</script>

<?php  if(empty($_GPC['isnewstore']) ) { ?>

<?php  $this->footerMenus()?>

<?php  } else { ?>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('../../../plugin/newstore/template/mobile/default/_menu', TEMPLATE_INCLUDEPATH)) : (include template('../../../plugin/newstore/template/mobile/default/_menu', TEMPLATE_INCLUDEPATH));?>

<?php  } ?>



<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>