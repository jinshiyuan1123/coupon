<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">一键返水</h3>
            </div>
            <div class="panel-body">
                <?php echo $__env->make('admin.send_fs.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <form action="<?php echo e(route('send_fs.store')); ?>" method="post">
                    <div class="row text-center" style="margin-top: 5px;margin-bottom: 5px;">
                        <button type="button" class="btn btn-primary btn-md submit-form-sync">一键返水</button>
                        
                        
                        
                        
                        
                    </div>
                    <table class="table table-bordered table-hover text-center">
                        <tr>
                            <th style="width: 10%">会员</th>
                            <th style="width: 20%">游戏类型</th>
                            <th style="width: 5%">接口</th>
                            <th style="width: 5%">笔数</th>
                            <th>有效投注金额</th>
                            <th style="width: 20%">返水等级</th>
                            <th style="width: 10%">返水比例</th>
                            <th style="width: 15%">返水金额</th>
                        </tr>
                        <?php
                        $total_num = $total_tz_amount = $total_fs_money = 0;
                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $member_id = $item->id;

                            $gameType_str = '';
                            $game_mod = new \App\Models\GameRecord();
                            if ($start_at)
                            {
                                $game_mod = $game_mod->where('betTime', '>=', $start_at);
                            }
                            if ($end_at)
                            {
                                $game_mod = $game_mod->where('betTime', '<=', $end_at);
                            }
                            if ($api_type)
                            {
                                $game_mod = $game_mod->where('api_type', $api_type);
                            }
//                            if (count(array_filter($gameType)) == 0)
//                            {
//                                $gameType = array_keys(config('platform.game_type'));
//                            }

                            $game_mod = $game_mod->where('gameType', $gameType);
//                            foreach ($gameType as $v)
//                                $gameType_str.=config('platform.game_type')[$v].'&';

                            //$gameType_str = rtrim($gameType_str, '&');

                            $game_mod = $game_mod->where('member_id', $member_id);

                            $num = $game_mod->count();
                            $tz_amount = $game_mod->sum('validBetAmount');//投注总额
                            //返水等级
                            $fs_level = \App\Models\FsLevel::orderBy('level', 'desc')->where('game_type', $gameType)->get();
                            $rate = 0;$level_name = '';
                            foreach ($fs_level as $k => $v)
                            {
                                if ($tz_amount >= $v->quota)
                                {
                                    $level_name = $v->name;
                                    $rate = $v->rate;
                                    break;
                                }
                            }

                            $fs_money = sprintf("%.2f",  $tz_amount*$rate/100);

                            $total_tz_amount +=$tz_amount;
                            $total_num +=$num;
                            $total_fs_money += $fs_money;

                            ?>
                            <?php if($num > 0): ?>
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" name="member_id[]" checked value="<?php echo e($member_id); ?>"><?php echo e($item->name); ?>

                                        </label>
                                    </td>
                                    <td>
                                        <?php echo e(config('platform.game_type')[$gameType]); ?>

                                    </td>
                                    <td>
                                        <?php if($api_type): ?><?php echo e($_api_list[$api_type]); ?><?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo e($num); ?>

                                    </td>
                                    <td>
                                        <?php echo e($tz_amount); ?>

                                    </td>
                                    <td>
                                        <?php echo e($level_name); ?>

                                    </td>
                                    <td>
                                        <?php echo e($rate.'%'); ?>

                                    </td>
                                    <td>
                                        <input type="text" name="money[<?php echo e($member_id); ?>]" class="form-control"  style="max-width: 80px;" value="<?php echo e(sprintf("%.2f",  $tz_amount*$rate/100)); ?>">
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tfoot>
                        <tr>
                            <td><strong style="color: red">总合计</strong></td>
                            <td colspan="2"></td>
                            <td><strong style="color: red"><?php echo e($total_num); ?></strong></td>
                            <td><strong style="color: red"><?php echo e($total_tz_amount); ?></strong></td>
                            <td colspan="2"></td>
                            <td><strong style="color: red"><?php echo e($total_fs_money); ?></strong></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <button type="button" class="btn btn-primary btn-md submit-form-sync">一键返水</button>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </form>
                
                
                
                
                
                
                
                

            </div>
        </div>

    </section><!-- /.content -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection("after.js"); ?>
    <script>
        var start = {
            elem: '#start_at',
            format: 'YYYY-MM-DD hh:mm:ss',
            //min: laydate.now(), //设定最小日期为当前日期
            max: '2099-06-16 23:59:59', //最大日期
            istime: true,
            istoday: false,
            choose: function(datas){
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };
        var end = {
            elem: '#end_at',
            format: 'YYYY-MM-DD 23:59:59',
            //min: laydate.now(),
            max: '2099-06-16 23:59:59',
            istime: true,
            istoday: true,
            choose: function(datas){
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
        laydate(start);
        laydate(end);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>