@component('mail::message')
# Xin chào {{$HovaTen}}!

Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.

@component('mail::button', ['url' => route('reset_password_view', $token)])
Bấm vào đây để Đổi Mật Khẩu
@endcomponent

Nếu bạn không gửi yêu cầu, bạn không cần thực hiện thêm hành động nào.

Cảm ơn,<br>
{{ config('app.name') }}
@endcomponent
