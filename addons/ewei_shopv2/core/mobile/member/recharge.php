<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Recharge_EweiShopV2Page extends MobileLoginPage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$member = m('member')->getMember($_W['openid'], true);
		$sys = pdo_fetch("select *from ".tablename("ewei_shop_sysset")."where uniacid=".$_W['uniacid']);
		$set = $_W['shopset'];
		$set['pay']['weixin'] = ((!(empty($set['pay']['weixin_sub'])) ? 1 : $set['pay']['weixin']));
		$set['pay']['weixin_jie'] = ((!(empty($set['pay']['weixin_jie_sub'])) ? 1 : $set['pay']['weixin_jie']));
		$sec = m('common')->getSec();
		$sec = iunserializer($sec['sec']);
		$status = 1;
		if (!(empty($set['trade']['closerecharge']))) 
		{
			$this->message('系统未开启充值!', '', 'error');
		}
		if (empty($set['trade']['minimumcharge'])) 
		{
			$minimumcharge = 0;
		}
		else 
		{
			$minimumcharge = $set['trade']['minimumcharge'];
		}
		$credit = m('member')->getCredit($_W['openid'], 'credit2');
		$wechat = array('success' => false);
		if (is_weixin()) 
		{
			if (isset($set['pay']) && ($set['pay']['weixin'] == 1)) 
			{
				list(, $payment) = m('common')->public_build();
				if ($payment['is_new']) 
				{
					if (($payment['type'] == 2) || ($payment['type'] == 3)) 
					{
						if (!(empty($payment['sub_appsecret']))) 
						{
							m('member')->wxuser($payment['sub_appid'], $payment['sub_appsecret']);
						}
					}
				}
				if (is_array($payment) && !(is_error($payment))) 
				{
					$wechat['success'] = true;
				}
				else if ($set['pay']['weixin']) 
				{
					$wechat['success'] = true;
				}
			}
			if (isset($set['pay']) && ($set['pay']['weixin_jie'] == 1) && !($wechat['success'])) 
			{
				if (!(empty($set['pay']['weixin_jie_sub'])) && !(empty($sec['sub_secret_jie_sub']))) 
				{
					m('member')->wxuser($sec['sub_appid_jie_sub'], $sec['sub_secret_jie_sub']);
				}
				else if (!(empty($sec['secret']))) 
				{
					m('member')->wxuser($sec['appid'], $sec['secret']);
				}
				$wechat['success'] = true;
			}
		}
		$alipay = array('success' => false);
		// if (isset($set['pay']['alipay']) && ($set['pay']['alipay'] == 1)) 
		// {
		// 	load()->model('payment');
		// 	$setting = uni_setting($_W['uniacid'], array('payment'));
		// 	if (is_array($setting['payment']['alipay']) && $setting['payment']['alipay']['switch']) 
		// 	{
		// 		$alipay['success'] = true;
		// 	}
		// }
		$acts = com_run('sale::getRechargeActivity');
		if (is_h5app()) 
		{
			$payinfo = array('wechat' => (!(empty($sec['app_wechat']['merchname'])) && !(empty($set['pay']['app_wechat'])) && !(empty($sec['app_wechat']['appid'])) && !(empty($sec['app_wechat']['appsecret'])) && !(empty($sec['app_wechat']['merchid'])) && !(empty($sec['app_wechat']['apikey'])) ? true : false), 'alipay' => (!(empty($set['pay']['app_alipay'])) && !(empty($sec['app_alipay']['public_key'])) ? true : false), 'mcname' => $sec['app_wechat']['merchname'], 'aliname' => (empty($_W['shopset']['shop']['name']) ? $sec['app_wechat']['merchname'] : $_W['shopset']['shop']['name']), 'logno' => NULL, 'money' => NULL, 'attach' => $_W['uniacid'] . ':1', 'type' => 1);
		}
		include $this->template();
	}
	public function submit() 
	{
		global $_W;
		global $_GPC;
		$set = $_W['shopset'];
		if (empty($set['trade']['minimumcharge'])) 
		{
			$minimumcharge = 0;
		}
		else 
		{
			$minimumcharge = $set['trade']['minimumcharge'];
		}
		$money = floatval($_GPC['money']);
		if ($money <= 0) 
		{
			show_json(0, '充值金额必须大于0!');
		}
		if (($money < $minimumcharge) && (0 < $minimumcharge)) 
		{
			show_json(0, '最低充值金额为' . $minimumcharge . '元!');
		}
		if (empty($money)) 
		{
			show_json(0, '请填写充值金额!');
		}
		pdo_delete('ewei_shop_member_log', array('openid' => $_W['openid'], 'status' => 0, 'type' => 0, 'uniacid' => $_W['uniacid']));
		$logno = m('common')->createNO('member_log', 'logno', 'RC');
		$log = array('uniacid' => $_W['uniacid'], 'logno' => $logno, 'title' => $set['shop']['name'] . '会员充值', 'openid' => $_W['openid'], 'money' => $money, 'type' => 0, 'createtime' => time(), 'status' => 0, 'couponid' => intval($_GPC['couponid']));
		pdo_insert('ewei_shop_member_log', $log);
		$logid = pdo_insertid();
		$type = $_GPC['type'];
		if (is_h5app()) 
		{
			show_json(1, array('logno' => $logno, 'money' => $money));
		}
		$set = m('common')->getSysset(array('shop', 'pay'));
		$set['pay']['weixin'] = ((!(empty($set['pay']['weixin_sub'])) ? 1 : $set['pay']['weixin']));
		$set['pay']['weixin_jie'] = ((!(empty($set['pay']['weixin_jie_sub'])) ? 1 : $set['pay']['weixin_jie']));
		if ($type == 'wechat') 
		{
			if (!(is_weixin())) 
			{
				show_json(0, '非微信环境!');
			}
			if (empty($set['pay']['weixin']) && empty($set['pay']['weixin_jie'])) 
			{
				show_json(0, '未开启微信支付!');
			}
			$wechat = array('success' => false);
			$jie = intval($_GPC['jie']);
			$params = array();
			$params['tid'] = $log['logno'];
			$params['user'] = $_W['openid'];
			$params['fee'] = $money;
			$params['title'] = $log['title'];
			if (isset($set['pay']) && ($set['pay']['weixin'] == 1) && ($jie !== 1)) 
			{
				load()->model('payment');
				$setting = uni_setting($_W['uniacid'], array('payment'));
				$options = array();
				if (is_array($setting['payment'])) 
				{
					$options = $setting['payment']['wechat'];
					$options['appid'] = $_W['account']['key'];
					$options['secret'] = $_W['account']['secret'];
				}
				$wechat = m('common')->wechat_build($params, $options, 1);
				if (!(is_error($wechat))) 
				{
					$wechat['success'] = true;
					if (!(empty($wechat['code_url']))) 
					{
						$wechat['weixin_jie'] = true;
					}
					else 
					{
						$wechat['weixin'] = true;
					}
				}
			}
			if ((isset($set['pay']) && ($set['pay']['weixin_jie'] == 1) && !($wechat['success'])) || ($jie === 1)) 
			{
				$params['tid'] = $params['tid'] . '_borrow';
				$sec = m('common')->getSec();
				$sec = iunserializer($sec['sec']);
				$options = array();
				$options['appid'] = $sec['appid'];
				$options['mchid'] = $sec['mchid'];
				$options['apikey'] = $sec['apikey'];
				if (!(empty($set['pay']['weixin_jie_sub'])) && !(empty($sec['sub_secret_jie_sub']))) 
				{
					$wxuser = m('member')->wxuser($sec['sub_appid_jie_sub'], $sec['sub_secret_jie_sub']);
					$params['openid'] = $wxuser['openid'];
				}
				else if (!(empty($sec['secret']))) 
				{
					$wxuser = m('member')->wxuser($sec['appid'], $sec['secret']);
					$params['openid'] = $wxuser['openid'];
				}
				$wechat = m('common')->wechat_native_build($params, $options, 1);
				if (!(is_error($wechat))) 
				{
					$wechat['success'] = true;
					if (!(empty($params['openid']))) 
					{
						$wechat['weixin'] = true;
					}
					else 
					{
						$wechat['weixin_jie'] = true;
					}
				}
			}
			$wechat['jie'] = $jie;
			if (!($wechat['success'])) 
			{
				show_json(0, '微信支付参数错误!');
			}
			show_json(1, array('wechat' => $wechat, 'logid' => $logid));
		}
		else if ($type == 'alipay') 
		{
			$alipay = array('success' => false);
			$params = array();
			$params['tid'] = $log['logno'];
			$params['user'] = $_W['openid'];
			$params['fee'] = $money;
			$params['title'] = $log['title'];
			load()->func('communication');
			load()->model('payment');
			$setting = uni_setting($_W['uniacid'], array('payment'));
			if (is_array($setting['payment'])) 
			{
				$options = $setting['payment']['alipay'];
				$alipay = m('common')->alipay_build($params, $options, 1, $_W['openid']);
				if (!(empty($alipay['url']))) 
				{
					$alipay['url'] = urlencode($alipay['url']);
					$alipay['success'] = true;
				}
			}
			show_json(1, array('alipay' => $alipay, 'logid' => $logid, 'logno' => $logno));
		}
		show_json(0, '未找到支付方式');
	}

	public function trx(){
		global $_W;
		global $_GPC;
		if ($_W['ispost']) {
			$id = $_GPC['id'];

			$member = pdo_fetch("select * from ".tablename("ewei_shop_member")."where uniacid=".$_W['uniacid']." and id='$id'");
			$data = array('trx'=>$member['credit1']);
			show_json(1,array('list'=>$data));
		}	
	}

	public function payment(){
		global $_W;
		global $_GPC;

		$list = pdo_fetch("select * from ".tablename("ewei_shop_sysset")."where uniacid=".$_W['uniacid']);
		$data = array('zfb'=>$list['zfb'],'zfbfile'=>$list['zfbfile'],'wx'=>$list['wx'],'weixinfile'=>$list['weixinfile'],'yhk'=>$list['yhk'],'yhkfile'=>$list['yhkfile'],'add'=>$list['add']);
		show_json(1,$data);
	}

	public function wechat_complete() 
	{
		global $_W;
		global $_GPC;
		
		
		$money = $_GPC['money'];
		$url = $_GPC['url'];
		$member = m('member')->getMember($_W['openid'], true);
		$sys = pdo_fetch("select *from ".tablename("ewei_shop_sysset")."where uniacid=".$_W['uniacid']);

		if(empty($url)) show_json(0,"请输入您要投资的数量");
		if(empty($url)) show_json(0,"请上传到您的支付凭证");

		if(($member['credit1']+$money)>$sys['bibi']) show_json(0,"您的投资已超过上限");
		

		$data = array('uniacid'=>$_W['uniacid'],'openid'=>$_W['openid'],'type'=>1,'title'=>'资产投资','status'=>0,'money'=>$money,'credit'=>$money,'createtime'=>time(),'url'=>$url);


		$result = pdo_insert("ewei_shop_member_log",$data);

		// if($member['type']==0){
		// 	pdo_update("ewei_shop_member"," type='1' ",array('openid'=>$_W['openid'],'uniacid'=>$_W['uniacid']));
		// }

		if($result){

			show_json(1);
		}

		
	}
	public function getstatus() 
	{
		global $_W;
		global $_GPC;
		$logno = $_GPC['logno'];
		$log = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_member_log') . ' WHERE `logno`=:logno and `uniacid`=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':logno' => $logno));
		if (!(empty($log)) && !(empty($log['status']))) 
		{
			show_json(1);
		}
		else 
		{
			show_json(0);
		}
	}
}
?>