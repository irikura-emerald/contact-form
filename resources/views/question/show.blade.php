<x-simple-layout>
    <h1>お問合わせ一覧</h1>
    @foreach ($questions as $question)
        <p>
            <a href="{{ route('answer.create', $question) }}">
                <ul>
                    <li>{{ $question->id }}</li>
                    <li>{{ $question->name }}</li>
                    <li>{{ $question->getPartOfMessage() }}</li>
                    <li>{{ $question->created_at }}</li>
                    <li>{{ $question->answer->created_at ?? '--' }}</li>
                </ul>
            </a>
        </p>
    @endforeach
    {{ $questions->links() }}
</x-simple-layout>