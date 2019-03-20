<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class='page-header'>

    <img src="../addons/ewei_shopv2/static/images/font_31.png">当前位置：<span class="text-primary">其他设置</span>

</div>

<div class="page-content">

 <form id="setform"  action="" method="post" class="form-horizontal form-validate">

        <div class="form-group">

            <label class="col-lg control-label">奖励发放通知</label>

            <div class="col-sm-9 col-xs-12">

            	<?php if(cv('article.set.edit')) { ?>

	                <input type="text" name="article_message" class="form-control" value="<?php  echo $article_sys['article_message'];?>" />

	                <div class="help-block">公众平台模板消息编号: OPENTM200605630 (同分销 任务处理通知 一个模板id)</div>

                <?php  } else { ?>

                	<div class='form-control-static'><?php  echo $article_sys['article_message'];?></div>

                <?php  } ?>

            </div>

        </div>

        <div class="form-group">

            <label class="col-lg control-label">素材目录设置</label>

            <div class="col-sm-9 col-xs-12">

            	<?php if(cv('article.set.edit')) { ?>

	                <input type="text" name="article_source" class="form-control" value="<?php  echo $article_sys['article_source'];?>" /> 

	                <div class="help-block">

	                	<p>如果您启用CDN等远程存储，请将素材传至远程服务器并在此填写素材目录，不填则默认读取本地</p>

	                	<p>例如: http://cdn.domain.com/source/images/ </p>

	                	<p class="text-danger">注意: 1. 请以http://开头 并以/结尾; 2. 更换目录有可能导致以前发表的文章内容显示不全;</p>

	                </div>

	            <?php  } else { ?>

	            	<div class='form-control-static'><?php  echo $article_sys['article_source'];?></div>

	            <?php  } ?>

            </div>

        </div>

     

<div class='form-group-title'>

    文章列表设置

</div>

     

<div class="form-group" >

                <label class="col-lg control-label">直接链接<br><small>(点击链接复制)</small></label>

                <div class="col-sm-9 col-xs-12">

                    <p class='form-control-static'>

                        <a href='javascript:;' title='点击复制链接' data-url="<?php  echo mobileUrl('article/list', null, true)?>" class="js-clip">

                            <?php  echo mobileUrl('article/list', null, true)?>

                        </a>

                        <span style="cursor: pointer;" data-toggle="popover" data-trigger="hover" data-html="true"

                              data-content="<img src='<?php  echo $qrcode;?>' width='130' alt='链接二维码'>" data-placement="auto right">

                            <i class="glyphicon glyphicon-qrcode"></i>

                        </span>

                    </p>

                </div>

            </div>

		

        <div class="form-group">

            <label class="col-lg control-label">标题</label>

            <div class="col-sm-9 col-xs-12">

            	<?php if(cv('article.set.edit')) { ?>

                	<input type="text" name="article_title" class="form-control" value="<?php  echo $article_sys['article_title'];?>" placeholder="文章列表页面标题与封面标题同为此标题" />

                <?php  } else { ?>

                	<div class='form-control-static'><?php  echo $article_sys['article_title'];?></div>

                <?php  } ?>

            </div>

        </div>

        <div class="form-group">

            <label class="col-lg control-label">图片</label>

            <div class="col-sm-9 col-xs-12">

            	<?php if(cv('article.set.edit')) { ?>

                	<?php  echo tpl_form_field_image2('article_image', $article_sys['article_image'])?>

                <?php  } else { ?>

                	<?php  if(!empty($article_sys['article_image'])) { ?>

                		<div class='form-control-static'>

                			<img src="<?php  echo tomedia($article_sys['article_image'])?>" style='width:100px;border:1px solid #ccc;padding:1px' />

                		</div>

                	<?php  } ?>

                <?php  } ?>

            </div>

        </div>

        <div class="form-group">

            <label class="col-lg control-label">默认数量</label>

            <div class="col-sm-9 col-xs-12">

            	<?php if(cv('article.set.edit')) { ?>

                	<input type="text" name="article_shownum" class="form-control" value="<?php  echo $article_sys['article_shownum'];?>" placeholder="空则默认显示20条记录" />

                	<span class="help-block">提示：默认模板(列表)时限制文章显示数量，历史消息样式模板时限制显示天数</span>

                <?php  } else { ?>

                	<div class='form-control-static'><?php  echo $article_sys['article_shownum'];?></div>

                <?php  } ?>

            </div>            

        </div>

        <div class="form-group">

            <label class="col-lg control-label">默认模板</label>

            <div class="col-sm-9 col-xs-12">

            	<?php if(cv('article.set.edit')) { ?>

	                <label for="article_temp_0" class="radio-inline"><input type="radio" name="article_temp" value="0" id="article_temp_0" <?php  if($article_sys['article_temp']==0) { ?>checked="cheaked"<?php  } ?>> 默认模板(列表)</label>

	                <label for="article_temp_1" class="radio-inline"><input type="radio" name="article_temp" value="1" id="article_temp_1" <?php  if($article_sys['article_temp']==1) { ?>checked="cheaked"<?php  } ?> > 历史消息样式</label>

	                <label for="article_temp_2" class="radio-inline"><input type="radio" name="article_temp" value="2" id="article_temp_2" <?php  if($article_sys['article_temp']==2) { ?>checked="cheaked"<?php  } ?> > 分类列表样式</label>

                <?php  } else { ?>

                	<?php  if($article_sys['article_temp']==0) { ?>默认模板(列表)<?php  } else if($article_sys['article_temp']==1) { ?>历史消息样式<?php  } else if($article_sys['article_temp']==2) { ?>分类列表样式<?php  } ?>

                <?php  } ?>

            </div>

        </div> 

     

     

     

        <div class="form-group">

            <label class="col-lg control-label">列表页关键字</label>

            <div class="col-sm-9 col-xs-12">

            	<?php if(cv('article.set.edit')) { ?>

                	<input type="text" name="article_keyword" class="form-control" value="<?php  echo $article_sys['article_keyword'];?>" data-rule-required="true" />

                <?php  } else { ?>

                <div class='form-control-static'><?php  echo $article_sys['article_keyword'];?></div>

                <?php  } ?>

            </div>

        </div>

       <div class="form-group"></div>

         <div class="form-group">

            <label class="col-lg control-label"></label>

            <div class="col-sm-9">

            	<?php if(cv('article.set.edit')) { ?>

                	<input type="submit" value="提交" class="btn btn-primary" />

                <?php  } ?>

            </div>

        </div>

</form>

</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

<!--6Z2S5bKb5piT6IGU5LqS5Yqo572R57uc56eR5oqA5pyJ6ZmQ5YWs5Y+4-->