    <link href="<?php echo $base_url;?>/static/plugins/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo $base_url;?>/static/ueditor/themes/iframe.css" media="all" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .file-drop-zone{
            height: 200px;
            max-height: 200px;
            overflow-y: auto;
        }
        .thumbnail>img{
            height: 200px;
        }
        
    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <b>
                    <?php if($vm_action == 'add'){echo lang('vml_form_title_add');}else if($vm_action == 'edit'){echo lang('vml_form_title_edit');} ?> 
                </b>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">General Elements</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- 选项卡 -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#vml_tab_basic" data-toggle="tab"><?php echo lang('vml_tab_basic');?></a></li>
                            <li><a href="#vml_tab_bp" data-toggle="tab"><?php echo lang('vml_tab_bp');?></a></li>
                            <li><a href="#vml_tab_vm" data-toggle="tab"><?php echo lang('vml_tab_vm');?></a></li>
                            <li><a href="#vml_tab_banner" data-toggle="tab"><?php echo lang('vml_tab_banner');?></a></li>
                            <li><a href="#vml_tab_rules" data-toggle="tab"><?php echo lang('vml_tab_rules');?></a></li>
                        </ul>
                        <?php if($vm_action == 'add'){ $action='add'; }else if($vm_action == 'edit'){ $action = 'edit/'.$vms['vm_id']; }?>  
                        <?php echo form_open('admin/voting_management/'.$action); ?>
                        <div class="tab-content">
                            <!-- vml_tab_basic -->
                            <div class="tab-pane active" id="vml_tab_basic">
                                <div class="box-body">

                                    <!-- 活动信息标题 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="title"><?php echo lang('vml_title'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('title')){echo 'has-error';}?>">
                                            <input type="text" class="form-control" id="title" name="title" placeholder="<?php echo lang('vml_help_title'); ?>" value="<?php echo $vm_action == 'add'?set_value(html_escape('title')):$vms['title']; ?>">
                                            <span class="help-block">
                                                <?php if(form_error('title')){echo "<i class='fa fa-times-circle-o'></i>".form_error('title');} ?>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- 活动信息描述 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="description"><?php echo lang('vml_description'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('description')){echo 'has-error';}?>" id="img-width-height">
                                            <script id="description" name="description" type="text/plain">
                                                <?php echo $vm_action == 'add'?set_value(html_escape('description')):htmlspecialchars_decode(html_entity_decode($vms['description'])); ?>
                                            </script>
                                            <span class="help-block"><?php if(form_error('description')){echo "<i class='fa fa-times-circle-o'></i>".form_error('description');} ?></span>
                                        </div>
                                    </div>

                                    <!-- 标识码 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="code"><?php echo lang('vml_code'); ?></label>
                                        </div>
                                        <div class="col-xs-10">
                                            <input type="text" class="form-control" id="code" name="code" placeholder="<?php echo lang('vml_help_code'); ?>" value="<?php echo $vm_action == 'add'?'':$vms['code']; ?>" readonly>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <!-- 创建时间 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="date_add"><?php echo lang('vml_date_add'); ?></label>
                                        </div>
                                        <div class="col-xs-10">
                                            <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" class="form-control" id="date_add" name="date_add" placeholder="<?php echo lang('vml_help_date_add'); ?>" value="<?php echo $vm_action == 'add'?'':$vms['date_add']; ?>" readonly>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <!-- 开始时间 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="date_start"><?php echo lang('vml_date_start'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('date_start')){echo 'has-error';}?>">
                                            <div class="input-group date form_datetime">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" class="form-control" id="vm_date_start" name="date_start" placeholder="<?php echo lang('vml_help_date_start'); ?>" value="<?php echo $vm_action == 'add'?'':$vms['date_start']; ?>" readonly>
                                            </div>
                                            <span class="help-block"><?php if(form_error('date_start')){echo "<i class='fa fa-times-circle-o'></i>".form_error('date_start');} ?></span>
                                        </div>
                                    </div>

                                    <!-- 结束时间 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="date_end"><?php echo lang('vml_date_end'); ?></label>
                                        </div>
                                        <div class="col-xs-10  <?php if(form_error('date_end')){echo 'has-error';}?>">
                                            <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" class="form-control" id="vm_date_end" name="date_end" placeholder="<?php echo lang('vml_help_date_end'); ?>" value="<?php echo $vm_action == 'add'?'':$vms['date_end']; ?>" readonly>
                                            </div>
                                            <span class="help-block"><?php if(form_error('date_end')){echo "<i class='fa fa-times-circle-o'></i>".form_error('date_end');} ?></span>
                                        </div>
                                    </div>

                                    <!-- 进展状态 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="statusing"><?php echo lang('vml_statusing'); ?></label>
                                        </div>
                                        <div class="col-xs-10">
                                            <div class="input-group date">
                                                <?php if($vm_action == 'add'){ ?>
                                                <a class="btn btn-block btn-social btn-openid">
                                                <i class="fa fa-calendar-times-o"></i> <?php echo lang('vml_statusing_notstarted'); ?> 
                                                </a>
                                                <?php }else{  ?>
                                                <?php if($vms['statusing'] == '1'){ ?>
                                                <a class="btn btn-block btn-social btn-openid">
                                                <i class="fa fa-calendar-times-o"></i> <?php echo lang('vml_statusing_notstarted'); ?> 
                                                </a>
                                                <?php }else if($vms['statusing'] == '2'){ ?>
                                                <a class="btn btn-block btn-social btn-twitter">
                                                <i class="fa fa-calendar-minus-o"></i> <?php echo lang('vml_statusing_ongoing'); ?>
                                                </a>
                                                <?php }else if($vms['statusing'] == '3'){ ?>
                                                <a class="btn btn-block btn-social btn-github">
                                                <i class="fa fa-calendar-check-o"></i> <?php echo lang('vml_statusing_complete'); ?>
                                                </a>
                                                <?php } ?>
                                                <?php } ?>
                                                <input type="hidden" class="form-control" id="statusing" name="statusing" value="<?php echo $vm_action == 'add'?'1':$vms['statusing']; ?>">
                                            </div>
                                            <span class="help-block"><?php echo form_error('statusing'); ?></span>
                                        </div>
                                    </div>
                                
                                    <!-- select -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="status"><?php echo lang('vml_status'); ?></label>
                                        </div>
                                        <div class="col-xs-10">
                                            <select class="form-control" name="status">
                                            <?php if($vm_action == 'add'){ ?>
                                            <option value="0"><?php echo lang('vml_status_off'); ?></option>
                                            <option value="1"><?php echo lang('vml_status_on'); ?></option>
                                            <?php }else{  ?>
                                            <?php if($vms['status'] == '0'){ ?>
                                            <option value="0" select="selected"><?php echo lang('vml_status_off'); ?></option>
                                            <option value="1"><?php echo lang('vml_status_on'); ?></option>
                                            <?php }else{ ?>
                                            <option value="1" select="selected"><?php echo lang('vml_status_on'); ?></option>
                                            <option value="0"><?php echo lang('vml_status_off'); ?></option> 
                                            <?php } ?>
                                            <?php } ?>
                                            </select>
                                            <span class="help-block"><?php echo form_error('status'); ?></span>
                                        </div>   
                                    </div>

                                    <!-- 投票分类 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="vc_id"><?php echo lang('vcl_name'); ?></label>
                                        </div>
                                        <div class="col-xs-10">
                                            <select class="form-control" name="vc_id">
                                            <?php if($vcs){ ?>
                                            <?php foreach ($vcs as $vc) { ?>
                                            <?php if($vm_action == 'add'){ ?>
                                            <option value='<?php echo $vc['vc_id']; ?>'><?php echo $vc['name']; ?></option>
                                            <?php }else{ ?>
                                            <?php if($vc['vc_id'] == $vm_vc['vc_id']){?>
                                            <option value="<?php echo $vc['vc_id']; ?>" selected="selected"><?php echo $vc['name']; ?></option>
                                            <?php }else if($vc['vc_id'] != $vm_vc['vc_id']){ ?>
                                            <option value="<?php echo $vc['vc_id']; ?>"><?php echo $vc['name']; ?></option>
                                            <?php } ?>
                                            <?php } ?>
                                            <?php } ?>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="box-footer pull-right">
                                        <button type="submit" class="btn btn-default"><?php echo lang('vml_save'); ?></button>
                                        <a href="javascript:history.go(-1);location.reload()" class="btn btn-default">
                                            <?php echo lang('vml_return'); ?>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- ./vml_tab_basic -->

                            <!-- vml_tab_bp -->
                            <div class="tab-pane" id="vml_tab_bp">
                                <div class="box-body">

                                    <!-- 基础人员配置 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label><?php echo lang('vml_basic_personnel'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('vm_bp')){echo 'has-error';}?>">
                                            <select class="form-control select2" id="vm_bp" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">

                                            </select>
                                            <input type="hidden" id="userSelect" name="vm_bp" style="width: 300px" />
                                            <span class="help-block"><?php echo form_error('vm_bp'); ?></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- ./vml_tab_bp -->

                            <!-- vml_tab_vm -->
                            <div class="tab-pane" id="vml_tab_vm">
                                <div class="box-body">

                                    <!-- 规则配置 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="rules_config"><?php echo lang('vml_rules_config'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('rules_config')){echo 'has-error';}?>">
                                            <script id="rules_config" name="rules_config" type="text/plain">
                                                <?php echo $vm_action == 'add'?set_value(html_escape('rules_config')):htmlspecialchars_decode(html_entity_decode($vms['rules_config'])); ?>
                                            </script>
                                            <span class="help-block"><?php if(form_error('rules_config')){echo "<i class='fa fa-times-circle-o'></i>".form_error('rules_config');} ?></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- ./vml_tab_vm -->

                            <!-- vml_tab_banner -->
                            <div class="tab-pane" id="vml_tab_banner">
                                <div class="box-body">

                                    <!-- 广告 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="title"><?php echo lang('vml_banner'); ?></label>
                                        </div>
                                        <div class="col-xs-10">
                                            <div class="row" id="banner">
                                                <!-- 编辑状态下数据 -->
                                                <?php if($vm_action == 'edit' && isset($vm_banners)){ ?>
                                                    <?php $i = 0; ?>
                                                    <?php foreach($vm_banners as $vmb){ ?>
                                                    <div class="col-xs-4">
                                                        <div class="thumbnail">
                                                            <img src="<?php echo $base_url;?>/upload/voting_management/<?php echo $vmb['banner'];?>" />
                                                            <input type="text" name="banner[<?php echo $i;?>]" value="<?php echo $vmb['banner'];?>" hidden>
                                                            <div class="text-center caption">
                                                                <select class="form-control" name="layout[<?php echo $i;?>]">
                                                                    <?php if($vmb['layout'] == 1){?>
                                                                        <option value="1">顶部</option>
                                                                        <option value="2">中间</option>
                                                                        <option value="3">底部</option>
                                                                    <?php }else if($vmb['layout'] == 2){ ?>
                                                                        <option value="2">中间</option>
                                                                        <option value="1">顶部</option>
                                                                        <option value="3">底部</option>
                                                                    <?php }else if($vmb['layout'] == 3){ ?>
                                                                        <option value="3">底部</option>
                                                                        <option value="2">中间</option>
                                                                        <option value="1">顶部</option>
                                                                    <?php } ?>       
                                                                </select>
                                                                <hr />
                                                                <div class="row">
                                                                    <div class="col-xs-4">
                                                                        <label class="control-label" for="banner_sort">
                                                                            <?php echo lang('vml_banner_sort'); ?>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-xs-4">
                                                                        <input type="text" class="form-control" id="banner_sort" name="banner_sort[<?php echo $i;?>]" value="<?php echo $vmb['banner_sort'];?>" placeholder="<?php echo lang('vml_help_banner_sort'); ?>" value="">
                                                                    </div>
                                                                    <div class="col-xs-4">
                                                                        <a onclick="del_banner('<?php echo $vmb['vm_banner_id'];?>','<?php echo $vmb['banner'];?>');" class="btn btn-primary" role="button">删除</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php $i++; ?>
                                                    <?php } ?>
                                                    <hr />
                                                <?php } ?>
                                                <!-- ./编辑状态下数据 -->
                                            </div>
                                          
                                            <div class="row">
                                                <input id="file" name="file" type="file" multiple class="file" accept="image/*">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- ./vml_tab_banner -->

                            <!-- vml_tab_rules -->
                            <div class="tab-pane" id="vml_tab_rules">
                                <div class="box-body">

                                    <!-- 是否关注后投票 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="focus"><?php echo lang('vml_focus'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('focus')){echo 'has-error';}?>">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="minimal" name="focus" value="0" <?php if($vm_action == 'add'){ echo "checked"; }else if($vm_action == 'edit'){ if($vmr['focus'] == '0'){ echo "checked"; } } ?>>
                                                    <?php echo lang('vml_focus_off'); ?>
                                                </label>
                                                <label>
                                                    <input type="radio" class="minimal" name="focus" value="1" <?php if($vm_action == 'edit'){ if($vmr['focus'] == '1'){ echo "checked"; } } ?>>
                                                    <?php echo lang('vml_focus_on'); ?>
                                                </label>
                                            </div>
                                            <span class="help-block">
                                                <?php if(form_error('focus')){echo "<i class='fa fa-times-circle-o'></i>".form_error('focus');} ?>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- 是否开启投票次数限制 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="vote_limit"><?php echo lang('vml_vote_limit'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('vote_limit')){echo 'has-error';}?>">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="minimal" name="vote_limit" value="0" <?php if($vm_action == 'add'){ echo "checked"; }else if($vm_action == 'edit'){ if($vmr['vote_limit'] == '0'){ echo "checked"; } } ?>>
                                                    <?php echo lang('vml_vote_limit_off'); ?>
                                                </label>
                                                <label>
                                                    <input type="radio" class="minimal" name="vote_limit" value="1" <?php if($vm_action == 'edit'){ if($vmr['vote_limit'] == '1'){ echo "checked"; } } ?>>
                                                    <?php echo lang('vml_vote_limit_on'); ?>
                                                </label>
                                            </div>
                                            <span class="help-block">
                                                <?php if(form_error('vote_limit')){echo "<i class='fa fa-times-circle-o'></i>".form_error('vote_limit');} ?>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- 可投票次数 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="select_vote_limit"><?php echo lang('vml_select_vote_limit'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('select_vote_limit')){echo 'has-error';}?>">
                                            <div class="radio">
                                                
                                                <!-- option => select_vote_limit -->
                                                <?php foreach ($option_values_select_vote_limit as $ovsvl) { ?>
                                                    <label>
                                                        <input type="radio" class="minimal" name="select_vote_limit" value="<?php echo $ovsvl['value']; ?>" <?php if($vm_action == 'add'){ if($ovsvl['value'] == '0'){ echo "checked"; } }else if($vm_action == 'edit'){ if($vmr['select_vote_limit'] == $ovsvl['value']){ echo "checked"; } } ?>/>
                                                        <?php echo $ovsvl['value']; ?>
                                                    </label>
                                                <?php } ?>

                                            </div>
                                            <span class="help-block">
                                                <?php if(form_error('select_vote_limit')){echo "<i class='fa fa-times-circle-o'></i>".form_error('select_vote_limit');} ?>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- 投票间隔时间 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="interval_time"><?php echo lang('vml_interval_time'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('interval_time')){echo 'has-error';}?>">
                                            <div class="radio">
                                                
                                                <!-- option => interval_time -->
                                                <?php foreach ($option_values_interval_time as $ovit) { ?>
                                                    <label>
                                                        <input type="radio" class="minimal" name="interval_time" value="<?php echo $ovit['value']; ?>" <?php if($vm_action == 'add'){ if($ovit['value'] == '0'){ echo "checked"; } }else if($vm_action == 'edit'){ if($vmr['interval_time'] == $ovit['value']){ echo "checked"; } } ?>/>
                                                        <?php echo $ovit['value']; ?>
                                                    </label>
                                                <?php } ?>

                                            </div>
                                            <span class="help-block">
                                                <?php if(form_error('interval_time')){echo "<i class='fa fa-times-circle-o'></i>".form_error('interval_time');} ?>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- 是否开启在线报名 -->
                                    <div class="form-group">
                                        <div class="col-xs-2 text-right">
                                            <label class="control-label" for="online_reg"><?php echo lang('vml_online_reg'); ?></label>
                                        </div>
                                        <div class="col-xs-10 <?php if(form_error('online_reg')){echo 'has-error';}?>">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="minimal" name="online_reg" value="0" <?php if($vm_action == 'add'){ echo "checked"; }else if($vm_action == 'edit'){ if($vmr['online_reg'] == '0'){ echo "checked"; } } ?>>
                                                    <?php echo lang('vml_online_reg_off'); ?>
                                                </label>
                                                <label>
                                                    <input type="radio" class="minimal" name="online_reg" value="1" <?php if($vm_action == 'edit'){ if($vmr['online_reg'] == '1'){ echo "checked"; } } ?>>
                                                    <?php echo lang('vml_online_reg_on'); ?>
                                                </label>
                                            </div>
                                            <span class="help-block">
                                                <?php if(form_error('online_reg')){echo "<i class='fa fa-times-circle-o'></i>".form_error('online_reg');} ?>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- ./vml_tab_rules -->

                        </div>
                        <!-- /.tab-content -->
                        <?php echo form_close();?>

                    </div>
                    <!-- nav-tabs-custom -->  
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- jQuery 2.2.0 -->
    <script src="<?php echo $base_url;?>/static/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <script type="text/javascript">
    //------------------人员配置-----------------------------
        $(function(){
            vm_bp();
        });

        function vm_bp(){

            var data = <?php print_r(json_encode($bps));?>;
            var $vm_bp_select = $("#vm_bp").select2({
                language: "zh-CN",
                closeOnSelect: false,
                maximumSelectionLength: 10,//限制选择的选项数量
                data: data
            });

            $("#vm_bp").change(function(){
                $("#userSelect").attr("value","");
                $("#userSelect").attr("value",$("#vm_bp").val());
            });

            //编辑状态下,回填本活动已关联的相关人员信息
            <?php if($vm_action == 'edit'){ ?>
            <?php if($vm_bps){ ?>
                var old_data = <?php echo '['.$vm_bps.']';?>;
                $vm_bp_select.val(old_data).trigger("change");
            <?php } ?>
            <?php } ?>
        }

    </script>

    <script src="<?php echo $base_url;?>/static/plugins/fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>/static/plugins/fileinput/js/lang/zh.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>/static/bootstrap/js/bootstrap.min.js"></script>
    <script>
        //图片上传控件
        $('#file').fileinput({
            language: 'zh',
            uploadUrl: '<?php echo $base_url;?>/admin/vote/voting_management/upload',
            //allowedFileTypes: ['image', 'html', 'text', 'video', 'audio', 'flash', 'object'],
            allowedFileExtensions : ['jpg', 'png','gif'],
            showCaption: true,//是否显示文件的标题。默认值true
            showPreview: true,//是否显示文件的预览图。默认值true
            showRemove: true,//是否显示删除/清空按钮。默认值true
            showUpload: true,//是否显示文件上传按钮。默认是submit按钮，除非指定了uploadUrl属性。默认值true
            showBrowse: true,//是否显示选择文件按钮。
            browseOnZoneClick: true,//是否启用文件浏览/选择点击预览区
            //minFileCount: 1,//最少必须选择一张图片
            //maxFileCount: 5,//最多只能选择五张图片
            //maxFileWidth: 50,
            enctype: 'multipart/form-data',
            previewSettings: {
                image: {width: "100px", height: "100px"}
            }
        });
        //错误
        $('#file').on('fileerror', function(event, data, msg) {
           console.log(data.id);
           console.log(data.index);
           console.log(data.file);
           console.log(data.reader);
           console.log(data.files);
           // get message
           alert(msg);
        });
        //上传后返回的数据赋值给文本框以便保存可以存储数据
        <?php if($vm_action == 'edit' && isset($vm_banners)){ ?>
            var i = <?php echo count($vm_banners);?>;
        <?php }else{ ?>
            var i = 0;
        <?php } ?>
        $("#file").on("fileuploaded", function (event, data, previewId, index) {
            var form = data.form, files = data.files, extra = data.extra,
            response = data.response, reader = data.reader;
            //console.log(response.file_name);
           
            $('#banner').append('<div class="col-xs-4"><div class="thumbnail">'+'<img src="<?php echo $base_url.'/upload/voting_management/'?>'+response.file_name+'" />'+'<input type="text" name="banner['+i+']" value="'+ response.file_name +'" hidden>'+'<div class="text-center caption"><select class="form-control" name="layout['+ i +']">'+'<option value="">请选择插入广告的位置</option><option value="1">顶部</option><option value="2">中间</option><option value="3">底部</option></select>'+'<hr /><div class="row"><div class="col-xs-4 text-right"><label class="control-label" for="banner_sort"><?php echo lang('vml_banner_sort'); ?></label>'+'</div><div class="col-xs-4"><input type="text" class="form-control" id="banner_sort" name="banner_sort['+ i +']" value="" placeholder="<?php echo lang('vml_help_banner_sort'); ?>" value=""></div></div></div></div></div>');
            i++;
        });
        

        //删除已存在图片
        function del_banner(vm_banner_id,banner){
            $.ajax({
                url: "<?php echo $base_url;?>/admin/vote/voting_management/del_banner",  
                type: "POST",
                data:{vm_banner_id:vm_banner_id,banner:banner},
                //dataType: "json",
                error: function(){  
                    alert('异常');
                },  
                success: function(data,status){//如果调用php成功    
                    //解码，显示汉字
                    window.location.reload();
                }
            });
        }

    </script>

    <script type="text/javascript" charset="utf-8" src="<?php echo $base_url;?>/static/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo $base_url;?>/static/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="<?php echo $base_url;?>/static/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript">
        var ue_description = UE.getEditor('description');
        ue_description.ready(function() {
            ue_description.setHeight(200);
            ue_description.getEditor('description').focus();
        });
        var ue_rules_config = UE.getEditor('rules_config');
        ue_rules_config.ready(function() {
            ue_rules_config.setHeight(500);
        });
    </script>

