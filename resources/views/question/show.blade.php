<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold">お問い合わせ一覧</h1>
    </x-slot>
    @foreach ($questions as $question)
        <div class="bg-white my-3 p-3 mx-auto max-w-7xl rounded-2xl hover:bg-sky-100">
            <a href="{{ route('answer.create', $question) }}">
                <div>{{ $question->id }}</div>
                <div>{{ $question->getPartOfMessage() }}</div>
                <hr>
                <div class="flex flex-wrap">
                    <div class="w-[6rem]">お問い合わせ</div>
                    <div class="flex flex-wrap">
                        <div class="w-[10rem]">{{ $question->created_at }}</div>
                        <div>{{ $question->name }}</div>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-[6rem]">回答</div>
                    <div class="flex flex-wrap">
                        <div class="w-[10rem]">{{ $question->answer->created_at ?? '--' }}</div>
                        <div>{{ $question->answer->user->name ?? '--' }}</div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach

    <div class="my-3 p-3 mx-auto max-w-7xl">
        {{ $questions->links() }}
    </div>
</x-app-layout>