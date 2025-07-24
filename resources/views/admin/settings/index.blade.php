@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Pengaturan Email</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="mail_mailer">Mailer</label>
            <input type="text" name="mail_mailer" id="mail_mailer" class="form-control" value="{{ $settings['mail_mailer']->value ?? 'smtp' }}" required>
        </div>

        <div class="form-group">
            <label for="mail_host">Host</label>
            <input type="text" name="mail_host" id="mail_host" class="form-control" value="{{ $settings['mail_host']->value ?? 'smtp.gmail.com' }}" required>
        </div>

        <div class="form-group">
            <label for="mail_port">Port</label>
            <input type="number" name="mail_port" id="mail_port" class="form-control" value="{{ $settings['mail_port']->value ?? 587 }}" required>
        </div>

        <div class="form-group">
            <label for="mail_username">Username (Email)</label>
            <input type="email" name="mail_username" id="mail_username" class="form-control" value="{{ $settings['mail_username']->value ?? '' }}" required>
        </div>

        <div class="form-group">
            <label for="mail_password">Password (App Password)</label>
            <input type="password" name="mail_password" id="mail_password" class="form-control">
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
        </div>

        <div class="form-group">
            <label for="mail_encryption">Enkripsi</label>
            <input type="text" name="mail_encryption" id="mail_encryption" class="form-control" value="{{ $settings['mail_encryption']->value ?? 'tls' }}">
        </div>

        <div class="form-group">
            <label for="mail_from_address">Alamat Email Pengirim</label>
            <input type="email" name="mail_from_address" id="mail_from_address" class="form-control" value="{{ $settings['mail_from_address']->value ?? '' }}" required>
        </div>

        <div class="form-group">
            <label for="mail_from_name">Nama Pengirim</label>
            <input type="text" name="mail_from_name" id="mail_from_name" class="form-control" value="{{ $settings['mail_from_name']->value ?? config('app.name') }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan Pengaturan</button>
    </form>
</div>
@endsection
