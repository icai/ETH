<?php defined('IN_IA') or exit('Access Denied');?><style>
	.input-group .form-control {
		width: 20%;
		text-align: center;
	}

	.input-group {
		display: flex;
	}
</style>

<form action="" <?php if( ce('commission.ziyuan' ,$level) ) { ?>action="" method="post" <?php  } ?> class="form-horizontal form-validate"
	enctype="multipart/form-data">

	<input type="hidden" name="id" value="<?php  echo $level['id'];?>" />

	<input type="hidden" name="r" value="commission.ziyuan.<?php  if(empty($level['id'])) { ?>add<?php  } else { ?>edit<?php  } ?>" />

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<button data-dismiss="modal" class="close" type="button">×</button>

				<!-- <h4 class="modal-title"><?php  if(!empty($level['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>分销商等级</h4> -->
				<h4 class="modal-title">编辑资产包</h4>

			</div>

			<div class="modal-body">

				<div class="form-group">

					<label class="col-sm-2 control-label must">等级</label>

					<div class="col-sm-9 col-xs-12">

						<?php if( ce('member.level' ,$level) ) { ?>

						<input type="text" name="levelname" class="form-control" value="<?php  echo $level['levelname'];?>"
							data-rule-required='true' />

						<?php  } else { ?>

						<div class='form-control-static'><?php  echo $level['levelname'];?></div>

						<?php  } ?>

					</div>

				</div>







				<div class="form-group">

					<label class="col-sm-2 control-label">区间</label>

					<div class="col-sm-9 col-xs-12">

						<div class='input-group' style="display: flex;align-items: center;">

							<input type="number" name="start" class="form-control" value="<?php  echo $level['start'];?>" />
							<span style="margin: 0 10px;"> ~ </span>
							<input type="number" name="end" class="form-control" value="<?php  echo $level['end'];?>" />


						</div>

					</div>

				</div>

				<div class="form-group">

					<label class="col-sm-2 control-label">静态释放比例</label>

					<div class="col-sm-9 col-xs-12">

						<div class='input-group'>

							<input type="number" name="commission1" class="form-control" value="<?php  echo $level['commission1'];?>" />
							<div class='input-group-addon'>%</div>


						</div>

					</div>

				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">额外释放比例</label>
					<div class="col-sm-9 col-xs-12">
						<div class='input-group'>
							<input type="number" name="commission2" class="form-control" value="<?php  echo $level['commission2'];?>" />
							<div class='input-group-addon'>%</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">充值倍数</label>
					<div class="col-sm-9 col-xs-12">
						<div class='input-group'>
							<input type="number" name="multiple" class="form-control" value="<?php  echo $level['multiple'];?>" />
							<div class='input-group-addon'>倍</div>
						</div>
					</div>
				</div>



			</div>

			<div class="modal-footer">

				<button class="btn btn-primary" type="submit">提交</button>

				<button data-dismiss="modal" class="btn btn-default" type="button">取消</button>

			</div>

		</div>

</form>



<!--青岛易联互动网络科技有限公司-->