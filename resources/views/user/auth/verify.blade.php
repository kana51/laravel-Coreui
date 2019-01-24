@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('本登録') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('新しい本登録メッセージが送信されました！') }}
                        </div>
                    @endif

                    {{ __('メールアドレスの認証をお願いします。') }}
                    {{ __('もしメールが届かない場合は') }}、 <a href="{{ route('user.verification.resend') }}">{{ __('こちらをクリックしてください') }}</a>。
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
