<x-simple-layout>
    <h1>回答作成</h1>
    <p>
    <ul>
        <li>{{ $question->id }}</li>
        <li>{{ $question->name }}</li>
        <li>{{ $question->mail_address }}</li>
        <li>{{ $question->telephonenumber }}</li>
        <li>{{ $question->message }}</li>
        <li>{{ $question->created_at }}</li>
    </ul>
    </p>

    <hr>

    <p>
    <form method="post" action="{{ route('answer.create', $question) }}">
        @csrf
        @if ($question->answer)
            @method('patch')
        @endif
        <ul>
            <li>
                <x-input-error :messages="$errors->get('message')"></x-input-error>
                <textarea id="message" name="message">{{ $question->answer->message ?? '' }}</textarea>
            </li>
            <li> {{ $question->answer->created_at ?? '--' }} </li>
        </ul>
        @if (session('resultMessage'))
            <div class="text-red-600 font-bold">
                {{ session('resultMessage') }}
            </div>
        @endif
        <input type="submit" value="送信" />
    </form>
    </p>
</x-simple-layout>