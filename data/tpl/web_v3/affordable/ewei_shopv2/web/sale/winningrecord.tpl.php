<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<style>

    .style i{

        vertical-align: middle;

    }
    .input-group-select{
        left:0;top:0;
    }
    .btn-success{
        margin-top: 0;
    }
</style>

<div class="page-header"><img src="../addons/ewei_shopv2/static/images/font_31.png">当前位置：<span class="text-primary">中奖记录</span></div>

<div class="page-content">

    <form action="./index.php" method="get" class="form-horizontal table-search" role="form" id="form1">

        <input type="hidden" name="c" value="site" />

        <input type="hidden" name="a" value="entry" />

        <input type="hidden" name="m" value="ewei_shopv2" />

        <input type="hidden" name="do" value="web" />

        <input type="hidden" name="r" value="sale.winningrecord" />

        <div class="page-toolbar">

            <span class="pull-left">

                    <?php  echo tpl_daterange('time', array('sm'=>true,'placeholder'=>'中奖时间'),true);?>

                </span>

            <div class="input-group">

                <span class="input-group-select">

                    <select name="type" class="form-control"   style="width:120px;"  >

                        <option value="" <?php  if(empty($_GPC['type'])) { ?>selected<?php  } ?>>中奖类型</option>

                            <option value="1" <?php  if($_GPC['type']=='1') { ?>selected<?php  } ?>>投注中奖</option>

                            <option value="2" <?php  if($_GPC['type']=='2') { ?>selected<?php  } ?>>投资排名中奖</option>


                    </select>

                </span>

                <span class="input-group-select">

                    <select name="searchfield"  class="form-control"   style="width:120px;"  >

                        <!-- <option value="logno" <?php  if($_GPC['searchfield']=='logno') { ?>selected<?php  } ?>>订单单号</option> -->

                        <option value="member" <?php  if($_GPC['searchfield']=='member') { ?>selected<?php  } ?>>会员信息</option>

                    </select>

                </span>

                <input type="text" class="form-control"  name="keyword" value="<?php  echo $_GPC['keyword'];?>" placeholder="请输入关键词" />

                <span class="input-group-btn">

                    <button class="btn  btn-primary" type="submit"> 搜索</button>
                    
                    <?php if(cv('finance.log.commission.export')) { ?>

                   <!--  <button type="submit" name="export" value="1" class="btn btn-success">导出</button> -->

                    <?php  } ?>
                </span>

            </div>

        </div>

    </form>

    <?php  if(empty($list)) { ?>

    <div class="panel panel-default">

        <div class="panel-body empty-data">未查询到相关数据</div>

    </div>

    <?php  } else { ?>

    <div class="row">

        <div class="col-md-12">

            <table class="table">

                <thead>

                <tr>

                    <th style='width:100px;'>中奖记录编号</th>

                    <th style='width:200px;'>中奖会员会员</th>

                    <th style='width:200px;'>中奖押注ID</th> 

                    <th style='width:100px;'>中奖号</th>     

                    <th style='width:200px;'>中奖总股数</th>

                    <th style='width:100px;'>中奖金额</th>

                    <th style='width:100px;'>中奖时间</th>

                    <th style='width:100px;'>中奖类型</th>

                    <th style='width:100px;'>投资排名奖</th>

                  

                </tr>

                </thead>

                <tbody>

                <?php  if(is_array($list)) { foreach($list as $row) { ?>

                <tr>

                    <td>
                        <?php  echo $row['id'];?>
                    </td>

                    <td data-toggle='tooltip' title='<?php  echo $row['m1nickname'];?>'>

                        <a  href="<?php  echo webUrl('member/list/detail',array('id' => $row['m1id']));?>" target='_blank'>
                            <img class="radius50" src='<?php  echo tomedia($row['m1avatar'])?>' style='width:30px;height:30px;padding1px;border:1px solid #ccc' / onerror="this.src='../addons/ewei_shopv2/static/images/noface.png'"> <?php  echo $row['m1nickname'];?>
                            <div>姓名：<?php  if(!empty($row['m1realname'])) { ?><?php  echo $row['m1realname'];?><?php  } else { ?>匿名<?php  } ?></div>
                            <div>手机号码：<?php  if(!empty($row['m1mobile'])) { ?><?php  echo $row['m1mobile'];?><?php  } else { ?>暂无<?php  } ?></div>
                        </a>

                    </td>
                    
                    <td data-toggle='tooltip' title='<?php  echo $row['m2nickname'];?>'>

                       <?php  if($row['numberid']) { ?><?php  echo $row['numberid'];?><?php  } else { ?>投资排名奖无中奖id<?php  } ?>

                    </td>

                    <td>
                         <?php  if($row['number']) { ?><?php  echo $row['number'];?><?php  } else { ?>投资排名奖无中奖号<?php  } ?>
                    </td>
                    
                    <td>

                        <?php  if($row['stakesum']) { ?><?php  echo $row['stakesum'];?><?php  } else { ?>投资排名奖无中奖总股数<?php  } ?>

                    </td>

                    <td><?php  echo $row['money'];?></td>

                    <td><?php  echo date('Y-m-d',$row['createtime'])?><br/><?php  echo date('H:i',$row['createtime'])?></td>

                    <td class="style">

                        <?php  if($row['type']==1) { ?>
                            投注中奖
                        <?php  } else { ?>
                            投资排名奖
                        <?php  } ?>
                        

                    </td>

                    <td style="padding-left: 8px;">

                        <?php  if($row['ranking']) { ?>第<?php  echo $row['ranking'];?>名<?php  } ?>

                    </td>

                    
                <?php  } } ?>

                </tbody>

                <tfoot>

                <tr>

                    </td>

                    <td colspan="7" style="text-align: right">

                        <?php  echo $pager;?>

                    </td>

                </tr>

                </tfoot>

            </table>

        </div>

    </div>

    <?php  } ?>



</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

<!--NDAwMDA5NzgyNw==-->