@extends('wap.layouts.list_main')
@section('content')
    <div class="m_member-title clear textCenter">
        <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
        DT电游
    </div>
    <div class="m_userCenter-line"></div>
    <div class="m_mgList">
        <?php
        $api_mod = \App\Models\Api::where('api_name', 'DT')->first();
        $data = \App\Models\GameList::where('api_id', $api_mod->id)->where('on_line', 0)->where('client_type', 2)->orderBy('sort', 'asc')->get();
        ?>
        <ul class="clear textCenter">
            @foreach($data as $item)
                <li>
                    <a href="{{ route('dt.playGame') }}?gametype={{ $item->game_id }}&devices=1" class="link-box">
                        <div class="link-box-pic">
                            <?php $img_path = $item->img_path;?>
                            <img src="{{ asset("/wap/images/newgame/$img_path") }}" alt="">
                        </div>
                        <p class="link-box-txt">{{ $item->name }}</p>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection