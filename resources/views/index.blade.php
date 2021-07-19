<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>سایت فروشگاه کتاب</title>
    <meta name="description"
          content="فروش محبوب ترین و برترین کتاب ها">
    <meta property="og:locale" content="fa"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font/font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" media="(max-width:991px)">
    <script src="/js/sweetalert.min.js"></script>

</head>
<body>
<header class="t-header">
    <div class="container">
        <div class="t-header-row">
            <div class="t-header-right">
                <div class="t-header-logo"><a href="index.html"></a></div>
                <div class="t-header-search">
                </div>
            </div>
            <div class="t-header-left">
                <div class="icons">
                    <div class="search-icon"></div>
                    <div class="menu-icon"></div>

                </div>


                @auth()
                    <div class="user-menu-account">
                        <div class="user-image">
                            <img src="img//.jpg" alt="desction">
                        </div>
                        <span>پروفایل کاربری من </span>
                        <div class="user-menu-account-dropdown">
                            <ul>
                                <li><a href="{{ route('dashboard') }}">مشاهده پروفایل</a></li>
                
                                <li><a href="{{ route('logout') }}">خروج</a></li>
                            </ul>
                        </div>
                    </div>
                @endauth

                @guest()
                    <div class="login-register-btn ">
                        <div><a class="btn-login" href="{{ route('login') }}">ورود</a></div>
                        <div><a class="btn-register" href="{{ route('register') }}">ثبت نام</a></div>
                    </div>

                @endguest
            </div>
        </div>
    </div>
    <nav id="navigation" class="navigation">
        <!--        بعد از لاگین توی حالت رسپانسیو-->
        <div class="after-login d-none">
            <a href="">مشاهده پروفایل</a>
            <a href="">خرید های من</a>
            <a href="">داشبورد</a>
            <a href="">خروج</a>
        </div>
        <!---->
        <div class="login-register-btn d-none">
            <div><a class="btn-login" href="login.html">ورود</a></div>
            <div><a class="btn-register" href="register.html">ثبت نام</a></div>
        </div>
    </nav>
</header>
<main id="index">
    <article class="container article">
        <div class="ads d-none">
            <a href="" rel="nofollow noopener"><img src="img/ads/1440px/test.jpg" alt=""></a>
        </div>
        <div class="box-filter">
            <div class="b-head">
                <h2>کتاب ها</h2>
            </div>
            <div class="posts">
                @foreach($books as $book)
                <div class="col">
                    <a href="#">
                        <div class="card-img"><img src="{{ asset('storage/img/' . $book->img) }}" alt="reactjs"></div>
                        <div class="card-title "><h2>نام کتاب :: {{ $book->book_name }}</h2></div>
                        <div class="card-body p-5">
                            <span>توضیحات :: {{ $book->text }}</span>
                        </div>
                        <div class="card-body">
                            <span>نویسنده :: {{ $book->author_name }}</span>
                        </div>
                        <div class="card-details">
                            <div class="price">
                                <div class="endPrice" onclick="document.querySelector('#book-form-{{$book->id}}').submit()">خرید</div>
                            </div>
                            <form method="post" id="book-form-{{$book->id}}" action="{{ route('cart.store') }}" style="display: none">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                            </form>
                            <div class="float-left">
                                <button class="btn  btn-warning">{{ $book->price }}</button>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </article>
</main>

<div class="overlay"></div>
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/js.js') }}"></script>
<script src="{{ asset('js/countDownTimer.js') }}"></script>
@include('sweet::alert')
</body>
</html>
