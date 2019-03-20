<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
.lis{
  width: 90%;
  margin: 1rem auto;
  display: flex;
  align-items: center;
}
.lis_left{
  width: 35%;
  text-align: right;
  margin-right: 5%;
}
.lis_right{
  width: 60%;
  flex: 3;
}
.futouMoney{
  border: 1px solid #ccc;
  padding: 5px;
  border-radius: .2rem;
  text-decoration: none;
}
.futouBtn{
    width: 80%;
    margin: 3rem auto 0;
    text-align: center;
    background-color: #0a0;
    color: #fff;
    padding: 8px 0;
    border-radius: .2rem;
}
</style>

<div class='fui-page  fui-page-current'>

    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title">复投</div>
        <div class="fui-header-right">&nbsp;</div>
    </div>

    <div class='fui-content navbar' >
      <div class="lis">
        <span class="lis_left">当前投资额度：</span>
        <span class="lis_right"><?php  echo $member['credit1'];?></span>
      </div>

      <div class="lis">
        <?php  if($type == 4) { ?>
        <span class="lis_left">复投账户：</span>
        <span class="lis_right accountMoney"> <?php  echo $member['credit4'];?> </span>
        <?php  } else if($type == 2) { ?>
        <span class="lis_left">自由钱包：</span>
         <span class="lis_right accountMoney"> <?php  echo $member['credit2'];?> </span>
        <?php  } ?>
        
      </div>

      <div class="lis">
        <span class="lis_left">复投金额：</span>
        <span class="lis_right">
          <input type="number" class="futouMoney" placeholder="请输入需要复投的金额">
        </span>
      </div>

      <div class="futouBtn">确定</div>


    </div>

</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

<script type="text/javascript">
  $('.futouBtn').click(function () {
    let futouMoney = Number($('.futouMoney').val());
    let accountMoney = Number($('.accountMoney').html());

    console.log(futouMoney);
    console.log(accountMoney);
    
    if(futouMoney > accountMoney){
      FoxUI.toast.show('当前余额不足');
      return;
    }
    $.ajax({
      type:'post',
      url:"<?php  echo mobileurl('member/mywallet/yijianfutou')?>",
      data:{money:futouMoney,type:"<?php  echo $type;?>"},
      dataType:'json',
      success:function(data){
        console.log(data);
        FoxUI.toast.show(data.result.message)
        if(data.status == 1){
          setTimeout(() => {
            history.go(-1);
          }, 1500);
        }
        
      },error:function(err){
        console.log(err);
        
      }

    })
  })

</script>