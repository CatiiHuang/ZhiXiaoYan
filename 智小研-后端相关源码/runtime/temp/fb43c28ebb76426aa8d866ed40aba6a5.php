<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:86:"/www/wwwroot/hgqlgzsl.temdu.com/public/../application/admin/view/tablemake/fields.html";i:1573124625;s:74:"/www/wwwroot/hgqlgzsl.temdu.com/application/admin/view/layout/default.html";i:1572536367;s:71:"/www/wwwroot/hgqlgzsl.temdu.com/application/admin/view/common/meta.html";i:1572536366;s:73:"/www/wwwroot/hgqlgzsl.temdu.com/application/admin/view/common/script.html";i:1572536366;}*/ ?>
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
                                <div class="panel panel-default panel-intro">
	<input id="assign-data-ids" type="hidden" value="<?php echo $ids; ?>">
	<?php echo build_heading(); ?>
	<div class="panel-body">
		<div id="myTabContent" class="tab-content">
			<div class="panel-heading"><div class="panel-lead text-red"><b>温馨提示：</b>删除字段后，需要重新生成CRUD，否则会提示找不到字段！</div></div>
			<div class="panel-heading"><div class="panel-lead text-red"><b>温馨提示：</b>由本插件创建的字段，建议不要在数据库直接修改字段名，否则将导致数据不同步！</div></div>
			<div class="tab-pane fade active in" id="one">
				<div class="widget-body no-padding">
					<div id="toolbar" class="toolbar">
						<?php echo build_toolbar('refresh,add,delete'); ?>
					</div>
					<table id="table" class="table table-striped table-bordered table-hover"
						   data-operate-detail="<?php echo $auth->check('tablemake/fields'); ?>"
						   data-operate-del="<?php echo $auth->check('tablemake/del'); ?>"
						   width="100%">
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version']); ?>"></script>
    </body>
</html>