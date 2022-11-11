<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:83:"/www/wwwroot/hgqlgzsl.temdu.com/public/../application/admin/view/download/edit.html";i:1573283902;s:74:"/www/wwwroot/hgqlgzsl.temdu.com/application/admin/view/layout/default.html";i:1572536367;s:71:"/www/wwwroot/hgqlgzsl.temdu.com/application/admin/view/common/meta.html";i:1572536366;s:73:"/www/wwwroot/hgqlgzsl.temdu.com/application/admin/view/common/script.html";i:1572536366;}*/ ?>
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
                                <form id="edit-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Kmm'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-kmm" data-rule="required" class="form-control" name="row[kmm]" type="text" value="<?php echo htmlentities($row['kmm']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Zlm'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-zlm" data-rule="required" class="form-control" name="row[zlm]" type="text" value="<?php echo htmlentities($row['zlm']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Ljfile'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-ljfile" data-rule="required" class="form-control" size="50" name="row[ljfile]" type="text" value="<?php echo htmlentities($row['ljfile']); ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-ljfile" class="btn btn-danger plupload" data-input-id="c-ljfile" data-multiple="false" data-preview-id="p-ljfile"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-ljfile" class="btn btn-primary fachoose" data-input-id="c-ljfile" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-ljfile"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-ljfile"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Xzcs'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-xzcs" data-rule="required" class="form-control" name="row[xzcs]" type="number" value="<?php echo htmlentities($row['xzcs']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Xx'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-xx" data-rule="required" class="form-control" name="row[xx]" type="number" value="<?php echo htmlentities($row['xx']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Dx'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-dx" data-rule="required" class="form-control" name="row[dx]" type="text" value="<?php echo htmlentities($row['dx']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Gs'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-gs" data-rule="required" class="form-control" name="row[gs]" type="text" value="<?php echo htmlentities($row['gs']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Ms'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-ms" data-rule="required" class="form-control" name="row[ms]" type="text" value="<?php echo htmlentities($row['ms']); ?>">
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