<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Investmentjilu_EweiShopV2Page extends MobileLoginPage 
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
		$type = $_GPC['type'];
		include $this->template();
	}

	public function record(){
		global $_W;
		global $_GPC;
		
		$type = $_GPC['type'];
		if($type==1) $type2 = 2;
		$pindex = max(1, intval($_GPC['page']));
		$psize = 10;

		$list =  pdo_fetchall("select g.*,m.nickname from".tablename("ewei_shop_member_log")."g left join".tablename("ewei_shop_member")."m on g.openid=m.openid"." where g.uniacid=:uniacid and g.type='$type' or g.type='$type2' and g.openid=:openid order by g.createtime desc".' LIMIT ' . (($pindex - 1) * $psize) . ',' . $psize,array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

		if($type == 3){ //查询转币记录

			$list =  pdo_fetchall("select g.*,m.nickname from".tablename("ewei_zhuanzhang")."g left join".tablename("ewei_shop_member")."m on g.openid2=m.openid"." where g.uniacid=:uniacid and g.openid=:openid order by g.createtime desc".' LIMIT ' . (($pindex - 1) * $psize) . ',' . $psize,array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

			foreach ($list as $key=>$val) {
				$list[$key]['createtime'] = date("Y-m-d H:i:s",$val['createtime']);
			}

			$total = pdo_fetchcolumn("select count(g.id) from".tablename("ewei_zhuanzhang")."g left join".tablename("ewei_shop_member")."m on g.openid2=m.openid"." where g.uniacid=:uniacid and g.openid=:openid order by g.createtime desc",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

			$data = array('status'=>1,"result"=>array('list' => $list, 'total' => $total, 'pagesize' => $psize));

			show_json(1,$data);	

		}

		foreach ($list as $key=>$val) {
			$list[$key]['createtime'] = date("Y-m-d H:i:s",$val['createtime']);
		}

		$total = pdo_fetchcolumn("select count(g.id) from".tablename("ewei_shop_member_log")."g left join".tablename("ewei_shop_member")."m on g.openid=m.openid"." where g.uniacid=:uniacid and g.type='$type' and g.openid=:openid order by g.createtime desc",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
		
		$data = array('status'=>1,"result"=>array('list' => $list, 'total' => $total, 'pagesize' => $psize));

		show_json(1,$data);	
	}
	
}
?>