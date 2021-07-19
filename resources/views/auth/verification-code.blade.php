@extends('auth.layouts' , ['class' => 'act'])

@section('content')

    <form action="" class="form" method="post">

        <div class="card-header">
            <p class="activation-code-title">کد فرستاده شده به ایمیل <span>Mohammadniko3@gmail.com</span>
                را وارد کنید . ممکن است ایمیل به پوشه spam فرستاده شده باشد
            </p>
        </div>
        <div class="form-content form-content1">
            <input class="activation-code-input" placeholder="فعال سازی">
            <br>
            <button class="btn i-t">تایید</button>

        </div>
        <div class="form-footer">
            <a href="login.html">صفحه ثبت نام</a>
        </div>

        @endsection
        @push('scripts')
            <script src="js/jquery-3.4.1.min.js"></script>
            <script src="js/activation-code.js"></script>
    @endpush
