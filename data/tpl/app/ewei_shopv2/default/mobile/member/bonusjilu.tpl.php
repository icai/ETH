<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .goods-item {
        padding: 10px;
        border-bottom: 1px solid #ccc;
        background-color: #fff;
    }

    .cont_tit {
        font-size: 18px;
        padding: 10px;
        text-align: center;
    }
</style>

<div class='fui-page  fui-page-current member-log-page'>

    <div class="fui-header">

        <div class="fui-header-left">

            <a class="back"></a>

        </div>

        <div class="title">收益明细</div>

    </div>



    <div class='fui-content navbar'>


        <?php  if($_W['shopset']['trade']['withdraw']) { ?>

        <div id="tab" class="fui-tab fui-tab-danger">
            <a data-tab="tab1" class='external <?php  if($type==4) { ?>active<?php  } ?>'>投资收益 </a>
            <a data-tab="tab2" class="external <?php  if($type==1) { ?>active<?php  } ?>">直推奖</a>
            <a data-tab="tab3" class='external <?php  if($type==2) { ?>active<?php  } ?>'>管理奖 </a> 
            <a data-tab="tab4" class='external <?php  if($type==3) { ?>active<?php  } ?>'>领导奖 </a> 
            <!-- <a class='external' href="<?php  echo mobileurl('commission/down')?>">下级明细 </a>  -->

        </div> 
        <?php  } ?> 
                
        <div class='content-empty' style='display:none;'>
                <i class='icon icon-searchlist'></i><br />暂时没有任何记录!
        </div>

        <p class="cont_tit"></p>

        <div class='fui-list-group container' style="display:none;">

        </div>

        <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>

    </div>



    <!-- <script id="tpl_member_bonus_list" type="text/html">
        <%each list as log%>
        <div class="goods-item">
          <div class="time">发放时间：<span><%log.createtime%></span></div>
          <div>奖金来源：<span><%log.nickname%></span></div>
          <div>奖金金额：<span><%log.money%></span></div>
        </div>
        <%/each%>
    </script> -->

    <script id="tpl_member_bonus_list" type="text/html">
        <%each list as log%>
        <div class="goods-item">
          <div class="time">发放时间：<span><%log.createtime%></span></div>
          <div>奖金来源：<span><%log.nickname%></span></div>
          <div>自由账户奖金：<span><%log.money%></span></div>
          <div>复投账户奖金：<span><%log.money2%></span></div>
        </div>
        <%/each%>
    </script>

    <script id="tpl_member_bonus_list4" type="text/html">
        <%each list as log%>
        <div class="goods-item">
          <div class="time">释放时间：<span><% log.createtime %></span></div>
          <div>释放至自由账户：<span><% log.money %></span></div>
          <div>释放至复投账户：<span><% log.money2 %></span></div>
        </div>
        <%/each%>
    </script>



    <script language='javascript'>
        // console.log();
        

        require(['biz/member/bonusjilu'], function (modal) {

            modal.init({ type: "<?php  echo $type;?>" });

        });
    </script>

    <?php  $this->footerMenus()?>

</div>



<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>