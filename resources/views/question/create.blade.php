<x-simple-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold">お問い合わせ</h1>
    </x-slot>

    <div class="bg-white my-3 p-3 mx-auto max-w-7xl rounded-2xl">
        <form method="post" action="{{route('question.store')}}">
            @csrf
            <div class="flex flex-wrap mb-3 items-center">
                <div class="w-[10rem]">
                    <label for="name" class="font-semibold"> 氏名(任意) </label>
                </div>
                <div>
                    <x-input-error :messages="$errors->get('name')"></x-input-error>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" />
                </div>
            </div>

            <div class="flex flex-wrap mb-3 items-center">
                <div class="w-[10rem]">
                    <label for="mail_address" class="font-semibold"> メールアドレス(任意) </label>
                </div>
                <div>
                    <x-input-error :messages="$errors->get('mail_address')"></x-input-error>
                    <input type="email" id="mail_address" name="mail_address" value="{{ old('mail_address') }}" />
                </div>
            </div>

            <div class="flex flex-wrap mb-3 items-center">
                <div class="w-[10rem]">
                    <label for="telephonenumber" class="font-semibold"> 電話番号(任意) </label>
                </div>

                <div>
                    <x-input-error :messages="$errors->get('telephonenumber')"></x-input-error>
                    <input type="tel" id="telephonenumber" name="telephonenumber"
                        value="{{ old('telephonenumber') }}" />
                </div>
            </div>

            <div>
                <label for="message" class="font-semibold"> お問い合わせ内容 </label>
                <div>
                    <x-input-error :messages="$errors->get('message')"></x-input-error>
                    <textarea id="message" name="message" rows="10"
                        class="w-full">{{ old('message') }}</textarea>
                </div>
            </div>

            <x-primary-button>
                <input type="submit" value="送信"/>
            </x-primary-button>
        </form>
    </div>
</x-simple-layout>