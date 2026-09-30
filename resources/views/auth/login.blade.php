<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Đăng nhập - TPDĐ Travel</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    rgba(15, 118, 110, 0.75),
                    rgba(15, 118, 110, 0.75)
                ),
                url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e');

            background-size: cover;
            background-position: center;

            padding: 20px;
        }

        .auth-card {
            width: 100%;
            max-width: 430px;

            background: rgba(255,255,255,0.96);

            padding: 38px;

            border-radius: 20px;

            box-shadow:
                0 15px 40px rgba(0,0,0,0.18);
        }

        .logo {
            text-align: center;

            color: #0f766e;

            font-size: 28px;
            font-weight: bold;

            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;

            color: #64748b;

            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;

            margin-bottom: 7px;

            font-size: 14px;
            font-weight: 600;

            color: #334155;
        }

        input {
            width: 100%;

            padding: 12px 14px;

            border: 1px solid #cbd5e1;
            border-radius: 10px;

            font-size: 15px;

            transition: 0.2s;
        }

        input:focus {
            outline: none;

            border-color: #0d9488;

            box-shadow:
                0 0 0 3px rgba(13,148,136,0.12);
        }

        .btn {
            width: 100%;

            padding: 13px;

            border: none;
            border-radius: 10px;

            background: #0d9488;
            color: white;

            font-size: 15px;
            font-weight: 600;

            cursor: pointer;

            transition: 0.2s;
        }

        .btn:hover {
            background: #0f766e;
        }

        .bottom-text {
            text-align: center;

            margin-top: 22px;

            color: #64748b;

            font-size: 14px;
        }

        .bottom-text a {
            color: #0d9488;

            font-weight: 600;

            text-decoration: none;
        }

        .bottom-text a:hover {
            text-decoration: underline;
        }

        .error-box {
            margin-bottom: 20px;

            padding: 13px 15px;

            background: #fee2e2;
            color: #991b1b;

            border-radius: 10px;

            font-size: 14px;
        }

        .back-home {
            display: block;

            text-align: center;

            margin-top: 18px;

            color: #475569;

            text-decoration: none;

            font-size: 14px;
        }

        .back-home:hover {
            color: #0d9488;
        }
    </style>
</head>

<body>

<div class="auth-card">

    <div class="logo">
        TPDĐ Travel
    </div>

    <p class="subtitle">
        Đăng nhập để tiếp tục khám phá Việt Nam
    </p>


    @if($errors->any())

        <div class="error-box">

            @foreach($errors->all() as $error)

                <div>
                    {{ $error }}
                </div>

            @endforeach

        </div>

    @endif


    <form
        action="{{ route('login.submit') }}"
        method="POST"
    >

        @csrf


        <div class="form-group">

            <label>
                Email
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Nhập email của bạn"
                required
            >

        </div>


        <div class="form-group">

            <label>
                Mật khẩu
            </label>

            <input
                type="password"
                name="password"
                placeholder="Nhập mật khẩu"
                required
            >

        </div>


        <button
            type="submit"
            class="btn"
        >
            Đăng nhập
        </button>

    </form>


    <p class="bottom-text">

        Chưa có tài khoản?

        <a href="{{ route('register') }}">
            Đăng ký ngay
        </a>

    </p>


    <a
        href="{{ url('/') }}"
        class="back-home"
    >
        ← Quay về trang chủ
    </a>

</div>

</body>
</html>