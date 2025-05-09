<x-simple-layout>
    <h1>お問い合わせ</h1>

    <form method="post" action="{{route('question.store')}}">
        @csrf
        <div>
            <label for="name"> 氏名(任意) </label>
            <x-input-error :messages="$errors->get('name')"></x-input-error>
            <input type="text" id="name" name="name" value="{{ old('name') }}" />
        </div>

        <div>
            <label for="mail_address"> メールアドレス(任意) </label>
            <x-input-error :messages="$errors->get('mail_address')"></x-input-error>
            <input type="email" id="mail_address" name="mail_address" value="{{ old('mail_address') }}" />
        </div>

        <div>
            <label for="telephonenumber"> 電話番号(任意) </label>
            <x-input-error :messages="$errors->get('telephonenumber')"></x-input-error>
            <input type="tel" id="telephonenumber" name="telephonenumber" value="{{ old('telephonenumber') }}" />
        </div>

        <div>
            <label for="message"> お問い合わせ内容 </label>
            <x-input-error :messages="$errors->get('message')"></x-input-error>
            <textarea id="message" name="message" value="{{ old('message') }}"></textarea>
        </div>

        <input type="submit" value="送信" />
    </form>
</x-simple-layout>