<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Guamai_EweiShopV2Page extends MobileLoginPage 
{
	protected $member;
	public function __construct() 
	{
		global $_W;
		global $_GPC;
		parent::__construct();
		$this->member = m('member')->getInfo($_W['openid']);
	}

	public function main() 
	{
		global $_W;
		global $_GPC;
		$type = 0;

		//价格基础TRX价格  以及手续费
		$sys = pdo_fetch("select trxprice,trxsxf from".tablename("ewei_shop_sysset")."where uniacid=".$_W['uniacid']);
		$start = $sys['trxprice']*(1-0.1);
		$end = $sys['trxprice']*(1+0.1);
		$member = m('member')->getMember($_W['openid'], true);
		include $this->template();
	}


	//挂卖订单中心记录  
	public function guamaijilu() 
	{
		global $_W;
		global $_GPC;
		$type = 0;

		//价格基础TRX价格  以及手续费
		$sys = pdo_fetch("select trxprice,trxsxf from".tablename("ewei_shop_sysset")."where uniacid=".$_W['uniacid']);
		$start = $sys['trxprice']*(1-0.1);
		$end = $sys['trxprice']*(1+0.1);
		$member = m('member')->getMember($_W['openid'], true);
		include $this->template();
	}

	//点击加号触发发布订单判断
	public function judgeguamai(){
		global $_W;
		global $_GPC;

		$type = $_GPC['type'];

		$sys = pdo_fetch("select guamaiis from".tablename("ewei_shop_sysset")."where uniacid=".$_W['uniacid']);

		$guamai = pdo_fetchcolumn("select count(id) from".tablename("guamai")."where uniacid=".$_W['uniacid']." and type='$type' and openid=:openid and status='0' ",array(':openid'=>$_W['openid']));

		if($guamai>=$sys['guamaiis']){

			show_json(0,"您的未交易订单已达上限，请交易完再进行挂卖");

		}else{
			show_json(1,"状态正常");
		}

	}

	//挂卖中心
	public function recordjilu(){
		global $_W;
		global $_GPC;
		$type = $_GPC['type'];
		$pindex = max(1, intval($_GPC['page']));
		$psize = 10;
		$openid = $_W['openid'];

		$select = 'SELECT g.id,g.openid,g.openid2,g.money,g.createtime,g.type,g.price,g.trx,g.status,m.nickname,m2.zfbfile,m2.wxfile,m2.bankid,m2.bankname,m2.bank,m2.nickname as nickname2 FROM ';
		$tablename = tablename('guamai').' g left join '.tablename('ewei_shop_member').' m ON m.openid=g.openid left join'.tablename('ewei_shop_member').' m2 ON m2.openid=g.openid2';
		$where = " WHERE g.uniacid=:uniacid AND g.type=:type AND (g.status=1 or g.status=2) AND (g.openid = '$openid' or g.openid2 = '$openid') ";
		$where .= " ORDER BY g.status = '1' DESC,g.openid = '$openid' DESC,g.openid2 = '$openid' DESC,g.createtime DESC ";
		$limit = ' LIMIT ' . (($pindex - 1) * $psize) . ',' . $psize;

		$params[':uniacid'] = $_W['uniacid'];
		$params[':type'] = $type;

		$list = pdo_fetchall($select.$tablename.$where.$limit,$params);
		$total = pdo_fetchcolumn('SELECT count(g.id) FROM '.$tablename.$where, $params);
		// show_json(111);
		
		foreach ($list as $key=>$val) {
			$list[$key]['createtime'] = date("Y-m-d H:i:s",$val['createtime']);
			if($val['zfbfile']) $list[$key]['zfbfile'] = 1; 
			if($val['wxfile']) $list[$key]['wxfile'] = 1;
			if($val['bankid'] && $val['bankname'] && $val['bank']) $list[$key]['bank'] = 1;
			//判断该信息是否是自己发布的（未交易时）
			if($val['openid']==$_W['openid'] && $val['status']==0)$list[$key]['self'] = 1; else  $list[$key]['self'] = 0;
			//交易中
			if(($val['openid2']!=$_W['openid'] && $val['openid']!=$_W['openid']) && $val['status']==1)$list[$key]['self3'] = 1; else  $list[$key]['self3'] = 0;		

		}
		// show_json($item);
		$data = array('list'=>$list);

		show_json(1, array('list' => $list, 'total' => $total, 'pagesize' => $psize));
	}


	//挂卖
	public function hangonsale(){
		global $_W;
		global $_GPC;

		if($_W['ispost']){

			$type = $_GPC['type'];
			$openid = $_W['openid'];
			$member = m('member')->getMember($_W['openid'], true);
			//价格基础TRX价格  以及手续费
			$sys = pdo_fetch("select trxprice,trxsxf from".tablename("ewei_shop_sysset")."where uniacid=".$_W['uniacid']);
			$start = $sys['trxprice']*(1-0.1);
			$end = $sys['trxprice']*(1+0.1);
			if($_GPC['price']<$start || $_GPC['price']>$end){
				show_json(-1,"请参考价格建议区间");
			}
			//判断该会员是否上传收款信息
			if(!$member['zfbfile'] && !$member['wxfile'] && (!$member['bankid'] || !$member['bankname'] || !$member['bank'])){
				show_json(-2,"请上传您的收款信息");
			}

			if($member['credit2']<$_GPC['trx2']){
				show_json(-1,'您的ETH不足，请尽快投资！');
			}

			$data = array('openid'=>$openid,'uniacid'=>$_W['uniacid'],'price'=>$_GPC['price'],'trx'=>$_GPC['trx'],'trx2'=>$_GPC['trx2'],'money'=>$_GPC['money'],'type'=>$type,'status'=>'0','createtime'=>time());
			
			$result = pdo_insert("guamai",$data);
			// show_json($result);
			if($type == 1){		//卖出

				if($result){    //如果挂卖成功，冻结挂卖的TRX币
					m('member')->setCredit($openid,'credit2',-$_GPC['trx2']);
				}
				show_json(1,'挂卖成功');
			}else{
				show_json(1,'挂卖成功');
			}
			

		}
	}

	// public function main() 
	// {
	// 	global $_W;
	// 	global $_GPC;
	// 	$type = 0;
	// 	include $this->template();
	// }

	public function record(){
		global $_W;
		global $_GPC;
		$type = $_GPC['type'];
		$pindex = max(1, intval($_GPC['page']));
		$psize = 10;
		$openid = $_W['openid'];

		$select = 'SELECT g.id,g.openid,g.openid2,g.money,g.createtime,g.type,g.price,g.trx,g.status,m.nickname,m.zfbfile,m.wxfile,m.bankid,m.bankname,m.bank,m2.nickname as nickname2 FROM ';
		$tablename = tablename('guamai').' g left join '.tablename('ewei_shop_member').' m ON m.openid=g.openid left join'.tablename('ewei_shop_member').' m2 ON m2.openid=g.openid2';
		$where = ' WHERE g.uniacid=:uniacid AND g.type=:type AND (g.status=0) ';
		$where .= " ORDER BY g.status = '1' DESC,g.openid = '$openid' DESC,g.openid2 = '$openid' DESC,g.createtime DESC ";
		$limit = ' LIMIT ' . (($pindex - 1) * $psize) . ',' . $psize;

		$params[':uniacid'] = $_W['uniacid'];
		$params[':type'] = $type;

		$list = pdo_fetchall($select.$tablename.$where.$limit,$params);
		$total = pdo_fetchcolumn('SELECT count(g.id) FROM '.$tablename.$where, $params);
		// show_json(111);
		
		foreach ($list as $key=>$val) {
			$list[$key]['createtime'] = date("Y-m-d H:i:s",$val['createtime']);
			if($val['zfbfile']) $list[$key]['zfbfile'] = 1; 
			if($val['wxfile']) $list[$key]['wxfile'] = 1;
			if($val['bankid'] && $val['bankname'] && $val['bank']) $list[$key]['bank'] = 1;
			//判断该信息是否是自己发布的（未交易时）
			if($val['openid']==$_W['openid'] && $val['status']==0)$list[$key]['self'] = 1; else  $list[$key]['self'] = 0;
			//交易中
			if(($val['openid2']!=$_W['openid'] && $val['openid']!=$_W['openid']) && $val['status']==1)$list[$key]['self3'] = 1; else  $list[$key]['self3'] = 0;

			//判断该数据是否是自己的
			if(($val['openid2']==$_W['openid'] || $val['openid']==$_W['openid']) && $val['status']==1 && $val['type']==1){	
				if($key != 0){
					// array_unshift($list,$list[$key]); 
					// unset($list[$key+1]);
				}
				
			}

			//判断该数据是否是自己的
			if(($val['openid2']==$_W['openid'] || $val['openid']==$_W['openid']) && $val['status']==1 && $val['type']==0){	
				if($key != 0){
					// $key = 0; 
					// $item[] = $key+1;
				}
				
			}

			

		}
		// show_json($item);
		$data = array('list'=>$list);

		show_json(1, array('list' => $list, 'total' => $total, 'pagesize' => $psize));
	}

	//点击买入或者卖出的时候给个判断，是否点击的是自己的订单
	public function judge(){
		global $_W;
		global $_GPC;

		if($_W['ispost']){
			$openid = $_GPC['openid'];
			if($openid == $_W['openid'])
			show_json(1,"不能买入或卖出自己的订单");
		}
	}

	public function sellout(){

		global $_W;
		global $_GPC;
		//该订单的信息
		$id = $_GPC['id'];
		$op = $_GPC['op'];
		$sell = pdo_fetch("select g.*,m.nickname,m.mobile,m.zfbfile,m.wxfile,m.bankid,m.bankname,m.bank,m2.nickname as nickname2,m2.zfbfile as zfbfile2,m2.wxfile as wxfile2,m2.bankid as bankid2,m2.bankname as bankname2,m2.bank as bank2 from".tablename('guamai').' g left join '.tablename('ewei_shop_member').' m ON m.openid=g.openid left join '.tablename('ewei_shop_member').' m2 ON m2.openid=g.openid2 '." where g.uniacid=".$_W['uniacid']." and g.id='$id'");
		if($op == 1){
			if($sell['zfbfile']) $payment[] = array('name'=>"支付宝",'type'=>'zfb');
			if($sell['wxfile']) $payment[] = array('name'=>"微信",'type'=>'wx');
			if($sell['bank'] &&$sell['bankid'] && $sell['bankname']) $payment[] = array('name'=>"银行",'type'=>'bank');
		}else{
			if($sell['zfbfile2']) $payment[] = array('name'=>"支付宝",'type'=>'zfb');
			if($sell['wxfile2']) $payment[] = array('name'=>"微信",'type'=>'wx');
			if($sell['bank2'] &&$sell['bankid2'] && $sell['bankname2']) $payment[] = array('name'=>"银行",'type'=>'bank');
		}
		
		if($sell['openid']==$_W['openid']){
			$type = 1;
		}else if($sell['openid2']==$_W['openid']){
			$type = 2;
		}
		
		if($_W['ispost']){
			// show_json(123454);
			$type = $_GPC['type'];
			$mobile = $_GPC['mobile'];
			if($type == 1){   //卖出
				
				com('sms')->send_zhangjun2($mobile, $_GPC['id'],"卖出订单被抢单！");
				// exit();
				// show_json($mobile);
				$result = pdo_update("guamai",array('file'=>$_GPC['file'],'status'=>1,'openid2'=>$_W['openid']),array('uniacid'=>$_W['uniacid'],'id'=>$_GPC['id']));

				if($result) show_json(1,"抢单成功");

			}else if($type == 0){  //买入
				
				$id = $_GPC['id'];

				$op = $_GPC['op'];

				//判断该用户是否有足够的币进行抢单
				$member = m('member')->getMember($_W['openid'], true);
				$sell = pdo_fetch("select g.trx,m.mobile,m2.mobile as mobile2 from".tablename("guamai").' g left join '.tablename('ewei_shop_member').' m ON m.openid=g.openid '.' left join '.tablename('ewei_shop_member').' m2 ON m2.openid=g.openid2 '." where g.uniacid=".$_W['uniacid']." and g.id='$id' and g.type=0");

				if($op == 1){	//买入订单  挂单人付钱	
					$result = pdo_update("guamai",array('file'=>$_GPC['file']),array('uniacid'=>$_W['uniacid'],'id'=>$id));

					com('sms')->send_zhangjun2($sell['mobile2'], $id,"买入订单挂单人已上传支付凭证！");

					if($result) show_json(1,"挂单人付款成功");

				}else{	

					//判断该会员是否上传收款信息
					if(!$member['zfbfile'] && !$member['wxfile'] && (!$member['bankid'] || !$member['bankname'] || !$member['bank'])){
						show_json(-1,"请上传您的收款信息");
					}	

					if($member['credit2']<$sell['trx']){
						show_json(-1,"您的TRX不足，请尽快投资！");
					}

					//币足够的时候进行抢单  （扣币）
					m('member')->setCredit($_W['openid'],'credit2',-$sell['trx']);
					$result = pdo_update("guamai",array('status'=>1,'openid2'=>$_W['openid']),array('uniacid'=>$_W['uniacid'],'id'=>$id));

					com('sms')->send_zhangjun2($sell['mobile'], $id,"买入订单被抢单！");

					if($result) show_json(1,"抢单成功");
				}

			}
			

		}

		// var_dump($sell);
		include $this->template();

	}

	//卖出的确认收款
	public function selloutyes(){
		global $_W;
		global $_GPC;

		if($_W['ispost']){

			$id = $_GPC['selloutyes'];
			$type = $_GPC['type'];

			if($type){			//卖出订单挂单人点击确认收款

				$sell = pdo_fetch("select g.*,m.mobile,m2.mobile as mobile2,m2.openid as openid2 from".tablename('guamai').' g left join '.tablename('ewei_shop_member').' m ON m.openid=g.openid left join '.tablename('ewei_shop_member').' m2 ON m2.openid=g.openid2 '." where g.uniacid=".$_W['uniacid']." and g.id='$id'");
				// show_json($sell);

				com('sms')->send_zhangjun2($sell['mobile2'], $id,"卖出订单抢单完成！");

				//给抢单人充币
				pdo_update("guamai",array('status'=>2,'endtime'=>time()),array('uniacid'=>$_W['uniacid'],'id'=>$id));

				m('member')->setCredit($sell['openid2'],'credit2',$sell['trx']);

				show_json(1,"订单完成");

			}else{			//买入订单抢单人点击确认收款

				$sell = pdo_fetch("select g.*,m.mobile,m2.mobile as mobile2 from".tablename('guamai').' g left join '.tablename('ewei_shop_member').' m ON m.openid=g.openid left join '.tablename('ewei_shop_member').' m2 ON m2.openid=g.openid2 '." where g.uniacid=".$_W['uniacid']." and g.id='$id'");
				// show_json($sell);

				//给挂单人充币
				pdo_update("guamai",array('status'=>2,'endtime'=>time()),array('uniacid'=>$_W['uniacid'],'id'=>$id));

				m('member')->setCredit($sell['openid'],'credit2',$sell['trx']);

				com('sms')->send_zhangjun2($sell['mobile'], $id,"买入订单挂单完成！");

				show_json(1,"订单完成");

			}
			
		}
	}
	
}
?>