<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:83:"/www/wwwroot/hgqlgzsl.temdu.com/public/../application/admin/view/tablemake/add.html";i:1573124625;s:74:"/www/wwwroot/hgqlgzsl.temdu.com/application/admin/view/layout/default.html";i:1572536367;s:71:"/www/wwwroot/hgqlgzsl.temdu.com/application/admin/view/common/meta.html";i:1572536366;s:73:"/www/wwwroot/hgqlgzsl.temdu.com/application/admin/view/common/script.html";i:1572536366;}*/ ?>
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
                                <form id="add-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-2"><?php echo __('m_name'); ?>：</label>
		<div class="col-xs-12 col-sm-8">
			<input id="c-name" data-rule="required" class="form-control form-control" placeholder="模型名称，用于区分多个模型，不能重复" name="row[name]" type="text" value="">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-2"></label>
		<div class="col-xs-12 col-sm-8">
			<span class="n-msg" style="color: #ff0000;">*<?php echo __('m_name'); ?>不可重复</span>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-2"><?php echo __('m_table'); ?>：</label>
		<div class="col-xs-12 col-sm-8">
			<input id="c-table" data-rule="required" class="form-control form-control" placeholder="表名称会自动加上系统的表前缀：<?php echo $prefix; ?>" name="row[table]" type="text" value="">
		</div>

	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-2"></label>
		<div class="col-xs-12 col-sm-8">
			<span class="n-msg" style="color: #ff0000;">*<?php echo __('m_table'); ?>不可重复</span>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-2"><?php echo __('m_desc'); ?>：</label>
		<div class="col-xs-12 col-sm-8">
			<input id="c-desc"  class="form-control form-control" name="row[desc]" type="text" value="">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-2"></label>
		<div class="col-xs-12 col-sm-8">
			保存后，系统会自动创建一个表，自带字段：id，id为主键，开发完成后，索引请自行根据实际情况添加。
		</div>
	</div>

	<div class="form-group layer-footer">
		<label class="control-label col-xs-12 col-sm-2"></label>
		<div class="col-xs-12 col-sm-8">
			<button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
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