<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"/www/wwwroot/hgqlgzsl.temdu.com/public/../application/admin/view/command/add.html";i:1572585198;s:74:"/www/wwwroot/hgqlgzsl.temdu.com/application/admin/view/layout/default.html";i:1572536367;s:71:"/www/wwwroot/hgqlgzsl.temdu.com/application/admin/view/common/meta.html";i:1572536366;s:73:"/www/wwwroot/hgqlgzsl.temdu.com/application/admin/view/common/script.html";i:1572536366;}*/ ?>
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
                                <style>
    .relation-item {margin-top:10px;}
    legend {padding-bottom:5px;font-size:14px;font-weight:600;}
    label {font-weight:normal;}
    .form-control{padding:6px 8px;}
    #extend-zone .col-xs-2 {margin-top:10px;padding-right:0;}
    #extend-zone .col-xs-2:nth-child(6n+0) {padding-right:15px;}
</style>
<div class="panel panel-default panel-intro">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#crud" data-toggle="tab"><?php echo __('????????????CRUD'); ?></a></li>
            <li><a href="#menu" data-toggle="tab"><?php echo __('??????????????????'); ?></a></li>
            <li><a href="#min" data-toggle="tab"><?php echo __('??????????????????'); ?></a></li>
            <li><a href="#api" data-toggle="tab"><?php echo __('????????????API??????'); ?></a></li>
        </ul>
    </div>
    <div class="panel-body">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="crud">
                <div class="row">
                    <div class="col-xs-12">
                        <form role="form">
                            <input type="hidden" name="commandtype" value="crud" />
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <input checked="" name="isrelation" type="hidden" value="0">
                                        <label class="control-label" data-toggle="tooltip" title="?????????????????????1???1????????????,????????????????????????????????????">
                                            <input name="isrelation" type="checkbox" value="1">
                                            ????????????
                                        </label>
                                    </div>
                                    <div class="col-xs-3">
                                        <input checked="" name="local" type="hidden" value="1">
                                        <label class="control-label" data-toggle="tooltip" title="?????????????????????application/admin/model?????????,?????????????????????application/common/model?????????">
                                            <input name="local" type="checkbox" value="0"> ???????????????
                                        </label>
                                    </div>
                                    <div class="col-xs-3">
                                        <input checked="" name="delete" type="hidden" value="0">
                                        <label class="control-label" data-toggle="tooltip" title="??????CRUD?????????????????????">
                                            <input name="delete" type="checkbox" value="1"> ????????????
                                        </label>
                                    </div>
                                    <div class="col-xs-3">
                                        <input checked="" name="force" type="hidden" value="0">
                                        <label class="control-label" data-toggle="tooltip" title="?????????,???????????????????????????????????????????????????????????????????????????">
                                            <input name="force" type="checkbox" value="1">
                                            ??????????????????
                                        </label>
                                    </div>
                                    <!--
                                    <div class="col-xs-3">
                                        <input checked="" name="menu" type="hidden" value="0">
                                        <label class="control-label" data-toggle="tooltip" title="?????????,?????????????????????????????????">
                                            <input name="menu" type="checkbox" value="1">
                                            ????????????
                                        </label>
                                    </div>
                                    -->
                                </div>
                            </div>
                            <div class="form-group">
                                <legend>????????????</legend>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <label>???????????????</label>
                                        <?php echo build_select('table',$tableList,null,['class'=>'form-control selectpicker']);; ?>
                                    </div>
                                    <div class="col-xs-3">
                                        <label>?????????????????????</label>
                                        <input type="text" class="form-control" name="controller" data-toggle="tooltip" title="??????????????????????????????,?????????????????????????????????????????????" placeholder="??????????????????,???/??????">
                                    </div>
                                    <div class="col-xs-3">
                                        <label>??????????????????</label>
                                        <input type="text" class="form-control" name="model" data-toggle="tooltip" title="??????????????????????????????" placeholder="?????????????????????">
                                    </div>
                                    <div class="col-xs-3">
                                        <label>?????????????????????(????????????)</label>
                                        <select name="fields[]" id="fields" multiple style="height:30px;" class="form-control selectpicker"></select>
                                    </div>

                                </div>

                            </div>

                            <div class="form-group hide" id="relation-zone">
                                <legend>???????????????</legend>

                                <div class="row" style="margin-top:15px;">
                                    <div class="col-xs-12">
                                        <a href="javascript:;" class="btn btn-primary btn-sm btn-newrelation" data-index="1">??????????????????</a>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group" id="extend-zone">
                                <legend>?????????????????? <span style="font-size:12px;font-weight: normal;">(?????????????????????????????????????????????)</span></legend>
                                <div class="row">
                                    <div class="col-xs-2">
                                        <label>???????????????</label>
                                        <input type="text" class="form-control" name="setcheckboxsuffix" placeholder="?????????set??????" />
                                    </div>
                                    <div class="col-xs-2">
                                        <label>???????????????</label>
                                        <input type="text" class="form-control" name="enumradiosuffix" placeholder="?????????enum??????" />
                                    </div>
                                    <div class="col-xs-2">
                                        <label>??????????????????</label>
                                        <input type="text" class="form-control" name="imagefield" placeholder="?????????image,images,avatar,avatars" />
                                    </div>
                                    <div class="col-xs-2">
                                        <label>??????????????????</label>
                                        <input type="text" class="form-control" name="filefield" placeholder="?????????file,files" />
                                    </div>
                                    <div class="col-xs-2">
                                        <label>??????????????????</label>
                                        <input type="text" class="form-control" name="intdatesuffix" placeholder="?????????time" />
                                    </div>
                                    <div class="col-xs-2">
                                        <label>????????????</label>
                                        <input type="text" class="form-control" name="switchsuffix" placeholder="?????????switch" />
                                    </div>
                                    <div class="col-xs-2">
                                        <label>??????????????????</label>
                                        <input type="text" class="form-control" name="citysuffix" placeholder="?????????city" />
                                    </div>
                                    <div class="col-xs-2">
                                        <label>??????????????????(???)</label>
                                        <input type="text" class="form-control" name="selectpagesuffix" placeholder="?????????_id" />
                                    </div>
                                    <div class="col-xs-2">
                                        <label>??????????????????(???)</label>
                                        <input type="text" class="form-control" name="selectpagessuffix" placeholder="?????????_ids" />
                                    </div>
                                    <div class="col-xs-2">
                                        <label>???????????????</label>
                                        <input type="text" class="form-control" name="ignorefields" placeholder="?????????" />
                                    </div>
                                    <div class="col-xs-2">
                                        <label>????????????</label>
                                        <input type="text" class="form-control" name="sortfield" placeholder="?????????weigh" />
                                    </div>
                                    <div class="col-xs-2">
                                        <label>??????????????????</label>
                                        <input type="text" class="form-control" name="editorsuffix" placeholder="?????????content" />
                                    </div>
                                    <div class="col-xs-2">
                                        <label>?????????????????????</label>
                                        <input type="text" class="form-control" name="headingfilterfield" placeholder="?????????status" />
                                    </div>

                                </div>

                            </div>

                            <div class="form-group">
                                <legend>???????????????</legend>
                                <textarea class="form-control" data-toggle="tooltip" title="??????????????????????????????,?????????????????????????????????????????????" rel="command" rows="1" placeholder="????????????????????????"></textarea>
                            </div>

                            <div class="form-group">
                                <legend>????????????</legend>
                                <textarea class="form-control" rel="result" rows="5" placeholder="?????????????????????"></textarea>
                            </div>

                            <div class="form-group">
                                    <button type="button" class="btn btn-info btn-embossed btn-command"><?php echo __('???????????????'); ?></button>
                                    <button type="button" class="btn btn-success btn-embossed btn-execute"><?php echo __('????????????'); ?></button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="menu">
                <div class="row">
                    <div class="col-xs-12">
                        <form role="form">
                            <input type="hidden" name="commandtype" value="menu" />
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <input checked="" name="allcontroller" type="hidden" value="0">
                                        <label class="control-label">
                                            <input name="allcontroller" data-toggle="collapse" data-target="#controller" type="checkbox" value="1"> ???????????????????????????
                                        </label>
                                    </div>
                                    <div class="col-xs-3">
                                        <input checked="" name="delete" type="hidden" value="0">
                                        <label class="control-label">
                                            <input name="delete" type="checkbox" value="1"> ????????????
                                        </label>
                                    </div>
                                    <div class="col-xs-3">
                                        <input checked="" name="force" type="hidden" value="0">
                                        <label class="control-label">
                                            <input name="force" type="checkbox" value="1"> ??????????????????
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group in" id="controller">
                                <legend>???????????????</legend>

                                <div class="row" style="margin-top:15px;">
                                    <div class="col-xs-12">
                                        <input type="text" name="controllerfile" class="form-control selectpage" style="width:720px;" data-source="command/get_controller_list" data-multiple="true" name="controller" placeholder="??????????????????" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <legend>???????????????</legend>
                                <textarea class="form-control" rel="command" rows="1" placeholder="????????????????????????"></textarea>
                            </div>

                            <div class="form-group">
                                <legend>????????????</legend>
                                <textarea class="form-control" rel="result" rows="5" placeholder="?????????????????????"></textarea>
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-info btn-embossed btn-command"><?php echo __('???????????????'); ?></button>
                                <button type="button" class="btn btn-success btn-embossed btn-execute"><?php echo __('????????????'); ?></button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="min">
                <div class="row">
                    <div class="col-xs-12">
                        <form role="form">
                            <input type="hidden" name="commandtype" value="min" />
                            <div class="form-group">
                                <legend>????????????</legend>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <label>?????????????????????</label>
                                        <select name="module" class="form-control selectpicker">
                                            <option value="all" selected>??????</option>
                                            <option value="backend">??????Backend</option>
                                            <option value="frontend">??????Frontend</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-3">
                                        <label>?????????????????????</label>
                                        <select name="resource" class="form-control selectpicker">
                                            <option value="all" selected>??????</option>
                                            <option value="js">JS</option>
                                            <option value="css">CSS</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-3">
                                        <label>?????????????????????</label>
                                        <select name="optimize" class="form-control selectpicker">
                                            <option value="">???</option>
                                            <option value="uglify">uglify</option>
                                            <option value="closure">closure</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group in">
                                <legend>???????????????</legend>

                                <div class="row" style="margin-top:15px;">
                                    <div class="col-xs-12">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <legend>???????????????</legend>
                                <textarea class="form-control" rel="command" rows="1" placeholder="????????????????????????"></textarea>
                            </div>

                            <div class="form-group">
                                <legend>????????????</legend>
                                <textarea class="form-control" rel="result" rows="5" placeholder="?????????????????????"></textarea>
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-info btn-embossed btn-command"><?php echo __('???????????????'); ?></button>
                                <button type="button" class="btn btn-success btn-embossed btn-execute"><?php echo __('????????????'); ?></button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="api">
                <div class="row">
                    <div class="col-xs-12">
                        <form role="form">
                            <input type="hidden" name="commandtype" value="api" />
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <input checked="" name="force" type="hidden" value="0">
                                        <label class="control-label">
                                            <input name="force" type="checkbox" value="1">
                                            ????????????
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <legend>????????????</legend>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <label>???????????????URL</label>
                                        <input type="text" name="url" class="form-control" placeholder="API URL,?????????" />
                                    </div>
                                    <div class="col-xs-3">
                                        <label>??????????????????</label>
                                        <input type="text" name="output" class="form-control" placeholder="???????????????api.html" />
                                    </div>
                                    <div class="col-xs-3">
                                        <label>????????????</label>
                                        <input type="text" name="template" class="form-control" placeholder="????????????????????????" />
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-xs-3">
                                        <label>????????????</label>
                                        <input type="text" name="title" class="form-control" placeholder="?????????FastAdmin" />
                                    </div>
                                    <div class="col-xs-3">
                                        <label>????????????</label>
                                        <input type="text" name="author" class="form-control" placeholder="?????????FastAdmin" />
                                    </div>
                                    <div class="col-xs-3">
                                        <label>????????????</label>
                                        <select name="language" class="form-control">
                                            <option value="" selected>???????????????</option>
                                            <option value="zh-cn">??????</option>
                                            <option value="en">??????</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <legend>???????????????</legend>
                                <textarea class="form-control" rel="command" rows="1" placeholder="????????????????????????"></textarea>
                            </div>

                            <div class="form-group">
                                <legend>????????????</legend>
                                <textarea class="form-control" rel="result" rows="5" placeholder="?????????????????????"></textarea>
                            </div>

                            <div class="form-group">
                                <button type="button" class="btn btn-info btn-embossed btn-command"><?php echo __('???????????????'); ?></button>
                                <button type="button" class="btn btn-success btn-embossed btn-execute"><?php echo __('????????????'); ?></button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script id="relationtpl" type="text/html">
    <div class="row relation-item">
        <div class="col-xs-2">
            <label>??????????????????</label>
            <select name="relation[<%=index%>][relation]" class="form-control relationtable"></select>
        </div>
        <div class="col-xs-2">
            <label>?????????????????????</label>
            <select name="relation[<%=index%>][relationmode]" class="form-control relationmode"></select>
        </div>
        <div class="col-xs-2">
            <label>????????????</label>
            <select name="relation[<%=index%>][relationforeignkey]" class="form-control relationforeignkey"></select>
        </div>
        <div class="col-xs-2">
            <label>????????????</label>
            <select name="relation[<%=index%>][relationprimarykey]" class="form-control relationprimarykey"></select>
        </div>
        <div class="col-xs-2">
            <label>?????????????????????</label>
            <select name="relation[<%=index%>][relationfields][]" multiple class="form-control relationfields"></select>
        </div>
        <div class="col-xs-2">
            <label>&nbsp;</label>
            <a href="javascript:;" class="btn btn-danger btn-block btn-removerelation">??????</a>
        </div>
    </div>
</script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version']); ?>"></script>
    </body>
</html>