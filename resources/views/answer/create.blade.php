<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold">回答編集</h1>
    </x-slot>

    <div class="bg-white my-3 p-3 mx-auto max-w-7xl rounded-2xl">
        <div>{{ $question->id }}</div>
        <div class="whitespace-pre">{{ $question->message }}</div>
        <hr>
        <div class="flex flex-wrap">
            <div class="mr-3">{{ $question->created_at }}</div>
            <div>{{ $question->name }}</div>
        </div>
        <div>メール {{ $question->mail_address }}</div>
        <div>電話 {{ $question->telephonenumber }}</div>
    </div>

    <div class="bg-white my-3 p-3 mx-auto max-w-7xl rounded-2xl">
        <form method="post" action="{{ route('answer.create', $question) }}">
            @csrf
            @if ($question->answer)
                @method('patch')
            @endif
            <div>回答</div>
            <x-input-error :messages="$errors->get('message')"></x-input-error>
            <textarea id="message" name="message" rows="10"
                class="w-full">{{ old('message', $question->answer->message ?? '') }}</textarea>
            <div class="flex flex-wrap">
                <div class="mr-3">{{ $question->answer->created_at ?? '--' }}</div>
                <div>{{ $question->answer->user->name ?? '--' }}</div>
            </div>
            @if (session('resultMessage'))
                <div class="text-red-600 font-bold">
                    {{ session('resultMessage') }}
                </div>
            @endif
            <x-primary-button>
                <input type="submit" value="送信" class="" />
            </x-primary-button>
        </form>
    </div>
</x-app-layout>