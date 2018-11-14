@extends('wap.layouts.list_main')
@section('content')
    <div class="m_member-title clear textCenter">
        <a class="pull-left" href="javascript:history.go(-1);">&nbsp;返回</a>
        GG电游
    </div>
    <div class="m_userCenter-line"></div>
    <div class="m_mgList">

        <ul class="clear textCenter">

            @foreach($data as $item)
                <?php
                $game_name_arr = (explode('_', $item->gameName));
                ?>
                <li>
                    <a href="{{ route('gg.playGame') }}?game_code={{ $item->tcgGameCode }}?platform=html5" class="link-box">
                        <div class="link-box-pic">
                            <img src="http://images.uxgaming.com/TCG_GAME_ICONS/GG/{{ $item->tcgGameCode }}.png" alt="">
                        </div>
                        <p class="link-box-txt">{{ isset($game_name_arr[1])?$game_name_arr[1]:$game_name_arr[0] }}</p>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection