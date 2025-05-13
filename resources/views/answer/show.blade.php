<x-simple-layout>
    <h1>回答閲覧</h1>
    <p>
    <ul>
        <li>
            <span>ID</span>
            <span>{{ $question->id }}</span>
        </li>
        <li>
            <span>氏名</span>
            <span>{{ $question->name }}</span>
        </li>
        <li>
            <span>メールアドレス</span>
            <span>{{ $question->mail_address }}</span>
        </li>
        <li>
            <span>電話番号</span>
            <span>{{ $question->telephonenumber }}</span>
        </li>
        <li>
            <div>お問い合わせ</div>
            <div>{{ $question->message }}</div>
        </li>
        <li>
            <div>回答</div>
            <div>担当：{{ $question->answer->user->name ?? '--' }}</div>
            <div>{{ $question->answer->message ?? '' }}</div>
        </li>
        <li>
            <a href="/">戻る</a>
        </li>
    </ul>
    </p>
</x-simple-layout>