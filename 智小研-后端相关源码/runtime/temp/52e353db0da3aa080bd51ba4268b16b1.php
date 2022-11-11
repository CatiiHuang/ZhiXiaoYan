<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:89:"/www/wwwroot/hgqlgzsl.temdu.com/public/../application/admin/view/tablemake/field_add.html";i:1573124625;s:74:"/www/wwwroot/hgqlgzsl.temdu.com/application/admin/view/layout/default.html";i:1572536367;s:71:"/www/wwwroot/hgqlgzsl.temdu.com/application/admin/view/common/meta.html";i:1572536366;s:73:"/www/wwwroot/hgqlgzsl.temdu.com/application/admin/view/common/script.html";i:1572536366;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !$config['fastadmin']['multiplenav']): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <style>.form-input{ display: none;}</style>
<input id="assign-data-mid" type="hidden" value="<?php echo $mid; ?>">
<form id="field_add-form" class="field_add-form form-horizontal" role="form" data-toggle="validator" method="POST" action="">
	<input id="c-name" data-rule="required" class="form-control form-control" name="row[mid]" type="hidden" value="<?php echo $mid; ?>">
	<div class="panel-heading"><div class="panel-lead text-red"><b>温馨提示：</b>无需添加id字段，系统已经自动创建；增加字段后，需要重新生成CRUD，不然新增加的字段不会生效！</div></div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-2">类型：</label>
		<div class="col-xs-12 col-sm-5">
			<div class="radio">
				<label for="row[category]-1"><input id="row[category]-1" class="field-category" data-required="title,name,suffix,length,default" name="row[category]"  type="radio" value="1" checked/> 标准字段</label>
				<label for="row[category]-2"><input id="row[category]-2" class="field-category" data-required="title,name,type,length,default" name="row[category]" type="radio" value="2" /> 自定义字段</label>
				<label for="row[category]-3"><input id="row[category]-3" class="field-category" data-required="title,special" name="row[category]" type="radio" value="3" /> 特殊字段</label>
			</div>
		</div>
	</div>

	<div class="form-group form-input form-input-title">
		<label class="control-label col-xs-12 col-sm-2">字段标题：</label>
		<div class="col-xs-12 col-sm-5">
			<input id="c-name" data-rule="required" class="form-control form-control" placeholder="字段标题，不可重复" name="row[title]" type="text" value="">
		</div>
	</div>



	<div class="form-group form-input form-input-name">
		<label class="control-label col-xs-12 col-sm-2">字段名称：</label>
		<div class="col-xs-12 col-sm-5">
			<input id="c-table" data-rule="required" class="form-control form-control" placeholder="字段名称，不可重复" name="row[name]" type="text" value="">
		</div>
	</div>
	<div class="form-group form-input form-input-special">
		<label class="control-label col-xs-12 col-sm-2">特殊字段：</label>
		<div class="col-xs-12 col-sm-5">
			<input type="hidden" class="operate" data-name="row[special]" value="in"/>
			<!--给select一个固定的高度-->
			<select id="c-flag" class="form-control "  name="row[special]" style="height:31px;">
				<option value="">----请选择----</option>
				<option value="category_id">[category_id]--分类ID/选择分类的下拉框-单选</option>
				<option value="category_ids">[category_ids]--多选分类ID/选择分类的下拉框-多选</option>
				<option value="weigh">[weigh]--权重/后台的排序字段，可上下拖动排序</option>
				<option value="createtime">[createtime]--创建时间/记录添加时间字段,不需要手动维护</option>
				<option value="updatetime">[updatetime]--更新时间/记录更新时间的字段,不需要手动维护</option>
			</select>
		</div>
	</div>

	<div class="form-group form-input form-input-suffix">
		<label class="control-label col-xs-12 col-sm-2">字段后缀：</label>
		<div class="col-xs-12 col-sm-5">
			<input type="hidden" class="operate" data-name="row[suffix]" value=""/>
			<!--给select一个固定的高度-->
			<select id="field-suffix" class="form-control  form-selection" name="row[suffix]" style="height:31px;">
				<option value="">----请选择----</option>
				<option value="text">[text]--文本输入框</option>
				<option value="number">[number]--数字输入框</option>
				<option value="time">[time]--日期时间</option>
				<option value="image">[image]--图片文件-单图</option>
				<option value="images">[images]--图片文件-多图</option>
				<option value="file">[file]--文件上传-单文件</option>
				<option value="files">[files]--文件上传-多文件</option>
				<option value="avatar">[avatar]--头像上传-单图</option>
				<option value="avatars">[avatars]--头像上传-多图</option>
				<option value="content">[content]--富文本编辑器</option>
				<option value="_id">[_id]--关联字段-单选</option>
				<option value="_ids">[_ids]--关联字段-多选</option>
				<option value="list-enum">[list]--单选下拉列表</option>
				<option value="list-set">[list]--多选下拉列表</option>
				<option value="data-enum">[data]--单选框</option>
				<option value="data-set">[data]--复选框</option>
				<option value="switch">[switch]--开关组件</option>
			</select>
		</div>
	</div>

	<div class="form-group form-input form-input-type">
		<label class="control-label col-xs-12 col-sm-2">字段类型：</label>
		<div class="col-xs-12 col-sm-5">
			<input type="hidden" class="operate" data-name="row[type]" value=""/>
			<!--给select一个固定的高度-->
			<select id="field-type" class="form-control form-selection" name="row[type]" style="height:31px;">
				<option value="">----请选择----</option>
				<option value="varchar">[varchar]--文本输入框</option>
				<option value="int">[int]--整形，type为number的文本框</option>
				<option value="enum">[enum]--枚举型，单选下拉列表框</option>
				<option value="set">[set]--set型，多选下拉列表框</option>
				<option value="float">[float]--浮点型，type为number的文本框，步长根据小数点位数生成</option>
				<option value="text">[text]--文本型，textarea文本框</option>
				<option value="datetime">[datetime]--日期时间，日期时间的组件</option>
				<option value="date">[date]--日期型，日期型的组件</option>
				<option value="year">[year]--年类型，年份选择的组件</option>
				<option value="timestamp">[timestamp]--时间戳，日期时间的组件</option>
			</select>
		</div>
	</div>

	<div class="form-group form-input form-input-comment">
		<label class="control-label col-xs-12 col-sm-2">选项：</label>
		<div class="col-xs-12 col-sm-5">
			<dl class="fieldlist" data-name="row[comment]" >
				<dd>
					<ins>键名</ins>
					<ins>键值</ins>
				</dd>
				<dd><a href="javascript:;" class="btn btn-sm btn-success btn-append"><i class="fa fa-plus"></i><?php echo __('Append'); ?></a></dd>
				<textarea name="row[comment]" class="form-control hide" cols="30" rows="5">{"option_01":"选项一","option_02":"选项2"}</textarea>
			</dl>
		</div>

	</div>
	<div class="form-group form-input form-input-length">
		<label class="control-label col-xs-12 col-sm-2">字段长度：</label>
		<div class="col-xs-12 col-sm-5">
			<input id="row-length" data-rule="" class="form-control form-control" placeholder="字段长度，浮点类型可用“10,2”方式表示" name="row[length]" type="text" value="">
		</div>
	</div>

	<div class="form-group form-input form-input-default">
		<label class="control-label col-xs-12 col-sm-2">默认值：</label>
		<div class="col-xs-12 col-sm-5">
			<input id="row-default" data-rule="" class="form-control form-control" placeholder="字段默认值，错误的默认值会保存失败" name="row[default]" type="text" value="">
		</div>
	</div>

	<div class="form-group layer-footer" style=" display: none">
		<label class="control-label col-xs-12 col-sm-2"></label>
		<div class="col-xs-12 col-sm-5">
			<button type="submit" class="btn btn-success btn-embossed "><?php echo __('OK'); ?></button>
			<button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
		</div>
	</div>
</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version']); ?>"></script>
    </body>
</html>