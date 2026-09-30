<h1>Đăng nhập</h1>

<form action="{{ route('login.submit') }}" method="POST">

    @csrf

    <input
        type="email"
        name="email"
        placeholder="Email"
    >

    <input
        type="password"
        name="password"
        placeholder="Mật khẩu"
    >

    <button type="submit">
        Đăng nhập
    </button>

</form>