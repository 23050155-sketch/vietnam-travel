<h1>Đăng ký</h1>

<form action="{{ route('register.submit') }}" method="POST">

    @csrf

    <input
        type="text"
        name="name"
        placeholder="Họ tên"
        value="{{ old('name') }}"
    >

    <input
        type="email"
        name="email"
        placeholder="Email"
        value="{{ old('email') }}"
    >

    <input
        type="password"
        name="password"
        placeholder="Mật khẩu"
    >

    <input
        type="password"
        name="password_confirmation"
        placeholder="Nhập lại mật khẩu"
    >

    <button type="submit">
        Đăng ký
    </button>

</form>