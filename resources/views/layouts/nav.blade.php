<!--子樣板-nav-->
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!--<img class="container px-5">-->
        <a class="navbar-brand" href={{route('index')}}><img src="https://i.imgur.com/VFpayUA.png" ></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href={{route('posts.index')}}>公告</a></li>
                <li class="nav-item"><a class="nav-link" href={{route('calendars.index')}}>行事曆</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">社團介紹</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                        <li><a class="dropdown-item" href="blog-home.html">社團簡介</a></li>
                        <li><a class="dropdown-item" href={{route('teacher.show')}}>指導老師</a></li>
                        <li><a class="dropdown-item" href="blog-post.html">獎項紀錄</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">活動紀錄</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                        <li><a class="dropdown-item" href="portfolio-overview.html">音樂會</a></li>
                        <li><a class="dropdown-item" href="portfolio-item.html">試樂器</a></li>
                        <li><a class="dropdown-item" href="portfolio-item.html">迎新</a></li>
                        <li><a class="dropdown-item" href="portfolio-item.html">社慶</a></li>
                        <li><a class="dropdown-item" href="portfolio-item.html">講座</a></li>
                        <li><a class="dropdown-item" href="portfolio-item.html">寒/暑輔</a></li>
                        <li><a class="dropdown-item" href="portfolio-item.html">幹部訓練</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="about.html">招生網站</a></li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">譜相關</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                <li><a class="dropdown-item" href="portfolio-overview.html">總清單</a></li>
                                <li><a class="dropdown-item" href="portfolio-item.html">歷年演出</a></li>
                                <li><a class="dropdown-item" href="portfolio-item.html">缺頁申請</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">器材相關</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                <li><a class="dropdown-item" href="portfolio-overview.html">樂器清單</a></li>
                                <li><a class="dropdown-item" href="portfolio-item.html">樂器報修</a></li>
                                <li><a class="dropdown-item" href="portfolio-item.html">耗材清單</a></li>
                                <li><a class="dropdown-item" href="portfolio-item.html">耗材申請</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">社費相關</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                <li><a class="dropdown-item" href="portfolio-overview.html">收支圓餅圖</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">出席</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                <li><a class="dropdown-item" href="portfolio-overview.html">出席填寫</a></li>
                                <li><a class="dropdown-item" href="portfolio-item.html">出席統計</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">社員 {{auth()->user()->name}}</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                <li><a class="dropdown-item" href="portfolio-item.html">社員資料</a></li>
                                <li><a class="dropdown-item" href="portfolio-item.html">修改密碼</a></li>

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-jet-dropdown-link href="{{ route('logout') }}"
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
                    @endauth
                @endif
            </ul>
        </div>
        </div>
    </nav>