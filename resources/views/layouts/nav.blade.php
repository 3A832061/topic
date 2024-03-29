<!--子樣板-nav-->
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!--<img class="container px-5">-->
    <a id="index" class="navbar-brand" href={{route('index')}}><img src="https://i.imgur.com/VFpayUA.png" ></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href={{route('index')}}>首頁</a></li>
            <li class="nav-item"><a class="nav-link" href={{route('posts.index','全部公告')}}>公告</a></li>
            <li class="nav-item"><a class="nav-link" href={{route('calendars.index')}}>行事曆</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">社團介紹</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                    <li><a class="dropdown-item" href={{ route('introduction.show') }}>社團簡介</a></li>
                    <li><a class="dropdown-item" href={{route('teacher.show','')}}>指導老師</a></li>
                    <li><a class="dropdown-item" href={{route('award.show')}}>獎項紀錄</a></li>
                    <li><a class="dropdown-item" href={{route('organizes.index')}}>組織章程</a></li>
                    <li><a class="dropdown-item" href={{route('architectures.index')}}>組織架構</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href={{route('active.show','音樂會')}}>活動紀錄</a></li>

            @if (!auth()->check())
                <li class="nav-item"><a class="nav-link" href={{route('recruit.index')}}>招生表單</a></li>
            @endif

            @if (auth()->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">譜</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                            <li><a class="dropdown-item" href="{{route('sheet.show')}}">總清單</a></li>
                            <li><a class="dropdown-item" href="{{route('sheet.past')}}">歷年演出</a></li>
                            <li><a class="dropdown-item" href="{{route('sheetrequest.show')}}">缺頁申請</a></li>
                        </ul>
                    </li>

                    @if(auth()->user()->pos!='社員')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">文書</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                            <li><a class="dropdown-item" href={{route('evaluations.index')}}>歷年社團評鑑紀錄</a></li>
                            <li><a class="dropdown-item" href={{route('precautions.index')}}>活動注意事項</a></li>
                        </ul>
                    </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">社費</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                            @if(auth()->user()->pos=='總務')
                                <li><a id="accountantcreate" class="dropdown-item" href={{route('accountant.create')}}>填寫收支</a></li>
                            @endif
                            <li><a class="dropdown-item" href={{route('accountant.show')}}>收支清單</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{auth()->user()->pos}} {{auth()->user()->name}}</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                            <li><h3 class="dropdown-header" style="font-size: 18px;" >出席相關</h3></li>

                            @if(auth()->user()->pos!='社員')
                                <li><a id="calendar" class="dropdown-item" href={{route('calendar.create')}}>日程設定</a></li>
                            @endif

                            <li><a id="attend" class="dropdown-item" href={{route('attends.create')}}>出席填寫</a></li>
                            <li><a class="dropdown-item" href={{route('attends.index')}}>出席統計</a></li>

                            <li><hr class="dropdown-divider"></hr></li>
                            <li><h3 class="dropdown-header" style="font-size: 18px;" >社員相關</h3></li>
                            @if(auth()->user()->pos!='社員')
                                <li><a class="dropdown-item" href={{route('recruit.index')}}>招生資料</a></li>
                            @endif

                            @if(auth()->user()->pos=='社長' || auth()->user()->pos=='文書')
                                <li><a class="dropdown-item" href={{ route('register') }}>新增帳號</a></li>
                            @endif

                            <li> <a class="dropdown-item" href={{ route('user.show','now') }}>社員清單</a></li>
                            <li> <a class="dropdown-item" href={{ route('user.show','full') }}>歷屆社員清單</a></li>


                            <li><hr class="dropdown-divider"></hr></li>
                            <li><h3 style="font-size: 18px;" class="dropdown-header">帳號相關</h3></li>

                            <li><a class="dropdown-item" href={{route('user.edit')}}>社員資料</a></li>
                            <li><a class="dropdown-item" href={{route('password.reset')}}>修改密碼</a></li>
                            <li><hr class="dropdown-divider"></hr></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-jet-dropdown-link style="font-size: 16px;" href="{{ route('logout') }}"
                                                         onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        登出
                                    </x-jet-dropdown-link>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">登入</a></li>
            @endif
        </ul>
    </div>
    </div>
</nav>
