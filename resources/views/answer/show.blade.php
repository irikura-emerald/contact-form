<x-simple-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold">回答閲覧</h1>
    </x-slot>

    <div class="bg-white my-3 p-3 mx-auto max-w-7xl rounded-2xl">
        <div class="flex flex-wrap">
            <div class="font-semibold w-[7rem]">ID</div>
            <div>{{ $question->id }}</div>
        </div>
        <div class="flex flex-wrap">
            <div class="font-semibold w-[7rem]">氏名</div>
            <div>{{ $question->name }}</div>
        </div>
        <div class="flex flex-wrap">
            <div class="font-semibold w-[7rem]">メールアドレス</div>
            <div>{{ $question->mail_address }}</div>
        </div>
        <div class="flex flex-wrap">
            <div class="font-semibold w-[7rem]">電話番号</div>
            <div>{{ $question->telephonenumber }}</div>
        </div>
        <div class="flex flex-wrap">
            <div class="font-semibold w-[7rem]">お問い合わせ</div>
            <div>{{ $question->created_at }}</div>
        </div>

        <div>{{ $question->message }}</div>
    </div>

    <div class="bg-white my-3 p-3 mx-auto max-w-7xl rounded-2xl">
        <div class="flex flex-wrap">
            <div class="font-semibold w-[7rem]">担当</div>
            <div>{{ $question->answer->user->name ?? '--' }}</div>
        </div>


        <div class="flex flex-wrap">
            <div class="font-semibold w-[7rem]">回答</div>
            <div>{{ $question->answer->created_at ?? '--' }}</div>
        </div>

        <div>{{ $question->answer->message ?? '' }}</div>

    </div>

    <div class="my-3 p-3 mx-auto max-w-7xl">
        <x-primary-button>
            <a href="/">戻る</a>
        </x-primary-button>
    </div>
</x-simple-layout>