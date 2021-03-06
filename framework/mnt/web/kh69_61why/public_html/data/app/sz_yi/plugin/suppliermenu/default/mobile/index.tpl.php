<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<title>供应商管理</title>
<style type="text/css">
    th{font-weight: 200;}
    body {margin:0px; background:#eee; padding:0px; -moz-appearance:none; font-family:微软雅黑;}
    #big_body{width:100%;margin:0px;}
    #header{ width:100%; border-bottom:1px solid #A1A1A1;   }
    #user-info{width: 100%; height: auto; float: left; background:#FF4242; padding-top:20px; padding-bottom: 20px; }
    #user div{ font-family:Arial, Helvetica, sans-serif; }
    #user-info .left{float:left; margin-left:20px;  }

    #data{ float:left; width: 100%; padding-top: 15px; padding-bottom: 15px; background: #fff; text-align:center; text-align: center; border-bottom:1px solid #CBCBCB; }
    #data table{ width: 100%; height:25px; margin:auto; text-align:center;  color:#999;  }

    #data table th{ color:#616161; height:100%;position: relative; border-right:#999 1px solid;}
     #data table th>#top{width: 100%; position: absolute; top:-60%; text-align: center; }
     #data table th>#bottom { width: 100%; position: absolute; bottom:-60%; text-align: center; }

    #list-button{ width:100%; border-bottom:1px solid #CBCBCB;border-top:1px solid #CBCBCB; padding-top:10px; padding-bottom: 10px; background: #fff; float: left; margin-top: 20px; text-align: center;}

    #list-button table{width:90%; text-align: center; margin:auto;}

    #list-button table  th{   border-bottom:1px solid #CBCBCB; padding-bottom: 10px;  padding-top: 10px; color: #818181; font-size: 16px; }

    #list-button table a{ color: #818181; }

    #list-button table  th #left{    text-align: left; float: left;  }

    #list-button table  th #right{ float: right;     }

   #list-button table  th #left #img{ padding-left:3px; padding-right:3px; border-radius:20%; text-align: center;  }
   #list-button table  th #left img {  margin:auto; width:15px; height:15px; }
    
 

 
</style>

<script id="tpl_header" type="text/html">
    <div id="header" >
        <div id="user-info">
         	 <div class="left" style="width:50px; height:50px; border-radius:50%;   overflow:hidden;" >
         	 	<img width="100%" height="100%;" src="<%member.headimgurl%>" />
         	 </div>
         	 <div class="left" style="  width:120px;font-size:16px; color:#ffffff; padding-top: 5px;       ">
         	 	<div ><%member.nickname%></div>
         	 	<div style="line-height:150%;">供应商管理</div>
         	 </div>

         	 <div style="float:right; padding-top:5px;color:#CCC; font-size:30px; margin-right: 20px;   ">
         	   >
         	 </div>
        </div>
        <div id="data">
        	<table   >
	        	  <tr>
	        		 <th style="width:30%">
	        		    <div id="top">成交总额</div>
	        		    <div id="bottom">￥<%allprice%></div>
	        		 </th>
	                 <th style="width:40%">
	        		    <div id="top">今日成交总额</div>
	        		    <div id="bottom">￥<%todayprice%></div>	                 
	                 </th>
	                 <th style="width:30%;border:0px;">
	        		    <div id="top">今日订单</div>
	        		    <div id="bottom"><%todaycount%></div>		                 
	                 </th>
	               <tr>
           	</table>

        </div>
    </div>
</script>    



<script id="tpl_list-button" type="text/html">
    <div id="list-button">
	     <table>
	        <%each data as d%>
	     	  <tr>
		    	   <th>
			    	   <a href="<%d.url%>">
			                <div id="left">
			                     <span id="img" style="background:<%d.color%>;  "><img    src="<%d.img%>"/></span>
			            	     <span><%d.name%></span>
			                </div>
			                <div id="right">
			                	>
			                </div>
		                </a>
		    	   </th>
	    	  </tr>
	    	<%/each%> 
	     </table>

    </div>
</script>    


<div id="big_body">

 
 

</div>


<script type="text/javascript">
	
        
		require(['tpl', 'core'], function(tpl, core) {

			 var $data = [
               {name:'发布宝贝',url:'<?php  echo $this->createPluginMobileUrl('suppliermenu/goods',array('op'=>'post')); ?>',img:'<?php  echo MODULE_URL.'plugin/suppliermenu/res/3.png'?>',color:'#3C9DFF'},
               {name:'宝贝管理',url:'<?php  echo $this->createPluginMobileUrl('suppliermenu/goods'); ?>',img:'<?php  echo MODULE_URL.'plugin/suppliermenu/res/4.png'?>',color:'#FF4DFF'},
               {name:'订单管理',url:'<?php  echo $this->createPluginMobileUrl('suppliermenu/order'); ?>',img:'<?php  echo MODULE_URL.'plugin/suppliermenu/res/2.png'?>',color:'#F93'},
               {name:'店铺装修',url:'<?php  echo $this->createPluginMobileUrl('suppliermenu/shop'); ?>',img:'<?php  echo MODULE_URL.'plugin/suppliermenu/res/1.png'?>',color:'#F33'},
			 ];

			 $("#big_body").append(  tpl('tpl_list-button',{data:$data}) );

			core.pjson('suppliermenu/index', {op:'getinfo'}, function(json) {
				 $("#big_body").prepend(  tpl('tpl_header',json.result) );
			}, true);

			 
		})

</script>


 
<?php  $show_footer=true?>
<?php  $footer_current='member'?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
